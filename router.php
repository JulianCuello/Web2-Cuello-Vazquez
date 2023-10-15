<?php
require_once './config.php';
require_once './app/controllers/list.controller.php';
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
| listId/:id             -> |ListController    |showListById(id)        |lista producto por id                 |
| removeItem/:id         -> |ListController    |removeItem(id)          |elimina registro de item              |
| updateItemForm/:id     -> |ListController    |showFormUpdate(id)      |redirige a formulario de modificacion |
| updateItem             -> |ListController    |showUpdate()            |envia formulario con modificacion     |
| addItemForm            -> |ListController    |showFormAlta()          |redirige a formulario alta producto   |
| addItem                -> |ListController    |addItem()               |envia formulario y crea nuevo producto|
|---------------------------|------------------|------------------------|--------------------------------------|
| category               -> |CategoryController|showCategory()          |lista categorias                      |
| categoryId/:id         -> |CategoryController|showCategoryById())     |lista categoria por id                |
| removeCategory/:id     -> |CategoryController|removeCategory()        |elimina registro de categoria         |
| updateCategoryForm/:id -> |CategoryController|showFormCategoryUpdate()|redirige a formulario de modificacion |
| updateCategory         -> |CategoryController|showCategoryUpdate()    |envia formulario con modificacion     |
| addCategoryForm        -> |CategoryController|showFormCategory()      |redirige a formulario alta categoria  |
| addCategory            -> |CategoryController|addCategory()           |envia formulario ,crea nueva categoria|
|---------------------------|------------------|------------------------|--------------------------------------|
| login                  -> |AuthController    |showLogin()             |                                      |
| logout                 -> |AuthController    |showLogout()            |                                      |
*/

$params = explode('/', $action);

//instancio una sola vez
$listController = new ListController();
$categoryController = new CategoryController();
$authController = new AuthController();
$showController = new showController();

switch ($params[0]) {

    case 'list':
        $listController->showList();
        break;
    case 'listId':
        $listController->showListById($params[1]);
        break;
    case 'removeItem':
        $listController->removeItem($params[1]);
        break;
    case 'updateItemForm':
        $listController->showFormUpdate($params[1]);
        break;
    case 'updateItem':
        $listController->showUpdate();
        break;
    case 'addItemForm':
        $listController->showFormAlta();
        break;
    case 'addItem':
        $listController->addItem();
        break;
    case 'category':
        $categoryController->showCategory();
        break;
    case 'categoryId':
        $categoryController->showCategoryById($params[1]);
        break;
    case 'removeCategory':
        $categoryController->removeCategory($params[1]);
        break;
    case 'updateCategoryForm':
        $categoryController->showFormCategoryUpdate($params[1]);
        break;
    case 'updateCategory':
        $categoryController->showCategoryUpdate();
        break;
    case 'addCategoryForm':
        $categoryController->showFormCategory();
        break;
    case 'addCategory':
        $categoryController->addCategory();
        break;
    case 'login':
        $authController->showLogin();
        break;
    case 'logout':
        $authController->logout();
        break;
    case 'auth':
        $authController->auth();
        break;
    default:
        $showController->showError("404-Not-Found");
        break;
}
