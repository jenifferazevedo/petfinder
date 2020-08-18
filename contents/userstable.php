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
              <button class="btn btn-icon d-flex"><i class="fa fa-plus" aria-hidden="true"></i></button>
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
    </div>
  </div>
</div>