<?php

namespace App;

class Seller implements PersonInterface {
  use ComparableTrait;
  private string $sellerID;
  private string $name;
  private string $age;
  static private int $totalSellers = 0;

  public function __construct($sellerID, $name, $age) {
    $this->sellerID = $sellerID;
    $this->name = $name;
    $this->age = $age;
    self::$totalSellers++;
  }

  public function getName() {
    return $this->name;
  }

  public function getAge() {
    return $this->age;
  }

  public function getInfo() {
    echo "ID: {$this->sellerID} <br>";
    echo "Name: {$this->name} <br>";
    echo "Age: {$this->age} <br>";
  }

  static public function getTotalSellers() {
    return self::$totalSellers;
  }
}