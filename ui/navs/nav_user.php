<div class="collapse navbar-collapse" id="navbarNavDropdown">
  <ul class="navbar-nav ml-auto">
    <?php 
    if(isset($_GET['s']) && $_GET['s'] == 'Home') {
      echo '<li class="nav-item active">';
    } else if (isset($_GET['s']) && $_GET['s'] != 'Home') {
      echo '<li class="nav-item">';
    }
    else {
      echo '<li class="nav-item active">';
    };
    ?>
      <a class="nav-link" href="index.php?s=Home">Home</a>
    </li>
    <?php 
    if(isset($_GET['s']) && $_GET['s'] == 'SobreNos') {
      echo '<li class="nav-item active">';
    } else {
      echo '<li class="nav-item">';
    };
    ?>
      <a class="nav-link" href="index.php?p=SobreNos">Sobre Nós</a>
    </li>
    <?php 
    if(isset($_GET['s']) && $_GET['s'] == 'Adocao') {
      echo '<li class="nav-item active">';
    } else {
      echo '<li class="nav-item">';
    };
    ?>
      <a class="nav-link" href="index.php?s=Adocao">Adoção</a>
    </li>
    <?php 
    if(isset($_GET['s']) && $_GET['s'] == 'Contacto') {
      echo '<li class="nav-item active">';
    } else {
      echo '<li class="nav-item">';
    };
    ?>
      <a class="nav-link" href="index.php?s=Contacto">Contacto</a>
    </li>
    <?php 
    if(isset($_GET['s']) && $_GET['s'] == 'Usuario') {
      echo '<li class="nav-item dropdown active">';
    } else {
      echo '<li class="nav-item dropdown">';
    };
    ?>
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <?php echo'<img src="" alt="Foto Usuário">'; ?>
      </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="index.php?s=Perfil">Perfil</a>
      <a class="dropdown-item" href="index.php?s=CadastroPet">Cadastro Pet</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="./database/logout.php">Logout</a>
    </div>        
    </li>
  </ul>
</div>