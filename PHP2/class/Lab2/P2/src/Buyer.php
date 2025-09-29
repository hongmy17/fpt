<?php

namespace App;

class Buyer implements PersonInterface {
  use ComparableTrait;
  private string $buyerID;
  private string $name;
  private string $age;
  static private int $totalBuyers = 0;

  public function __construct($buyerID, $name, $age) {
    $this->buyerID = $buyerID;
    $this->name = $name;
    $this->age = $age;
    self::$totalBuyers++;
  }

  public function getName() {
    return $this->name;
  }

  public function getAge() {
    return $this->age;
  }

  public function getInfo() {
    echo "ID: {$this->buyerID} <br>";
    echo "Name: {$this->name} <br>";
    echo "Age: {$this->age} <br>";
  }

  static public function getTotalBuyers() {
    return self::$totalBuyers;
  }
}