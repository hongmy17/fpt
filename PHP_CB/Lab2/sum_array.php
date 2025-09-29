<?php
define("MAX_VALUE","13");
$numbers = [10, 11, 72, 12, 10];
$sum = 0;

foreach ($numbers as $number) {
  if ($number > MAX_VALUE) {
    continue;
  }
  $sum += $number;
}

printf("Tong cac gia tri nho hon hoac bang %d la: %d", MAX_VALUE, $sum);
