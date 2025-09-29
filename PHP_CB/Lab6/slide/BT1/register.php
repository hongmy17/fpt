<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $username = trim(htmlspecialchars($_POST["username"]));
  $password = trim(htmlspecialchars($_POST["password"]));
  $email = trim(htmlspecialchars($_POST["email"]));

  if (!empty($username) && !empty($password) && !empty($email)) {
    echo "Registration successful! <br>";
    echo "Welcome, $username! <br>";
    echo "Your email address is: $email <br>";
  } else {
    echo "Please fill all fields";
  }
}