<?php
	class Worker {
		private $timeout = 3;
		private $requestsInRow = 5;
		private $days = 5;
		private $currency = "USD";
		private $currency2 = "RUR";
		private $date;
		private $loader;
		function __construct() {
			$this->date = new DateTime();
		}
		public function timeout($num) {
			$this->timeout = $num;
			return $this;
		}
		public function requests($num) {
			$this->requestsInRow = $num;
			return $this;
		}
		public function days($num) {
			$this->days = $num;
			return $this;
		}
		public function setLoader(Loader &$loader) {
			$this->loader = $loader;
			return $this;
		}
		public function setFirstCurrency($currency) {
			$this->currency = $currency;
			return $this;
		}
		public function setSecondCurrency($currency) {
			$this->currency2 = $currency;
			return $this;
		}
		public function setDate($date) {
			$this->date = $date;
			return $this;
		}
		public function singleDay() { // получение данных за один день (если 2 валюты - выписываем кросс-курс)
			$result = $this->loader->loadDailyDiff($this->currency, $this->date);
			if ($this->currency2 === "RUR") {
				$result['valute'] .= "/RUR";
			} else {
				$result2 = $this->loader->loadDailyDiff($this->currency2, $this->date);
				$result = Loader::resultFormat(date_format($this->date, "d/m/Y"), "{$result['valute']}/{$result2['valute']}", $result['todayRate'] / $result2['todayRate'], $result['yesterdayDiff'] / $result2['yesterdayDiff']);
			}
			return $result;
		}
		public function work() { // основная функция воркера по сбору данных за N дней
			$requestsRow = 0;
			$result = [];
			for ($i = 0; $i < $this->days; $i++) {
				if (++$requestsRow % $this->requestsInRow === 0 && $this->days > $requestsRow) {
					sleep($this->timeout); // на случай, чтобы не банило по количеству запросов
				}
				$result[] = $this->singleDay();
				$this->date = $this->loader->lastMarket();
			}
			return $result;
		}
	}
