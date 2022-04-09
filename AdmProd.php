<?php 

require_once('autoload.php');
$listaProd=ProductoDb::Listado(new Mysql());
//var_dump($_GET);
?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Admnistracion del Producto</title>
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
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Imagen</th>
                <th scope="col">Precio</th>
                <th scope="col">Stock</th>
                <th scope="col">Modificar</th>
                <th scope="col">Eliminar</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($listaProd as $x) {?>
              <tr>
                <td scope="row"><?=$x->getIdProducto()?></td>
                <td><?=$x->getNombre()?></td>
                <td>
                  <img src="<?=$x->getImagen()?>" alt="" class="img-fluid" width="64px" heigth="64px" >
                </td>
                <td><?=$x->getPrecio()?></td>
                <td><?=$x->getStock()?></td>
                <td>
                  <a name="" id="" class="btn btn-warning" href="formModProd.php?id=<?=$x->getIdProducto()?>" role="button">Modificar</a>
                </td>
                <td>
                  <form action="CrtlProducto.php" method="post">
                    <input type="hidden" name="idProducto" value="<?=$x->getIdProducto()?>">
                    <button type="button" class="btn btn-primary" name="btn" value="Eliminar">Eliminar</button>
                  </form>

                </td>
                
              </tr>

              <?php }  ?>
            </tbody>
          </table>
          
        
          
              
               
            
        </div>

    </main>
    

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>