<?php
require_once './app/views/category.view.php';
require_once './app/views/alert.view.php';
require_once './app/models/category.model.php';
require_once './helpers/validation.helper.php';


class CategoryController{

    private $model;
    private $view;
    private $alertView;

    public function __construct(){
        $this->model = new CategoryModel();
        $this->view = new CategoryView();
        $this->alertView = new AlertView();
    }

    public function showCategory($params){
        if ($params[0] === 'category') {
            $href = 'categoryId';
        } else {
            AuthHelper::verify();
            $href = 'categoryIdAdmin';
        }
        $categorias = $this->model->getCategoria();
        if ($categorias != null) {
            $this->view->renderCategory($href, $categorias);
        } else {
            $this->alertView->renderEmpty("la lista se encuetra vacia");
        }
    }
    /*
    public function showCategoryAdmin(){ //listado categorias (acceso Administrador)
        AuthHelper::verify();
        $categorias = $this->model->getCategoria();
        $href = 'categoryIdAdmin';
        if($categorias!=null){
            $this->view->renderCategory($href, $categorias);
            }
            else{
                $this->view->renderEmpty("la lista se encuetra vacia");
            }
        }
    */
    public function showCategoryById($params){ //detalle categorias(acceso usuario publico)
        if ($params[0] === 'categoryId') {
            $href = "category";
        } else {
            $href = 'categoryAdmin';
            AuthHelper::verify();
        }
        $id = $params[1];
        $categoria = $this->model->getItemsCategoriaById($id);
        if ($categoria != null) {
            $this->view->renderItemsCategoryById($href, $categoria);
        } else {
            $this->alertView->renderEmpty("la categoria seleccionada no contiene items asociados");
        }
    }
    /*
    public function showCategoryAdminById($id){ //detalle categorias(acceso administrador)
        AuthHelper::verify();
        $href = 'categoryAdmin';
        $categoria = $this->model->getItemsCategoriaById($id);
        if($categoria!=null){
            $this->view->renderItemsCategoryById($href, $categoria);
        }
        else{
            $this->view->renderEmpty("la categoria seleccionada no contiene items asociados");
        }
    }*/

    public function removeCategory($id){
        AuthHelper::verify();
        try {
            $this->model->deleteCategory($id);
            header('Location: ' . BASE_URL . "categoryAdmin");
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
        $this->view->renderFormCategoryUpdate($id);
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
                    header('Location: ' . BASE_URL . "categoryAdmin");
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
                    header('Location: ' . BASE_URL . "categoryAdmin");
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
