<?php 
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <a href="addForm.php">Add data</a>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Image</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach($_SESSION["persons"] as $person): ?>
        <tr>
          <td><?= $person["id"]; ?></td>
          <td><?= $person["name"]; ?></td>
          <td><?= $person["description"]; ?></td>
          <td>
            <img src="<?= $person["image"]; ?>" alt="Image" width="50">
          </td>
          <td><?= $person["status"] == 1 ? "Active" : "Inactive"; ?></td>
          <td>
            <a href="editForm.php?id=<?= $person["id"]; ?>">Sua</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>
</html>