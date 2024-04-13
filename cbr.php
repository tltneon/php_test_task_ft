<?php
	require("Currency.php");
	require("Cache.php");
	require("Loader.php");
	require("Worker.php");
	
	$result = [];
	$cache = new Cache();
	$loader = new Loader($cache);
	$worker = (new Worker())->setLoader($loader);
	if ($argv[1] === "help") {
		echo "\n";
		echo "1. Collect N days. Format: php cbr.php collect *days* *valute*\n";
		echo "Example: php cbr.php collect 20 eur\n";
		echo "\n";
		echo "2. Take 1 exact day with rates. Format: php cbr.php *date* *valute1* [*valute2*]\n";
		echo "Example: php cbr.php 01.01.2022 usd eur\n";
		echo "\n";
		exit;
	}
	if ($argv[1] === "collect") {
		$days = $argv[2];
		$currency = strtoupper($argv[3]);
		$result = $worker->timeout(1)->requests(10)->days($days)->setFirstCurrency($currency)->work();
	} else {
		$date = date_parse($argv[1]);
		$date = new DateTime("{$date['day']}-{$date['month']}-{$date['year']}");
		$currency = strtoupper($argv[2]);
		$currency2 = strtoupper($argv[3] ?? "RUR");
		$result = $worker->setFirstCurrency($currency)->setSecondCurrency($currency2)->setDate($date)->singleDay();
	}
	print_r($result);
	exit;
	
	// формулировка "реализовать сбор данных с cbr за 180 предыдущих дней" не ясна, можно трактовать двояко: надо ли тянуть каждый из дней для сверки по указанной трактовке или
	// "https://cbr.ru/scripts/XML_dynamic.asp?date_req1=02/03/2001&date_req2=14/03/2001&VAL_NM_RQ=R01235" позволяет вытащить данные сразу за полгода, например, что позволит эффективнее обработать данные
	
	// в коде не реализована обработка ошибок при запросе с сайта