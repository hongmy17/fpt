<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  .header ~ .announce {
    position: fixed;
    top: 10px;
    right: 10px;
    width: 250px;
    height: 80px;
    background: #ffa400;
    display: flex;
    align-items: center;
    font-size: 20px;
    justify-content: space-evenly;
    border-left: 8px solid #f00;
    transition: all 0.4s linear;
    transform: translateX(150%);
    z-index: 100;
    box-shadow: 0 0 5px 1px #666;
  }

  .header ~ .announce-no-quantity {
    border-color: #ffcc00;
  }

  .header ~ .announce .icon {
    font-size: 50px;
  }

  .header ~ .announce .close-btn {
    cursor: pointer;
    position: absolute;
    top: 5px;
    right: 5px;
  }

  .header ~ .overlay {
    position: fixed;
    inset: 0;
    top: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 100;
    cursor: pointer;
    overflow: hidden;
    transition: all 0.4s linear;
  }

  .header ~ .overlay .wrapper,
  .header ~ .overlay .success {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: #ffa400;
    transition: all 0.4s linear;
    width: 400px;
    height: 150px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    border-radius: 5px;
  }

  .header ~ .overlay .wrapper .address,
  .header ~ .overlay .wrapper .confirm-btn {
    outline: none;
    border: none;
    border-radius: 5px;
  }

  .header ~ .overlay .wrapper .address {
    width: 300px;
    padding: 10px 20px;
  }

  .header ~ .overlay .wrapper .confirm-btn {
    padding: 10px 20px;
    margin-top: 10px;
    margin-left: auto;
    cursor: pointer;
  }

  .header ~ .overlay .success .success-icon,
  .header ~ .overlay .wrapper .smile-icon,
  .header ~ .overlay .wrapper .like-icon {
    cursor: default;
    font-size: 60px;
  }

  .header ~ .announce-success-buy .see-bill-btn {
    padding: 10px 15px;
    background-color: #ffa400;
    outline: none;
    border: none;
    cursor: pointer;
    position: absolute;
    left: 50%;
    top: calc(50% + 110px);
    transform: translate(-50%, -50%);
  }

  .header ~ .bill {
    display: grid;
    place-items: center;
  }

  .header ~ .bill .bill-container {
    padding: 10px;
    background-color: #fff;
    outline: none;
    border: 1px solid #333;
    border-radius: 10px;
    width: 500px;
  }

  .text-center {
    text-align: center;
  }

  .header ~ .product-detail .product-container {
    width: 60%;
    background-color: #fefefe;
    margin: 0 auto;
    padding: 20px;
  }

  .header ~ .product-detail .product-detail-title {
    text-align: center;
    font-size: 32px;
  }

  .header ~ .product-detail .product-detail-content {
    display: grid;
    grid-template-columns: 40% 60%;
    margin-top: 20px;
  }

  .header ~ .product-detail .product-detail-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .header ~ .product-detail .product-detail-info {
    margin-left: 20px;
    font-size: 20px;
  }

  .header ~ .product-detail .add-to-cart-btn,
  .header ~ .product-detail .delete-from-cart-btn {
    outline: none;
    border: none;
    background-color: #ffa400;
    padding: 10px 15px;
    cursor: pointer;
    font-weight: 600;
  }

  .header ~ .bill .close-btn,
  .header ~ .product-detail .close-btn {
    font-size: 36px;
    margin-left: 100%;
    transform: translateX(-100%);
    cursor: pointer;
  }

  @media (min-width: 740px) and (max-width: 1023px) {
    .header ~ .product-detail .product-container {
      width: 80%;
    }
  }

  @media (max-width: 739px) {
    .header ~ .bill .bill-container {
      width: 100%;
    }

    .header ~ .product-detail .product-container {
      width: 100%;
    }

    .header ~ .product-detail .product-detail-content {
      grid-template-columns: 100%;
    }

    .header ~ .product-detail .product-detail-info {
      margin-left: 0;
      margin-top: 20px;
    }
  }
</style>

<section class="announce announce-no-item">
  <i class="fa-solid fa-circle-xmark icon"></i>
  <span class="text">Giỏ hàng trống</span>
  <i class="fa-solid fa-xmark close-btn"></i>
</section>

<section class="announce announce-no-quantity">
  <i class="fa-solid fa-circle-exclamation icon"></i>
  <span class="text">Mời chọn số lượng</span>
  <i class="fa-solid fa-xmark close-btn"></i>
</section>

<section class="overlay announce-address">
  <section class="wrapper">
    <input type="text" class="address" placeholder="Mời nhập địa chỉ" />
    <button class="confirm-btn">Xác nhận</button>
  </section>
</section>

<section class="overlay announce-success-buy">
  <section class="success" style="font-size: 20px">
    <i class="fa-solid fa-circle-check success-icon"></i>
    Bạn đã đặt hàng thành công
  </section>
  <button class="see-bill-btn">Xem hóa đơn</button>
</section>

<section class="overlay bill">
  <div class="bill-container">
    <div class="bill-header">
      <i class="fa-solid fa-xmark close-btn"></i>
      <h2 class="text-center">PIZZA</h2>
      <hr style="height: 2px; background-color: #000" />
      <h2 class="text-center">HÓA ĐƠN THANH TOÁN</h2>
      <p>Mã số: <span>1</span></p>
      <p>Ngày đặt hàng: <span>Hôm nay</span></p>
      <p>Tên khách hàng: <span>Nguyen Van A</span></p>
      <hr style="height: 2px; background-color: #000" />
    </div>

    <table class="bill-body" style="width: 100%">
      <thead>
        <tr>
          <td style="width: 50%">Sản phẩm</td>
          <td>SL</td>
          <td>Giá bán</td>
          <td>Thành tiền</td>
        </tr>
      </thead>
      <tbody>
        <!--  -->
        <tr>
          <td>Product1</td>
          <td>1</td>
          <td>120000</td>
          <td>120000</td>
        </tr>
        <!--  -->
      </tbody>
    </table>
    <hr style="height: 2px; background-color: #000" />
    <p><strong>Tổng tiền:</strong> <span>120000</span></p>
  </div>
</section>

<section class="overlay product-detail">
  <div class="product-container">
    <i class="fa-solid fa-xmark close-btn"></i>
    <h1 class="product-detail-title">Pizza Bò Úc Steakhouse</h1>
    <hr style="height: 2px; background-color: #000" />

    <div class="product-detail-content">
      <img src="" alt="" class="product-detail-img" />
      <div class="product-detail-info">
        <div class="product-detail-price">
          <strong>Giá:</strong>
          <span style="font-size: 24px; font-weight: 600">
            120,000 VND
          </span>
        </div>

        <div class="product-detail-desc" style="text-align: justify">
          <strong> Mô tả: </strong>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius
          maxime architecto dolorem inventore aliquid aperiam sed illum ut
          consequuntur voluptates facere et cupiditate atque unde voluptate
          voluptatem ad, praesentium non.
        </div>
        <button class="add-to-cart-btn">Thêm vào giỏ hàng</button>
        <!-- <button class="delete-from-cart-btn">Xóa khỏi giỏ hàng</button> -->
      </div>
    </div>
  </div>
</section>

<section class="overlay announce-success-contact">
  <section class="wrapper">
    <i class="fa-regular fa-face-smile smile-icon"></i>
    <p style="font-size: 20px">Cảm ơn bạn đã liên lạc</p>
  </section>
</section>

<section class="overlay announce-success-feedback">
  <section class="wrapper">
    <i class="fa-solid fa-thumbs-up like-icon"></i>
    <p>Cảm ơn bạn đã góp ý</p>
  </section>
</section>

<section class="announce announce-no-feedback">
  <i class="fa-solid fa-circle-exclamation icon"></i>
  <span class="text">Mời chọn đánh giá</span>
  <i class="fa-solid fa-xmark close-btn"></i>
</section>