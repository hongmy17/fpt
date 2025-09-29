<?php
if (isset($_GET["file"])) {
  $file = basename($_GET["file"]);
  $file_path = "uploads/" . $file;

  if (file_exists($file_path)) {
    if (unlink($file_path)) {
      echo "File '$file' deleted successfully.";
    } else {
      echo "Error deleting file '$file'.";
    }
  } else {
    echo "File '$file' does not exist.";
  }
} else {
  echo "No file specified.";
}