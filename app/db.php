<?php

function getConection() {

    return new PDO('mysql:host=localhost;dbname=repuestos;charset=utf8', 'root', '');
}

/**
 * Obtiene y devuelve de la base de datos todas las productos.
 */
function getTasks() {
    $db_web = getConection();

    $query = $db_web->prepare('SELECT * FROM repuestos');
    $query->execute();

    // $tasks es un arreglo de tareas
    $tasks = $query->fetchAll(PDO::FETCH_OBJ);

    return $tasks;
}
/**
 * Inserta la tarea en la base de datos
 */
function insertTask($idProducto, $idCodigoProducto, $nombreProducto, $precio, $marca, $idCategoria) {
    $db = getConection();

    $query = $db->prepare('INSERT INTO repuestos (idProducto, idCodigoProducto, nombreProducto, precio, marca idCategoria) VALUES(?,?,?,?,?,?)');
    $query->execute([$idProducto, $idCodigoProducto, $nombreProducto, $precio, $marca, $idCategoria]);

    return $db->lastInsertId();
}

function deleteTask($id) {
    $db = getConection();

    $query = $db->prepare('DELETE FROM repuestos WHERE id = ?');
    $query->execute([$id]);
}

function updateTask($id) {
    $db = getConection();
    
    $query = $db->prepare('UPDATE repuestos SET finalizada = 1 WHERE id = ?');
    $query->execute([$id]);
}
