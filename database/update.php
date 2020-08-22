<?php
session_start();

if (isset($_POST['id'], $_POST['user'])) {
  require('./User.php');

  $novoUser = new User();
  $novoUser->modifyUser($_POST['id']);
  if (isset($_SESSION['petfinder-admin']) && is_array($_SESSION['petfinder-admin'])) {
    echo "<script>alert('Cadastro modificado com sucesso');";
    header('Location: ../index.php?pg=TableUser');
  } else {
    echo "<script>alert('Cadastro modificado com sucesso');
    window.location.href = '../index.php?s=Perfil';
    </script>";
  }
  $novoUser->disconnect();
} else if (isset($_GET['CreatePet'])) {
  //pet;
} else {
  header('Location: ../index.php');
}
