<?php

namespace App;


class ClothingProduct extends Product {
  private int $size;

  public function __construct($id, $name, $price, $size) {
    parent::__construct($id, $name, $price);
    $this->size = $size;
  }

  public function displayInfo() {
    parent::displayInfo();
    echo "Size: {$this->size}";
  }
}