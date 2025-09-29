<?php

namespace App\Model;

use App\Interface\Validate;
use Exception;

class Product extends Model {
  protected $table = "products";

  public function getTableName() {
    return $this->table;
  }

  public function validate(array $data): bool {
    $isEmptyName = empty(htmlspecialchars(trim($data["name"])));
    $isLengthNameGreater255 = strlen(htmlspecialchars(trim($data["name"]))) > 255;
    $isEmptyPrice = empty(htmlspecialchars(trim($data["price"])));
    $isNumber = is_numeric(htmlspecialchars(trim($data["price"])));
    $isGreaterZero = (float)htmlspecialchars(trim($data["price"])) > 0;

    // $_POST= [
    //   "nameError" => "Do dai cua name khong duoc vuot qua 255 ky tu"
    // ];
    
    if ($isLengthNameGreater255) {
      $_POST["nameError"] = "Do dai cua name khong duoc vuot qua 255 ky tu";
    }

    if ($isEmptyName) {
      $_POST["nameError"] = "Name khong duoc de trong";
    }

    if (!$isGreaterZero) {
      $_POST["priceError"] = "Price phai lon hon 0";
    }

    if (!$isNumber) {
      $_POST["priceError"] = "Price phai la so";
    }
 
    if ($isEmptyPrice) {
      $_POST["priceError"] = "Price khong duoc de trong";
    }

    if (
      !$isEmptyName &&
      !$isLengthNameGreater255 &&
      !$isEmptyPrice &&
      $isNumber &&
      $isGreaterZero
    ) {
      return true;
    } else {
      return false;
    }
  }

  public function store($data) {
    $sql = "INSERT INTO `$this->table` (`name`, `price`) VALUE (?, ?)";
    $stmt = $this->connection->prepare($sql);
    
    try {
      $stmt->execute([$data['name'], $data['price']]);
      return true;
    } catch (Exception $e) {
      throw new Exception("Khong the them");
    }
  }

  public function update($id, $name, $price) {
    $sql = "UPDATE `$this->table` SET `name` = ?, `price` = ? WHERE id = ?";
    $stmt = $this->connection->prepare($sql);

    try {
      $stmt->execute([$name, $price, $id]);
      return true;
    } catch (Exception $e) {
      throw new Exception("Khong the cap nhat");
    }
  }

  public function delete($id) {
    $sql = "DELETE FROM `$this->table` WHERE id = ?";
    $stmt = $this->connection->prepare($sql);

    if ($stmt->execute([$id])) {
      return true;
    }

    return false;
  }
}