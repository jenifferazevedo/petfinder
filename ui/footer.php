  <div id="footer" class="fixed-bottom d-flex align-items-center">
    <p class="m-0 pl-2">Desenvolvido por Equipa JJ
      <?php if (isset($_GET['p']) || isset($_GET['pg']) || isset($_GET['s']))
        echo '<a class="voltar" href="index.php"><i class="fa fa-chevron-left" aria-hidden="true"></i> Voltar à página inicial</a>'
      ?>
    </p>
    <a href="https://github.com/jenifferazevedo/petfinder"><i class="fa fa-github" aria-hidden="true"></i></a>
    <script src="./script/jquery-3.5.1.slim.min.js"></script>
    <script src="./script/popper.min.js"></script>
    <script src="./script/bootstrap.min.js"></script>
    <script src="./script/myscript.js"></script>
  </div>
  </body>
  <?php exit; ?>

  </html>