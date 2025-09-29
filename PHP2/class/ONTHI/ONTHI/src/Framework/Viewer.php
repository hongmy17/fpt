<?php

namespace App\Framework;

class Viewer {
  public function render(string $template, array $data = []) {
    ob_start();
    require_once "Views/$template";
    return ob_get_clean();
  }
}