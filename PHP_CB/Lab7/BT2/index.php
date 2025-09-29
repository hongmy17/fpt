<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Login</h1>
  <form action="login.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required="required">
    <br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required="required">
    <br>
    <input type="checkbox" name="remember" id="remember" <?=isset($_COOKIE["username"]) ? "checked" : "";?>>
    <label for="remember">Remember me</label>
    <br>
    <input type="submit" value="Login">
  </form>
</body>
</html>