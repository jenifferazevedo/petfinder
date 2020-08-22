<?php
session_start();
$classepg;
isset($_POST['user']) ? $classepg = require('./User.php') : $classepg = require('./Pet.class.php');
if (isset($_POST['user'])) {
  $novoUser = new User();
  $novoUser->connect();
  $novoUser->create();
  if (isset($_SESSION['petfinder-admin']) && is_array($_SESSION['petfinder-admin'])) {
    header('Location: ../index.php?pg=TableUser');
  } else {
    echo "<script>alert('Cadastro realizado com sucesso');
    window.location.href = '../index.php?p=Login'; 
    </script>";
  }
  $novoUser->disconnect();
} else if (isset($_POST['pet'])) {
  $newPet = new Pet();
  $newPet->connect();
  if (isset($_SESSION['petfinder-admin']) || isset($_SESSION['petfinder-user'])) {
    $id = isset($_SESSION['petfinder-admin']) ? $_SESSION['petfinder-admin']['id'] : $_SESSION['petfinder-user']['id'];
    try {
      $newPet->create($id);
      if (isset($_SESSION['petfinder-admin'])) header('Location: ../index.php?pg=TablePet');
      else {
        echo "<script>alert('Cadastro realizado com sucesso');
      window.location.href = '../index.php?s=MeusPets'; 
      </script>";
      }
    } catch (PDOException $e) {
      echo $e;
    }
    $newPet->disconnect();
  } else {
    header('Location: ../index.php');
  }
} else {
  header('Location: ../index.php?p=Cadastro');
}
