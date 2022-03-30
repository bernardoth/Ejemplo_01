<?php 

require_once('autoload.php');
$listaProd=ProductoDb::Listado(new Mysql());
//var_dump($listaProd);
?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Mi Pagina</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
        <a class="navbar-brand" href="#"><i class="bi bi-house-door-fill"></i>Titan</a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
          <ul class="navbar-nav me-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="visually-hidden">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Opciones</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mi CRUD</a>
              <div class="dropdown-menu" aria-labelledby="dropdownId">
                <a class="dropdown-item" href="formInsercion.html">Insertar Producto</a>
                <a class="dropdown-item" href="#">Listar Producto</a>
              </div>
            </li>
          </ul>
          <form class="d-flex my-2 my-lg-0">
            <input class="form-control me-sm-2" type="text" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form> 
        </div>
      </div>
    </nav>
    <main class="container mt-5">
        <div class="row">
            <div class="col">
                <h1>Catalogo de producto</h1>
                <hr>
            </div>
        </div>
        <div class="row mt5">
            <?php
              foreach ($listaProd as $x) {?>
                <div class="col md-3">
                  <div class="card" >
                  <img class="card-img-top" src="<?=$x->getImagen()?>" alt="Card image cap">
                  <div class="card-body">
                  <h5 class="card-title"><?=$x->getNombre()?></h5>
                  <p class="card-text">Stock : <?=$x->getStock()?></p>
                  <p class="card-text">Precio : <?=$x->getPrecio()?></p>
                                    
                  <a href="#" class="btn btn-primary">Comprar</a>
                  </div>
                  </div>
                  
                  
                </div>
              <?php }  ?>
        </div>

    </main>
    

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>