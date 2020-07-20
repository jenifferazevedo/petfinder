<?php
include('bd.php');
$stmt = $conn->query("SELECT * FROM pet");
while ($row = $stmt->fetch()) {
echo $row['name']. " é ".$row['pet_type']."<br>";
echo $row['status']."<br />\n";
echo "<hr><br><br>";
}
