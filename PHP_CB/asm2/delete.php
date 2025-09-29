<?php
session_start();

$targetDir = "images/";
$product_code = $_GET['product_code'];

function getProductIndexByID($product_code) {
  $products = $_SESSION["products"];
  foreach ($products as $index => $product) {
    if ($product["product_code"] == $product_code) {
      return $index;
    }
  }
  return null;
}

function deleteProduct(&$products, $index) {
  unset($products[$index]);
  $products = array_values($products);
}

function deleteImageOfProduct($targetFile) {
  if (file_exists($targetFile)) {
    unlink($targetFile);
  }
}

$productIndex = getProductIndexByID($product_code);
$targetFile = $targetDir . basename($_SESSION["products"][$productIndex]["product_image"]);
deleteImageOfProduct($targetFile);
deleteProduct($_SESSION["products"], $productIndex);
?>

<script>
  alert("Xóa sản phẩm thành công!");
  window.location.href = "list.php";
</script>