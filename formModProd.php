<?php 

require_once('autoload.php');
$prod = ProductoDb::buscarPorId(new Mysql(),$_GET["id"]);
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
                <a class="dropdown-item" href="listarProductos.php">Listar Producto</a>
                <a class="dropdown-item" href="AdmProd.php">Adminitrar Productos</a>
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
                <h1>Formulario de modificacion de producto</h1>
                <hr>
            </div>
        </div>
        <div class="row mt5">
            <div class="col">
                <form action="CtrlProducto.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="<?=$prod->getNombre()?>" aria-describedby="AyudaNombre">
                        <div id="AyudaNombre"  class="for-text">Ingrese Nombre</div>
                    </div>

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Precio</label>
                        <input type="number" class="form-control" name="precio" id="precio" value="<?=$prod->getPrecio()?>" aria-describedby="AyudaPrecio">
                        <div id="AyudaPrecio"  class="for-text">Ingrese Precio</div>
                    </div>

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Stock</label>
                        <input type="number" class="form-control" name="stock" id="stock" value="<?=$prod->getStock()?>" aria-describedby="AyudaStock">
                        <div id="AyudaStock"  class="for-text">Ingrese Stock</div>
                    </div>

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Seleccione una imagen</label>
                        <input type="file" class="form-control" name="imagen"  ><br>
                        <img src="<?=$prod->getImagen()?>" alt="" width="60px heigth="60px">
                        
                        <input type="hidden" name="imagenActual" value="<?=$prod->getImagen()?>">
                        <input type="hidden" name="idProducto" value = "<?=$prod->getIdProducto()?>">
                    </div>
                    

                    <button type="submit" class="btn btn-primary" value="Modificar" name="btn">Guardar</button>

                </form>
            </div>
        </div>

    </main>
    

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>