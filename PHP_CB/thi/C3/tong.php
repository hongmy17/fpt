<?php
$numbers = [1,4,6,3,9,2];

$sum = 0;
foreach ($numbers as $number) {
  $sum += $number;
}
echo "Tong: $sum";