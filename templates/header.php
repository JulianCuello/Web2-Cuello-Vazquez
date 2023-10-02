<!DOCTYPE html>
<html lang="en">

<!-- head -->
<head>
    <meta charset="UTF-8">
    <base href="<?php echo BASE_URL; ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>TUDAI -Trabajo WEB</title>
</head>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="list">
    <img src="./img/logo.png" alt="logo" width= "150px">
   </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="list">Listado <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="category">Categorias</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="form">Agregar items</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="listAdmin">Gestion items</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="form">Agregar categorias</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="categoryAdmin">Gestion categorias</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="category" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          SeleccionarCategoria
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="categoryId/1">Motor</a>
          <a class="dropdown-item" href="#">Chevrolet</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Renault</a>
        </div>
      </li>
    </ul>

  </div>
</nav>