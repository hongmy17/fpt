<?php
session_start();
$product_code = $_GET['product_code'];

function getProductByID($product_code) {
  $products = $_SESSION["products"];
  foreach ($products as $product) {
    if ($product["product_code"] == $product_code) {
      return $product;
    }
  }
  return null;
}

$product = getProductByID($product_code);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>ASM1</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
  </head>

  <body>
    <!-- header -->
    <div class="container">
      <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="/">PC05353</a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="list.php"
                  >Danh sách sản phẩm</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="add.php">Thêm sản phẩm</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- end header -->

      <!-- content -->
      <div class="row">
        <div class="col-md-6 text-center">
          <img src="https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcQXDNlWqC3X3q67W0z5MnfCAzKBYH0MNP_6O4G2Yu76hn9j4c88HjvJxFCQqWGe-blDrciGrRTln8AFIEm38HVNMgLrvTcDcCUGsEx0AQtLTb8j-sdnq6hmcn6JuukddctKj-aaAQ&usqp=CAc" 
              alt="iPhone 15 Pro Max" class="img-fluid rounded w-100">
        </div>
        <div class="col-md-6">
          <h1><?=$product["product_name"];?></h1>
          <p><strong>Thương hiệu:</strong> <?=$product["brand"];?></p>
          <p><strong>Tình trạng:</strong> <span class="text-success"><?=$product["status"];?></span></p>
          <p><strong>Ngày nhập:</strong> <?=$product["import_date"];?></p>
          <p><strong>Số lượng trong kho:</strong> <?=$product["quantity_in_stock"];?></p>
          <h4 class="text-danger">Giá: <?=number_format($product["price"],0 , ",");?> VNĐ</h4>
          <p><strong>Chi tiết sản phẩm:</strong> <?=$product["description"];?></p>
        </div>
      </div>
      <!-- end content -->
    </div>

    <!-- javascript -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
