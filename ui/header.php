<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/mystyle.css">
    <link rel="stylesheet" href="./css/animations.css">
    <title><?php 
      if(isset($_GET['p'])) {
        echo 'PETFINDER - '.$_GET['p'];
      } else {
        echo 'PETFINDER';
      };
    ?>
    </title>
</head>
<body>
  <header>
    <div id="header">
      <img src="./img/petfinder_logo_clara.svg" alt="Logo Petfinder">
    </div>
  </header>
  <?php include("nav.php")?>