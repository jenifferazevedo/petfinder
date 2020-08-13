<?php
include ('bd.php');
try{
$pet_name=$_POST['pet_name'];
$status=$_POST['status'];
$tipo=$_POST['tipo'];
$description=$_POST['description'];
$pet_id=UUID();
$sql = "INSERT INTO pet (pet_id, name, user_id, status, pet_type, description) VALUES ('$pet_id',$pet_name','$status','$tipo','$description')";
$conn->exec($sql);
echo "aluno inserido!<br>";
}catch(PDOException $e){
echo $sql . "<br>" . $e->getMessage();
}
echo "<a href=\"index.html\">Voltar à página inicial</a>";
$conn = null;
?>
