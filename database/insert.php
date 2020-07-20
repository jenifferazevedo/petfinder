<?php
include ('bd.php');
if(isset($_POST['user_name'],$_POST['email'],$_POST['password'],$_POST['contact'],$_POST['adress'],$_POST['user_cep'],$_POST['user_city']) && $conn != null) {
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
    echo "<script>alert('Cadastro realizado com sucesso');
    window.location.href = '../index.php?p=Login'; 
    </script>";
    }catch(PDOException $e){
    echo "<script>alert('Erro ao acessar ao cadastrar!' ERRO - {$e->getMessage()});
    window.location.href = '../index.php?p=Cadastro'; 
    </script>";
    }
}
else {
  echo "<script>window.location.href = '../index.php?p=Cadastro';</script>";
}

?>
