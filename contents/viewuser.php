<?php
if (isset($_SESSION['petfinder-user'], $_GET['s']) && $_GET['s'] == 'Perfil' && is_array($_SESSION['petfinder-user'])) $id = $_SESSION['petfinder-user']['id'];
else if (isset($_SESSION['petfinder-admin'], $_GET['pg']) && $_GET['pg'] == 'Perfil' && is_array($_SESSION['petfinder-admin'])) $id = $_SESSION['petfinder-admin']['id'];
else if (isset($_SESSION['petfinder-admin'], $_POST['user_id'], $_GET['pg']) && $_GET['pg'] == 'Detalhes' && is_array($_SESSION['petfinder-admin'])) $id = $_POST['user_id'];
else {
  $id = null;
  header('Location: ../index.php?pg=Home');
}
?>
<?php if ($id !== null) :
?>
  <?php
  include('./database/User.php');
  $users = new User();
  $users->selectWhereInFrontEnd('users', 'user_id', $id);
  $user = $users->stmt->fetch();

  ?>
  <div id="cadastrouser" class="container pt-3 pb-5 fading">
    <div class="row">
      <div class="col-12">
        <div class="d-flex">
          <div>
            <h1>Usuário</h1>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center my-5">
      <div class="col-8 card">
        <div class="d-flex justify-content-center mb-3">
          <div class="adocaoImg rounded-circle" style="width: 20%; min-width: 300px;">
            <img src="./img/petfinder_logoassda.svg" class="w-100" onerror="this.onerror=null;this.src='./img/petfinderImgError.png';" alt="...">
          </div>
        </div>
        <h5>ID: <small><?php echo $user['user_id'] ?></small></h5>
        <h5>Nome: <small><?php echo $user['name'] ?></small></h5>
        <h5>Email: <small><?php echo $user['email'] ?></small></h5>
        <h5>Password: <small><?php echo $user['password'] ?></small></h5>
        <h5>Image URL: <small><?php echo $user['image'] ?></small></h5>
        <h5>Contacto: <small><?php echo $user['contact'] ?></small></h5>
        <h5>Morada: <small><?php echo $user['adress'] ?></small></h5>
        <h5>Código Postal: <small><?php echo $user['post_code'] ?></small></h5>
        <h5>Cidade: <small><?php echo $user['city'] ?></small></h5>
        <h5>Tipo: <small><?php echo ($user['tipo'] == 1) ? 'Administrador' : 'Usuário' ?></small></h5>
        <h5>Status: <small><?php echo $user['status'] ?></small></h5>
        <h5>Create_at: <small><?php echo $user['create_at'] ?></small></h5>
        <h5>Update_at: <small><?php echo $user['update_at'] ?></small></h5>

        <form id="delete" action="./database/delete.php" method="post" class="py-2 d-flex">
          <input type="hidden" name="user" value="">
          <input type="hidden" name="id" value="<?php echo $user['user_id'] ?>">
          <button class="btn btn-icon d-flex ml-auto mr-1" type="button" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil" aria-hidden="true"></i></button>
          <?php
          if (
            isset($_SESSION['petfinder-admin']['id']) && $user['user_id'] == $_SESSION['petfinder-admin']['id']
            || isset($_SESSION['petfinder-user']) && $user['user_id'] == $_SESSION['petfinder-user']['id']
          ) {
            echo '<button class="btn d-flex ml-1" type="submit" onClick="return confirm(\'Tem certeza que quer deletar a própria conta?\')"><i class="fa fa-trash" aria-hidden="true"></i></button>';
          } else {
            echo '<button class="btn d-flex ml-1" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>';
          } ?>
        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModal" tabindex="-10" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Usuário</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="needs-validation" novalidate action="./database/updateuser.php" method="post">
            <div class="form-row fading-left">
              <div class="col-12 mb-3">
                <label for="validationCustom01">Nome</label>
                <input type="text" class="form-control" id="validationCustom01" value="<?php echo $user['name'] ?>" name="user_name" required>
                <div class="invalid-feedback">
                  Digite seu nome.
                </div>
              </div>
            </div>
            <div class="form-row fading-right">
              <div class="col-12 mb-3">
                <label for="validationCustom02">E-mail</label>
                <input type="email" class="form-control" id="validationCustom02" value="<?php echo $user['email'] ?>" name="email" required>
                <div class="invalid-feedback">
                  Digite um e-mail válido.
                </div>
              </div>
            </div>
            <div class="form-row fading-left">
              <div class="col-12 mb-3">
                <label for="validationCustom03">Senha</label>
                <input type="password" class="form-control" id="validationCustom03" value="<?php echo $user['password'] ?>" name="password" max="8" required>
                <div class="invalid-feedback">
                  Digite uma senha válida.
                </div>
              </div>
            </div>
            <div class="form-row fading-right">
              <div class="col-12 mb-3">
                <label for="validationCustom07">Foto</label>
                <input type="text" class="form-control" id="validationCustom07" value="<?php echo $user['image'] ?>" name="user_foto" placeholder="URL">
              </div>
            </div>
            <div class="form-row fading-left">
              <div class="col-12 mb-3">
                <label for="validationCustom05">Telefone</label>
                <input type="text" class="form-control" id="validationCustom05" value="<?php echo $user['contact'] ?>" name="contact" maxlength="9" pattern="[0-9]{9}" placeholder="XXXXXXXXX" required>
                <div class="invalid-feedback">
                  Digite um número válido, sem espaços ou caracteres não numéricos.
                </div>
              </div>
            </div>
            <div class="form-row fading-right">
              <div class="col-12 mb-3">
                <label for="validationCustom04">Morada</label>
                <input type="text" class="form-control" id="validationCustom04" value="<?php echo $user['adress'] ?>" name="adress" placeholder="Rua: " required>
                <div class="invalid-feedback">
                  Digite um endereço válido.
                </div>
              </div>
            </div>
            <div class="form-row fading-left">
              <div class="col-6 mb-3">
                <label for="validationCustom08">Cep</label>
                <input type="text" class="form-control" id="validationCustom08" value="<?php echo $user['post_code'] ?>" name="user_cep" maxlength="7" placeholder="XXXXXXX" required>
                <div class="invalid-feedback">
                  Digite um endereço válido.
                </div>
              </div>
              <div class="col-6 mb-3">
                <label for="validationCustom06">Cidade</label>
                <input type="text" class="form-control" id="validationCustom06" value="<?php echo $user['city'] ?>" name="user_city" required>
                <div class="invalid-feedback">
                  Digite um endereço válido.
                </div>
              </div>
            </div>
            <?php if (isset($_SESSION['petfinder-admin'])) : ?>
              <div class="form-row fading-right">
                <div class="col-12 mb-3">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="0" <?php echo ($user['tipo'] == 0) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="inlineRadio1">User</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="1" <?php echo ($user['tipo'] == 1) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="inlineRadio2">Admin</label>
                  </div>
                </div>
              </div>
            <?php endif; ?>
            <div class="d-flex flex-row pb-1">
              <button class="btn d-flex ml-auto fading" type="submit">Atualizar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
  </script>
<?php
endif;
?>