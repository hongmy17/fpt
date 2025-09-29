<?php

require_once "vendor/autoload.php";

use App\Product;
use App\ClothingProduct;
use App\ElectronicProduct;

$product = new Product("P001", "Product", 99.99);
$product->displayInfo();

$electronicProduct = new ElectronicProduct("P002", "ElectronicProduct", 99.99, 1);
$electronicProduct->displayInfo();

$clothingProduct = new ClothingProduct("P003", "ClothingProduct", 99.99, 1);
$clothingProduct->displayInfo();

