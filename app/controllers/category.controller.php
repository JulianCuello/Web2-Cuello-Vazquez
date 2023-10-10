<?php
require_once './app/views/category.view.php';
require_once './app/models/category.model.php';


class CategoryController{
    
    private $model;
    private $view;

    public function __construct(){
        $this->model = new CategoryModel();
        $this->view = new CategoryView();
    }

    public function showCategory(){ //listado categorias (acceso publico)
        $categorias = $this->model->getCategoria();
        $href = 'categoryId';
        if($categorias!=null){
        $this->view->renderCategory($href, $categorias);
        }
        else{
            $this->view->renderEmpty("la lista se encuetra vacia");
        }
    }

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

    public function showCategoryById($id){ //detalle categorias(acceso usuario publico)
        $categoria = $this->model->getItemsCategoriaById($id);
        $href = 'category';
        if($categoria!=null){
        $this->view->renderItemsCategoryById($href, $categoria);
        }
        else{
            $this->view->renderEmpty("la categoria seleccionada no contiene items asociados");
        }
    }

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
    }

    public function removeCategory($id){//eliminacion de categoria(acceso administrador)
        AuthHelper::verify();
        try{
            $this->model->deleteCategory($id);
            header('Location: ' . BASE_URL . "categoryAdmin");
        }catch(PDOException $error){
            if($error->getCode()=='23000'){
                $this->view->renderError("la Categoria que intenta eliminar, tiene asociado un conjunto de items.
                                        Para poder eliminar correctamente, debera eliminar los registros de los items asociados");
            }
        }
    }

    public function showFormCategoryUpdate($id){//muestra formulario modificacion categoria (acceso administrador)
        AuthHelper::verify();
        $this->view->renderFormCategoryUpdate($id);
    }

    public function showCategoryUpdate(){//procesado de datos para modificar en tabla categoria (acceso administrador)
        AuthHelper::verify();
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
    public function showFormCategory(){//muestra formulario alta categoria (acceso administrador)
        AuthHelper::verify();
        $this->view->renderFormCategory();
    }


    public function addCategory(){//agrega categoria (acceso administrador  )
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

    


    
}
