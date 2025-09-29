<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Add to cart</h1>
  <form action="add_to_cart.php" method="post">
    <label for="product">Product:</label>
    <input type="text" id="product" name="product" required="required">
    <br>
    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" id="quantity" required="required">
    <br>
    <input type="submit" value="Add to cart">
  </form>
  <a href="view_cart.php">View cart</a>
</body>
</html>