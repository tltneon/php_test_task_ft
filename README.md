# php_test_task_ft
## Requirements
* PHP ^7.1
## Usage
### Collect N days
Format: `php cbr.php collect *days* *valute*`
#### Example:
```bash
php cbr.php collect 20 eur
```
That will collect 20 previous days for EUR currency



### Take 1 exact day with rates
Format: `php cbr.php *date* *valute1* [*valute2*]`

Note: [`*valute2*`] is optional
#### Example:
```bash
php cbr.php 01.01.2022 usd eur
```
That will collect selected day with USD/EUR cross-rate


### Help
```bash
php cbr.php help
```

## Currencies
```php
    "AUD" => "R01010",
    "AZN" => "R01020A",
    "GBP" => "R01035",
    "AMD" => "R01060",
    "BYN" => "R01090B",
    "BGN" => "R01100",
    "BRL" => "R01115",
    "HUF" => "R01135",
    "HKD" => "R01200",
    "DKK" => "R01215",
    "USD" => "R01235",
    "EUR" => "R01239",
    "INR" => "R01270",
    "KZT" => "R01335",
    "CAD" => "R01350",
    "KGS" => "R01370",
    "CNY" => "R01375",
    "MDL" => "R01500",
    "NOK" => "R01535",
    "PLN" => "R01565",
    "RON" => "R01585F",
    "XDR" => "R01589",
    "SGD" => "R01625",
    "TJS" => "R01670",
    "TRY" => "R01700J",
    "TMT" => "R01710A",
    "UZS" => "R01717",
    "UAH" => "R01720",
    "CZK" => "R01760",
    "SEK" => "R01770",
    "CHF" => "R01775",
    "ZAR" => "R01810",
    "KRW" => "R01815",
    "JPY" => "R01820"
```
## Tasks
<table>
<tr><td>
Используйте PHP в качестве основного языка 
программирования.
</td><td>DONE</td></tr>
<tr><td>На входе: дата, код валюты, код базовой валюты (по 
умолчанию RUR)</td><td>DONE</td></tr>
<tr><td>получать курсы с http://cbr.ru</td><td>DONE</td></tr>
<tr><td>на выходе: значение курса и разница с предыдущим торговым 
днем</td><td>DONE</td></tr>
<tr><td>кешировать данные http://cbr.ru</td><td>DONE</td></tr>
<tr><td>продемонстрировать навыки работы с брокерами сообщений и 
реализовать сбор данных с cbr за 180 предыдущих дней с 
помощью воркера через консольную команду</td><td>DONE</td></tr>
<tr><td>редоставить в виде репозитория tltneon, чтобы запускалось из коробки</td><td>DONE</td></tr>
</table>