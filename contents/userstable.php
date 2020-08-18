<div id="usertable" class="container">
  <div class="row">
    <div class="col-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">NOME</th>
            <th scope="col">EMAIL</th>
            <th scope="col">SENHA</th>
            <th scope="col">CONTACTO</th>
            <th scope="col">MORADA</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td style="word-break: break-all;">Mark</td>
            <td style="word-break: break-all;">Otto</td>
            <td style="word-break: break-all;">@mdosidahsduhas</td>
            <td>@mdo</td>
            <td style="word-break: break-all;">lkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk</td>
            <td class="d-flex justify-content-center " style="border: 0;">
              <button type="button" class="btn btn-icon d-flex" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus" aria-hidden="true"></i></button>
              <form action="index.php?p=Admin&pg=ChangeUser" method="post">
                <input type="hidden" name="id" value="id">
                <button class="btn d-flex mx-1" type="submit"><i class="fa fa-pencil" aria-hidden="true"></i></button>
              </form>
              <form action="delete" method="post">
                <input type="hidden" name="id" value="id">
                <button class="btn d-flex" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
              </form>
            </td>
          </tr>
        </tbody>
      </table>

      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">User</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h3>Nome: </h3>
              <h3>Email: </h3>
              <h3>Password: </h3>
              <h3>Image URL: </h3>
              <h3>Contacto: </h3>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>