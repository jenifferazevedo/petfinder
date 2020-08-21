<?php
session_start();
$classepg;
isset($_POST['user']) ? $classepg = require('./User.php') : $classepg = require('./Pet.php');
if (isset($_POST['user'], $_POST['id']) && isset($_SESSION['petfinder-admin']) && is_array($_SESSION['petfinder-admin'])) {
  $user = new User();
  if ($_SESSION['petfinder-admin']['id'] == $_POST['id']) {
    $user->delete('user_id', $_POST['id']);
    session_destroy();
    header('Location: ../index.php');
  } else {
    $user->delete('user_id', $_POST['id']);
    header('Location: ../index.php?pg=TableUser');
  }
  $user->disconnect();
} else if (isset($_POST['user'], $_POST['id'], $_POST['status']) && isset($_SESSION['petfinder-user']) && is_array($_SESSION['petfinder-user'])) {
  $status = $_POST['status'];
  $novoUser = new User();
  if ($status == 'ativo') {
    $status = 'inativo';
    $novoUser->changeStatus($status, 'user_id', $_POST['id']);
    session_destroy();
  }
  header('Location: ../index.php');
  $novoUser->disconnect();
} else if (isset($_GET['DeletePet'])) {
  /*ADMIN - deletar pet
  USER - UPDATE STATUS*/
} else {
  header('Location: ../index.php');
}
