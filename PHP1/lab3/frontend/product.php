<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/product.css"/>
    <link rel="stylesheet" href="./assets/css/grid.css"/>
    <!-- font awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
      integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>
    <article class="grid wide gallery">
      <section class="row">
        <?php
          $dbc = mysqli_connect('localhost', 'root', 'password', 'pc05353')
            or die('Error connecting to mysql.');
          $query = "SELECT * FROM product LIMIT 3";
          $result = mysqli_query($dbc, $query) or die('Error querying database');
          $count = 1;

          while ($row = mysqli_fetch_array($result)) {
            $name = $row['pd_name'];
            $desc = $row['pd_desc'];
            $price = $row['pd_price'];

            echo "
              <section class=\"col l-4 m-4 c-12 gallery__food\">
                <img
                  src=\"./assets/images/gallery-img$count.jpg\"
                  alt=\"\"
                  class=\"gallery__food-img\"
                />";
            include ('./assets/includes/img-toolbar.php');
            echo "
                <section class=\"gallery__food-text\">
                  <h1 class=\"gallery__food-title\">
                    $name
                    <span class=\"gallery__food-price\">$$price</span>
                  </h1>
                  <p class=\"gallery__food-desc\">
                    $desc
                  </p>
                </section>
              </section>";
            $count++;
          }

          $query = "SELECT * FROM product ORDER BY pd_id LIMIT 2";
          $result = mysqli_query($dbc, $query) or die('Error querying database');

          while ($row = mysqli_fetch_array($result)) {
            $name = $row['pd_name'];
            $desc = $row['pd_desc'];
            $price = $row['pd_price'];

            echo "
              <section class=\"col l-6 m-6 c-12 gallery__food\">
                <img
                  src=\"./assets/images/gallery-img$count.jpg\"
                  alt=\"\"
                  class=\"gallery__food-img\"
                />";
            include ('./assets/includes/img-toolbar.php');
            echo "
                <section class=\"gallery__food-text\">
                  <h1 class=\"gallery__food-title\">
                    $name
                    <span class=\"gallery__food-price\">$$price</span>
                  </h1>
                  <p class=\"gallery__food-desc\">
                    $desc
                  </p>
                </section>
              </section>";
            $count++;
          }

          mysqli_Close($dbc);
        ?>
      </section>
    </article>

    <script src="./assets/js/product.js"></script>
  </body>
</html>