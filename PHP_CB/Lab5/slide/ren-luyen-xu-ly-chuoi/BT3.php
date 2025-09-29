<?php
function findSubstringPosition($str, $substring) {
  $position = strpos($str, $substring);
  return $position ? $position : -1;
}

echo findSubstringPosition( "Hello world","world");
echo findSubstringPosition( "Hello world","php");