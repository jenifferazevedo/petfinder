<div id="home" class="container pb-5">
  <div class="row fadingScroll no-gutters">
    <div class="col-xl-12 parallax1 d-flex justify-content-center align-items-center">
      <div class="banner">
        <?php if(isset($_SESSION['petfinder-user']) && is_array($_SESSION['petfinder-user'])): ?>
          <h3>Bem vindo, <?php echo $_SESSION['petfinder-user']['name'] ?>!</h3>
        <?php elseif(isset($_SESSION['petfinder-admin']) && is_array($_SESSION['petfinder-admin'])): ?>
          <h3>Bem vindo! <?php echo $_SESSION['petfinder-admin']['name'] ?></h3>
        <?php else: ?>
        <h3>O lar e família de um pet depende de você!</h3>
        <a href="index.php?p=Adocao"><button class="btn btn-success">Adote um pet</button></a>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <div class="row rightScroll no-gutters">
    <div class="col-xl-8 p-0">
      <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="./img/home-art2.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-block">
              <h5>7 cuidados com gata grávida</h5>
              <p>a gestação é um período delicado e demanda atenção. <a href="https://www.petz.com.br/blog/bem-estar/gatos-bem-estar/gata-gravida/" target="_blank">Veja mais</a></p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="./img/home-art1.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-block">
              <h5>Barulho que cachorro gosta</h5>
              <p>Quais são os sons favoritos dos pets? <a href="https://www.petz.com.br/blog/dicas/barulho-que-cachorro-gosta/" target="_blank">Veja mais</a></p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="./img/home-art3.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-block">
              <h5>8 dicas de como resgatar animais abandonados</h5>
              <p>Mantenha a sua segurança e, também, a do pet. <a href="https://www.petz.com.br/blog/pets/caes/animais-abandonados/" target="_blank">Veja mais</a></p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
    <div class="col-xl-4 p-5 d-flex justify-content-center align-items-center" style="background-color: #E8680C; color:white">
      <p class="text-center">A Associação Nacional de Médicos Veterinários dos Municípios (ANVETEM) alertou ontem
         para os números “absurdos” de animais recolhidos das ruas em Portugal pelos centros de recolha oficiais 
         (CRO), valor que atingiu cerca de 41 mil animais em 2017 e 36 mil em 2018, disse à agência Lusa Ricardo 
         Lobo, membro da direção da ANVETEM. 
         <a href="https://www.veterinaria-atual.pt/na-clinica/numero-de-animais-abandonados-em-portugal-e-absurdo-diz-anvetem/" target="_blank">
         Leia mais...
        </a>
      </p>
    </div>
  </div>
  <div class="row leftScroll no-gutters">
    <div class="col-xl-4 p-5 d-flex justify-content-center align-items-center" style="color:#E8680C">
      <p>Nos últimos anos, os animais têm vindo a ser reconhecidos como membros das nossas famílias. A substituição 
        do termo animal de estimação para animal de companhia reflete, exatamente, a importância crescente das 
        relações de segurança, proteção e amor incondicional desenvolvidas com os animais, as quais podem transcender 
        uma relação humana.
        <a href="https://lifestyle.sapo.pt/familia/pais-e-filhos/artigos/os-beneficios-de-adotar-um-animal-de-companhia" target="_blank">
         Leia mais...
        </a>
      </p>
    </div>
    <div class="col-xl-8 p-0">
    <iframe class="w-100" height="415" src="https://www.youtube.com/embed/RavOVXsWZvg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
  </div>
</div>