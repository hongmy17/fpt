<?php

namespace App\Model;

use PDO;

class Database {
  private string $db_host;
  private string $db_name;
  private string $db_user;
  private string $db_pass;

  public function __construct($db_host, $db_name, $db_user, $db_pass) {
    $this->db_host = $db_host;
    $this->db_name = $db_name;
    $this->db_user = $db_user;
    $this->db_pass = $db_pass;
  }

  public function connect() {
    $pdo = new PDO("mysql:dbname={$this->db_name};host={$this->db_host}", $this->db_user, $this->db_pass);

    return $pdo;
  }
}