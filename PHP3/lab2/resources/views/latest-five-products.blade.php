<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>5 Sản phẩm mới nhất</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f0f2f5;
      padding: 30px;
    }

    h2 {
      text-align: center;
      color: #333;
      margin-bottom: 25px;
      font-size: 26px;
    }

    .product-list {
      max-width: 700px;
      margin: auto;
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    .product-card {
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      cursor: pointer;
    }

    .product-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    .product-title {
      font-size: 18px;
      color: #4CAF50;
      margin-bottom: 8px;
      font-weight: bold;
    }

    .product-description {
      color: #555;
      font-size: 15px;
      line-height: 1.5;
    }
  </style>
</head>
<body>
  <h2>5 Sản phẩm mới nhất</h2>

  <div class="product-list">
    @foreach ($products as $product)
      <div class="product-card" onclick="window.location='/detail-product/{{ $product->id }}'">
        <div class="product-title">{{ $product->title }}</div>
        <div class="product-description">
          {{ \Illuminate\Support\Str::limit($product->description, 100, '...') }}
        </div>
      </div>
    @endforeach
  </div>
</body>
</html>
