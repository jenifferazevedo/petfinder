<?php
include ('bd.php');
try{
$user_name=$_POST['user_name'];
$user_email=$_POST['email'];
$password=$_POST['password'];
$contact=$_POST['contact'];
$adress=$_POST['adress'];

 

$sql = "INSERT INTO users (name, email, password, contact, adress) VALUES ('$user_name','$user_email','$password','$contact','$adress')";
$conn->exec($sql);
echo "aluno inserido!<br>";
}catch(PDOException $e){
echo $sql . "<br>" . $e->getMessage();
}
echo "<a href=\"index.html\">Voltar à página inicial</a>";
$conn = null;
?>
