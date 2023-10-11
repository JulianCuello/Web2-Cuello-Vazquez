<?php
require_once './app/models/list.model.php';
require_once './app/models/category.model.php';
require_once './app/views/list.view.php';
require_once './app/views/alert.view.php';
require_once './helpers/validation.helper.php';



class ListController{

    private $model;
    private $view;
    private $alertView;
    private $modelCategory;

    public function __construct(){
        $this->model = new ListModel();
        $this->view = new ListView();
        $this->alertView = new AlertView();
        $this->modelCategory = new CategoryModel();
    }

    public function showList(){

        if (AuthHelper::isAdmin()) {
            $adm=true;//si es administrador
        } else {
            $adm=false;
        }
        $list = $this->model->getList();
        if ($list != null) {
            $this->view->renderList($list, $adm);
        } else {
            $this->alertView->renderEmpty("la lista se encuetra vacia");
        }
    }
    /*public function showAdminList(){//vista de administrador
        AuthHelper::verify();
        $list = $this->model->getList();
        $href = 'listAdminId';
        if($list!=null){
            $this->view->renderList($list,$href);    
        }
        else{
            $this->alertView->renderEmpty("la lista se encuentra vacia");
        }
    }*/

    public function showListById($params){ 

        if ($params[0] == 'listId') {
            $href = "list";
        } else {
            $href = 'listAdmin';
            AuthHelper::verify();
        }
        $id = $params[1];
        $item = $this->model->getListById($id);
        if ($item != null) {
            $this->view->renderItemListbyId($item, $href);
        } else {
            $this->alertView->renderEmpty("la lista se encuentra vacia");
        }
    }

    /*public function showAdminListById($id) {//item con el id del parametro (acceso solo aministrador)
        AuthHelper::verify();
        $item = $this->model->getListById($id);
        $href= "listAdmin";
        if($item!=null){
        $this->view->renderItemListbyId($item,$href);
        }
        else{
            $this->alertView->renderEmpty("la lista se encuentra vacia");
        }
    }*/

    public function removeItem($id){
        AuthHelper::verify();
        try {
            $registroEliminado = $this->model->deleteItem($id);
            if ($registroEliminado > 0) {
                header('Location: ' . BASE_URL . "listAdmin");
            } else {
                $this->alertView->renderError("error al intentar eliminar");
            }
        } catch (PDOException $error) {
            $this->alertView->renderError("Error en la consulta a la base de datos/$error");
        }
    }

    public function showFormUpdate($id){
        AuthHelper::verify();
        $categoria = $this->modelCategory->getIdCategory();
        $this->view->renderFormUpdate($id, $categoria);
    }

    public function showUpdate(){
        AuthHelper::verify();
        try {
            if (ValidationHelper::verifyForm($_POST)) {
                $idProducto = $_POST['idProducto'];
                $idCodigoProducto = $_POST['idCodigoProducto'];
                $nombreProducto = $_POST['nombreProducto'];
                $precio = $_POST['precio'];
                $marca  = $_POST['marca'];
                $imagenProducto = $_POST['imagenProducto'];
                $idCategoria = $_POST['idCategoria'];

                $registroModificado = $this->model->updateItem($idProducto, $idCodigoProducto, $nombreProducto, $precio, $marca, $imagenProducto, $idCategoria);

                if ($registroModificado > 0) {
                    header('Location: ' . BASE_URL . "listAdmin");
                } else {
                    $this->alertView->renderError("No se pudo actualizar registro");
                }
            } else {
                $this->alertView->renderError("Error-El formulario no pudo ser procesado, asegurate de que hayas completado todos los campos");
            }
        } catch (PDOException $error) {
            $this->alertView->renderError("Error en la consulta a la base de datos/$error");
        }
    }

    public function showFormAlta(){ //muestra formulario alta item (acceso solo administradors)
        AuthHelper::verify();
        $categoria = $this->modelCategory->getIdCategory(); //se consulta las categorias disponibles
        $this->view->showForm($categoria);
    }


    public function addItem(){
        AuthHelper::verify();
        try {
            if (ValidationHelper::verifyForm($_POST)) {
                $idCodigoProducto = $_POST['idCodigoProducto'];
                $nombreProducto = $_POST['nombreProducto'];
                $precio = $_POST['precio'];
                $marca  = $_POST['marca'];
                $imagenProducto = $_POST['imagenProducto'];
                $idCategoria = $_POST['idCategoria'];

                $id = $this->model->insertItem($idCodigoProducto, $nombreProducto, $precio, $marca, $imagenProducto, $idCategoria);

                if ($id) {
                    header('Location: ' . BASE_URL . "listAdmin");
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
