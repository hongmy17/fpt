<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ $title }}</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f7f7f7;
      margin: 0;
      padding: 20px;
    }
    .container {
      max-width: 600px;
      background-color: #ffffff;
      margin: auto;
      padding: 30px;
      border-radius: 6px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      color: #333333;
    }
    h2 {
      color: #444444;
      border-bottom: 2px solid #333333;
      padding-bottom: 10px;
    }
    .field-label {
      font-weight: bold;
      margin-top: 15px;
    }
    .field-value {
      margin-top: 5px;
      padding: 10px;
      background-color: #f0f0f0;
      border-radius: 4px;
      word-wrap: break-word;
    }
    .footer {
      margin-top: 30px;
      font-size: 12px;
      color: #999999;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>{{ $title }}</h2>

    <div>
      <div class="field-label">Tên:</div>
      <div class="field-value">{{ $name }}</div>
    </div>

    <div>
      <div class="field-label">Số điện thoại:</div>
      <div class="field-value">{{ $phone }}</div>
    </div>

    <div>
      <div class="field-label">Lời nhắn:</div>
      <div class="field-value" style="white-space: pre-wrap;">{{ $description }}</div>
    </div>

    <div class="footer">
      Đây là email tự động gửi từ hệ thống liên hệ của bạn.
    </div>
  </div>
</body>
</html>
