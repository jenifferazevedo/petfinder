<?php
include ('bd.php');
if(isset($_POST['pet_name'],$_POST['status'],$_POST['tipo'],$_POST['description']) && $conn != null) {
  try{
   $pet_name=$_POST['pet_name'];
   $status_email=$_POST['status'];
   $tipo=$_POST['tipo'];
   $description=$_POST['description'];

   $sql = "INSERT INTO  (name, user_id, status, pet_type, description) VALUES (:pet_name, :status, :tipo, :description);";

   $stmt= $conn ->prepare ($sql);
    $stmt -> bindValue (':pet_name', $pet_name );
    $stmt -> bindValue (':status', $status);
    $stmt -> bindValue (':tipo', $tipo);
    $stmt -> bindValue (':description', $description );

  $stmt->execute();
      

   
    echo "<script>alert('Cadastro de pet realizado com sucesso');
    window.location.href = '../index.php?p=Login'; 
    </script>";
    }catch(PDOException $e){
    echo "<script>alert('Erro ao cadastrar!' ERRO - {$e->getMessage()});
    window.location.href = '../index.php?p=Cadastro'; 
    </script>";
    }
}
else {
  echo "<script>window.location.href = '../index.php?p=Cadastro';</script>";
}
include ('bdoff.php');
?>
