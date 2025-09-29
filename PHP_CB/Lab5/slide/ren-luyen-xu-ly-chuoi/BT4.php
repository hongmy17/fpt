<?php
function replaceSubstring($str, $search, $replace) {
  return str_replace($search, $replace, $str);
}

echo replaceSubstring("Hello world", "world", "php");