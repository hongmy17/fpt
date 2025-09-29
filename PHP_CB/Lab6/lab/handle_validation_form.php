<?php
if (isset($_POST['name']) && isset($_POST['email'])) {
  $name = trim(htmlspecialchars($_POST['name']));
  $email = trim(htmlspecialchars($_POST['email']));

  if (empty($name) || empty($email)) {
    echo "Name and email are required";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format";
  } else {
    echo "Name: $name<br>";
    echo "Email: $email<br>";
  }
} else {
  echo "No data submitted";
}
