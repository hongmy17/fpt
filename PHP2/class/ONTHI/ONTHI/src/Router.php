<?php

namespace App;

class Router {
  private array $routes = [
    // [
    //   "path" => "/product",
    //   "params" => ["controller" => HomeController::class, "action" => "index"],
    // ],
    // [
    //   "path" => "/user",
    //   "params" => ["controller" => HomeController::class, "action" => "index"],
    // ]
  ];

  public function add(string $path, array $params) {
    $this->routes[] = [
      "path" => $path,
      "params" => $params,
    ];
  }

  public function match(string $path) {
    foreach ($this->routes as $route) {
      if ($route["path"] === $path) {
        return $route["params"];
      }
    }

    return false;
  }
}