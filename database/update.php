<?php
session_start();

if (isset($_POST['id'], $_POST['user'])) {
  require('./User.class.php');

  $novoUser = new User();
  $novoUser->connect();
  $novoUser->modifyUser($_POST['id']);
  if (isset($_SESSION['petfinder-admin']) && is_array($_SESSION['petfinder-admin'])) {
    echo "<script>alert('Cadastro modificado com sucesso');
    window.location.href = '../index.php?pg=TableUser';
    </script>";
  } else {
    echo "<script>alert('Cadastro modificado com sucesso');
    window.location.href = '../index.php?s=Perfil';
    </script>";
  }
  $novoUser->disconnect();
} else if (isset($_POST['pet'])) {
  require('./Pet.class.php');
  $novoPet = new Pet();
  $novoPet->connect();
  $novoPet->modifyPet($_POST['id']);
  if (isset($_SESSION['petfinder-admin']) && is_array($_SESSION['petfinder-admin'])) {
    echo "<script>alert('Pet modificado com sucesso');
    window.location.href = '../index.php?pg=TablePet'</script>";
  } else {
    echo "<script>alert('Pet modificado com sucesso');
    window.location.href = '../index.php?s=MeusPets';</script>";
  }
  $novoPet->disconnect();
} else {
  header('Location: ../index.php');
}
