<?php
$email = "linhpq@gmail.com";

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "<p>Email $email is valid</p>";

  $parts = explode("@", $email);
  $username = $parts[0];
  $domain = $parts[1];

  echo "<p>Username: $username</p>";
  echo "<p>Domain: $domain</p>";
} else {
  echo "<p>Email $email is not valid</p>";
}