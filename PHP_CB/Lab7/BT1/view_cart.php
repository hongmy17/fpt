<?php
session_start();

if (!isset($_SESSION["cart"]) || empty($_SESSION["cart"])) {
  echo "Your cart is empty. <br>";
  echo "<a href='/'>Add products</a><br>";
} else {
  echo "<h1>Your Cart</h1>";
  echo "<ul>";
  foreach ($_SESSION["cart"] as $product => $quantity) {
    printf(
      "<li>%s: %d <a href='remove_from_cart.php?product=%s'>Remove</a></li>",
      htmlspecialchars($product),
      htmlspecialchars($quantity),
      urlencode($product)
    );
  };
  echo "</ul>";
  echo "<a href='/'>Add more product</a><br>";
  echo "<a href='clear_cart.php'>Clear Cart</a>";
}