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
                <a class="nav-link active" href="edit.php">Sửa sản phẩm</a>
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
      <form class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
          <label for="product-code" class="form-label">Mã sản phẩm</label>
          <input placeholder="VD: SP001" type="text" class="form-control" id="product-code">
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
          <label for="product-name" class="form-label">Tên sản phẩm</label>
          <input placeholder="iPhone 15 Pro Max" type="text" class="form-control" id="product-name">
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
          <label for="brand" class="form-label">Thương hiệu</label>
          <input placeholder="VD: Apple" type="text" class="form-control" id="brand">
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
          <label for="quantity-in-stock" class="form-label">Số lượng tồn kho</label>
          <input placeholder="VD: 10" type="number" class="form-control" id="quantity-in-stock">
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
          <label for="price" class="form-label">Giá</label>
          <input placeholder="VD: 35000000" type="number" class="form-control" id="price">
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
          <label for="status" class="form-label">Trạng thái</label>
          <select class="form-select" id="status">
            <option value="Còn hàng">Còn hàng</option>
            <option value="Hết hàng">Hết hàng</option>
          </select>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
          <label for="short-description" class="form-label">Mô tả ngắn</label>
          <textarea placeholder="VD: Smartphone cao cấp với chip A17 Bionic, camera cải tiến và màn hình ProMotion." class="form-control" id="short-description" rows="3"></textarea>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
          <label for="description" class="form-label">Mô tả</label>
          <textarea placeholder="VD: Smartphone cao cấp với chip A17 Bionic, camera cải tiến và màn hình ProMotion." class="form-control" id="description" rows="3"></textarea>
        </div>
        <div class="text-end">
          <button type="submit" class="btn btn-primary">Sửa</button>
        </div>
      </form>
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
