<?php
  require("bd.php");

  if(isset($_POST['email']) && isset($_POST['password']) && $conn != null) {
    echo 'existe';
  }
  else echo 'não tem post';
?>