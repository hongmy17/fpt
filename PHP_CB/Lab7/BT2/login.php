<?php
$validUsername = "admin";
$validPassword = "password123";

if (isset($_POST["username"]) && isset($_POST["password"])) {
  $username = trim(htmlspecialchars($_POST["username"]));
  $password = trim(htmlspecialchars($_POST["password"]));

  if ($username === $validUsername && $password === $validPassword) {
    if (isset($_POST["remember"])) {
      setcookie("username", $username, time() + (86400 * 30), "/");
      setcookie("login_status", "true", time() + (86400 * 30), "/");
    } else {
      setcookie("username", "", time() - 3600, "/");
      setcookie("login_status", "", time() - 3600, "/");
    }

    header("Location: welcome.php");
    exit;
  } else {
    echo "Invalid username or password. <br>";
    echo '<a href="/">Try again</a>';
  }
} else {
  echo "Username or password not set. <br>";
}