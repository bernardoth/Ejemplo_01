<?php

class ProductoDb
{
    static public function insercion(Producto $p,Db $db){

        $c=$db->getConexion();
        $sql="insert into productos(nombre,precio,stock,imagen) values(:nombre,:precio,:stock,:imagen)";
        $sentencia = $c->prepare($sql);
        $sentencia->bindValue(':nombre',$p->getNombre());
        $sentencia->bindValue(':precio',$p->getPrecio());
        $sentencia->bindValue(':stock',$p->getStock());
        $sentencia->bindValue(':imagen',$p->getImagen());
       
        return $sentencia->execute();
    }

    static public function listado(Db $db){

        
        $c = $db->getConexion();
        $sql = "select * from productos";
        $sentencia = $c->prepare($sql);
        $sentencia->execute();
        $sentencia->setfetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Producto',array(null,null,null,null));
        return $sentencia->fetchAll();


    }
    static public function buscarPorId(Db $db,$id){

        
        $c = $db->getConexion();
        $sql = "select * from productos where idProducto=:idProducto";
        $sentencia = $c->prepare($sql);
        $sentencia->bindValue(':idProducto',$id);
        $sentencia->execute();
        $sentencia->setfetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Producto',array(null,null,null,null));
        return $sentencia->fetch();


    }
    static public function modificacion(Producto $p,Db $db){

        $c=$db->getConexion();
        $sql="update productos set nombre=:nombre,precio=:precio,stock=:stock,imagen=:imagen where idProducto=:idProducto";
        $sentencia = $c->prepare($sql);
        $sentencia->bindValue(':nombre',$p->getNombre());
        $sentencia->bindValue(':precio',$p->getPrecio());
        $sentencia->bindValue(':stock',$p->getStock());
        $sentencia->bindValue(':imagen',$p->getImagen());
        $sentencia->bindValue(':idProducto',$p->getIdProducto());

        return $sentencia->execute();
    }
    static public function eliminar(Db $db,$id){
        $c = $db->getConexion();
        $sql = "delete from productos where idProducto=:idProducto";
        $sentencia = $c->prepare($sql);
        $sentencia->bindValue(':idProducto',$id);
        return $sentencia->execute();
    }


    
}


?>