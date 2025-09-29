<?php
session_start();

if (isset($_GET["product"])) {
  $product = urldecode($_GET["product"]);
  if (isset($_SESSION["cart"][$product])) {
    unset($_SESSION["cart"][$product]);
    echo "Product removed from cart successfully! <br>";
  } else {
    echo "Product not found in cart. <br>";
  }
} else {
  echo "No product specified. <br>";
}

echo "<a href='view_cart.php'>View Cart</a><br>";