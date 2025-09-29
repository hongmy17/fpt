<?php
function getSecondElement($delimiter, $string) {
  $arr = explode($delimiter, $string);
  return isset($arr[1]) ? $arr[1] : "Khong co phan tu thu 2";
}

echo getSecondElement(",","hello,world,php");
echo getSecondElement(",","hello");