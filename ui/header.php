<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/style.css">
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
<div>
  <?php include("nav.php")?>
</div>