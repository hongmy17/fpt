<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/about.css" />
    <style>
      
    </style>
  </head>
  <body>
    <!-- header -->
    <?php 
      include ('../assets/includes/header.php');
    ?>
    <!-- end header -->

    <main id="content">
      <!-- about -->
      <article class="grid wide about">
        <section class="row container">
          <section class="col l-6 m-12 c-12 about-text">
            <h1 class="about-text__title">PIZZA SHOP</h1>
            <h3 class="about-text__subtitle">ANOTHER BAKER</h3>
            <input type="checkbox" hidden id="about-text__more-checkbox" />
            <label for="about-text__more-checkbox" class="about-text__more">
              Xem them
            </label>

            <p class="about-text__desc hide-on-mobile-tablet">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Id ipsam,
              harum dolorum aliquam reiciendis odit expedita tenetur eos soluta
              culpa eaque cupiditate ducimus dicta molestias, autem unde optio?
              Ex, vitae?
            </p>

            <p class="about-text__desc hide-on-mobile-tablet">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Error
              officia id, rem soluta rerum ut alias nam cupiditate doloremque,
              animi nemo velit maxime, doloribus similique pariatur natus ipsa
              nihil fuga!
            </p>

            <p class="about-text__desc hide-on-mobile-tablet">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas
              reprehenderit nostrum fugit nihil explicabo eaque eveniet aliquam
              soluta, incidunt sed pariatur voluptatem dolorem at illum,
              corrupti repellendus rerum impedit vitae?
            </p>
          </section>

          <section class="col l-6 m-12 c-12 about-video">
            <i class="fa-solid fa-play play-btn video-control-btn active"></i>
            <i class="fa-solid fa-pause pause-btn video-control-btn"></i>
            <video src="../assets/video/about.mp4" loop></video>
          </section>
        </section>
      </article>
      <!-- end about -->

      <!-- Gallery -->
      <article class="grid wide gallery">
        <h1 class="gallery__title">GALLERY</h1>
        <section class="row">
          <?php
            $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
            $url = $protocol . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
            $parts = explode('/', $url);
            $base_url = $parts[0] . '//' . $parts[2] . '/' . $parts[3];
            $base_path = $_SERVER['DOCUMENT_ROOT'] . '/' . $parts[3];

            include $base_path . "/backend/config/config.php";
            $query = "SELECT p.pd_id, p.pd_img, p.pd_name, p.pd_desc, p.pd_price, 
              c.name FROM products p JOIN categories c ON c.id = p.category_id";
            $result = mysqli_query($dbc, $query) or die('Error querying database');

            $us_id = $_GET['id'] ?? ' ';
            $query_pd_id = "SELECT pd_id FROM order_detail WHERE order_id = (
              SELECT order_id FROM orders WHERE us_id = '$us_id'
            ) ORDER BY pd_id";
            $result_pd_id = mysqli_query($dbc, $query_pd_id);
            $order_pd_id = mysqli_fetch_array($result_pd_id)['pd_id'] ?? ' ';

            while ($row = mysqli_fetch_array($result)) {
              $id = $row['pd_id'];
              $img = $base_url . "/backend/admin/products/" . $row['pd_img'];
              $name = $row['pd_name'];
              $desc = $row['pd_desc'];
              $price = number_format($row['pd_price'], 0, '', ',');
              $category_name = $row['name'];

              $active = '';
              if ($order_pd_id == $id) {
                $active = 'active';
                $order_pd_id = mysqli_fetch_array($result_pd_id)['pd_id'] ?? ' ';
              }

              echo "
                <section class='col l-4 m-4 c-12 gallery__food' pd-id='$id'>
                  <img
                    src='$img'
                    class='gallery__food-img'
                  />
                  <ul class='img-toolbar'>
                    <i
                      class='fa-solid fa-cart-shopping cart-icon img-toolbar-icon $active'
                      pd-id='$id'
                    ></i>
                  </ul>
                  <section class='gallery__food-text'>
                    <h1 class='gallery__food-title'>
                      $name
                    </h1>
                    <p style='font-size: 18px'>
                      <strong style='font-size: 20px'>Thể loại: </strong>
                      <span class='gallery__food-type'>$category_name</span>
                    </p>
                    <p class='gallery__food-desc ellipse'>
                      $desc
                    </p>
                    <span class='gallery__food-price'>$price VND</span>
                  </section>
                </section>";
            }
            mysqli_close($dbc);
          ?>
        </section>
      </article>
      <!-- end gallery -->
    </main>

    <!-- footer -->
    <?php 
      include ('../assets/includes/footer.php');
    ?>
    <!-- end footer -->

    <script src="../assets/js/about.js"></script>
  </body>
</html>
