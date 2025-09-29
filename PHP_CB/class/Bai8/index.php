<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $targetDir = "uploads/";
  if (!is_dir($targetDir)) {
    mkdir($targetDir);
  }
  $targetFile = $targetDir . basename($_FILES["file"]["name"]);

  $isUploadOk = 1;
  if ($isUploadOk == 0) {
    echo "Upload file bi loi. <br>";
  } else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
      echo "File da upload thanh cong tai $targetFile <br>";
    } else {
      echo "Da xay ra loi khi upload file. <br>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="file" id="file">
    <br>
    <input type="submit" value="Upload">
  </form>
</body>
</html>