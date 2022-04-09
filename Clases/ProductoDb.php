<?php

class ProductoDb
{
    static public function Insercion(Producto $p,Db $db){

        $c=$db->getConexion();
        $sql="insert into productos(nombre,precio,stock,imagen) values(:nombre,:precio,:stock,:imagen)";
        $sentencia = $c->prepare($sql);
        $sentencia->bindValue(':nombre',$p->getNombre());
        $sentencia->bindValue(':precio',$p->getPrecio());
        $sentencia->bindValue(':stock',$p->getStock());
        $sentencia->bindValue(':imagen',$p->getImagen());
       
        return $sentencia->execute();
    }

    static public function Listado(Db $db){

        
        $c = $db->getConexion();
        $sql = "select * from productos";
        $sentencia = $c->prepare($sql);
        $sentencia->execute();
        $sentencia->setfetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Producto',array(null,null,null,null));
        return $sentencia->fetchAll();


    }
    static public function BuscarPorId(Db $db,$id){

        
        $c = $db->getConexion();
        $sql = "select * from productos where idProducto=:idProducto";
        $sentencia->bindValue(':idProducto',$id);
        $sentencia = $c->prepare($sql);
        $sentencia->execute();
        $sentencia->setfetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Producto',array(null,null,null,null));
        return $sentencia->fetch();


    }

    
}


?>