<div class="overlay modal">
  <link rel="stylesheet" href="./css/modal.css" />

  <form method="post">
    <input type="text" hidden name="id" />
    <input type="text" hidden name="action" />
    <div class="form-header">
      <h2 class="title">Add employee</h2>
      <i class="fa-solid fa-xmark close-btn"></i>
    </div>

    <div class="form-body">
      <div class="form-group">
        <input type="text" class="form-input" name="name" placeholder="Tên" />
        <p class="message"></p>
      </div>  
      <div class="form-group">
        <input type="text" class="form-input" name="email" placeholder="Email" />
        <p class="message"></p>
      </div>
      <div class="form-group">
        <input type="number" class="form-input" name="phone" placeholder="Số điện thoại" />
        <p class="message"></p>
      </div>
    </div>

    <!-- <div class="form-body">
      <h3>Bạn chắc chắn muốn xóa những hàng này?</h3>
      <p class="text-warning">Hành động này không thể khôi phục.</p>
    </div> -->

    <div class="form-footer">
      <button class="cancel-btn" type="button">Hủy bỏ</button>
      <button class="submit-btn add-btn" name="submit-btn">Thêm</button>
    </div>
  </form>
</div>
