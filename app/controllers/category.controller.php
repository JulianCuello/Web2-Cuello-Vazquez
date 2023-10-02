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
       public function addCategory(){
        $categorias=$this->model->getCategoria();
        $this->view->showCategoriesAdmin($categorias);    
   }
}