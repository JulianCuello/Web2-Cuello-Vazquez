<?php

class CategoryModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=repuestos;charset=utf8', 'root', '');
    }


    function getCategoria(){
        $query = $this->db->prepare('SELECT * FROM `categoria`');
            $query->execute();

            // $tasks es un arreglo de repuestos
            $categorias = $query->fetchAll(PDO::FETCH_OBJ);

            return $categorias;   
    }

    function getItemsCategoriaById($id){
        $query = $this->db->prepare('SELECT repuestos.*, categoria.categoria FROM repuestos JOIN categoria ON repuestos.idCategoria = categoria.idCategoria WHERE repuestos.idCategoria=?');
            $query->execute([$id]);

            $categoria = $query->fetchAll(PDO::FETCH_OBJ);

            return $categoria;
    }

     /**
     * Inserta la tarea en la base de datos
     */
    function insertCategory($categoria, $material, $origen, $motor, $imagenCategoria) {
        $query = $this->db->prepare('INSERT INTO categoria (categoria, material, origen, motor, imagenCategoria) VALUES(?,?,?,?,?)');
        $query->execute([$categoria, $material, $origen, $motor, $imagenCategoria]);

        return $this->db->lastInsertId();
    }

function deleteCategory($id) {
    $query = $this->db->prepare('DELETE FROM categoria WHERE idCategoria = ?');
    $query->execute([$id]);
    
}

function updateItem($idCategoria,$material,$origen,$motor,$imagenCategoria) {   
    $query = $this->db->prepare('UPDATE categoria SET material=?,origen=?,motor=?,imagenCategoria=? WHERE idCategoria=?');
    $query->execute([$material,$origen,$motor,$imagenCategoria,$idCategoria]);
    //aca hay que preguntar como devuelvo un id valido.
}
}

