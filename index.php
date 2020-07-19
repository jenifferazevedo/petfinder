<?php 
  include("./ui/header.php");
  if(isset($_GET['p'])){
    $pg = $_GET['p'];
    $pag = $_GET['p'];
    if($pag == 'Home') include("./contents/home.php");
    else if ($pag == 'SobreNos') include("./contents/sobrenos.php");
    else if ($pag == 'Adocao') include("./contents/adocao.php");
    else if ($pag == 'Contacto') include("./contents/contacto.php");
    else if ($pag == 'Login') include("./contents/login.php");
    else include("./contents/home.php");
  } else include("./contents/home.php");
  include("./ui/footer.php");
?>