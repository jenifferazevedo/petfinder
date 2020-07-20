<?php 
  if(isset($_GET['pg']) && $_GET['pg'] == 'Perfil') {
    echo'O admin ta aqui!!';
  }
  else {
    echo'Não é o admin';
  }
?>