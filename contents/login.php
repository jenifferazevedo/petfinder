<div id="login" class="container pt-3 fading">
  <div class="row justify-content-center">
    <div class="col-lg-6 col-sm-12">
      <div class="d-flex">
        <h1>Login</h1>
      </div>
      <form class="needs-validation" novalidate action="./database/login_user.php" method="post">
        <div class="form-row fading-left">
          <div class="col-12 mb-3">
            <label for="validationCustom01">E-mail</label>
            <input type="email" class="form-control" id="validationCustom01" value="" name="email" required>
            <div class="invalid-feedback">
              Digite o e-mail cadastrado!
            </div>
          </div>
        </div>
        <div class="form-row fading-right">
          <div class="col-12 mb-3">
            <label for="validationCustom02">Senha</label>
            <input type="password" class="form-control" id="validationCustom02" value="" max="8" name="password" required>
            <div class="invalid-feedback">
              Digite sua senha!
            </div>
          </div>
        </div>
        <button class="btn d-flex ml-auto fading" type="submit">Enviar</button>
      </form>
      <p>Não possui login? <a href="index.php?p=Cadastro" class="font-weight-bold">Cadastre-se</a></p>
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
    </div>
  </div>
</div>