<?php
include('../environment/environment.php');
$servername = "localhost"; $username = $user_database;$password = $senha_database;
try {
  $conn = new PDO("mysql:host=$servername;dbname=petfinder", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e) {
  echo " ERRO - {$e->getMessage()})";
  $conn = null;
  exit;
}
?>