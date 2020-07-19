<?php
//conexão de adm
$servername = "localhost"; $username = "jeniffersudo";$password = "jeniffersudo";
try {
$conn = new PDO("mysql:host=$servername;dbname=petfinder", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "bem-vindo, ADM<br>";
}catch(PDOException $e)
{
echo "Ligação falhou: " . $e->getMessage();
}
?>