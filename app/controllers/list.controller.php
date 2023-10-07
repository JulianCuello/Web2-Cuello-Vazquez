<?php
require_once './app/models/list.model.php';
require_once './app/views/list.view.php';
require_once './app/views/admin.view.php';
require_once './helpers/auth.helper.php';

  

class ListController {
    
    private $model;
    private $view;
    private $viewAdmin;//esta bien la vista del administrador?

    public function __construct() {
        $this->model = new ListModel();
        $this->view = new ListView();
        $this->viewAdmin = new AdminView();
    }//IMPORTANTE, SON EL MISMO METODO PERO SE HIZO DISTINTO PARA PODER DIFERENCIAR la vista del usuario a la del administ
   
    public function showList() {//vista de usuario publico
        $list = $this->model->getList();   
        $this->view->renderList($list);
    }
    public function showAdminList(){//vista de administrador
        AuthHelper::verify();
        $list=$this->model->getList();
        $this->view->renderList($list);
    }

    public function showListById($id) {//item con el id del parametro (usuario publico) 
        $item = $this->model->getListById($id);
        $this->view->renderItemListbyId($item);
    }

    public function showAdminListById($id) {//item con el id del parametro (acceso solo aministrador)
        AuthHelper::verify();
        $item = $this->model->getListById($id);
        $this->view->renderItemListbyId($item);
    }

    public function removeItem($id) {//elimina item (acceso solo administrador)
        AuthHelper::verify();
        $this->model->deleteItem($id);
        header('Location: ' . BASE_URL."listAdmin");
    }

    public function showFormUpdate($id){//muestra formulario modificacion item (acceso solo administrador)
        AuthHelper::verify();
        $this->view->renderFormUpdate($id);
    }

    public function showUpdate(){//hasta aca llegue
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

    public function showFormAlta(){
        $this->viewAdmin->showForm();
    }

    public function addItem() {

        // obtengo los datos del usuario
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
