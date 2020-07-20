<?php
$servername = "localhost"; $username = "joseusercomum";$password = "joseusercomum";
try {
$conn = new PDO("mysql:host=$servername;dbname=petfinder", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "User online!<br>";
}catch(PDOException $e)
{
echo "Ligação falhou: " . $e->getMessage();
}
?>