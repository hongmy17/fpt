<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Chi tiết sản phẩm - {{ $product->title }}</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f0f2f5;
      padding: 40px;
    }

    .product-detail {
      max-width: 600px;
      margin: auto;
      background: linear-gradient(135deg, #ffffff, #f9f9f9);
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      animation: fadeIn 0.5s ease-in-out;
    }

    .product-detail h1 {
      color: #333;
      margin-bottom: 15px;
      font-size: 28px;
      border-bottom: 2px solid #4CAF50;
      padding-bottom: 5px;
    }

    .info {
      margin: 10px 0;
      font-size: 16px;
      line-height: 1.6;
    }

    .label {
      font-weight: bold;
      color: #555;
      display: inline-block;
      width: 100px;
    }

    .slug {
      color: #4CAF50;
      font-style: italic;
    }

    .description {
      background: #f7f7f7;
      padding: 12px;
      border-radius: 6px;
      color: #444;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <div class="product-detail">
    <h1>{{ $product->title }}</h1>

    <div class="info">
      <span class="label">Slug:</span>
      <span class="slug">{{ $product->slug }}</span>
    </div>

    <div class="info">
      <span class="label">Mô tả:</span>
      <div class="description">{{ $product->description ?? 'Chưa có mô tả' }}</div>
    </div>
  </div>
</body>
</html>
