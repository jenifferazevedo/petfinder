<div id="adocao" class="container pt-3 pb-5">
  <div class="row">
    <div class="col-xl-12 d-flex justify-content-between flex-wrap">

      <div class="card mb-3 w-100" style="min-width: 300px; max-width: 550px;">
        <div class="row no-gutters">
          <div class="col-xs-12 col-sm-5 p-2 d-flex justify-content-center">
            <div class="adocaoImg rounded-circle">
              <?php //if($pet_image == "n/a") echo '<img src="./img/petfinderImgError.png" class="w-100" alt="Imagem Pet"'>
              //else echo'<img class="w-100"><img src="'.$pet_image.'" onerror="this.onerror=null;this.src=\'./img/petfinderImgError.png\';" alt="Imagem Pet"></div>' ?>
              <img src="./img/petfinder_logoassda.svg" class="w-100" onerror="this.onerror=null;this.src='./img/petfinderImgError.png';" alt="...">
            </div>
          </div>
          <div class="col-xs-12 col-sm-7">
            <div class="card-body">
              <h5 class="card-title m-0">Name Pet</h5>
              <p class="card-text m-0"><small class="text-muted">Tipo:</small></p>
              <div id="petDescricao">
                <p class="card-text m-0">Descrição do pet Labore laborum ex ullamco est ipsum laboris minim proident. Mollit enim id Lorem fugiat laboris proident laboris veniam amet consectetur culpa aute do velit. Eu ipsum dolor laboris cupidatat. Commodo eiusmod quis ipsum duis pariatur ex officia aliquip anim excepteur et.</p>
                <p class="mt-3">
                  <i class="fa fa-envelope" aria-hidden="true"></i> Email aqui!
                </p>
                <p class="mt-0">
                  <i class="fa fa-phone" aria-hidden="true"></i> Telefone
                </p>
              </div>
              <div class="text-right">
                <button id="moreInfo" class="btn btn-primary" onclick='showCollapse("petDescricao", "moreInfo")'>
                <i class="fa fa-plus" aria-hidden="true"></i>
              </button>
              </div>
              <p class="card-text m-0"><small class="text-muted">Data do anúncio</small></p>
            </div>
          </div>
        </div>
      </div>

    </div> 
  </div>
</div>