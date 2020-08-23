<div id="adocao" class="container pt-3 pb-5">
  <div class="row">
    <div class="col-12 mt-1 mb-4">
      <form action="./index.php?p=Adocao" method="post" class="mt-3">
        <div class="input-group">
          <select class="custom-select" id="inputGroupSelect04" style="flex:0.1;min-width:120px;" name="search">
            <option value="city" selected>Cidade</option>
            <option value="pet_name">Nome</option>
            <option value="type_name">Tipo</option>
            <option value="description">Descrição</option>
            <option value="create_at">Create_at</option>
          </select>
          <input type="text flex-grow-1" class="form-control flex-grow-1" name="searchText" id="searchText">
          <select class="custom-select" id="inputGroupSelect05" style="flex:0.1;min-width:120px;" name="order">
            <option value="ASC" selected>ASC</option>
            <option value="DESC">DESC</option>
          </select>
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-12 d-flex justify-content-between flex-wrap">
      <?php
      require('./database/Pet.class.php');
      $pet = new Pet();
      $pet->connectInFrontEnd();
      if (isset($_POST['search'], $_POST['searchText'], $_POST['order'])) {
        $pet->filterPet($_POST['search'], $_POST['searchText'], $_POST['order']);
      } else {
        $pet->selectAllAtivosInFrontEnd();
      }
      if ($pet->stmt->rowCount()) :
      ?>
        <?php $data = $pet->stmt->fetchAll();
        foreach ($data as $p) : ?>
          <div class="card mb-3 w-100 align-self-start" style="min-width: 300px; max-width: 550px;">
            <div class="row no-gutters">
              <div class="col-xs-12 col-sm-5 p-2 d-flex justify-content-center">
                <div class="adocaoImg rounded-circle justify-content-center">
                  <?php
                  if ($p['pet_image'] == "n/a") {
                    echo '<img src="./img/petfinderImgError.png" class="w-100" alt="Imagem Pet">';
                  } else {
                    echo '<img style="height:130%; min-width:120%" src="' . $p['pet_image'] . '" onerror="this.onerror=null;this.src=\'./img/petfinderImgError.png\';" alt="Imagem Pet">';
                  }
                  ?>
                </div>
              </div>
              <div class="col-xs-12 col-sm-7">
                <div class="card-body">
                  <h5 class="card-title m-0"><?php echo $p['pet_name'] ?></h5>
                  <p class="card-text m-0 d-flex">
                    <small class="text-muted">Tipo: <?php echo $p['type_name'] ?></small>
                    <small class="text-muted ml-auto"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $p['city'] ?></small>
                  </p>
                  <div id="petDescricao<?php echo $p['pet_id'] ?>" style="height:80px; overflow:hidden; transition: height 1s ease-in-out;">
                    <p class="card-text m-0" style="min-height: 80px;"><?php echo $p['description'] ?></p>
                    <p><b>Responsável:</b> <?php echo $p['user_name'] ?></p>
                    <p class="mt-3">
                      <i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $p['email'] ?>
                    </p>
                    <p class="mt-0">
                      <i class="fa fa-phone" aria-hidden="true"></i> <?php echo $p['contact'] ?>
                    </p>
                  </div>
                  <div class="text-right">
                    <button id="moreInfo<?php echo $p['pet_id'] ?>" class="btn btn-primary" onclick="showCollapse('<?php echo 'petDescricao' . $p['pet_id'] ?>', '<?php echo 'moreInfo' . $p['pet_id'] ?>')">
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