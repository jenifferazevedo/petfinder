<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <a class="navbar-brand" href="#"><img src="./img/petfinder_logo.svg" alt="Logo Petfinder"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <?php
  if (isset($_SESSION['petfinder-user'])): ?>
    <?php include('./navs/nav_user.php')?>   
  <?php elseif(isset($_SESSION['petfinder-admin'])): ?>
    <?php include('./navs/nav_admin.php')?>   
  <?php else: ?>
    <?php include('./navs/nav_basic.php')?>   
  <?php endif; ?>
</nav>