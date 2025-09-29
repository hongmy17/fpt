<?php
function extractSubstring($str, $start, $length) {
  return substr($str, $start, $length);
}

echo extractSubstring("Hello PHP","6", 6);