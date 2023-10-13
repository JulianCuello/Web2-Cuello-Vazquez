<?php
require_once './app/models/model.php';

class ListModel extends Model{


    function getList(){ 
        $query = $this->db->prepare('SELECT repuestos.*, categoria.categoria FROM repuestos JOIN categoria ON repuestos.idCategoria = categoria.idCategoria;');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getListById($id){ //consulta por el item segun parametro incluida la categoria
        $query = $this->db->prepare('SELECT * FROM `repuestos` JOIN categoria ON repuestos.idCategoria=categoria.idCategoria WHERE idProducto = ?');
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getItemsCategoryById($id){
        $query = $this->db->prepare('SELECT repuestos.*, categoria.categoria FROM repuestos JOIN categoria ON repuestos.idCategoria = categoria.idCategoria WHERE repuestos.idCategoria=?');
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
        //var_dump($algo);
        //die();
        return $query;
    }

    function deleteItem($id){
        $query = $this->db->prepare('DELETE FROM repuestos WHERE idProducto = ?');
        $query->execute([$id]);
        return $query->rowCount();
    }

    function insertItem($idCodigoProducto, $nombreProducto, $precio, $marca, $imagenProducto, $idCategoria){
        $query = $this->db->prepare('INSERT INTO repuestos (idCodigoProducto, nombreProducto, precio, marca, imagenProducto, idCategoria) VALUES(?,?,?,?,?,?)');
        $query->execute([$idCodigoProducto, $nombreProducto, $precio, $marca, $imagenProducto, $idCategoria]);
        return $this->db->lastInsertId();
    }

    function updateItem($idProducto, $idCodigoProducto, $nombreProducto, $precio, $marca, $imagenProducto, $idCategoria){
        $query = $this->db->prepare('UPDATE repuestos SET idCodigoProducto=?,nombreProducto=?,precio=?,marca=?,imagenProducto=?,idCategoria=? WHERE idProducto=?');
        $query->execute([$idCodigoProducto, $nombreProducto, $precio, $marca, $imagenProducto, $idCategoria, $idProducto]);
        return $query->rowCount();
    }

}
