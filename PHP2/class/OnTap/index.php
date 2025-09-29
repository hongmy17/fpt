<?php

use App\Router;
use App\Controller\HomeController;

require_once "vendor/autoload.php";


$router = new Router();
$router->add("/category", ["controller" => HomeController::class, "action" => "index"]);
$router->add("/user", ["controller" => HomeController::class, "action" => "showUser"]);
$router->add("/category/add", ["controller" => HomeController::class, "action" => "categoryAdd"]);
$router->add("/category/store", ["controller" => HomeController::class, "action" => "xulyCategoryAdd"]);
$router->add("/category/edit", ["controller" => HomeController::class, "action" => "editCategory"]);
$router->add("/category/update", ["controller" => HomeController::class, "action" => "xulyEditCategory"]);

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