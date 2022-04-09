<?php 
 require_once('autoload.php');
 

echo "<br> archivo de envio <br>";
var_dump($_POST);
// echo "<br> archivo de imagen <br>";
  //var_dump($_FILES);
$op = $_POST['btn']; 
 //echo $op;
switch ($op) { 
    case 'Insertar':
        
        if(isset($_FILES['imagen']["name"]))
        {
        
            $nomImg = $_FILES['imagen']["name"];

            $dir = 'img/'.time().$nomImg;
            
            move_uploaded_file($_FILES['imagen']['tmp_name'],$dir);
            $prod = new Producto($_POST['nombre'],$dir,$_POST['precio'],$_POST['stock']);
            
            if (ProductoDb::insercion($prod,new Mysql())) {
            
                header('Location:formInsercion.html');

            }
            else {
                echo "Es todo amigos.";

            }
        }
        
        break;
    case 'Modificar':
            //var_dump($_POST);
            //var_dump($_FILES);
            if($_FILES['imagen']["name"]!=""){
                $nomImg = $_FILES['imagen']["name"];
                $dir = 'img/'.time().$nomImg;
                move_uploaded_file($_FILES['imagen']['tmp_name'],$dir);
                var_dump($_FILES);

            }
            else {
                $dir = $_POST["imagenActual"];
            }
            $prod = new Producto($_POST['nombre'],$dir,$_POST['precio'],$_POST['stock'],$_POST['idProducto']);
            
            if (ProductoDb::modificacion($prod,new Mysql())) {
            
                header('Location:AdmProd.php');

            }
            else {
                echo "Es todo amigos.";

            }
            break;
    case 'Eliminar':
        if (ProductoDb::eliminar(new Mysql(),$_POST['idProducto'])) {
            header('Location:AdmProd.php');

        }
        else {
            echo "Algo esta mal ";
        }
        break;
    
    default:
        echo "no se sabe que contiene";
        break;
}

?>