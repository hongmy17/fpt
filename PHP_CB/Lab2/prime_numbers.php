<?php
define("PRIME_COUNT","50");
$primes = [];
$num = 2;

while (count($primes) < PRIME_COUNT) {
  $isPrime = true;

  for ($i = 2; $i <= sqrt($num); $i++) {
    if ($num % $i === 0) {
      $isPrime = false;
      break;
    }
  }

  if ($isPrime) {
    $primes[] = $num;
  }

  $num++;
}

echo "Cac so nguyen to dau tien la: " . implode(", ", $primes);