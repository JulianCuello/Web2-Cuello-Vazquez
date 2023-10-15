<?php
require_once './app/models/list.model.php';
require_once './app/models/category.model.php';
require_once './app/views/list.view.php';
require_once './app/views/alert.view.php';
require_once './helpers/validation.helper.php';


//controler de Productos
class ListController{

    private $model;
    private $view;
    private $alertView;
    private $modelCategory;

    public function __construct(){
        //se instancian los dos modelos para no delegar mal, y que cada modelo acceda a su tabla correspondiente.
        $this->model = new ListModel();
        $this->modelCategory = new CategoryModel();
        $this->view = new ListView();
        $this->alertView = new AlertView();
    }

    //lista completa
    public function showList(){
        $list = $this->model->getList();
        if ($list != null) {
            $this->view->renderList($list, AuthHelper::isAdmin());
        } else {
            $this->alertView->renderEmpty("la lista se encuetra vacia");
        }
    }

    //lista filtrada
    public function showListById($id){
        if (ValidationHelper::verifyIdRouter($id)){//validacion datos recibidos del router
            $item = $this->model->getListById($id);
            if ($item != null) {
                $this->view->renderItemListbyId($item);
            } else {
                $this->alertView->renderEmpty("no hay elementos para mostrar");
            }
        } else {
            $this->alertView->renderError("404-Not-Found");
        }
    }

    //eliminarItem
    public function removeItem($id){
        AuthHelper::verify(); //verifico permisos y parametros validos
        if (ValidationHelper::verifyIdRouter($id)) {
            try {
                $registroEliminado = $this->model->deleteItem($id);
                if ($registroEliminado > 0) {
                    header('Location: ' . BASE_URL . "list");
                } else {
                    $this->alertView->renderError("error al intentar eliminar");
                }
            } catch (PDOException $error) {
                $this->alertView->renderError("Error en la consulta a la base de datos/$error");
            }
        } else {
            $this->alertView->renderError("404-Not-Found");
        }
    }

    //mostrar formulario modificacion
    public function showFormUpdate($id){
        AuthHelper::verify();//verifico permisos y parametros validos
        if (ValidationHelper::verifyIdRouter($id)) {
            $item = $this->model->getListById($id);//consulto los tados actuales
            if ($item != null) {
                $categoria = $this->modelCategory->getIdCategory();//consulto las categorias disponibles para modificar
                $this->view->renderFormUpdate($categoria, $item);
            } else {
                $this->alertView->renderError("error al intentar mostrar formulario");
            }
        } else {
            $this->alertView->renderError("404-Not-Found");
        }
    }

    //enviar datos de modificacion
    public function showUpdate(){
        AuthHelper::verify();
        try {//verifico permisos, parametros validos y posible acceso sin previo acceso al form modificacion.
            if ($_POST && ValidationHelper::verifyForm($_POST)) {
                $idProducto = $_POST['idProducto'];
                $idCodigoProducto = $_POST['idCodigoProducto'];
                $nombreProducto = $_POST['nombreProducto'];
                $precio = $_POST['precio'];
                $marca  = $_POST['marca'];
                $imagenProducto = $_POST['imagenProducto'];
                $idCategoria = $_POST['idCategoria'];

                $registroModificado = $this->model->updateItem($idProducto, $idCodigoProducto, $nombreProducto, $precio, $marca, $imagenProducto, $idCategoria);

                if ($registroModificado > 0) {
                    header('Location: ' . BASE_URL . "list");
                } else {
                    $this->alertView->renderError("No se pudo actualizar registro");
                }
            } else {
                $this->alertView->renderError("error-el formulario no pudo ser procesado, asegurate de que hayas completado todos los campos");
            }
        } catch (PDOException $error) {
            $this->alertView->renderError("error en la consulta a la base de datos/$error");
        }
    }
    
    //mostrar formulario altaProducto
    public function showFormAlta(){
        AuthHelper::verify();
        $categoria = $this->modelCategory->getIdCategory(); //consulta las categorias disponibles
        $this->view->showForm($categoria);
    }

    //agregar producto
    public function addItem(){
        AuthHelper::verify();
        try {//verifico permisos, parametros validos y posible acceso sin previo acceso al form alta.
            if ($_POST && ValidationHelper::verifyForm($_POST)) {
                $idCodigoProducto = $_POST['idCodigoProducto'];
                $nombreProducto = $_POST['nombreProducto'];
                $precio = $_POST['precio'];
                $marca  = $_POST['marca'];
                $imagenProducto = $_POST['imagenProducto'];
                $idCategoria = $_POST['idCategoria'];

                $id = $this->model->insertItem($idCodigoProducto, $nombreProducto, $precio, $marca, $imagenProducto, $idCategoria);

                if ($id) {
                    header('Location: ' . BASE_URL . "list");
                } else {
                    $this->alertView->renderError("Error al insertar la tarea");
                }
            } else {
                $this->alertView->renderError("Error-El formulario no pudo ser procesado, asegurate de que hayas completado todos los campos");
            }
        } catch (PDOException $error) {
            $this->alertView->renderError("Error en la consulta a la base de datos/$error");
        }
    }
}
