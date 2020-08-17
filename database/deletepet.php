<?php
include ('bd.php');
try{
$nome_aluno=$_POST['nome_aluno'];
$contacto=$_POST['contacto'];
$morada=$_POST['morada'];
$sql = "INSERT INTO alunos ( nome_aluno, contacto, morada) VALUES ('$nome_aluno','$contacto','$morada')";
$conn->exec($sql);
echo "aluno inserido!<br>";
}catch(PDOException $e){
echo $sql . "<br>" . $e->getMessage();
}
echo "<a href=\"lista.php\">Voltar à lista de alunos</a>";
include ('bdoff.php');
?>
