<?php
session_start();

if (isset($_POST['user'])) {
  require('./User.php');

  $novoUser = new User();
  $novoUser->create();
  if (isset($_SESSION['petfinder-admin']) && is_array($_SESSION['petfinder-admin'])) {
    header('Location: ../index.php?pg=TableUser');
  } else {
    echo "<script>alert('Cadastro realizado com sucesso');
    window.location.href = '../index.php?p=Login'; 
    </script>";
  }
  $novoUser->disconnect();
} else if (isset($_GET['CreatePet'])) {
  //pet;
} else {
  header('Location: ../index.php?p=Cadastro');
}
