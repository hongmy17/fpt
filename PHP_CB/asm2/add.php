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
                <a class="nav-link active" href="add.php">Thêm sản phẩm</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- end header -->

      <!-- content -->
      <form class="row" method="post" action="handle-add.php" enctype="multipart/form-data">
        <div class="col-lg-6 col-md-12 mb-3 d-flex flex-column align-items-center justify-content-center">
          <img
            src="images/default.png"
            id="image-preview"
            class="circle"
            alt="Xem trước ảnh"
            style="max-width: 100%; max-height: 400px; object-fit: contain; border: 1px solid #ddd; padding: 5px; border-radius: 8px;"
          >

          <input
            type="file"
            class="form-control mt-3"
            style="width: 80%;"
            id="product_image"
            name="product_image"
            accept="image/*"
            onchange="previewImage(event)"
          >
        </div>

        <div class="col-lg-6 col-md-12">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="product_code" class="form-label">Mã sản phẩm</label>
              <input placeholder="VD: SP001" type="text" class="form-control" id="product_code" name="product_code" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="product_name" class="form-label">Tên sản phẩm</label>
              <input placeholder="iPhone 15 Pro Max" type="text" class="form-control" id="product_name" name="product_name" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="brand" class="form-label">Thương hiệu</label>
              <input placeholder="VD: Apple" type="text" class="form-control" id="brand" name="brand" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="quantity_in_stock" class="form-label">Số lượng tồn kho</label>
              <input placeholder="VD: 10" type="number" class="form-control" id="quantity_in_stock" name="quantity_in_stock" min="0" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="price" class="form-label">Giá</label>
              <input placeholder="VD: 35000000" type="number" class="form-control" id="price" name="price" min="0" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="import_date" class="form-label">Ngày nhập</label>
              <input type="date" class="form-control" id="import_date" name="import_date" required>
            </div>
            <div class="col-md-12 mb-3">
              <label for="status" class="form-label">Trạng thái</label>
              <select class="form-select" id="status" name="status">
                <option value="Còn hàng">Còn hàng</option>
                <option value="Hết hàng">Hết hàng</option>
              </select>
            </div>
            <div class="col-12 mb-3">
              <label for="short_description" class="form-label">Mô tả ngắn</label>
              <textarea placeholder="VD: Smartphone cao cấp với chip A17 Bionic..." class="form-control" id="short_description" name="short_description" rows="2"></textarea>
            </div>
            <div class="col-12 mb-3">
              <label for="description" class="form-label">Mô tả chi tiết</label>
              <textarea placeholder="VD: Smartphone cao cấp với chip A17 Bionic..." class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <div class="text-end">
              <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
          </div>
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

<script>
  function previewImage(event) {
    const imagePreview = document.getElementById('image-preview');
    const file = event.target.files[0];

    if (file) {
      const reader = new FileReader();
      reader.onload = function () {
        imagePreview.src = reader.result;
      };
      reader.readAsDataURL(file);
    } else {
      imagePreview.src = "images/default.png";
    }
  }
</script>
