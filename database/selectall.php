<?php
include('bd.php');
$stmt = $conn->query("SELECT * FROM users");
while ($row = $stmt->fetch()) {
echo $row['nome_aluno']. " em ".$row['contacto']."<br>";
echo $row['morada']."<br />\n";
echo "<hr><br><br>";
}
