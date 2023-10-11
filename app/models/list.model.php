<?php

class ListModel{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=repuestos;charset=utf8', 'root', '');
    }


    function getList(){ //consulta por la lista, incluida la categoria a la que corresponden
        $query = $this->db->prepare('SELECT repuestos.*, categoria.categoria FROM repuestos JOIN categoria ON repuestos.idCategoria = categoria.idCategoria;');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getListById($id){ //consulta por el item segun parametro incluida la categoria
        $query = $this->db->prepare('SELECT * FROM `repuestos` JOIN categoria ON repuestos.idCategoria=categoria.idCategoria WHERE idProducto = ?');
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getIdCategory(){ //consulta por la lista, incluida la categoria a la que corresponden
        $query = $this->db->prepare('SELECT categoria.idCategoria,categoria.categoria FROM categoria;');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
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

    function getCategoria(){
        $query = $this->db->prepare('SELECT * FROM `categoria`');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getCategoriaById($id){
        $query = $this->db->prepare('SELECT * FROM `repuestos` WHERE idCategoria = ?');
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}
