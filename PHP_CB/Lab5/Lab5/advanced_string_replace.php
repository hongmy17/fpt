<?php
function replacedWorld($replaceWorld, $searchWorld, $text) {
  return str_replace($searchWorld, $replaceWorld, $text);
}

$text = "The quick brown fox jumps over the lazy dog. The dog was not amused.";
$updatedText = replacedWorld("cat", "dog", $text);

echo "Doan van ban sau khi thay the: $updatedText";