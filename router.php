<?php
require_once './app/controllers/list.controller.php';
require_once './app/controllers/about.controller.php';
require_once './app/controllers/category.controller.php';
require_once './app/controllers/auth.controller.php';
require_once './app/controllers/show.controller.php';



define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'list'; // accion por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

/*
  tabla ruteo                controller                                          descripc                                    
| list                   -> |ListController    |showList()              |lista productos                       |
| listAdmin              -> |ListController    |showAdminList()         |lista productos                       |
| listId/:id             -> |ListController    |showListById(id)        |lista producto por id                 |
| listAdminId/:id        -> |ListController    |showListById(id)        |lista producto por id                 |
| removeItem/:id         -> |ListController    |removeItem(id)          |elimina registro de item              |
| updateItemForm/:id     -> |ListController    |showFormUpdate(id)      |redirige a formulario de modificacion |
| updateItem             -> |ListController    |showUpdate()            |envia formulario con modificacion     |
| addItemForm            -> |ListController    |showFormAlta()          |redirige a formulario alta producto   |
| addItem                -> |ListController    |addItem()               |envia formulario y crea nuevo producto|
|---------------------------|------------------|------------------------|--------------------------------------|
| category               -> |CategoryController|showCategory()          |lista categorias                      |
| categoryAdmin          -> |CategoryController|showCategory()          |lista categorias                      |
| categoryId/:id         -> |CategoryController|showCategoryById())     |lista categoria por id                |
| categoryIdAdmin/:id    -> |CategoryController|showCategoryById()      |lista categoria por id                |
| removeCategory/:id     -> |CategoryController|removeCategory()        |elimina registro de categoria         |
| updateCategoryForm/:id -> |CategoryController|showFormCategoryUpdate()|redirige a formulario de modificacion |
| updateCategory         -> |CategoryController|showCategoryUpdate()    |envia formulario con modificacion     |
| addCategoryForm        -> |CategoryController|showFormCategory()      |redirige a formulario alta categoria  |
| addCategory            -> |CategoryController|addCategory()           |envia formulario ,crea nueva categoria|
|---------------------------|------------------|------------------------|--------------------------------------|
| login                  -> |AuthController    |showLogin()             |                                      |
| logout                 -> |AuthController    |showLogout()            |                                      |
| about                  -> |AboutController   |showAbout();            |                                      |
*/
// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {

    case 'list':
        $controller = new ListController();
        $controller->showList();
        break;
    //case 'listAdmin':
    //    $controller = new ListController();
    //    $controller->showList();
        break;
    case 'listId':
        $controller = new ListController();
        $controller->showListById($params);
        break;
    case 'listAdminId':
        $controller = new ListController();
        $controller->showListById($params);
        break;
    case 'removeItem':
        $controller = new ListController();
        $controller->removeItem($params[1]);
        break;
    case 'updateItemForm':
        $controller = new ListController();
        $controller->showFormUpdate($params[1]);
        break;
    case 'updateItem':
        $controller = new ListController();
        $controller->showUpdate();
        break;
    case 'addItemForm':
        $controller = new ListController();
        $controller->showFormAlta();
        break;
    case 'addItem':
        $controller = new ListController();
        $controller->addItem();
        break;
    case 'category':
        $controller = new CategoryController();
        $controller->showCategory($params);
        break;
    case 'categoryAdmin':
        $controller = new categoryController();
        $controller->showCategory($params);
        break;
    case 'categoryId':
        $controller = new CategoryController();
        $controller->showCategoryById($params);
        break;
    case 'categoryIdAdmin':
        $controller = new CategoryController();
        $controller->showCategoryById($params);
        break;
    case 'removeCategory':
        $controller = new categoryController();
        $controller->removeCategory($params[1]);
        break;
    case 'updateCategoryForm':
        $controller = new CategoryController();
        $controller->showFormCategoryUpdate($params[1]);
        break;
    case 'updateCategory':
        $controller = new categoryController();
        $controller->showCategoryUpdate();
        break;
    case 'addCategoryForm':
        $controller = new categoryController();
        $controller->showFormCategory();
        break;
    case 'addCategory':
        $controller = new categoryController();
        $controller->addCategory();
        break;
    case 'login':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    case 'auth':
        $controller = new AuthController();
        $controller->auth();
        break;
    case 'about':
        $controller = new AboutController();
        $controller->showAbout();
        break;
    default:
        $controller = new showController();
        $controller->showError404("Page--Not--Found");
        break;
        
}
