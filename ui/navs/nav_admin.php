<div class="collapse navbar-collapse" id="navbarNavDropdown">
  <ul class="navbar-nav ml-auto d-flex align-items-center">
    <?php if (isset($_GET['pg']) && $_GET['pg'] == 'Home') {
      echo '<li class="nav-item active">';
    } else if (isset($_GET['pg']) && $_GET['pg'] != 'Home') {
      echo '<li class="nav-item">';
    } else {
      echo '<li class="nav-item active">';
    };
    ?>
    <a class="nav-link" href="index.php?pg=Home">Home</a>
    </li>
    <?php
    if (isset($_GET['p']) && $_GET['p'] == 'Tables') {
      echo '<li class="nav-item dropdown active">';
    } else {
      echo '<li class="nav-item dropdown">';
    };
    ?>
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Tables
    </a>
    <div class="dropdown-menu" style="left: auto; right: 0px;" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="index.php?pg=TableUser">Users</a>
      <a class="dropdown-item" href="index.php?pg=TablePet">Pets</a>
    </div>
    </li>
    <?php
    if (isset($_GET['p']) && $_GET['p'] == 'Usuario') {
      echo '<li class="nav-item dropdown active">';
    } else {
      echo '<li class="nav-item dropdown">';
    };
    ?>
    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <?php
      if ($_SESSION['petfinder-admin']['image'] == 'n/a') echo '<i class="fa fa-user-circle-o" aria-hidden="true" style="font-size: 1.5em"></i>';
      else echo '<div class="rounded-circle imageUser">
      <img id="userImg' . $_SESSION['petfinder-admin']['id'] . '" class="resize" src="' . $_SESSION['petfinder-admin']['image'] . '" onerror="this.onerror=null;this.src=\'./img/petfinderIcon.svg\';" onload="resizeIMG(\'userImg' . $_SESSION['petfinder-admin']['id'] . '\')" alt="Foto Usuário"></div>'
      ?>
    </a>
    <div class="dropdown-menu" style="left: auto; right: 0px;" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="index.php?pg=Perfil">Perfil</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="./database/logout.php">Logout</a>
    </div>
  </ul>
</div>