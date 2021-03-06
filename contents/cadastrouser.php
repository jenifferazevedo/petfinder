<?php
?>
<div id="cadastrouser" class="container pt-3 pb-5 fading">
  <div class="row">
    <div class="col-lg-12">
      <div class="d-flex">
        <div>
          <h1>Cadastro</h1>
          <p>Ajude pets a encontarem uma família!</p>
        </div>
      </div>
      <form class="needs-validation" novalidate action="./database/create.php" method="post">
        <input type="hidden" name="user">
        <div class="form-row fading-left">
          <div class="col-12 mb-3">
            <label for="validationCustom01">Nome</label>
            <input type="text" class="form-control" id="validationCustom01" name="user_name" required>
            <div class="invalid-feedback">
              Digite seu nome.
            </div>
          </div>
        </div>
        <div class="form-row fading-right">
          <div class="col-12 mb-3">
            <label for="validationCustom02">E-mail</label>
            <input type="email" class="form-control" id="validationCustom02" name="email" required>
            <div class="invalid-feedback">
              Digite um e-mail válido.
            </div>
          </div>
        </div>
        <div class="form-row fading-left">
          <div class="col-12 mb-3">
            <label for="validationCustom03">Senha</label>
            <input type="password" class="form-control" id="validationCustom03" name="password" max="8" required>
            <div class="invalid-feedback">
              Digite uma senha válida de no máximo 8 caracteres.
            </div>
          </div>
        </div>
        <div class="form-row fading-right">
          <div class="col-12 mb-3">
            <label for="validationCustom07">Foto</label>
            <input type="text" class="form-control" id="validationCustom07" name="user_foto" placeholder="URL">
          </div>
        </div>
        <div class="form-row fading-left">
          <div class="col-12 mb-3">
            <label for="validationCustom05">Telefone</label>
            <input type="text" class="form-control" id="validationCustom05" name="contact" minLength="9" maxlength="12" pattern="[0-9]{9}" placeholder="XXXXXXXXX" required>
            <div class="invalid-feedback">
              Digite um número válido de 9 à 12 dígitos, sem espaços ou caracteres não numéricos.
            </div>
          </div>
        </div>
        <div class="form-row fading-right">
          <div class="col-12 mb-3">
            <label for="validationCustom04">Morada</label>
            <input type="text" class="form-control" id="validationCustom04" name="adress" placeholder="Rua: " required>
            <div class="invalid-feedback">
              Digite um endereço válido.
            </div>
          </div>
        </div>
        <div class="form-row fading-left">
          <div class="col-6 mb-3">
            <label for="validationCustom09">Cep</label>
            <input type="text" class="form-control" id="validationCustom09" name="user_cep" maxlength="7" pattern="[0-9]{7}" placeholder="XXXXXXX" required>
            <div class="invalid-feedback">
              Digite um endereço válido de até 7 dígitos.
            </div>
          </div>
          <div class="col-6 mb-3">
            <label for="validationCustom06">Cidade</label>
            <input type="text" class="form-control" id="validationCustom06" name="user_city" required>
            <div class="invalid-feedback">
              Digite um endereço válido.
            </div>
          </div>
        </div>
        <?php if (isset($_SESSION['petfinder-admin'])) : ?>
          <div class="form-row fading-right">
            <div class="col-12 mb-3">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="user_type" id="inlineRadio1" value="0" checked>
                <label class="form-check-label" for="inlineRadio1">User</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="user_type" id="inlineRadio2" value="1">
                <label class="form-check-label" for="inlineRadio2">Admin</label>
              </div>
            </div>
          </div>
        <?php else : ?>
          <input type="hidden" name="user_type" value="">
        <?php endif; ?>
        <button class="btn d-flex ml-auto fading" type="submit">Cadastrar</button>
      </form>
      <div class="text-center fadingScroll">
        <img src="./img/pets2.jpg" alt="Todo pet precisa de uma família!">
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
    </div>
  </div>
</div>