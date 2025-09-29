<?php

namespace App\Interface;

interface Validate {
  public function validate(array $data): bool;
}