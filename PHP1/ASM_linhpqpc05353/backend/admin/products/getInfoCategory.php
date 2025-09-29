<?php 
  $id = $_POST['id'];

  include '../../config/config.php';
  $query = "SELECT `name`, `note` FROM categories WHERE `id` = $id";
  $result = mysqli_query($dbc, $query) or die('Error querying database.');
  
  $row = mysqli_fetch_array($result);
  $name = $row['name'];
  $note = $row['note'];
  $info_category = ['name' => $name, 'note' => $note];

  // Set the appropriate response headers to indicate JSON content
  header('Content-Type: application/json');

  // Encode the user information as JSON and echo it
  mysqli_close($dbc);
  echo json_encode($info_category);
?>