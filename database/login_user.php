<?php
  if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])) {
    require("bd.php");
    $query = $conn->prepare("SELECT * FROM users WHERE email=? AND password=?");
    $query->execute(array($_POST['email'], $_POST['password']));
    if($query->rowCount()) {
      $user = $query->fetchAll(PDO::FETCH_ASSOC)[0];
      if($user['tipo'] == 1) {
        session_start();
        $_SESSION['petfinder-admin'] = array('id' => $user['user_id'], 'name' => $user['name'], 'email' => $user['email'], 'image' => $user['image']);
        header('Location: ../index.php?pg=Home');
      }
      else{
        session_start();
        $_SESSION['petfinder-user'] = array('id' => $user['user_id'], 'name' => $user['name'], 'email' => $user['email'], 'image' => $user['image'], 'contact' => $user['contact'],'city' => $user['city']);
        header('Location: ../index.php?s=Home');
      }
    }
    else {
      echo '<script>alert("Erro: Dados incorretos ou usuário não cadastrado")
      window.location.href = "../index.php?p=Login"
      </script>';
    }
  }
  else echo '<script>alert("Erro: Dados não inseridos")
  window.location.href = "../index.php?p=Login"
  </script>';
?>