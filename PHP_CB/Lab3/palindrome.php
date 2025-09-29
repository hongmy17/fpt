<?php
function isPalindrome($string) {
  $string = strtolower(str_replace(" ","", $string));
  return $string == strrev($string);
}

echo isPalindrome("madam") ? "madam la chuoi doi xung <br>" : "madam khong phai chuoi doi xung <br>";
echo isPalindrome("happy") ? "happy la chuoi doi xung <br>" : "happy khong phai chuoi doi xung <br>";
echo isPalindrome("Step on no pets") ? "Step on no pets la chuoi doi xung <br>" : "Step on no pets khong phai chuoi doi xung <br>";