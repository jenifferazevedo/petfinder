<?php
session_start();
$classepg;
include_once('./User.class.php');
include_once('./Pet.class.php');
if (isset($_POST['user'], $_POST['id'])) {
  $user = new User();
  $user->connect();
  $petUser = new Pet();
  $petUser->connect();
  if (isset($_SESSION['petfinder-admin']) && is_array($_SESSION['petfinder-admin'])) {
    if ($_SESSION['petfinder-admin']['id'] == $_POST['id']) {
      $user->delete('user_id', $_POST['id']);
      $petUser->changeStatus('user_id', $_POST['id']);
      session_destroy();
      header('Location: ../index.php');
    } else {
      $user->delete('user_id', $_POST['id']);
      $petUser->changeStatus('user_id', $_POST['id']);
      header('Location: ../index.php?pg=TableUser');
    }
  } else if (isset($_SESSION['petfinder-user']) && is_array($_SESSION['petfinder-user']) && isset($_POST['status'])) {
    $status = $_POST['status'];
    if ($status == 'ativo') {
      $status = 'inativo';
      $user->changeStatus('user_id', $_POST['id']);
      $petUser->changeStatus('user_id', $_POST['id']);
      session_destroy();
    }
    header('Location: ../index.php');
  } else header('Location: ../index.php');
  $petUser->disconnect();
  $user->disconnect();
} else if (isset($_POST['pet'])) {
  $pet = new Pet();
  $pet->connect();
  if (isset($_SESSION['petfinder-admin']) && is_array($_SESSION['petfinder-admin'])) {
    $pet->delete('pet_id', $_POST['id']);
    header('Location: ../index.php?pg=TablePet');
  } else if (isset($_SESSION['petfinder-user']) && is_array($_SESSION['petfinder-user'])) {
    $pet->changeStatus('pet_id', $_POST['id']);
    header('Location: ../index.php?s=MeusPets');
  }
  $pet->disconnect();
} else {
  header('Location: ../index.php');
}
