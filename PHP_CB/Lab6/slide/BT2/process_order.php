<?php
$productsPrice = [
  "laptop" => 1000,
  "smartphone" => 700,
  "tablet" => 500,
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = trim(htmlspecialchars($_POST["name"]));
  $email = trim(htmlspecialchars($_POST["email"]));
  $address = trim(htmlspecialchars($_POST["address"]));
  $product = trim(htmlspecialchars($_POST["product"]));
  $quantity = intval($_POST["quantity"]);

  if (!empty($name) &&
      !empty($email) &&
      !empty($address) &&
      !empty($product) &&
      !empty($quantity)
  ) {
    $totalPrice = $productsPrice[$product] * $quantity;

    echo "<h2>Order confirmation</h2>";
    echo "Name: $name <br>";
    echo "Email: $email <br>";
    echo "Address: $address <br>";
    echo "Product: $product <br>";
    echo "Quantity: $quantity <br>";
    echo "Total Price: $totalPrice <br>";
  } else {
    echo "Please fill in all fields correctly";
  }
}