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
            
            if (ProductoDb::Insercion($prod,new Mysql())) {
            
                header('Location:formInsercion.html');

            }
            else {
                echo "Es todo amigos.";

            }
        }
        
        break;
    
    default:
        echo "no se sabe que contiene";
        break;
}

?>