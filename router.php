<?php
require_once './app/controllers/task.controller.php';
require_once './app/controllers/about.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'listar'; // accion por defecto
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

// listar    ->         ShowListController->showList();  //solo lo ve el usuario
// agregar   ->         taskController->addTask();
// eliminar/:ID  ->     taskController->removeTask($id); 
// finalizar/:ID  ->    taskController->finishTask($id);
// about ->             aboutController->showAbout();

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
    case 'listar':
        $controller = new TaskController();
        $controller->showList();
        break;
    case 'listarId':
        
        $controller = new TaskController();
        $controller->showListById($params[1]);
        break;
    case 'agregar':
        $controller = new TaskController();
        $controller->addTask();
        break;
    case 'eliminar':
        $controller = new TaskController();
        $controller->removeTask($params[1]);
        break;
    case 'finalizar':
        $controller = new TaskController();
        $controller->finishTask($params[1]);
        break;
    case 'about':
        $controller = new AboutController();
        $controller->showAbout();
        break;
    default: 
        echo "404 Page Not Found";
        break;
}
