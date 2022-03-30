<?php 
 require_once('Db.php');

 class Mysql implements Db {
     const HOST = 'localhost';
     const DBNAME = 'productos';
     const USER = 'root';
     const PASS = '';

     public function getConexion(){
         try {

             $conn = new PDO("mysql:host=". self::HOST.";dbname=".self::DBNAME,self::USER,self::PASS);

             $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
         } catch (Exception $th) {

             die("Error en la conexion".$th->getMessage());
         }

         return $conn;

     }
 }

 //$conexion=$obj->getConexion();
 //echo "Conexion existosa";
// $obj=new MariaDB();

?>