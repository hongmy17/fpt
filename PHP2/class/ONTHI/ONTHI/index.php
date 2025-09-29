<?php

use App\Router;
use App\Controller\HomeController;

require_once "vendor/autoload.php";

// function divide($divided, $divisor) {
//   if ($divisor == 0) {
//     throw new Exception("Khong the chia cho 0");
//   }

//   return $divided / $divisor;
// }

// try {
//   echo divide(10, 0);
// } catch (Exception $e) {
//   echo $e->getMessage();
// }

// echo "Chay toi day";

$router = new Router();
$router->add("/product", ["controller" => HomeController::class, "action" => "index"]);
$router->add("/user", ["controller" => HomeController::class, "action" => "showUser"]);
$router->add("/product/add", ["controller" => HomeController::class, "action" => "productAdd"]);
$router->add("/product/store", ["controller" => HomeController::class, "action" => "xulyProductAdd"]);
$router->add("/product/edit", ["controller" => HomeController::class, "action" => "editProduct"]);
$router->add("/product/update", ["controller" => HomeController::class, "action" => "xulyEditProduct"]);
$router->add("/product/delete", ["controller" => HomeController::class, "action" => "deleteProduct"]);

$uri = $_SERVER["REQUEST_URI"];
$path = parse_url($uri, PHP_URL_PATH);
$query = parse_url($uri, PHP_URL_QUERY);

if ($query) {
  parse_str($query, $_GET);
}

$params = $router->match($path);

if ($params == false) {
  exit("Trang khong ton tai");
}

$controller = $params["controller"];
$action = $params["action"];

$classController = new $controller();
$classController->$action();