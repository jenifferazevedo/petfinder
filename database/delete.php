<?php
session_start();
if (isset($_POST['user'], $_POST['id']) && isset($_SESSION['petfinder-admin']) && is_array($_SESSION['petfinder-admin'])) {
  require('./User.php');
  $novoUser = new User();
  if ($_SESSION['petfinder-admin']['id'] == $_POST['id']) {
    $novoUser->delete('users', 'user_id', $_POST['id']);
    session_destroy();
    header('Location: ../index.php?p=Home');
  } else {
    $novoUser->delete('users', 'user_id', $_POST['id']);
    header('Location: ../index.php?pg=TableUser');
  }
} else if (isset($_POST['user'], $_POST['id']) && isset($_SESSION['petfinder-user']) && is_array($_SESSION['petfinder-user'])) {
  echo 'deletar usuario?';
} else if (isset($_GET['DeletePet'])) {
  /*ADMIN - deletar pet
  USER - UPDATE STATUS*/
} else {
  header('Location: ../index.php?p=Home');
}
