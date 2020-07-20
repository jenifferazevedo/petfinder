<div id="contacto" class="container pt-3 fading">
  <div class="row">
    <div class="col-lg-12">
      <div class="d-flex">
        <div>
          <h1>Contacto</h1>
          <p>Estamos a espera do seu contacto!!</p>
        </div>
        <img class="ml-auto" src="./img/pets1.jpg" alt="Pets">
      </div>
      <form class="needs-validation" novalidate action="./email/emailContacto.php" method="post">
        <div class="form-row fading-left">
          <div class="col-12 mb-3">
            <label for="validationCustom01">Nome</label>
            <input type="text" class="form-control" id="validationCustom01" value="" name="nome" required>
            <div class="invalid-feedback">
              Escreva seu nome.
            </div>
          </div>
        </div>
        <div class="form-row fading-right">
          <div class="col-12 mb-3">
            <label for="validationCustom02">E-mail</label>
            <input type="email" class="form-control" id="validationCustom02" value="" name="email" required>
            <div class="invalid-feedback">
              Escreva um e-mail válido.
            </div>
          </div>
        </div>
        <div class="form-row fading-left">
          <div class="col-12 mb-3">
            <label for="validationCustom04">Assunto</label>
            <select class="custom-select" id="validationCustom04" name="assunto" required>
              <option value="Informacao">Informação</option>
              <option value="Denuncia">Denúncia</option>
              <option value="Feedback">Feedback</option>
              <option value="Outro">Outro</option>
            </select>
            <div class="invalid-feedback">
              Please select a valid state.
            </div>
          </div>
        </div>
        <div class="form-row fading-right">
          <div class="col-12 mb-3">
            <label for="validationCustom05">Mensagem</label>
            <textarea type="text" class="form-control" id="validationCustom05" name="mensagem" required></textarea>
            <div class="invalid-feedback">
              Escreva uma mensagem!
            </div>
          </div>
        </div>
        <button class="btn d-flex ml-auto fading" type="submit">Enviar</button>
      </form>

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