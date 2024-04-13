<?php
	class Loader {
		const DAILY_URL = "https://cbr.ru/scripts/XML_daily.asp?date_req=";
		private $cache;
		private $lastMarket;
		public function __construct($cache) {
			$this->cache = $cache;
		}
		public function parse(string $url): array { // таскаем и кэшируем данные
			if (!$this->cache->has($url)) {
				$this->cache->set($url, self::xmlToJson(file_get_contents($url)));
			}
			return $this->cache->get($url);
		}
		static function xmlToJson(string $xml): array { // делаем удобоваримое представление xml
			$parsed = simplexml_load_string($xml, "SimpleXMLElement", LIBXML_NOCDATA);
			$json = json_encode($parsed);
			return json_decode($json, TRUE);
		}
		static function find(array $day, string $currency): array {
			$array = array_filter($day["Valute"], function($e) use($currency) {
				return $e['@attributes']['ID'] === Currency::NAME[$currency];
			});
			return reset($array);
		}
		static function fixFloat(array &$day): void { // чиним поломанные числа
			$day['VunitRate'] = floatval(str_replace(',', '.', $day['VunitRate']));
			$day['Value'] = floatval(str_replace(',', '.', $day['Value']));
		}
		public function lastMarket() {
			return $this->lastMarket;
		}
		public function loadDailyDiff(string $currency, $date): array { // получение разницы курса одной валюты
			$today = $this->parse(Loader::DAILY_URL . date_format($date, "d/m/Y"));
			$date = new DateTime($today['@attributes']['Date']); // сразу получаем ближайший торговый день, который нам выплюнула апи
			$todayRate = Loader::find($today, $currency);
			Loader::fixFloat($todayRate);

			date_sub($date, DateInterval::createFromDateString('1 day')); // вычитание 1 дня достаточно для получения предыдущего торгового дня (апи само предоставляет предыдущий торговый день)
			$yesterday = $this->parse(Loader::DAILY_URL . date_format($date, "d/m/Y"));
			$this->lastMarket = new DateTime($yesterday['@attributes']['Date']); // сразу получаем последний торговый день, который можем потом использовать
			$yesterdayRate = Loader::find($yesterday, $currency);
			Loader::fixFloat($yesterdayRate);

			return self::resultFormat(date_format($date, "d/m/Y"), $currency, $todayRate['VunitRate'], $todayRate['VunitRate'] - $yesterdayRate['VunitRate']);
		}
		static function resultFormat(...$args) {
			return [
				'date' => $args[0],
				'valute' => $args[1],
				'todayRate' => number_format($args[2], 4),
				'yesterdayDiff' => number_format($args[3], 4)
			];
		}
	}
