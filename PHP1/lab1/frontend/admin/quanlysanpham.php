<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>

  <body>
    <!-- navbar -->
    <?php 
      include ('includes/nav.php');
    ?>
    <!-- end navbar -->

    <div class="container" style="margin-top: 100px;">
      <!-- table -->
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Ten</th>
            <th scope="col">Gia</th>
            <th scope="col">Mo ta</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Curabitur</td>
            <td>$100</td>
            <td>Cras in ante mattis, elementum nunc</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Lorem ipsum</td>
            <td>$70</td>
            <td>In ullamcorper gravida enim id pulvinar</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Pellentesque</td>
            <td>$80</td>
            <td>Maecenas efficitur nisi id sapien</td>
          </tr>
        </tbody>
      </table>
      <!-- end table -->
    </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>