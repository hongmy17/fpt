<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Thông tin sinh viên</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f0f2f5;
      padding: 40px;
    }

    .student-card {
      max-width: 350px;
      margin: auto;
      background: #fff;
      border-radius: 12px;
      padding: 25px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      animation: fadeIn 0.5s ease-in-out;
    }

    .student-card h2 {
      text-align: center;
      color: #333;
      margin-bottom: 20px;
      font-size: 22px;
      border-bottom: 2px solid #4CAF50;
      padding-bottom: 8px;
    }

    .info {
      margin-bottom: 12px;
      font-size: 16px;
    }

    .label {
      font-weight: bold;
      color: #555;
      display: inline-block;
      width: 90px;
    }

    .value {
      color: #222;
    }

    .male {
      color: blue;
      font-weight: bold;
    }

    .female {
      color: deeppink;
      font-weight: bold;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <div class="student-card">
    <h2>Thông tin sinh viên</h2>

    <div class="info">
      <span class="label">ID:</span>
      <span class="value">{{ $id }}</span>
    </div>

    <div class="info">
      <span class="label">Tên:</span>
      <span class="value">{{ $name }}</span>
    </div>

    <div class="info">
      <span class="label">Giới tính:</span>
      <span class="value {{ strtolower($gender) == 'male' ? 'male' : 'female' }}">
        {{ $gender }}
      </span>
    </div>
  </div>
</body>
</html>
