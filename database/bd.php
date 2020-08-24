<?php
ini_set('default_charset', 'utf-8');
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
    $options = array(
      PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    );
    try {
      $this->conn = new PDO("mysql:host=" . $this->servername . ";dbname=petfinder", $this->username, $this->password, $options);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo "ERRO - {$e->getMessage()})";
      $this->conn = null;
      exit;
    }
  }
  public function connectInFrontEnd()
  {
    include('./environment/environment.php');
    $this->servername = "localhost";
    $this->username = $user_database;
    $this->password = $senha_database;
    try {
      $this->conn = new PDO("mysql:host=" . $this->servername . ";dbname=petfinder", $this->username, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo " ERRO - {$e->getMessage()})";
      $this->conn = null;
      exit;
    }
  }
  public function disconnect()
  {
    exit;
  }
}
