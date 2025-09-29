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
      session_start();
      include ('includes/nav.php');
    ?>
    <!-- end navbar -->

    <div class="container" style="margin-top: 100px; padding: 0 25%;">
      <!-- login form -->
      <form class="row g-3 needs-validation was-validated" action="index.php">
        <div class="col-md-12">
          <label for="validationCustomUsername" class="form-label">Username</label>
          <div class="input-group has-validation">
            <span class="input-group-text" id="inputGroupPrepend">@</span>
            <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
            <div class="invalid-feedback">
              Please choose a username.
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <label for="validationCustomUsername" class="form-label">Password</label>
          <div class="input-group has-validation">
            <span class="input-group-text" id="inputGroupPrepend">@</span>
            <input type="password" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
            <div class="invalid-feedback">
              Please type password.
            </div>
          </div>
        </div>
        <div class="col-12">
          <div>
            <input type="checkbox" value="" id="invalidCheck">
            <label for="invalidCheck">
              Remember me
            </label>
          </div>
        </div>
        <div class="col-12">
          <button class="btn btn-primary">Submit form</button>
        </div>
      </form>
      <!-- end login form -->
    </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>