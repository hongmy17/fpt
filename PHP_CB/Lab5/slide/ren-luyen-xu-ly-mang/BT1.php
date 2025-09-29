<?php
$products = [];

function addProduct(&$products, $id, $name, $price) {
  $products[] = ["id"=> $id,"name"=> $name,"price"=> $price];
}

function removeProductByID(&$products, $id) {
  foreach ($products as $key => $product) {
    if ($product["id"] == $id) {
      unset($products[$key]);
      break;
    }
  }

  $products = array_values($products);
}

function findProductByName($products, $name) {
  foreach ($products as $key => $product) {
    if ($product["name"] == $name) {
      return $product;
    }
  }

  return null;
}

function getProductsByPrice($products, $price) {
  $result = [];

  foreach ($products as $key => $product) {
    if ($product["price"] > $price) {
      $result[] = $product;
    }
  }

  return $result;
}

function getProductNames($products) {
  $names = array_column($products,"name");
  return $names;
}

echo "<pre>";

addProduct($products, 1, "Product 1", 100);
addProduct($products,2, "Product 2", 200);
addProduct($products,3, "Product 3", 300);

print_r($products);

removeProductByID($products,1);
print_r($products);

$product = findProductByName($products,"Product 3");
print_r($product);

$expensiveProducts = getProductsByPrice($products, 150);
print_r($expensiveProducts);

$productNames = getProductNames($products);
print_r($productNames);