<?php

class ListModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=repuestos;charset=utf8', 'root', '');
    }

    
    function getList() {//consulta por la lista, incluida la categoria a la que corresponden
        $query = $this->db->prepare('SELECT repuestos.*, categoria.categoria FROM repuestos JOIN categoria ON repuestos.idCategoria = categoria.idCategoria;');
        $query->execute();

        $list = $query->fetchAll(PDO::FETCH_OBJ);

        return $list;
    }

    function getListById($id) {//consulta por el item segun parametro incluida la categoria
        $query = $this->db->prepare('SELECT * FROM `repuestos` JOIN categoria ON repuestos.idCategoria=categoria.idCategoria WHERE idProducto = ?');
        $query->execute([$id]);

        $item = $query->fetchAll(PDO::FETCH_OBJ);

        return $item;
    }

    /**
     * Inserta la tarea en la base de datos
     */
    function insertItem($idCodigoProducto, $nombreProducto, $precio, $marca, $imagenProducto, $idCategoria) {
        $query = $this->db->prepare('INSERT INTO repuestos (idCodigoProducto, nombreProducto, precio, marca, imagenProducto, idCategoria) VALUES(?,?,?,?,?,?)');
        $query->execute([$idCodigoProducto, $nombreProducto, $precio, $marca, $imagenProducto, $idCategoria]);

        return $this->db->lastInsertId();
    }

    
function deleteItem($id) {
    $query = $this->db->prepare('DELETE FROM repuestos WHERE idProducto = ?');
    $query->execute([$id]);
}

function updateItem($idProducto,$idCodigoProducto, $nombreProducto, $precio, $marca,$imagenProducto, $idCategoria) {    
    $query = $this->db->prepare(UPDATE `repuestos` SET `idProducto`='[value-1]',`idCodigoProducto`='[value-2]',`nombreProducto`='[value-3]',`precio`='[value-4]',`marca`='[value-5]',`imagenProducto`='[value-6]',`idCategoria`='[value-7]' WHERE 1);
    $query->execute([$idProducto,$idCodigoProducto, $nombreProducto, $precio, $marca,$imagenProducto, $idCategoria]);
}

function getCategoria(){
    $query = $this->db->prepare('SELECT * FROM `categoria`');
        $query->execute();

        // $tasks es un arreglo de repuestos
        $categorias = $query->fetchAll(PDO::FETCH_OBJ);

        return $categorias;   
}

function getCategoriaById($id){
    $query = $this->db->prepare('SELECT * FROM `repuestos` WHERE idCategoria = ?');
        $query->execute([$id]);

        // $tasks es un arreglo de repuestos
        $categoria = $query->fetchAll(PDO::FETCH_OBJ);

        return $categoria;   
}

}