<div class="collapse navbar-collapse" id="navbarNavDropdown">
  <ul class="navbar-nav ml-auto">
    <?php 
    if(isset($_GET['p']) && $_GET['p'] == 'Home') {
      echo '<li class="nav-item active">';
    } else if (isset($_GET['p']) && $_GET['p'] != 'Home') {
      echo '<li class="nav-item">';
    }
    else {
      echo '<li class="nav-item active">';
    };
    ?>
      <a class="nav-link" href="index.php?p=Home">Home</a>
    </li>
    <?php 
    if(isset($_GET['p']) && $_GET['p'] == 'SobreNos') {
      echo '<li class="nav-item active">';
    } else {
      echo '<li class="nav-item">';
    };
    ?>
      <a class="nav-link" href="index.php?p=SobreNos">Sobre Nós</a>
    </li>
    <?php 
    if(isset($_GET['p']) && $_GET['p'] == 'Adocao') {
      echo '<li class="nav-item active">';
    } else {
      echo '<li class="nav-item">';
    };
    ?>
    <a class="nav-link" href="index.php?p=Adocao">Adoção</a>
    </li>
    <?php 
    if(isset($_GET['p']) && $_GET['p'] == 'Contacto') {
      echo '<li class="nav-item active">';
    } else {
      echo '<li class="nav-item">';
    };
    ?>
      <a class="nav-link" href="index.php?p=Contacto">Contacto</a>
    </li>
    <?php 
    if(isset($_GET['p']) && $_GET['p'] == 'Cadastro') {
      echo '<li class="nav-item active">';
    } else {
      echo '<li class="nav-item">';
    };
    ?>
      <a class="nav-link" href="index.php?p=Cadastro">Cadastro</a>
    </li>
    <?php 
    if(isset($_GET['p']) && $_GET['p'] == 'Login') {
      echo '<li class="nav-item active">';
    } else {
      echo '<li class="nav-item">';
    };
    ?>
      <a class="nav-link" href="index.php?p=Login">Login</a>
    </li>
  </ul>
</div>