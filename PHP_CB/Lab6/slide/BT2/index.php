<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="process_order.php" method="POST">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required="required">
    <br>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required="required">
    <br>

    <label for="address">Address:</label>
    <input type="text" name="address" id="address" required="required">
    <br>

    <label for="product">Product:</label>
    <select name="product" id="product" required="required">
      <option value="laptop">Laptop</option>
      <option value="smartphone">Smartphone</option>
      <option value="tablet">Tablet</option>
    </select>
    <br>

    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" id="quantity" min="1" required="required">
    <br>

    <input type="submit" value="Submit">
  </form>
</body>
</html>