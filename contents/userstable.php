<div id="usertable" class="container pb-5">
  <div class="row">
    <div class="col-12">
      <div class="mt-3 text-right">
        <a href="./index.php?pg=Cadastro"><button class="btn btn-icon">ADD USER</button></a>
      </div>
      <form action="./index.php?pg=TableUser" method="post" class="mt-3">
        <div class="input-group">
          <select class="custom-select" id="inputGroupSelect04" style="flex:0.1;min-width:120px;" name="search">
            <option value="user_id" selected>ID</option>
            <option value="name">Name</option>
            <option value="email">Email</option>
            <option value="city">Cidade</option>
            <option value="contact">Contacto</option>
            <option value="tipo">Tipo</option>
            <option value="status">Status</option>
            <option value="create_at">Create_at</option>
            <option value="update_at">Update_at</option>
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
        include('./database/User.class.php');
        $users = new User();
        $users->connectInFrontEnd();
        if (isset($_POST['search'], $_POST['searchText'], $_POST['order'])) {
          $users->filterUser($_POST['search'], $_POST['searchText'], $_POST['order']);
        } else {
          $users->selectAllInFrontEnd();
        }
        if ($users->stmt->rowCount()) : ?>
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">NOME</th>
              <th scope="col">EMAIL</th>
              <th scope="col">CONTACTO</th>
              <th scope="col">CIDADE</th>
              <th scope="col">TIPO</th>
              <th scope="col">STATUS</th>
              <th scope="col">CREATE_AT</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $data = $users->stmt->fetchAll();
            foreach ($data as $row) : ?>
              <tr>
                <th scope="row"><?php echo $row['user_id'] ?></th>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['contact'] ?></td>
                <td><?php echo $row['city'] ?></td>
                <td><?php echo $row['tipo'] == 1 ? 'admin' : 'user' ?></td>
                <td><?php echo $row['status'] ?></td>
                <td><?php echo $row['create_at'] ?></td>
                <td>
                  <div class="d-flex justify-content-center">
                    <form action="index.php?pg=Detalhes" method="post" onsubmit="">
                      <input type="hidden" name="user_id" value="<?php echo $row['user_id'] ?>">
                      <button type="submit" class="btn d-flex" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    </form>
                    <form action="./database/delete.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $row['user_id'] ?>">
                      <input type="hidden" name="user" value="">
                      <?php if ($row['user_id'] == $_SESSION['petfinder-admin']['id']) {
                        echo '<button class="btn d-flex ml-1" type="submit" onClick="return confirm(\'Tem certeza que quer deletar a própria conta?\')"><i class="fa fa-trash" aria-hidden="true"></i></button>';
                      } else {
                        echo '<button class="btn d-flex ml-1" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>';
                      } ?>
                    </form>
                  </div>
                </td>
              </tr>
            <?php
            endforeach;
          else :
            ?>
            <h3>Não foi encontrado nenhum resultado</h3>
          <?php endif ?>
          </tbody>
      </table>
    </div>
  </div>
</div>