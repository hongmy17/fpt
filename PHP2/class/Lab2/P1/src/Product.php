<?php

namespace App;

class Product {
  private string $id;
  private string $name;
  private float $price;

  public function __construct($id, $name, $price) {
    $this->id = $id;
    $this->name = $name;
    $this->price = $price;
  }

  public function getID() {
    return $this->id;
  }

  public function getName() {
    return $this->name;
  }

  public function getPrice() {
    return $this->price;
  }

  public function setID($id) {
    $this->id = $id;
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function setPrice($price) {
    $this->price = $price;
  }

  public function displayInfo() {
    echo "ID: {$this->getID()} <br>";
    echo "Name: {$this->getName()} <br>";
    echo "Price: {$this->getPrice()} <br>";
  }
}