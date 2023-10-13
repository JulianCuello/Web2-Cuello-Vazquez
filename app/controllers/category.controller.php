<?php
require_once './app/views/category.view.php';
require_once './app/views/alert.view.php';
require_once './app/models/category.model.php';
require_once './helpers/validation.helper.php';


class CategoryController{

    private $model;
    private $modelList;
    private $view;
    private $alertView;

    public function __construct(){
        $this->model = new CategoryModel();
        $this->modelList=new ListModel();
        $this->view = new CategoryView();
        $this->alertView = new AlertView();
    }

    public function showCategory(){
        
        $categorias = $this->model->getCategory();
        if ($categorias != null) {
            $this->view->renderCategory($categorias,AuthHelper::isAdmin());
        } else {
            $this->alertView->renderEmpty("la lista se encuetra vacia");
        }
    }
    
    public function showCategoryById($id){ //detalle categorias(acceso usuario publico)
        
        $categoria = $this->modelList->getItemsCategoryById($id);
        if ($categoria != null) {
            $this->view->renderItemsCategoryById($categoria);
        } else {
            $this->alertView->renderEmpty("la categoria seleccionada no contiene items asociados");
        }
    }

    public function removeCategory($id){
        AuthHelper::verify();
        try {
            $this->model->deleteCategory($id);
            header('Location: ' . BASE_URL . "category");
        } catch (PDOException $error) {
            if ($error->getCode() == '23000') {
                $this->alertView->renderError("la Categoria que intenta eliminar, tiene asociado un conjunto de items.
                                         Para poder eliminar correctamente,
                                         debera eliminar los registros de los items asociados");
            }
        }
    }

    public function showFormCategoryUpdate($id){
        AuthHelper::verify();
        $categoria = $this->model->getCategoryId($id);
        $this->view->renderFormCategoryUpdate($categoria);
    
    }

    public function showCategoryUpdate(){
        AuthHelper::verify();
        try {
            if (ValidationHelper::verifyForm($_POST)) {
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



    public function showFormCategory(){
        AuthHelper::verify();
        $this->view->renderFormCategory();
    }


    public function addCategory(){
        AuthHelper::verify();
        try {
            if (ValidationHelper::verifyForm($_POST)) {
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
