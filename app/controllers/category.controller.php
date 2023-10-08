<?php
require_once './app/views/category.view.php';
require_once './app/models/category.model.php';
require_once './app/views/admin.view.php';

class CategoryController
{

    private $model;
    private $view;
    private $adminView;

    public function __construct(){
        $this->model = new CategoryModel();
        $this->view = new CategoryView();
        $this->adminView = new AdminView();
    }

    public function showCategory(){ //listado categorias (acceso publico)
        $categorias = $this->model->getCategoria();
        $path = 'categoryId';
        $this->view->renderCategory($path, $categorias);
    }

    public function showCategoryAdmin(){ //listado categorias (acceso Administrador)
        AuthHelper::verify();
        $path = 'categoryIdAdmin';
        $categorias = $this->model->getCategoria();
        $this->view->renderCategory($path, $categorias);
    }

    public function showCategoryById($id){ //detalle categorias(acceso usuario publico)
        $categoria = $this->model->getItemsCategoriaById($id);
        $path = 'category';
        $this->view->renderItemsCategoryById($path, $categoria);
    }

    public function showCategoryAdminById($id){ //detalle categorias(acceso administrador)
        AuthHelper::verify();
        $path = 'categoryAdmin';
        $categoria = $this->model->getItemsCategoriaById($id);
        $this->view->renderItemsCategoryById($path, $categoria);
    }

    public function removeCategory($id){//eliminacion de categoria(acceso administrador)
        AuthHelper::verify();
        $this->model->deleteCategory($id);
        header('Location: ' . BASE_URL . "categoryAdmin");
    }

    public function showFormCategory()
    {
        AuthHelper::verify();
        $this->view->formCategory();
    }


    public function addCategory()
    {
        AuthHelper::verify();
        $categoria = $_POST['categoria'];
        $material = $_POST['material'];
        $origen = $_POST['origen'];
        $motor = $_POST['motor'];
        $imagenCategoria = $_POST['imagenCategoria'];


        if (empty($categoria) || empty($material) || (empty($motor))) {
            echo "error";
        }

        //validaciones
        $id = $this->model->insertCategory($categoria, $material, $origen, $motor, $imagenCategoria);
        if ($id) {
            header('Location: ' . BASE_URL . "listAdmin");
        } else {
            echo "mostrar error";
        }


        header('Location: ' . BASE_URL . "categoryAdmin");
    }

    


    public function showCategoryUpdate()
    {
        $idCategoria = $_POST['idCategoria'];
        $material = $_POST['material'];
        $origen = $_POST['origen'];
        $motor = $_POST['motor'];
        $imagenCategoria = $_POST['imagenCategoria'];

        //validaciones
        $this->model->updateItem($idCategoria, $material, $origen, $motor, $imagenCategoria);
        header('Location: ' . BASE_URL . "categoryAdmin");
        /*
        if ($id) {
            header('Location: ' . BASE_URL."listAdmin");
        } else {
            $this->view->showError("Error al insertar la tarea");
        }*/
    }
}
