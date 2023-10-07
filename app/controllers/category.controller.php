<?php
    require_once './app/views/category.view.php';
    require_once './app/models/category.model.php';
    require_once './app/views/admin.view.php';

    class CategoryController{
        
        private $model;
        private $view;
        private $adminView;

        public function __construct(){
            $this->model=new CategoryModel();
            $this->view=new CategoryView();
            $this->adminView=new AdminView();

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
            AuthHelper::verify();
            $categorias=$this->model->getCategoria();
            $this->adminView->showCategoriesAdmin($categorias);    
       }

       public function showFormCategory(){
        AuthHelper::verify(); 
        $this->view->formCategory();
       }


       function addCategory(){
        AuthHelper::verify();
        $categoria = $_POST['categoria'];
        $material = $_POST['material'];
        $origen = $_POST['origen'];
        $motor= $_POST['motor'];
        $imagenCategoria=$_POST['imagenCategoria'];
        
    
        if (empty($categoria) || empty($material) || (empty($motor))) {
            echo "error";
        }

        //validaciones
        $id=$this->model->insertCategory($categoria,$material, $origen, $motor,$imagenCategoria);
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
        $origen= $_POST['origen'];
        $motor = $_POST['motor'];
        $imagenCategoria=$_POST['imagenCategoria'];

        //validaciones
        $this->model->updateItem($idCategoria,$material,$origen,$motor,$imagenCategoria);
        header('Location: ' . BASE_URL."categoryAdmin");
        /*
        if ($id) {
            header('Location: ' . BASE_URL."listAdmin");
        } else {
            $this->view->showError("Error al insertar la tarea");
        }*/
}

}