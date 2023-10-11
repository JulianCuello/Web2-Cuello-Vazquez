<?php

class CategoryModel{
    
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=repuestos;charset=utf8', 'root', '');
    }


    public function getCategoria(){
        $query = $this->db->prepare('SELECT * FROM `categoria`');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);       
    }

    public function getItemsCategoriaById($id){
        $query = $this->db->prepare('SELECT repuestos.*, categoria.categoria FROM repuestos JOIN categoria ON repuestos.idCategoria = categoria.idCategoria WHERE repuestos.idCategoria=?');
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function insertCategory($categoria, $material, $origen, $motor, $imagenCategoria){
        $query = $this->db->prepare('INSERT INTO categoria (categoria, material, origen, motor, imagenCategoria) VALUES(?,?,?,?,?)');
        $query->execute([$categoria, $material, $origen, $motor, $imagenCategoria]);
        return $this->db->lastInsertId();
    }

    public function deleteCategory($id){
        $query = $this->db->prepare('DELETE FROM categoria WHERE idCategoria = ?');
        $query->execute([$id]);
        return $query->rowCount();
    }

    public function updateItem($idCategoria, $material, $origen, $motor, $imagenCategoria){
        $query = $this->db->prepare('UPDATE categoria SET material=?,origen=?,motor=?,imagenCategoria=? WHERE idCategoria=?');
        $query->execute([$material, $origen, $motor, $imagenCategoria, $idCategoria]);
        return $query->rowCount();
    }

    function getIdCategory(){ //consulta por la lista, incluida la categoria a la que corresponden
        $query = $this->db->prepare('SELECT categoria.idCategoria,categoria.categoria FROM categoria;');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}
