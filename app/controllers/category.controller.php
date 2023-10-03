<?php
    require_once './app/views/category.view.php';
    require_once './app/models/category.model.php';

    class CategoryController{
        
        private $model;
        private $view;

        public function __construct(){
            $this->model=new CategoryModel();
            $this->view=new CategoryView();
        }

        public function showCategory(){
            $categorias=$this->model->getCategoria();
            $this->view->showCategories($categorias);    
            }
            
        public function showCategoryById($id){
            $categoria=$this->model->getItemsCategoriaById($id);
            $this->view->showItemscategoriesById($categoria);
        }

        //vista de administrador
        public function showCategoryAdmin(){
            $categorias=$this->model->getCategoria();
            $this->view->showCategoriesAdmin($categorias);    
       }
       function addCategory(){
        $categoria = $_POST['categoria'];
        $material = $_POST['material'];
        $disponible = $_POST['disponible'];
        $motor= $_POST['motor'];
        $imagenCategoria=$_POST['imagenCategoria'];
        
    
        if (empty($categoria) || empty($material) || (empty($motor))) {
            echo "error";
        }

        //validaciones
        $id=$this->model->insertCategory($categoria,$material, $disponible, $motor,$imagenCategoria);
        if ($id) {
            header('Location: '. BASE_URL."listAdmin");
        } else {
            echo "mostrar error";
        }
        
        
        header('Location: ' . BASE_URL."categoryAdmin");
        
     }
   
function removeCategory($id) {
    $this->model->deleteCategory($id);
    header('Location: ' . BASE_URL."categoryAdmin");
}


function showCategoryUpdate(){
        $idCategoria = $_POST['idCategoria'];
        $material = $_POST['material'];        
        $disponible= $_POST['disponible'];
        $motor = $_POST['motor'];
        $imagenCategoria=$_POST['imagenCategoria'];

        //validaciones
        $this->model->updateItem($idCategoria,$material,$disponible,$motor,$imagenCategoria);
        header('Location: ' . BASE_URL."categoryAdmin");
        /*
        if ($id) {
            header('Location: ' . BASE_URL."listAdmin");
        } else {
            $this->view->showError("Error al insertar la tarea");
        }*/
}

}