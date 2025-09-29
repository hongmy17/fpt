<?php
function calculateSumAndAverage($numbers, $default = 0) {
  if (empty($numbers)) {
    return ["sum" => $default, "average" => $default];
  }
  
  $sum = array_sum($numbers);
  $average = $sum / count($numbers);
  return ["sum" => $sum, "average" => $average];
}

$numbers1 = [1, 2, 3, 4, 5, 6];
$numbers2 = [4, 6, 7, 8, 9];
$numbers3 = [];

$result1 = calculateSumAndAverage($numbers1);
printf("Tong: %d, trung binh: %f <br>", $result1['sum'], $result1['average']);

$result2 = calculateSumAndAverage($numbers2);
printf("Tong: %d, trung binh: %f <br>", $result2['sum'], $result2['average']);

$result3 = calculateSumAndAverage($numbers3);
printf("Tong: %d, trung binh: %f <br>", $result3['sum'], $result3['average']);
