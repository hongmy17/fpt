<?php

namespace App;

trait ComparableTrait {
  public function compareTo($other) {
    if (!property_exists($this, 'age') || !property_exists($other, 'age')) {
      throw new \Exception("Both objects must have an 'age' property.");
    }

    if ($this->getAge() < $other->getAge()) return -1;
    elseif ($this->getAge() > $other->getAge()) return 1;
    else return 0;
  }
}
