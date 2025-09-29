<?php 
  $pd_id = $_POST['pd_id'];

  $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
  $url = $protocol . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
  $parts = explode('/', $url);
  $base_url = $parts[0] . '//' . $parts[2] . '/' . $parts[3];

  include "../../config/config.php";
  $query_product_relate = "SELECT pd_id, pd_name, pd_img, pd_desc, pd_price 
    FROM products WHERE category_id = (
      SELECT category_id FROM products WHERE pd_id = '$pd_id'
    ) AND pd_id <> '$pd_id'";
  $result_product_relate = mysqli_query($dbc, $query_product_relate);
  $products = "";

  while ($product = mysqli_fetch_array($result_product_relate)) {
    $pd_id = $product['pd_id'];
    $pd_name = $product['pd_name'];
    $pd_img = $product['pd_img'];
    $pd_desc = $product['pd_desc'];
    $pd_price = number_format($product['pd_price'], 0, '', ',');

    $products .= "
      <section class='gallery__food product-relate' pd-id='$pd_id'>
        <img
          src='$base_url/backend/admin/products/$pd_img'
          class='gallery__food-img'
          style='object-fit: cover; width: 100%'
        />
        <section class='gallery__food-text'>
          <h1 class='gallery__food-title'>
            $pd_name
            </h1>
          <p class='gallery__food-desc ellipse'>
            $pd_desc
          </p>
          <span class='gallery__food-price'>$pd_price VND</span>
        </section>
      </section>";
  }

  
  // Set the appropriate response headers to indicate JSON content
  header('Content-Type: application/json');

  // Encode the user information as JSON and echo it
  mysqli_close($dbc);
  echo json_encode($products);
?>