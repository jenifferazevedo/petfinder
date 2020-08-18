<div id="cadastropet" class="container pt-3 pb-5 fading">
  <div class="row">
    <div class="col-lg-12">
      <div class="d-flex">
        <div>
          <h1>Cadastro Pet</h1>
        </div>
      </div>
      <form class="needs-validation" novalidate action="./database/insertpet.php" method="post">
        <div class="form-row fading-left">
          <div class="col-12 mb-3">
            <label for="validationCustom01">Nome</label>
            <input type="text" class="form-control" id="validationCustom01" value="" name="pet_name" required>
            <div class="invalid-feedback">
              Digite seu nome.
            </div>
          </div>
        </div>
        <div class="form-row fading-right">
          <div class="col-12 mb-3">
            <label for="validationCustom07">Foto</label>
            <input type="text" class="form-control" id="validationCustom07" value="" name="pet_image" placeholder="URL">
          </div>
        </div>
        <div class="col-md-3 mb-3 p-0 fading-left">
          <label for="validationCustom04">Tipo do pet</label>
          <select class="custom-select" id="validationCustom04" name="pet_type" require>
            <option selected disabled value="">Tipo:</option>
            <option value="1">Gato</option>
            <option value="2">Cão</option>
            <option value="3">Outro</option>
          </select>
          <div class="invalid-feedback">
            Selecione um tipo
          </div>
        </div>
        <div class="form-row fading-right">
          <div class="mb-3 w-100">
            <label for="validationTextarea">Textarea</label>
            <textarea class="form-control" id="validationTextarea" placeholder="Required example textarea" name="description" required></textarea>
            <div class="invalid-feedback">
              Digite uma descrição do pet!
            </div>
          </div>
        </div>
        <button class="btn d-flex ml-auto fading" type="submit">Cadastrar</button>
      </form>
      <div class="text-center fadingScroll">
        <img src="./img/pets2.jpg" alt="Todo pet precisa de uma família!">
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
    </div>
  </div>
</div>
