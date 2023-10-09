<?php
require_once './app/models/list.model.php';
require_once './app/views/list.view.php';
require_once './helpers/auth.helper.php';

  

class ListController {
    
    private $model;
    private $view;

    public function __construct() {
        $this->model = new ListModel();
        $this->view = new ListView();
    }
   
    public function showList() {//vista de usuario publico
        $list = $this->model->getList();
        $path = 'listId';
        $this->view->renderList($list,$path);
    }
    public function showAdminList(){//vista de administrador
        AuthHelper::verify();
        $list=$this->model->getList();
        $path = 'listAdminId';
        $this->view->renderList($list, $path);
    }

    public function showListById($id) {//item con el id del parametro (usuario publico) 
        $item = $this->model->getListById($id);
        $path= "list";
        $this->view->renderItemListbyId($item,$path);
    }

    public function showAdminListById($id) {//item con el id del parametro (acceso solo aministrador)
        AuthHelper::verify();
        $path= "listAdmin";
        $item = $this->model->getListById($id);
        $this->view->renderItemListbyId($item,$path);
    }

    public function removeItem($id) {//elimina item (acceso solo administrador)
        AuthHelper::verify();
        $this->model->deleteItem($id);
        header('Location: ' . BASE_URL."listAdmin");
    }

    public function showFormUpdate($id){//muestra formulario modificacion item (acceso solo administrador)
        AuthHelper::verify();
        //$category=$this->model->getIdCategory();
        //var_dump($Category,"sali de category");
        //die();
        $this->view->renderFormUpdate($id);
    }

    public function showUpdate(){//hasta aca llegue
        //var_dump($_POST, "estoy aca");
        //die();
        AuthHelper::verify();
        $idProducto = $_POST['idProducto'];
        $idCodigoProducto = $_POST['idCodigoProducto'];
        $nombreProducto = $_POST['nombreProducto'];
        $precio= $_POST['precio'];
        $marca  = $_POST['marca'];
        $imagenProducto=$_POST['imagenProducto'];
        $idCategoria= $_POST['idCategoria'];

        //validaciones//ACA!! el id que devuelve siempre es 0, porque lo hace?
        $this->model->updateItem($idProducto,$idCodigoProducto, $nombreProducto, $precio, $marca,$imagenProducto, $idCategoria);
        header('Location: ' . BASE_URL."listAdmin");
        /*
        if ($id) {
            header('Location: ' . BASE_URL."listAdmin");
        } else {
            $this->view->showError("Error al insertar la tarea");
        }*/

    }

    public function showFormAlta(){//muestra formulario alta item (acceso solo administradors)
        AuthHelper::verify();
        $this->view->showForm();
    }
    

    public function addItem() {
        AuthHelper::verify();
        $idCodigoProducto = $_POST['idCodigoProducto'];
        $nombreProducto = $_POST['nombreProducto'];
        $precio= $_POST['precio'];
        $marca  = $_POST['marca'];
        $imagenProducto=$_POST['imagenProducto'];
        $idCategoria= $_POST['idCategoria'];


        // validaciones
        if (empty($nombreProducto) || empty($marca)) {
            $this->view->showError("Debe completar todos los campos");
            return;
        }

        $id = $this->model->insertItem($idCodigoProducto, $nombreProducto, $precio, $marca,$imagenProducto, $idCategoria);
        if ($id) {
            header('Location: ' . BASE_URL."listAdmin");
        } else {
            $this->view->showError("Error al insertar la tarea");
        }



    }

   

   
}
