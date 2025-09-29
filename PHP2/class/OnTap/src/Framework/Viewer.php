<?php

namespace App\Framework;

class Viewer {
  // hien thi giao dien
  public function render(string $template, array $data = []) {
    ob_start();
    extract($data);
    require_once "Views/$template";
    return ob_get_clean();
  }
}