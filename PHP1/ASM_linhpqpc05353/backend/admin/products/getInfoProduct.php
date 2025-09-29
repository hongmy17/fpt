<?php 
  $id = $_POST['id'];

  include '../../config/config.php';
  $query = "SELECT pd_img, pd_name, pd_price, pd_desc, category_id FROM products WHERE pd_id = $id";
  $result = mysqli_query($dbc, $query) or die('Error querying database.');
  
  $row = mysqli_fetch_array($result);
  $img = $row['pd_img'];
  $name = $row['pd_name'];
  $price = $row['pd_price'];
  $desc = $row['pd_desc'];
  $category_id = $row['category_id'];

  $info_product = [
    'img' => $img,
    'name' => $name,
    'price' => $price,
    'desc' => $desc,
    'category_id' => $category_id
  ];

  // Set the appropriate response headers to indicate JSON content
  header('Content-Type: application/json');

  // Encode the user information as JSON and echo it
  mysqli_close($dbc);
  echo json_encode($info_product);
?>