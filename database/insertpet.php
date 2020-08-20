<?php
include ('bd.php');
session_start();
if(isset($_POST['pet_name'], $_POST['pet_image'], $_POST['pet_type'], $_POST['description']) && $conn != null && isset($_SESSION['petfinder-user']) || isset($_SESSION['petfinder-admin'])) {
  try{
   $pet_name=$_POST['pet_name'];
   $pet_image=$_POST['pet_image'];
   $pet_type=$_POST['pet_type'];
   $description=$_POST['description'];

   $sql = "INSERT INTO pet (pet_name, pet_image, user_id, pet_type, description) VALUES (:pet_name, :pet_image, :user_id, :pet_type, :description);";

   $stmt= $conn ->prepare ($sql);
    $stmt -> bindValue (':pet_name', $pet_name );
    $stmt -> bindValue (':pet_image', $pet_image );
    $stmt -> bindValue (':user_id', $_SESSION['petfinder-user']['id']);
    $stmt -> bindValue (':pet_type', $pet_type );
    $stmt -> bindValue (':description', $description );

  $stmt->execute();   
    echo "<script>alert('Cadastro de pet realizado com sucesso');
    window.location.href = '../index.php?s=Home'; 
    </script>";
    }catch(PDOException $e){
    echo "<script>alert('Erro ao cadastrar!' ERRO - {$e->getMessage()});
    window.location.href = '../index.php?s=CadastroPet'; 
    </script>";
    }
}
else {
  echo "<script>alert('Erro na conexão, tente novamente mais tarde!)
  window.location.href = '../index.php?s=CadastroPet'</script>";
}
include ('bdoff.php');
?>
