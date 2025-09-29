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
              <li class="nav-item">
                <a class="nav-link" href="edit.php">Sửa sản phẩm</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="detail.php">Chi tiết sản phẩm</a>
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
      <div class="row">
        <div class="col-md-6 text-center">
          <img src="https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcQXDNlWqC3X3q67W0z5MnfCAzKBYH0MNP_6O4G2Yu76hn9j4c88HjvJxFCQqWGe-blDrciGrRTln8AFIEm38HVNMgLrvTcDcCUGsEx0AQtLTb8j-sdnq6hmcn6JuukddctKj-aaAQ&usqp=CAc" 
              alt="iPhone 15 Pro Max" class="img-fluid rounded w-100">
        </div>
        <div class="col-md-6">
          <h1>iPhone 15 Pro Max</h1>
          <p><strong>Thương hiệu:</strong> Apple</p>
          <p><strong>Tình trạng:</strong> <span class="text-success">Còn hàng</span></p>
          <p><strong>Ngày nhập:</strong> 28/03/2025</p>
          <p><strong>Số lượng trong kho:</strong> 10</p>
          <h4 class="text-danger">Giá: 35,000,000 VNĐ</h4>
          <p><strong>Chi tiết sản phẩm:</strong> iPhone 15 Pro Max có khung titan siêu bền, màn hình 6.7 inch OLED, hệ thống camera cải tiến với zoom quang 5x, chip A17 Bionic mạnh mẽ, hỗ trợ USB-C và pin lâu dài.</p>
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
