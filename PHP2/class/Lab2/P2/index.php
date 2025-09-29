<?php

require_once "vendor/autoload.php";

use App\Buyer;
use App\Seller;

$buyer1 = new Buyer("B001", "Buyer1", 20);
$buyer1->getInfo();
$buyer2 = new Buyer("B002", "Buyer2", 18);
$buyer2->getInfo();

$seller1 = new Seller("S001", "Seller1", 23);
$seller1->getInfo();
$seller2 = new Seller("S002", "Seller2", 15);
$seller2->getInfo();

function sortByAge($people) {
  usort($people, function($person1, $person2) {
    return $person1->compareTo($person2);
  });
  return $people;
}

$people = [$buyer1, $buyer2, $seller1, $seller2];

$sortedPeople = sortByAge($people);

echo "<br> Sorted array: <br>";
foreach ($sortedPeople as $person) {
  echo "Name: {$person->getName()}, Age: {$person->getAge()} <br>";
}

echo "<br>";
echo "Total Buyers: " . Buyer::getTotalBuyers() . "<br>";
echo "Total Sellers: " . Seller::getTotalSellers() . "<br>";
