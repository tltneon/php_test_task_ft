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

## Expected output
<details>
  <summary>Executing cbr.bat Log</summary>
  
> OS: Win 10

> PHP version 8.2


```php
D:\lab\cbr>php cbr.php help

1. Collect N days. Format: php cbr.php collect *days* *valute*
Example: php cbr.php collect 20 eur

2. Take 1 exact day with rates. Format: php cbr.php *date* *valute1* [*valute2*]
Example: php cbr.php 01.01.2022 usd eur


D:\lab\cbr>php cbr.php 01.01.2022 usd eur
Array
(
    [date] => 01/01/2022
    [valute] => USD/EUR
    [todayRate] => 0.8837
    [yesterdayDiff] => 0.7408
)

// Output below is dependent to current date and will be same only partially
D:\lab\cbr>php cbr.php collect 20 eur
Array
(
    [0] => Array
        (
            [date] => 12/04/2024
            [valute] => EUR/RUR
            [todayRate] => 99.7264
            [yesterdayDiff] => -0.9529
        )

    [1] => Array
        (
            [date] => 11/04/2024
            [valute] => EUR/RUR
            [todayRate] => 100.6793
            [yesterdayDiff] => -0.5540
        )

    [2] => Array
        (
            [date] => 10/04/2024
            [valute] => EUR/RUR
            [todayRate] => 101.2333
            [yesterdayDiff] => 0.4860
        )

    [3] => Array
        (
            [date] => 09/04/2024
            [valute] => EUR/RUR
            [todayRate] => 100.7473
            [yesterdayDiff] => 0.5237
        )

    [4] => Array
        (
            [date] => 08/04/2024
            [valute] => EUR/RUR
            [todayRate] => 100.2236
            [yesterdayDiff] => 0.0977
        )

    [5] => Array
        (
            [date] => 05/04/2024
            [valute] => EUR/RUR
            [todayRate] => 100.1259
            [yesterdayDiff] => 0.0591
        )

    [6] => Array
        (
            [date] => 04/04/2024
            [valute] => EUR/RUR
            [todayRate] => 100.0668
            [yesterdayDiff] => 0.6391
        )

    [7] => Array
        (
            [date] => 03/04/2024
            [valute] => EUR/RUR
            [todayRate] => 99.4277
            [yesterdayDiff] => 0.0161
        )

    [8] => Array
        (
            [date] => 02/04/2024
            [valute] => EUR/RUR
            [todayRate] => 99.4116
            [yesterdayDiff] => -0.1545
        )

    [9] => Array
        (
            [date] => 01/04/2024
            [valute] => EUR/RUR
            [todayRate] => 99.5661
            [yesterdayDiff] => 0.0362
        )

    [10] => Array
        (
            [date] => 29/03/2024
            [valute] => EUR/RUR
            [todayRate] => 99.5299
            [yesterdayDiff] => -0.1758
        )

    [11] => Array
        (
            [date] => 28/03/2024
            [valute] => EUR/RUR
            [todayRate] => 99.7057
            [yesterdayDiff] => -0.5647
        )

    [12] => Array
        (
            [date] => 27/03/2024
            [valute] => EUR/RUR
            [todayRate] => 100.2704
            [yesterdayDiff] => -0.1417
        )

    [13] => Array
        (
            [date] => 26/03/2024
            [valute] => EUR/RUR
            [todayRate] => 100.4121
            [yesterdayDiff] => 0.0470
        )

    [14] => Array
        (
            [date] => 25/03/2024
            [valute] => EUR/RUR
            [todayRate] => 100.3651
            [yesterdayDiff] => 0.1481
        )

    [15] => Array
        (
            [date] => 22/03/2024
            [valute] => EUR/RUR
            [todayRate] => 100.2170
            [yesterdayDiff] => -0.1480
        )

    [16] => Array
        (
            [date] => 21/03/2024
            [valute] => EUR/RUR
            [todayRate] => 100.3650
            [yesterdayDiff] => -0.2489
        )

    [17] => Array
        (
            [date] => 20/03/2024
            [valute] => EUR/RUR
            [todayRate] => 100.6139
            [yesterdayDiff] => 0.5092
        )

    [18] => Array
        (
            [date] => 19/03/2024
            [valute] => EUR/RUR
            [todayRate] => 100.1047
            [yesterdayDiff] => -0.1385
        )

    [19] => Array
        (
            [date] => 18/03/2024
            [valute] => EUR/RUR
            [todayRate] => 100.2432
            [yesterdayDiff] => 0.2714
        )

)

D:\lab\cbr>pause
```
</details>