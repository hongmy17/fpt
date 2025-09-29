<?php
$numbers = [1,2,3,4,5];

echo "Phan tu dau tien: ". $numbers[0] ."<br>";
echo "Phan tu thu 2: ". $numbers[1] ."<br>";

echo "Cac phan tu cua mang: <br>";
foreach ($numbers as $number) {
  echo $number ." ";
}
echo "<br>";

array_push($numbers,6);
echo "Sau khi them phan tu 6: ";
print_r($numbers);
echo "<br>";

array_pop($numbers);
echo "Sau khi xoa phan tu cuoi: ";
print_r($numbers);
echo "<br>";

$count = count($numbers);
echo "So phan tu cua mang: " . $count ."<br>";
