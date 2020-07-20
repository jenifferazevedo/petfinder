
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <a class="navbar-brand" href="#"><img src="./img/petfinder_logo.svg" alt="Logo Petfinder"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <?php 
  if(isset($logado, $tipo) && $tipo == 1): ?>
    <?php 
    $logado=$_POST['logado'];
    $tipo=$_POST['tipo'];
    $user_foto = $_POST['user_foto'];?>
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
          if(isset($_GET['p']) && $_GET['p'] == 'Usuario') {
            echo '<li class="nav-item dropdown active">';
          } else {
            echo '<li class="nav-item dropdown">';
          };
        ?>
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo'<div class="user-foto"><img src="'.$user_foto.'" alt="Foto Usuário"></div>'; ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Perfil</a>
            <a class="dropdown-item" href="#">Cadastro Pet</a>
            <a class="dropdown-item" href="#">Favoritos</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Logout</a>
          </div>        
        </li>
      </ul>
    </div>
  <?php /*elseif(isset($logado, $tipo) && $tipo == 0):*/ elseif(isset($_GET['p']) && $_GET['p'] == 'Admin' ): ?>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ml-auto">
        <?php if(isset($_GET['pg']) && $_GET['pg'] == 'Home') {
              echo '<li class="nav-item active">';
            } else if (isset($_GET['pg']) && $_GET['pg'] != 'Home') {
              echo '<li class="nav-item">';
            }
            else {
              echo '<li class="nav-item active">';
            };
            ?>
            <a class="nav-link" href="index.php?p=Admin&pg=Home">Home</a>
          </li>
          <?php 
            if(isset($_GET['p']) && $_GET['p'] == 'Tables') {
              echo '<li class="nav-item dropdown active">';
            } else {
              echo '<li class="nav-item dropdown">';
            };
          ?>
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Tables
            </a>
            <div class="dropdown-menu" style="left: auto; right: 0px;" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="index.php?p=Admin&pg=TableUser">Users</a>
              <a class="dropdown-item" href="index.php?p=Admin&pg=TablePet">Pets</a>
            </div> 
          </li>
          <?php 
            if(isset($_GET['p']) && $_GET['p'] == 'Usuario') {
              echo '<li class="nav-item dropdown active">';
            } else {
              echo '<li class="nav-item dropdown">';
            };
          ?>
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user-circle-o" aria-hidden="true" style="font-size: 1.5em"></i>
            </a>
            <div class="dropdown-menu" style="left: auto; right: 0px;" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="index.php?p=Admin&pg=Perfil">Perfil</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Logout</a>
            </div>   
        </ul>
      </div>
          

  <?php else: ?>
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
  <?php endif; ?>
</nav>