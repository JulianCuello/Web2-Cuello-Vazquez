<?php
require_once './app/models/task.model.php';
require_once './app/views/task.view.php';

class TaskController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new TaskModel();
        $this->view = new TaskView();
        
    }

    public function showTasks() {
        // obtengo tareas del controlador
        $tasks = $this->model->getTasks();
        
        // muestro las tareas desde la vista
        $this->view->showTasks($tasks);
    }

    public function addTask() {

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
