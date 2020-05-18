<!doctype html>
<html lang="es">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


  <link rel="stylesheet" href="<?php write(RUTA_URL) ?>public/css/style.css">
  <title><?php write( NOMBRE_SITIO ); ?></title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark  fixed-top">
    <a class="navbar-brand" href="#"><?php write(NOMBRE_SITIO) ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo RUTA_URL ?>pages/index">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo RUTA_URL ?>pages/contacto">Contacto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo RUTA_URL ?>pages/">Pricing</a>
        </li>
      </ul>
    </div>
  </nav>
