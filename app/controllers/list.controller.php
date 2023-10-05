<?php
require_once './app/models/list.model.php';
require_once './app/views/list.view.php';
require_once './app/views/admin.view.php';
  

class ListController {
    private $model;
    private $view;
    private $viewAdmin;//esta bien la vista del administrador?

    public function __construct() {
        $this->model = new ListModel();
        $this->view = new ListView();
        $this->viewAdmin = new AdminView();
    }//IMPORTANTE, SON EL MISMO METODO PERO SE HIZO DISTINTO PARA PODER DIFERENCIAR la vista del usuario a la del administ
    public function showAdminList(){
        $list=$this->model->getList();
        $this->viewAdmin->showItemList($list);
    }
    //por eso aca hay uno repetido pero que la vista es distinta, (con los botones de gestion de items)
    public function showList() {//toda la lista
        $list = $this->model->getList();   
        $this->view->showItemList($list);
    }

    public function showListById($id) {//solo el item con el id del parametro
        $item = $this->model->getListById($id);
        $this->view->showItemListbyId($item);
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

    function removeItem($id) {
        $this->model->deleteItem($id);
        header('Location: ' . BASE_URL."listAdmin");//ACA!!!
    }

    function showUpdate(){
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
}
