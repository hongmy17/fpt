<?php

namespace App;

class Router {
  private array $routes = [];

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