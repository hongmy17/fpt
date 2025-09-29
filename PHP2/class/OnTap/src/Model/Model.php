<?php

namespace App\Model;
use App\Interface\Validate;
use PDO;

abstract class Model implements Validate {
  // ten cua bang
  protected $table;
  protected $connection;
  private Database $database;

  public function __construct() {
    // khoi tao class Database va gan no vao thuoc tinh database
    $this->database = new Database("localhost", "php2", "root", "mysql");
    // goi ham connect trong class Database va gan gia tri tra ve vao thuoc tinh connection
    $this->connection = $this->database->connect();
  }

  public function findAll() {
    $sql = "SELECT * FROM {$this->table}";
    $rows = $this->connection->query($sql);
    return $rows->fetchAll(PDO::FETCH_ASSOC);
  }

  public function find($id) {
    $sql = "SELECT * FROM {$this->table} WHERE id = ?";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}