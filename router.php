<?php
require_once './app/controllers/list.controller.php';
require_once './app/controllers/about.controller.php';
require_once './app/controllers/category.controller.php';
require_once './app/controllers/auth.controller.php';



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
// login ->                      authContoller->showLogin();
// logout ->                     authContoller->logout();
// auth                          authContoller->auth(); // toma los datos del post y autentica al usuario


// about ->             aboutController->showAbout();

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
    
    case 'list':
        $controller = new ListController();
        $controller->showList();
        break;
    case 'listAdmin':
        $controller = new ListController();
        $controller->showAdminList();
        break;
    case 'listId':
        $controller = new ListController();
        $controller->showListById($params[1]);
        break;
    case 'listAdminId':
        $controller = new ListController();
        $controller->showAdminListById($params[1]);
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
        $controller= new ListController();
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
        $controller->showCategory();
        break;
    case 'categoryAdmin':
        $controller = new categoryController();
        $controller->showCategoryAdmin();
        break;
    case 'categoryId':
        $controller = new CategoryController();
        $controller->showCategoryById($params[1]);
        break;
    case 'categoryIdAdmin':
        $controller = new CategoryController();
        $controller->showCategoryAdminById($params[1]);
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
        $controller= new categoryController();
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
        echo "404 Page Not Found";
        break;
}
