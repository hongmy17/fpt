<div class="announce">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    :root {
      --primary-color: #ffa400;
    }

    .announce {
      position: fixed;
      inset: 0;
      z-index: 10;
      background-color: rgba(0, 0, 0, 0.3);
      transition: all 0.3s linear;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .announce .content {
      background-color: var(--primary-color);
      width: 400px;
      text-align: center;
      padding: 30px;
    }

    .announce .content .icon {
      margin-bottom: 20px;
      font-size: 60px;
    }

    .announce .content .icon.success {
      color: #00A300;
    }

    .announce .content .icon.fail {
      color: #f00;
    }

    .back-btn {
      padding: 10px 20px;
      outline: none;
      border: none;
      cursor: pointer;
      margin-top: 15px;
      transition: all 0.2s linear;
      background-color: var(--primary-color);
      font-weight: 500;
    }

    .back-btn:hover {
      background-color: #e69400;
    }

  </style>
  <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
      integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

  <div class="content add-success">
    <i class="fa-solid fa-circle-check icon success"></i>
    <!-- <i class="fa-solid fa-circle-xmark icon"></i> -->
    <br>
    <h3 class="announce-text">Thêm khách hàng thành công</h3>
  </div>
  <button class="back-btn">Trở lại</button>
</div>