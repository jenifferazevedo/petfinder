<div id="usertable" class="container">
  <div class="row">
    <div class="col-12">
      <table class="table table-bordered mt-4">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">NOME</th>
            <th scope="col">EMAIL</th>
            <th scope="col">CONTACTO</th>
            <th scope="col">CIDADE</th>
            <th scope="col">TIPO</th>
            <th scope="col">STATUS</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php 
           include('./database/bdInclude.php');
           $stmt = $conn->prepare("SELECT * FROM users");
           $stmt->execute(); 
           $data = $stmt->fetchAll();
           // and somewhere later:
           foreach ($data as $row):?>
            <tr>
              <th scope="row"><?php echo $row['user_id']?></th>
              <td style="word-break: break-all;"><?php echo $row['name']?></td>
              <td style="word-break: break-all;"><?php echo $row['email']?></td>
              <td style="word-break: break-all;"><?php echo $row['contact']?></td>
              <td style="word-break: break-all;"><?php echo $row['city']?></td>
              <td style="word-break: break-all;"><?php echo $row['tipo']==1 ? 'admin' : 'user'?></td>
              <td style="word-break: break-all;"><?php echo $row['status']?></td>
              <td>
                <div class="d-flex justify-content-center">
                  <form action="index.php?pg=Detalhes" method="post" onsubmit="">
                    <input type="hidden" name="user_id" value="<?php echo $row['user_id']?>">
                    <button type="submit" class="btn d-flex" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus" aria-hidden="true"></i></button>
                  </form>
                  <form action="delete" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['user_id']?>">
                    <button class="btn d-flex ml-1" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                  </form>
                </div>
              </td>
            </tr>
           
           <?php 
           endforeach;
           include('./database/bdoff.php');
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>