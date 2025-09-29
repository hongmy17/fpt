<?php

namespace App\Model;
use Exception;

class Category extends Model {
  protected $table = "categories";

  // tra ve ten bang: categories
  public function getTableName(): string {
    return $this->table;
  }

  public function validate(array $data): bool {
    // kiem tra name co rong ko
    $isEmptyName = empty(htmlspecialchars(trim($data["name"])));
    // kiem tra do dai cua ten co lon hon 255 ko
    $isLengthNameGreater255 = strlen(htmlspecialchars(trim($data["name"]))) > 255;
    // kiem tra name co rong ko
    $isEmptyPriority = empty(htmlspecialchars(trim($data["priority"])));
    // kiem tra price co phai so nguyen ko
    $isNumberInt = is_int((int)htmlspecialchars(trim($data["priority"])));
    // kiem tra priority co lon hon 0 ko
    $isGreaterThanZero = (int)htmlspecialchars(trim($data["priority"])) >= 0;

    if ($isLengthNameGreater255) {
      $_POST["nameError"] = "Do dai cua Name ko duoc lon hon 255";
    }
    
    if ($isEmptyName) {
      $_POST["nameError"] = "Name khong duoc de trong";
    }

    if (!$isGreaterThanZero) {
      $_POST["priorityError"] = "Priority phai lon hon hoac bang 0";
    }

    if (!$isNumberInt) {
      $_POST["priorityError"] = "Priority phai la so nguyen";
    }

    if ($isEmptyPriority) {
      $_POST["priorityError"] = "Priority khong duoc de trong";
    }
    
    if (
      !$isEmptyName && !$isEmptyPriority && $isNumberInt && $isGreaterThanZero
    ) {
      return true;
    } else {
      return false;
    }
  }

  public function store($data) {
    $sql = "INSERT INTO `$this->table` (`name`, `priority`) VALUE (?, ?)";
    $stmt = $this->connection->prepare($sql);
    
    try {
      $stmt->execute([$data['name'], $data['priority']]);
      return true;
    } catch (Exception $e) {
      throw new Exception("Khong the them category");
    }
  }

  public function update($id, $name, $priority) {
    $sql = "UPDATE `$this->table` SET `name` = ?, `priority` = ? WHERE id = ?";
    $stmt = $this->connection->prepare($sql);

    try {
      $stmt->execute([$name, $priority, $id]);
      return true;
    } catch (Exception $e) {
      throw new Exception("Khong the cap nhat");
    }
  }
}