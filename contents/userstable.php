<div id="usertable" class="container pb-5">
  <div class="row">
    <div class="col-12">
      <div class="mt-3 text-right">
        <a href="./index.php?pg=Cadastro"><button class="btn btn-icon">ADD USER</button></a>
      </div>
      <table class="table table-bordered mt-3">
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
          include('./database/User.php');
          $users = new User();
          $users->selectAllInFrontEnd('users');
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
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>