<?php

namespace App\Model;

class Model {
  protected string $table;

  public function __construct() {}

  public function getTable() {
    return $this->table;
  }
}