<div id="adocao" class="container pt-3 pb-5">
  <div class="row">
    <div class="col-xl-12 d-flex justify-content-between flex-wrap">
      <?php
      require('./database/Pet.class.php');
      $pet = new Pet();
      $pet->connectInFrontEnd();
      $pet->selectAllAtivosInFrontEnd();
      if ($pet->stmt->rowCount()) :
      ?>
        <?php $data = $pet->stmt->fetchAll();
        foreach ($data as $p) : ?>
          <div class="card mb-3 w-100" style="min-width: 300px; max-width: 550px;">
            <div class="row no-gutters">
              <div class="col-xs-12 col-sm-5 p-2 d-flex justify-content-center">
                <div class="adocaoImg rounded-circle">
                  <?php
                  if ($p['pet_image'] == "n/a") {
                    echo '<img src="./img/petfinderImgError.png" class="w-100" alt="Imagem Pet">';
                  } else {
                    echo '<img class="w-100"><img src="' . $pet_image . '" onerror="this.onerror=null;this.src=\'./img/petfinderImgError.png\';" alt="Imagem Pet"></div>';
                  }
                  ?>
                </div>
              </div>
              <div class="col-xs-12 col-sm-7">
                <div class="card-body">
                  <h5 class="card-title m-0"><?php echo $p['pet_name'] ?></h5>
                  <p class="card-text m-0"><small class="text-muted">Tipo: <?php echo $p['type_name'] ?></small></p>
                  <div id="petDescricao">
                    <p class="card-text m-0" style="min-height: 80px;"><?php echo $p['description'] ?></p>
                    <p><b>Responsável:</b> <?php echo $p['user_name'] ?></p>
                    <p class="mt-3">
                      <i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $p['email'] ?>
                    </p>
                    <p class="mt-0">
                      <i class="fa fa-phone" aria-hidden="true"></i> <?php echo $p['contact'] ?>
                    </p>
                    <p>
                      <i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $p['city'] ?>
                    </p>
                  </div>
                  <div class="text-right">
                    <button id="moreInfo" class="btn btn-primary" onclick='showCollapse("petDescricao", "moreInfo")'>
                      <i class="fa fa-plus" aria-hidden="true"></i>
                    </button>
                  </div>
                  <div class="text-center">
                    <p class="card-text m-0"><small class="text-muted"><?php echo date('d M Y', strtotime($p['create_at'] . 'Monday next week')) ?></small></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php
        endforeach;
      else :
        ?>
        <div class="pt-3 text-center">
          <h3>Nenhum pet disponível para adoção!</h3>
        </div>
      <?php endif ?>
    </div>
  </div>
</div>