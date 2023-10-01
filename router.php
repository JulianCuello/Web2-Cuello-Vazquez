<?php
require_once './app/controllers/list.controller.php';
require_once './app/controllers/about.controller.php';
require_once './app/controllers/category.controller.php';
require_once './templates/form_alta.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'list'; // accion por defecto
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

// listar productos    ->        ShowListController->showList();  //todos los Productos + categorias solo lo ve el usuario
// listar producto/:Id ->        ShowListController->showListById();//solo el producto seleccionado.
// listar categorias  ->         ShowCategoryController->showCategory();//todas las categorias
// listar categoria/:Id ->       ShowCategoryController->showCategoryByid();//sola la categoria seleccionada.
// agregar   ->                  ShowListControler->addItem();//agrega item.
// eliminar/:ID  ->     taskController->removeTask($id); 
// finalizar/:ID  ->    taskController->finishTask($id);
// about ->             aboutController->showAbout();

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
    case 'list':
        $controller = new ListController();
        $controller->showList();
        break;
    case 'listId':
        $controller = new ListController();
        $controller->showListById($params[1]);
        break;
    case 'category':
        $controller = new CategoryController();
        $controller->showCategory();
        break;
    case 'categoryId':
        $controller = new CategoryController();
        $controller->showCategoryById($params[1]);
        break;
    case 'form':
        showForm();
        break;
    case 'add':
        $controller = new ListController();
        $controller->addItem();
        break;
    case 'eliminar':
        $controller = new ListController();
        $controller->removeTask($params[1]);
        break;
    case 'finalizar':
        $controller = new ListController();
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
