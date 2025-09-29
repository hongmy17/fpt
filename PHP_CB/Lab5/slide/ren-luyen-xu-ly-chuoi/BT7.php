<?php
function splitString($delimiter, $string) {
  return explode($delimiter, $string);
}

print_r(splitString(",","hello,world,php"));