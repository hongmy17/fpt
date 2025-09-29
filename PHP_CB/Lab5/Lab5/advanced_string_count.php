<?php
function countWordOccurrences($text, $word) {
  return substr_count($text, $word);
}

$text = "The quick brown fox jumps over the lazy dog. The dog was not amused.";
$occurrences = countWordOccurrences($text, "dog");

echo "So lan xuat hien cua tu 'dog': $occurrences";