<?php
if (!isset($_COOKIE["login_status"]) || $_COOKIE["login_status"] !== "true") {
  header("Location: index.php");
  exit;
}

printf("<h1>Welcome, %s!</h1>", htmlspecialchars($_COOKIE["username"]));
echo "<a href='logout.php'>Logout</a>";