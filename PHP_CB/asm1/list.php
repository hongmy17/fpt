<?php

$products = [
  [
    "product_code" => "SP001",
    "product_name" => "iPhone 15 Pro Max",
    "brand" => "Apple",
    "quantity_in_stock" => "10",
    "price" => "35000000",
    "import_date" => "28/03/2025",
    "status" => "Còn hàng",
    "product_image" => "https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcQXDNlWqC3X3q67W0z5MnfCAzKBYH0MNP_6O4G2Yu76hn9j4c88HjvJxFCQqWGe-blDrciGrRTln8AFIEm38HVNMgLrvTcDcCUGsEx0AQtLTb8j-sdnq6hmcn6JuukddctKj-aaAQ&usqp=CAc",
    "short_description" => "Smartphone cao cấp với chip A17 Bionic, camera cải tiến và màn hình ProMotion.",
    "description" => "iPhone 15 Pro Max có khung titan siêu bền, màn hình 6.7 inch OLED, hệ thống camera cải tiến với zoom quang 5x, chip A17 Bionic mạnh mẽ, hỗ trợ USB-C và pin lâu dài."
  ],
  [
    "product_code" => "SP002",
    "product_name" => "Samsung Galaxy S24 Ultra",
    "brand" => "Samsung",
    "quantity_in_stock" => "15",
    "price" => "32000000",
    "import_date" => "27/03/2025",
    "status" => "Còn hàng",
    "product_image" => "https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcQXDNlWqC3X3q67W0z5MnfCAzKBYH0MNP_6O4G2Yu76hn9j4c88HjvJxFCQqWGe-blDrciGrRTln8AFIEm38HVNMgLrvTcDcCUGsEx0AQtLTb8j-sdnq6hmcn6JuukddctKj-aaAQ&usqp=CAc",
    "short_description" => "Siêu phẩm Android với bút S Pen và camera 200MP.",
    "description" => "Galaxy S24 Ultra có màn hình Dynamic AMOLED 6.8 inch, chip Snapdragon 8 Gen 3, bút S Pen tích hợp, camera 200MP siêu nét, pin 5000mAh với sạc nhanh 45W."
  ],
  [
    "product_code" => "SP003",
    "product_name" => "MacBook Air M3",
    "brand" => "Apple",
    "quantity_in_stock" => "8",
    "price" => "28000000",
    "import_date" => "25/03/2025",
    "status" => "Còn hàng",
    "product_image" => "https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcQXDNlWqC3X3q67W0z5MnfCAzKBYH0MNP_6O4G2Yu76hn9j4c88HjvJxFCQqWGe-blDrciGrRTln8AFIEm38HVNMgLrvTcDcCUGsEx0AQtLTb8j-sdnq6hmcn6JuukddctKj-aaAQ&usqp=CAc",
    "short_description" => "Laptop mỏng nhẹ với chip M3 hiệu năng cao.",
    "description" => "MacBook Air M3 trang bị màn hình Retina 13.6 inch, chip M3 mạnh mẽ, RAM 16GB, SSD 512GB, thiết kế siêu mỏng nhẹ, thời lượng pin lên đến 18 giờ."
  ],
  [
    "product_code" => "SP004",
    "product_name" => "Dell XPS 15",
    "brand" => "Dell",
    "quantity_in_stock" => "5",
    "price" => "35000000",
    "import_date" => "26/03/2025",
    "status" => "Còn hàng",
    "product_image" => "https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcQXDNlWqC3X3q67W0z5MnfCAzKBYH0MNP_6O4G2Yu76hn9j4c88HjvJxFCQqWGe-blDrciGrRTln8AFIEm38HVNMgLrvTcDcCUGsEx0AQtLTb8j-sdnq6hmcn6JuukddctKj-aaAQ&usqp=CAc",
    "short_description" => "Laptop cao cấp với màn hình OLED 4K.",
    "description" => "Dell XPS 15 trang bị màn hình OLED 15.6 inch 4K, chip Intel Core i9, RAM 32GB, SSD 1TB, card đồ họa RTX 4070 mạnh mẽ."
  ]
];

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
              <li class="nav-item">
                <a class="nav-link" href="edit.php">Sửa sản phẩm</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="detail.php">Chi tiết sản phẩm</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php">Đăng nhập</a>
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
          <?php foreach ($products as $product): ?>
            <tr>
              <th scope="row"><?=$product["product_code"]?></th>
              <td>
                <img src="<?=$product["product_image"]?>" alt="image" width="50px">
              </td>
              <td><?=$product["product_name"]?></td>
              <td><?=$product["price"]?></td>
              <td><?=$product["brand"]?></td>
              <td><?=$product["quantity_in_stock"]?></td>
              <td><?=$product["status"]?></td>
              <td><?=$product["import_date"]?></td>
              <td>
                <a class="btn btn-secondary" href="">Xem</a>
                <a class="btn btn-primary" href="">Sửa</a>
                <a class="btn btn-danger" href="">Xóa</a>
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
