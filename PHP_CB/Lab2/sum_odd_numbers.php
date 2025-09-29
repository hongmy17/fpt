<?php
define("LIMIT","100");

$sum = 0;

for ($i = 1; $i < LIMIT; $i++) {
  if ($i % 2 == 0 ) {
    continue;
  }
  $sum += $i;
}

printf("Tong cac so le tu 1 den %d la: %d", LIMIT, $sum);