<?php
$person = [
  "name"=> "John",
  "age"=> "18",
  "city"=> "Can Tho",
];

echo "Ten: " . $person["name"] . "<br>";
echo "Tuoi: " . $person["age"] . "<br>";
echo "TP: " . $person["city"] . "<br>";

echo "Thong tin chi tiet: <br>";
foreach ($person as $key => $value) {
  echo $key .":". $value ."<br>";
}

$matrix = [
  [1, 2, 3],
  [2, 3, 4],
  [3, 4, 5],
];
echo "Mang da chieu: <br>";
for ( $i = 0; $i < count($matrix); $i++ ) {
  for ( $j = 0; $j < count($matrix[$i]); $j++ ) {
    echo $matrix[$i][$j] ." ";
  }
  echo "<br>";
}

$keys = array_keys($person);
echo "Cac khoa cua mang ket hop: ";
print_r($keys);
echo "<br>";

$values = array_values($person);
echo "Cac gia tri cua mang ket hop: ";
print_r($values);
echo "<br>";