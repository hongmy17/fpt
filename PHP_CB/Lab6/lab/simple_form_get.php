<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <h1>Simple form - Get method</h1>
    <form action="handle_form_get.php" method="get">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required="required" />
      <br />
      <label for="email">Email:</label>
      <input type="email" name="email" id="email" required="required" />
      <br />
      <input type="submit" value="Submit" />
    </form>
  </body>
</html>
