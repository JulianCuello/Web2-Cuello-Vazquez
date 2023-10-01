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

}