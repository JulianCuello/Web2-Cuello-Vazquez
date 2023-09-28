<?php

class TaskModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=repuestos;charset=utf8', 'root', '');
    }

    /**
     * Obtiene y devuelve de la base de datos todas las tareas.
     */
    function getTasks() {
        $query = $this->db->prepare('SELECT * FROM repuestos');
        $query->execute();

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
}