<?php
session_start();
include("./ui/header.php");
if (isset($_GET['p'])) {
  $pag = $_GET['p'];
  if ($pag == 'Home') include("./contents/home.php");
  else if ($pag == 'SobreNos') include("./contents/sobrenos.php");
  else if ($pag == 'Adocao') include("./contents/adocao.php");
  else if ($pag == 'Contacto') include("./contents/contacto.php");
  else if ($pag == 'Login') include("./contents/login.php");
  else if ($pag == 'Cadastro') include("./contents/cadastrouser.php");
  else include("./contents/home.php");
} else if (isset($_SESSION['petfinder-admin']) && is_array($_SESSION['petfinder-admin'])) {
  if (isset($_GET['pg'])) {
    $pg = $_GET['pg'];
    if ($pg == 'Home') include("./contents/home.php");
    else if ($pg == 'TableUser') include("./contents/userstable.php");
    else if ($pg == 'TablePet') include("./contents/petstable.php");
    else if ($pg == 'Cadastro') include("./contents/cadastrouser.php");
    else if ($pg == 'CadastroPet') include("./contents/cadastropet.php");
    else if ($pg == 'ChangeUser') include("./contents/userstable.php");
    else if ($pg == 'ChangePet') include("./contents/userstable.php");
    else if ($pg == 'Perfil') include("./contents/viewuser.php");
    else if ($pg == 'Detalhes') include("./contents/viewuser.php");
    else if ($pg == 'DetalhePet') include("./contents/viewpet.php");
    else include("./contents/home.php");
  } else include("./contents/home.php");
} else if (isset($_SESSION['petfinder-user']) && is_array($_SESSION['petfinder-user'])) {
  if (isset($_GET['s'])) {
    $pg = $_GET['s'];
    if ($pg == 'Home') include("./contents/home.php");
    else if ($pg == 'SobreNos') include("./contents/sobrenos.php");
    else if ($pg == 'Adocao') include("./contents/adocao.php");
    else if ($pg == 'Contacto') include("./contents/contacto.php");
    else if ($pg == 'Perfil') include("./contents/viewuser.php");
    else if ($pg == 'MeusPets') include("./contents/meuspets.php");
    else if ($pg == 'DetalhePet') include("./contents/viewpet.php");
    else if ($pg == 'CadastroPet') include("./contents/cadastropet.php");
    else include("./contents/home.php");
  } else include("./contents/home.php");
} else include("./contents/home.php");
include("./ui/footer.php");
