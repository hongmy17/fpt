<?php
$globalGreeting = "Hello";

function greetUser($name = "Guest") {
  $localGreeting = "Welcome";
  global $globalGreeting;
  return "{$globalGreeting}, {$name}! {$localGreeting} to our website";
}

echo greetUser() . "<br>";
echo greetUser("Linh") . "<br>";