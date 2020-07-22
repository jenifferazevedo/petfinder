
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <a class="navbar-brand" href="#"><img src="./img/petfinder_logo.svg" alt="Logo Petfinder"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <?php
  if (isset($_SESSION['petfinder-user'])): ?>
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
  <?php elseif(isset($_SESSION['petfinder-admin'])): ?>
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
            <a class="nav-link" href="index.php?pg=Home">Home</a>
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
              <a class="dropdown-item" href="index.php?pg=TableUser">Users</a>
              <a class="dropdown-item" href="index.php?pg=TablePet">Pets</a>
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
              <a class="dropdown-item" href="index.php?pg=Perfil">Perfil</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="./database/logout.php">Logout</a>
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