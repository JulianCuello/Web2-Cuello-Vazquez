<?php
require_once './app/models/list.model.php';
require_once './app/views/list.view.php';
  

class ListController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new ListModel();
        $this->view = new ListView();
        
    }

    public function showList() {//toda la lista
        $list = $this->model->getList();   
        $this->view->showItemList($list);
    }

    public function showListById($id) {//solo el item con el id del parametro
        $item = $this->model->getUserListById($id);
        $this->view->showItemListbyId($item);
    }

    

    public function addItem() {

        // obtengo los datos del usuario

        $idProducto = $_POST['idProducto'];
        $idCodigoProducto = $_POST['idCodigoProducto'];
        $nombreProducto = $_POST['nombreProducto'];
        $precio= $_POST['precio'];
        $marca  = $_POST['marca'];
        $idCategoria= $_POST['idCategoria'];


        // validaciones
        if (empty($nombreProducto) || empty($marca)) {
            $this->view->showError("Debe completar todos los campos");
            return;
        }

        $id = $this->model->insertTask($idProducto, $idCodigoProducto, $nombreProducto, $precio, $marca, $idCategoria);
        if ($id) {
            header('Location: ' . BASE_URL);
        } else {
            $this->view->showError("Error al insertar la tarea");
        }
    }

    function removeTask($id) {
        $this->model->deleteTask($id);
        header('Location: ' . BASE_URL);
    }
    
    function finishTask($id) {
        $this->model->updateTask($id);
        header('Location: ' . BASE_URL);
    }

    
    

}
