<?php
define("FIB_COUNT",20);
define("CHECK_DIVISOR",50);

$fib = [0, 1];
$i = 2;

do {
  $nextFib = $fib[$i - 1] + $fib[$i - 2];
  $fib[] = $nextFib;

  if ($nextFib % CHECK_DIVISOR === 0) {
    printf("So fibonacci dau tien chia het cho %d la: %d", CHECK_DIVISOR, $nextFib);
    break;
  }

  $i++;
} while ($i < FIB_COUNT);

if ($i >= FIB_COUNT) {
  printf("Khong co so fibonacci nao trong [%s] chia het cho %d", implode(", ", $fib), CHECK_DIVISOR);
}