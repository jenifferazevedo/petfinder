<?php
  if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])) {
    require("bd.php");
    $query = $conn->prepare("SELECT * FROM users WHERE email=? AND password=?");
    $query->execute(array($_POST['email'], $_POST['password']));
    if($query->rowCount()) {
      $user = $query->fetchAll(PDO::FETCH_ASSOC)[0];
      if($user['tipo'] == 1) {
        session_start();
        $_SESSION['petfinder-admin'] = array($user['user_id'], $user['name'], $user['email'], $user['contact'], $user['city']);
        header('Location: ../index.php?pg=Home');
      }
      else{
        session_start();
        $_SESSION['petfinder-user'] = array($user['user_id'], $user['name'], $user['email'], $user['contact'], $user['city']);
        header('Location: ../index.php?s=Home');
      }
    }
    else {
      echo 'user não está cadastrado.';
    }
  }
  else echo 'não tem post';
?>