<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Danh sách sản phẩm</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #fafafa;
      padding: 20px;
    }

    h2 {
      text-align: center;
      color: #444;
      margin-bottom: 20px;
    }

    table {
      width: 80%;
      margin: auto;
      border-collapse: collapse;
      background: #fff;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    thead {
      background: #4CAF50;
      color: white;
    }

    th, td {
      padding: 12px 15px;
      border-bottom: 1px solid #ddd;
      text-align: left;
    }

    tr:hover {
      background: #f1f1f1;
    }

    .price {
      color: #e91e63;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <h2>Danh sách sản phẩm</h2>
  <table>
    <thead>
      <tr>
        <th>Tiêu đề</th>
        <th>Giá</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($products as $product)
        <tr>
          <td>
            <a href="/detail-product/{{ $product->id }}">{{ $product->title }}</a>
          </td>
          <td class="price">{{ number_format($product->price, 0, ',', '.') }} đ</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>
