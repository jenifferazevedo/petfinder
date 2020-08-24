<?php
if (isset($_SESSION['petfinder-admin']) && is_array($_SESSION['petfinder-admin']) && isset($_GET['pg']) && $_GET['pg'] == 'DetalhePet' && isset($_POST['pet_id'])) $id = $_POST['pet_id'];
else if (isset($_SESSION['petfinder-user']) && is_array($_SESSION['petfinder-user']) && isset($_GET['s']) && $_GET['s'] == 'DetalhePet') $id = $_POST['pet_id'];
else {
  $id = null;
  header('Location: ./index.php');
}
?>
<?php if ($id !== null) :
?>
  <?php
  include('./database/Pet.class.php');
  $pets = new Pet();
  $pets->connectInFrontEnd();
  $pets->selectWhereInFrontEnd('pet_id', $id);
  $pet = $pets->stmt->fetch();
  ?>
  <div id="cadastrouser" class="container pt-3 pb-5 fading">
    <div class="row">
      <div class="col-12">
        <div class="d-flex">
          <div>
            <h1>Pet</h1>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center my-5">
      <div class="col-md-8 col-sm-12 card">
        <div class="d-flex justify-content-center my-4">
          <div class="imgPerfil rounded-circle">
            <?php
            if ($pet['pet_image'] == "n/a") {
              echo '<img src="./img/petfinderImgError.png" class="w-100" alt="Imagem Pet">';
            } else {
              echo '<img id="petImg' . $pet['pet_id'] . '" class="resize" src="' . $pet['pet_image'] . '" onerror="this.onerror=null;this.src=\'./img/petfinderImgError.png\';" onload="resizeIMG(\'petImg' . $pet['pet_id'] . '\')" alt="Imagem Pet">';
            }
            ?>
          </div>
        </div>
        <h5>ID: <small><?php echo $pet['pet_id'] ?></small></h5>
        <h5>Nome: <small><?php echo $pet['pet_name'] ?></small></h5>
        <h5>Image URL: <small><?php echo $pet['pet_image'] ?></small></h5>
        <h5>User_id: <small><?php echo $pet['user_id'] ?></small></h5>
        <h5>Usuário: <small><?php echo $pet['user_name'] ?></small></h5>
        <h5>Contacto: <small><?php echo $pet['email'] ?></small></h5>
        <h5>Status: <small><?php echo $pet['status'] ?></small></h5>
        <h5>Tipo: <small><?php echo $pet['pet_type'] ?></small></h5>
        <h5>Sexo: <small><?php echo ($pet['sexo'] == 'f') ? 'Fêmea' : 'Macho' ?></small></h5>
        <h5>Descrição: <small><?php echo $pet['description'] ?></small></h5>
        <h5>Cidade: <small><?php echo $pet['city'] ?></small></h5>
        <h5>Create_at: <small><?php echo $pet['create_at'] ?></small></h5>
        <h5>Update_at: <small><?php echo $pet['update_at'] ?></small></h5>

        <form id="delete" action="./database/delete.php" method="post" class="py-2 d-flex">
          <input type="hidden" name="pet" value="">
          <input type="hidden" name="status" value="<?php echo $pet['status'] ?>">
          <input type="hidden" name="id" value="<?php echo $pet['pet_id'] ?>">
          <button class="btn btn-icon d-flex ml-auto mr-1" type="button" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil" aria-hidden="true"></i></button>
          <button class="btn d-flex ml-1" type="submit" onClick="return confirm('Tem certeza que quer deletar esse pet?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModal" tabindex="-10" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pet</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="needs-validation" novalidate action="./database/update.php" method="post">
            <input type="hidden" name="pet" value="">
            <input type="hidden" name="pet_id" value="<?php echo $pet['pet_id'] ?>">
            <input type="hidden" name="id" value="<?php echo $pet['user_id'] ?>">
            <div class="form-row fading-left">
              <div class="col-12 mb-3">
                <label for="validationCustom01">Nome</label>
                <input type="text" class="form-control" id="validationCustom01" value="<?php echo $pet['pet_name'] ?>" name="pet_name" required>
                <div class="invalid-feedback">
                  Digite seu nome.
                </div>
              </div>
            </div>
            <div class="form-row fading-right">
              <div class="col-12 mb-3">
                <label for="validationCustom07">Foto</label>
                <input type="text" class="form-control" id="validationCustom07" value="<?php echo $pet['pet_image'] ?>" name="pet_image" placeholder="URL">
              </div>
            </div>
            <div class="form-row fading-left">
              <div class="col-6 mb-3">
                <label for="validationCustom04">Tipo do pet</label>
                <select class="custom-select" id="validationCustom04" name="pet_type" require>
                  <option disabled value="">Tipo:</option>
                  <option value="1" <?php echo ($pet['pet_type'] == 1) ? 'selected' : '' ?>>Gato</option>
                  <option value="2" <?php echo ($pet['pet_type'] == 2) ? 'selected' : '' ?>>Cão</option>
                  <option value="3" <?php echo ($pet['pet_type'] == 3) ? 'selected' : '' ?>>Outro</option>
                </select>
                <div class="invalid-feedback">
                  Selecione um tipo
                </div>
              </div>
              <div class="col-6 mb-3">
                <label for="validationCustom04">Sexo do pet:</label>
                <select class="custom-select" id="validationCustom04" name="sexo" require>
                  <option disabled value="">Sexo:</option>
                  <option value="f" <?php echo ($pet['sexo'] == 'f') ? 'selected' : '' ?>>Fêmea</option>
                  <option value="m" <?php echo ($pet['sexo'] == 'm') ? 'selected' : '' ?>>Macho</option>
                </select>
                <div class="invalid-feedback">
                  Selecione um tipo
                </div>
              </div>
            </div>
            <div class="form-row fading-right">
              <div class="mb-3 w-100">
                <label for="validationTextarea">Textarea</label>
                <textarea class="form-control" id="validationTextarea" placeholder="Required example textarea" name="description" value="<?php echo $pet['description'] ?>" required><?php echo $pet['description'] ?></textarea>
                <div class="invalid-feedback">
                  Digite uma descrição do pet!
                </div>
              </div>
            </div>
            <?php if (isset($_SESSION['petfinder-admin'])) : ?>
              <div class="form-row fading-right">
                <label for="statusRadio">Status:</label>
                <div id="statusRadio" class="col-12 mb-3">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="inlineRadioTipo1" value="ativo" <?php echo ($pet['status'] == 'ativo') ? 'checked' : '' ?>>
                    <label class="form-check-label" for="inlineRadiTipo1">Ativo</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="inlineRadioTipo2" value="inativo" <?php echo ($pet['status'] == 'inativo') ? 'checked' : '' ?>>
                    <label class="form-check-label" for="inlineRadioTipo2">Inativo</label>
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
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
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