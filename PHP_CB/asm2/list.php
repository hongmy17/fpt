<?php
session_start();
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
                <a class="nav-link active" aria-current="page" href="list.php"
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
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Mã SP</th>
            <th scope="col">Ảnh</th>
            <th scope="col">Tên</th>
            <th scope="col">Giá</th>
            <th scope="col">Thương hiệu</th>
            <th scope="col">Tồn kho</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Ngày nhập</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($_SESSION["products"] as $product): ?>
            <tr>
              <th scope="row"><?=$product["product_code"]?></th>
              <td>
                <img src="images/<?=$product["product_image"]?>" alt="image" width="50px">
              </td>
              <td><?=$product["product_name"]?></td>
              <td><?=$product["price"]?></td>
              <td><?=$product["brand"]?></td>
              <td><?=$product["quantity_in_stock"]?></td>
              <td><?=$product["status"]?></td>
              <td><?=$product["import_date"]?></td>
              <td>
                <a class="btn btn-secondary" href="detail.php?product_code=<?=$product["product_code"]?>">Xem</a>
                <a class="btn btn-primary" href="edit.php?product_code=<?=$product["product_code"];?>">Sửa</a>
                <a class="btn btn-danger" href="delete.php?product_code=<?=$product["product_code"];?>">Xóa</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
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
