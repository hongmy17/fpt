<?php
session_start();
if (!isset($_SESSION["cart"])) {
  $_SESSION["cart"] = [];
}

if (isset($_POST["product"]) && isset($_POST["quantity"])) {
  $product = trim(htmlspecialchars($_POST["product"]));
  $quantity = (int)trim(htmlspecialchars($_POST["quantity"]));

  if (!isset($_SESSION["cart"][$product])) {
    $_SESSION["cart"][$product] = 0;
  }

  $_SESSION["cart"][$product] += $quantity;
  echo "Product added to cart successfully! <br>";
  echo "<br><a href='/'>Add more product</a><br>";
  echo "<a href='view_cart.php'>View Cart</a>";
} else {
  echo "Product or quantity not set.";
}