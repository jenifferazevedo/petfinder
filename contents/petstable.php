<div id="petstable" class="container pb-5">
  <div class="row">
    <div class="col-12">
      <div class="mt-3 text-right">
        <a href="./index.php?pg=CadastroPet"><button class="btn btn-icon">ADD PET</button></a>
      </div>
      <form action="./index.php?pg=TablePet" method="post" class="mt-3">
        <div class="input-group">
          <select class="custom-select" id="inputGroupSelect04" style="flex:0.1;min-width:120px;" name="search">
            <option value="pet_id" selected>ID</option>
            <option value="name">Name</option>
            <option value="city">Cidade</option>
            <option value="user_id">User_id</option>
            <option value="status">Status</option>
            <option value="pet_type">Tipo</option>
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
      <table class="table table-bordered mt-3">
        <?php
        include('./database/Pet.class.php');
        $pet = new Pet();
        $pet->connectInFrontEnd();
        if (isset($_POST['search'], $_POST['searchText'], $_POST['order'])) {
          $pet->filterUser($_POST['search'], $_POST['searchText'], $_POST['order']);
        } else {
          $pet->selectAllInFrontEnd();
        }
        if ($pet->stmt->rowCount()) : ?>
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">NOME</th>
              <th scope="col">USER_ID</th>
              <th scope="col">STATUS</th>
              <th scope="col">TIPO</th>
              <th scope="col">SEXO</th>
              <th scope="col">CREATE_AT</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $data = $pet->stmt->fetchAll();
            foreach ($data as $row) : ?>
              <tr>
                <th scope="row"><?php echo $row['pet_id'] ?></th>
                <td><?php echo $row['pet_name'] ?></td>
                <td><?php echo $row['user_id'] ?></td>
                <td><?php echo $row['status'] ?></td>
                <td><?php echo $row['pet_type'] ?></td>
                <td><?php echo $row['sexo'] == 'f' ? 'Fêmea - f' : 'Macho - m' ?></td>
                <td><?php echo $row['create_at'] ?></td>
                <td>
                  <div class="d-flex justify-content-center">
                    <form action="index.php?pg=DetalhePet" method="post" onsubmit="">
                      <input type="hidden" name="pet_id" value="<?php echo $row['pet_id'] ?>">
                      <button type="submit" class="btn d-flex" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    </form>
                    <form action="./database/delete.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $row['pet_id'] ?>">
                      <input type="hidden" name="pet" value="">
                      <button class="btn d-flex ml-1" type="submit" onClick="return confirm('Tem certeza que quer deletar esse pet?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </form>
                  </div>
                </td>
              </tr>
            <?php
            endforeach;
          else :
            ?>
            <div class="text-center pt-4">
              <h3>Não foi encontrado nenhum resultado</h3>
            </div>
          <?php endif ?>
          </tbody>
      </table>
    </div>
  </div>
</div>