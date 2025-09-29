<?php

namespace App;


class ElectronicProduct extends Product {
  private float $warrantyPeriod;

  public function __construct($id, $name, $price, $warrantyPeriod) {
    parent::__construct($id, $name, $price);
    $this->warrantyPeriod = $warrantyPeriod;
  }

  public function displayInfo() {
    parent::displayInfo();
    echo "WarrantyPeriod: {$this->warrantyPeriod} <br>";
  }
}