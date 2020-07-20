<?php
include ('bd.php');
try{
$user_name=$_POST['user_name'];
$user_email=$_POST['email'];
$password=$_POST['password'];
$contact=$_POST['contact'];
$adress=$_POST['adress'];
$user_cep=$_POST['user_cep'];
$user_city=$_POST['user_city'];

$sql = "INSERT INTO users (name, email, password, contact, adress, post_code, City) VALUES ('$user_name','$user_email','$password','$contact','$adress','$user_cep','$user_city')";
$conn->exec($sql);
echo "aluno inserido!<br>";
}catch(PDOException $e){
echo "<script>alert('Erro ao acessar ao conectar com a base de dados!' ERRO - {$e->getMessage()});
window.location.href = '../index.php?p=Cadastro'; 
</script>";
}
echo "<a href=\"index.html\">Voltar à página inicial</a>";
$conn = null;
?>
