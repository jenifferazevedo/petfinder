<?php
class Conn
{
  public $conn;
  public $servername;
  public $username;
  public $password;
  public function connect()
  {
    require('../environment/environment.php');
    $this->servername = "localhost";
    $this->username = $user_database;
    $this->password = $senha_database;
    try {
      $this->conn = new PDO("mysql:host=" . $this->servername . ";dbname=petfinder", $this->username, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo "ERRO - {$e->getMessage()})";
      $this->conn = null;
      exit();
    }
  }
  public function connectInFrontEnd()
  {
    include('./environment/environment.php');
    $this->servername = "localhost";
    $this->username = $user_database;
    $this->password = $senha_database;
    try {
      $this->conn = new PDO("mysql:host=$servername;dbname=petfinder", $username, $password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo " ERRO - {$e->getMessage()})";
      $this->conn = null;
      exit;
    }
  }
  public function disconnect()
  {
    exit();
  }
}
