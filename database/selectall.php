<?php /* ------------> parei aki!!!
include('bd.php');
$stmt = $conn->query("SELECT * FROM users");
while ($row = $stmt->fetch()) {
echo $row['pet_name']. " em ".$row['contacto']."<br>";
echo $row['morada']."<br />\n";
echo "<hr><br><br>";
}
include('bd.php');
*/
?>
<?php

include('bd.php');
/*If there are no variables going to be used in the query, we can use a conventional query() method instead of prepare and execute.

// select all users
$stmt = $pdo->query("SELECT * FROM users");
 the most prefered way to fetch multiple rows which would to be shown on a web-page is calling the 
 great helper method called fetchAll(). It will put all the rows returned by a query into a PHP array, that later can be used to output 
 the data using a template (which is considered much better than echoing the data right during the 
 fetch process). 
*/

//   https://phpdelusions.net/pdo_examples/select

try {

  $stmt = $conn->prepare("SELECT * FROM pet WHERE status= 'ativo';");
  $stmt->execute();
  $petArray = $stmt->fetchAll();

  
  
} catch(PDOException $e) {
  echo "Erro: " . $e->getMessage();
}
$conn = null;

?> 