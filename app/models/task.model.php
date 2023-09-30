<?php

class TaskModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=repuestos;charset=utf8', 'root', '');
    }

    /**
     * Obtiene y devuelve de la base de datos todas las tareas.
     */
    function getUserList() {
        $query = $this->db->prepare('SELECT * FROM `repuestos` JOIN categoria ON repuestos.idCategoria=categoria.idCategoria');
        $query->execute();

        // $tasks es un arreglo de repuestos
        $tasks = $query->fetchAll(PDO::FETCH_OBJ);

        return $tasks;
    }

    function getUserListById($id) {
        $query = $this->db->prepare('SELECT * FROM `repuestos` JOIN categoria ON repuestos.idCategoria=categoria.idCategoria WHERE idProducto = ?');
        $query->execute([$id]);

        // $tasks es un arreglo de repuestos
        $tasks = $query->fetchAll(PDO::FETCH_OBJ);

        return $tasks;
    }

    /**
     * Inserta la tarea en la base de datos
     */
    function insertTask($idProducto, $idCodigoProducto, $nombreProducto, $precio, $marca, $idCategoria) {
        $query = $this->db->prepare('INSERT INTO repuestos (idProducto, idCodigoProducto, nombreProducto, precio, marca, idCategoria) VALUES(?,?,?,?,?,?)');
        $query->execute([$idProducto, $idCodigoProducto, $nombreProducto, $precio, $marca, $idCategoria]);

        return $this->db->lastInsertId();
    }

    
function deleteTask($id) {
    $query = $this->db->prepare('DELETE FROM repuestos WHERE id = ?');
    $query->execute([$id]);
}

function updateTask($id) {    
    $query = $this->db->prepare('UPDATE repuestos SET finalizada = 1 WHERE id = ?');
    $query->execute([$id]);
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