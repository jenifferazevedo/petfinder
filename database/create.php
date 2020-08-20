<?php

if (isset($_POST['user'])) {
  require('./User.php');

  $novoUser = new User();
  $novoUser->create();
} else if (isset($_GET['CreatePet'])) {
  //pet;
} else {
  header('Location: ../index.php?p=Cadastro');
}
