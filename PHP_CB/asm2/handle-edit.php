<?php
session_start();
$productCode = $_POST['product_code_raw'];

function getProductIndexByID($productCode) {
  $products = $_SESSION["products"];
  foreach ($products as $index => $product) {
    if ($product["product_code"] == $productCode) {
      return $index;
    }
  }
  return null;
}

function updateProduct(&$products, $index, $data) {
  $products[$index] = $data;
}

function editImage() {
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
}

$productIndex = getProductIndexByID($productCode);
$product = $_POST;

if ($_FILES["product_image"]["name"] != "") {
  editImage();
  $product["product_image"] = basename($_FILES["product_image"]["name"]);
} else {
  $product["product_image"] = $_SESSION["products"][$productIndex]["product_image"];
}

updateProduct($_SESSION["products"], $productIndex, $product);
?>

<script>
  alert("Cập nhật sản phẩm thanh công!");
  window.location.href = "list.php";
</script>