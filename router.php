<?php
require_once './app/controllers/list.controller.php';
require_once './app/controllers/about.controller.php';
require_once './app/controllers/category.controller.php';
require_once './templates/form_alta.phtml';
require_once './templates/form_update.phtml';
require_once './templates/form_alta.Category.phtml';
require_once './templates/form_update.Category.phtml';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'list'; // accion por defecto
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

// listar productos    ->        ShowListController->showList();  //todos los Productos + categorias solo lo ve el usuario
// listar producto/:Id ->        ShowListController->showListById();//solo el producto seleccionado.
// listar categorias  ->         ShowCategoryController->showCategory();//todas las categorias
// listar categoria/:Id ->       ShowCategoryController->showCategoryByid();//sola la categoria seleccionada.
// listar productosAdmin->       ShowListController->showAdminList();//todos los productos + solo los ve el administrador
// agregar productos ->          ShowListControler->addItem();//agrega item.
// removeItem/:Id ->             ShowListController->removeItem($id);//elimina item.
// MostrarFormAlta->             showForm();//formulario para agregar item.

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
        //gestion de items
    case 'listAdmin':
        $controller = new ListController();
        $controller->showAdminList();
        break;
        case 'form':
            showForm();
            break;
        case 'updateItem':
            showFormUpdate($params[1]);
            break;
        case 'update':
            $controller= new ListController();
            $controller->showUpdate();
            break;
        case 'addItem':
            $controller = new ListController();
            $controller->addItem();
            break;
        case 'removeItem':
            $controller = new ListController();
            $controller->removeItem($params[1]);
            break;
        
        
            //gestion de categorias
        case 'categoryAdmin':
            $controller = new categoryController();
            $controller->showCategoryAdmin();
            break;
        case 'formCategory':
            showFormCategory();
            break;
        case 'addCategory':
            $controller = new categoryController();
            $controller->addCategory();
            break;
        case 'formCategoryUpdate':
            showFormCategoryUpdate($params[1]);
            break;
        case 'updateCategory':
            $controller= new categoryController();
            $controller->showCategoryUpdate();
            break;
        
        case 'removeCategory':
            $controller = new categoryController();
            $controller->removeCategory($params[1]);
            break;
    case 'about':
        $controller = new AboutController();
        $controller->showAbout();
        break;
    default: 
        echo "404 Page Not Found";
        break;
}
