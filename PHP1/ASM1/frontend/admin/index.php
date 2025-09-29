<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/grid.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
      integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>

  <body>
    <!-- header -->
    <?php 
      include ('assets/includes/header.php');
    ?>
    <!-- end header -->

    <!-- content -->
    <iframe
      src="./assets/includes/dash-board.php"
      frameborder="0"
      scrolling="no"
      name="page"
      width="100%"
    >
    </iframe>
    <!-- end content -->

    <!-- modal -->
    <?php 
      include ('assets/includes/modal.php');
    ?>

    <script src="./assets/js/main.js"></script>
  </body>
</html>
