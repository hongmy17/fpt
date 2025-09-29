<?php
$targetDir = "uploads/";
$targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

if (file_exists($targetFile)) {
  echo "Sorry, file already exists.<br>";
  $uploadOk = 0;
}

if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.<br>";
  $uploadOk = 0;
}

$allowedTypes = ["jpg", "png", "jpeg", "gif", "pdf", "docx", "txt"];
if (!in_array($fileType, $allowedTypes)) {
  echo "Sorry, only JPG, JPEG, PNG, GIF, PDF, DOCX & TXT files are allowed.<br>";
  $uploadOk = 0;
}

if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.<br>";
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
    echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.<br>";
  } else {
    echo "Sorry, there was an error uploading your file.<br>";
  }
}