<?php
function processString($string) {
  $trimmed = trim($string);
  $upperCased = strtoupper($trimmed);
  $replaced = str_replace("PHP","PHP Programming", $upperCased);
  return strlen($replaced);
}

echo processString("Welcome to php");