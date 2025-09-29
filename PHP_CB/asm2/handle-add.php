<?php
session_start();

$product = $_POST;
$product['product_image'] = basename($_FILES["product_image"]["name"]);
array_push($_SESSION['products'], $product);

$targetDir = "images/";
$targetFile = $targetDir . basename($_FILES["product_image"]["name"]);
$uploadOk = 1;

if (file_exists($targetFile)) {
  echo "File đã tồn tại. Vui lòng chọn file khác.";
  $uploadOk = 0;
}

if ($uploadOk) {
  if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $targetFile)) {
    echo "File " . htmlspecialchars(basename($_FILES["product_image"]["name"])) . " đã được tải lên.";
  } else {
    echo "Có lỗi xảy ra khi tải lên file.";
  }
} else {
  echo "File được chọn không thể tải lên.";
}
?>

<script>
  alert("Thêm sản phẩm thành công!");
  window.location.href = "list.php";
</script>