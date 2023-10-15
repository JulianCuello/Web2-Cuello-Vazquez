<?php
require_once './app/views/category.view.php';
require_once './app/views/alert.view.php';
require_once './app/models/category.model.php';
require_once './helpers/validation.helper.php';

//controller de categorias
class CategoryController
{

    private $model;
    private $modelList;
    private $view;
    private $alertView;

    public function __construct()
    {
        //se instancian los dos modelos para no delegar mal, y que cada modelo acceda a su tabla correspondiente.
        $this->model = new CategoryModel();
        $this->modelList = new ListModel();
        $this->view = new CategoryView();
        $this->alertView = new AlertView();
    }

    //lista completa
    public function showCategory()
    {
        $categorias = $this->model->getCategory();
        if ($categorias != null) {
            $this->view->renderCategory($categorias, AuthHelper::isAdmin());
        } else {
            $this->alertView->renderEmpty("no hay elementos para mostrar");
        }
    }

    //lista filtrada
    public function showCategoryById($id)
    {
        if (ValidationHelper::verifyIdRouter($id)) { //validacion datos recibidos del router
            $categoria = $this->modelList->getItemsCategoryById($id);//selecciona los items relacionados y la categoria asociada segun parametro
            if ($categoria != null) {
                $this->view->renderItemsCategoryById($categoria);
            } else {
                $this->alertView->renderEmpty("la categoria seleccionada no contiene items asociados");
            }
        } else {
            $this->alertView->renderError("404-Not-Found");
        }
    }

    //eliminar categoria
    public function removeCategory($id)
    {
        AuthHelper::verify(); //verifico permisos y parametros validos
        if (ValidationHelper::verifyIdRouter($id)) {
            try {
                $categoriaEliminada = $this->model->deleteCategory($id);
                if ($categoriaEliminada > 0) {
                    header('Location: ' . BASE_URL . "category");
                } else {
                    $this->alertView->renderError("error al intentar eliminar");
                }
            } catch (PDOException) {
                $this->alertView->renderError("la Categoria que intenta eliminar, tiene asociado un conjunto de items.
                                            Para poder eliminar correctamente,
                                            debera eliminar los registros de los items asociados/
                                            ");
            }
        } else {
            $this->alertView->renderError("404-Not-Found");
        }
    }

    //mostrar formulario modificacion
    public function showFormCategoryUpdate($id){
        AuthHelper::verify(); //verifico permisos y parametros validos
        if (ValidationHelper::verifyIdRouter($id)) {
            $categoria = $this->model->getCategoryId($id);//consulto los datos actuales
            if($categoria!=null){
            $this->view->renderFormCategoryUpdate($categoria);
            }
            else{
                $this->alertView->renderError("error al intentar mostrar formulario");
            }
        }else{
            $this->alertView->renderError("404-Not-Found");
        }
    }

    //enviar datos de modificacion 
    public function showCategoryUpdate(){
        AuthHelper::verify();
        try {//verifico permisos, parametros validos y posible acceso sin previo acceso al form modificacion.
            if ($_POST && ValidationHelper::verifyForm($_POST)) {
                $idCategoria = $_POST['idCategoria'];
                $material = $_POST['material'];
                $origen = $_POST['origen'];
                $motor = $_POST['motor'];
                $imagenCategoria = $_POST['imagenCategoria'];

                $categoriaModificada = $this->model->updateItem($idCategoria, $material, $origen, $motor, $imagenCategoria);
                if ($categoriaModificada > 0) {
                    header('Location: ' . BASE_URL . "category");
                } else {
                    $this->alertView->renderError("No se pudo actualizar categoria");
                }
            } else {
                $this->alertView->renderError("Error-El formulario no pudo ser procesado, asegurate de que hayas completado todos los campos");
            }
        } catch (PDOException $error) {
            $this->alertView->renderError("Error en la consulta a la base de datos/$error");
        }
    }


    //mostrar formulario altaCategoria
    public function showFormCategory(){
        AuthHelper::verify();
        $this->view->renderFormCategory();
    }


    public function addCategory()
    {
        AuthHelper::verify();
        try {//verifico permisos, parametros validos y posible acceso sin previo acceso al form de alta.
            if ($_POST && ValidationHelper::verifyForm($_POST)) {
                $categoria = $_POST['categoria'];
                $material = $_POST['material'];
                $origen = $_POST['origen'];
                $motor = $_POST['motor'];
                $imagenCategoria = $_POST['imagenCategoria'];

                $id = $this->model->insertCategory($categoria, $material, $origen, $motor, $imagenCategoria);
                if ($id) {
                    header('Location: ' . BASE_URL . "category");
                } else {
                    $this->alertView->renderError("Error al insertar la categoria");
                }
            } else {
                $this->alertView->renderError("Error-El formulario no pudo ser procesado,
                                             asegurate de que hayas completado todos los campos");
            }
        } catch (PDOException $error) {
            $this->alertView->renderError("Error en la consulta a la base de datos/$error");
        }
    }
}
