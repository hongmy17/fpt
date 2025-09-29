<?php
$file_path = "sample.txt";

if (file_exists($file_path)) {
  $content = file_get_contents($file_path);
  echo "<h2>Content of the file:</h2>";
  echo "<pre>$content</pre>";
} else {
  echo "File does not exist.";
}