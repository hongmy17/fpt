<?php
if (isset($_GET["name"]) && isset($_GET["email"])) {
  $name = trim(htmlspecialchars($_GET["name"]));
  $email = trim(htmlspecialchars($_GET["email"]));

  echo "Name: $name<br>";
  echo "Email: $email<br>";
} else {
  echo "No data received.";
}
