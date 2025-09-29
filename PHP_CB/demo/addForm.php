<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="handleAdd.php" method="post" enctype="multipart/form-data">
    <label for="id">ID:</label>
    <input type="text" id="id" name="id" required><br><br>

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="description">Description:</label>
    <textarea id="description" name="description" required></textarea><br><br>

    <label for="image">Image:</label>
    <input type="file" id="image" name="image" required><br><br>

    <label for="status">Status:</label>
    <select id="status" name="status">
      <option value="1">Active</option>
      <option value="0">Inactive</option>
    </select><br><br>

    <input type="submit" value="Add Person">
  </form>
</body>
</html>