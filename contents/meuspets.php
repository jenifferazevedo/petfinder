<?php
if (isset($_SESSION['petfinder-user'], $_GET['s']) && $_GET['s'] == 'MeusPets' && is_array($_SESSION['petfinder-user'])) $id = $_SESSION['petfinder-user']['id'];
else if (isset($_SESSION['petfinder-admin'], $_GET['pg']) && $_GET['pg'] == 'MeusPets' && is_array($_SESSION['petfinder-admin'])) $id = $_SESSION['petfinder-admin']['id'];
else {
  $id = null;
  header('Location: ./index.php');
}
?>
<div id="adocao" class="container pt-3 pb-5">
  <div class="row">
    <?php
    require('./database/Pet.class.php');
    $pet = new Pet();
    $pet->connectInFrontEnd();
    $pet->selectWhereInFrontEnd('user_id', $id);
    if ($pet->stmt->rowCount()) :
    ?>
      <?php $data = $pet->stmt->fetchAll();
      foreach ($data as $p) : ?>
        <div class="card mb-3 w-100">
          <div class="row p-2">
            <div class="col-md-4 col-sm-12 d-flex justify-content-center pt-3">
              <div class="adocaoImg rounded-circle d-flex justify-content-center align-items-center">
                <?php
                if ($p['pet_image'] == "n/a") {
                  echo '<img src="./img/petfinderImgError.png" class="w-100" alt="Imagem Pet">';
                } else {
                  echo '<img id="petImg' . $p['pet_id'] . '" class="resize" src="' . $p['pet_image'] . '" onerror="this.onerror=null;this.src=\'./img/petfinderImgError.png\';" onload="resizeIMG(\'petImg' . $p['pet_id'] . '\')" alt="Imagem Pet">';
                }
                ?>
              </div>
            </div>
            <div class="col-md-8 col-sm-12">
              <div class="card-body">
                <h5 class="card-title m-0"><?php echo $p['pet_name'] ?></h5>
                <p class="card-text m-0"><small class="text-muted">Tipo: <?php echo $p['type_name'] ?></small></p>
                <div id="petDescricao">
                  <p class="card-text m-0"><?php echo $p['description'] ?></p>
                </div>
                <div class="d-flex justify-content-end align-self-stretch">
                  <form action="index.php?s=DetalhePet" method="post" onsubmit="">
                    <input type="hidden" name="pet_id" value="<?php echo $p['pet_id'] ?>">
                    <button type="submit" class="btn d-flex"><i class="fa fa-plus py-1" aria-hidden="true"></i></button>
                  </form>
                  <form action="./database/delete.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $p['pet_id'] ?>">
                    <input type="hidden" name="pet" value="">
                    <button class="btn d-flex ml-1" type="submit" onClick="return confirm('Tem certeza que quer deletar esse pet?')"><i class="fa fa-trash py-1" aria-hidden="true"></i></button>
                  </form>
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
        <h3>Nenhum pet cadastrado!</h3>
      </div>
    <?php endif ?>
  </div>
</div>