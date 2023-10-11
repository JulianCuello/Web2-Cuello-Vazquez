<?php

    class CategoryView{

    public function renderCategory($path,$categorias){
        require './templates/show/list.category.phtml';
    }

    public function renderItemsCategoryById($path,$categorias){
        require './templates/show/list.categoryById.phtml';
    }
    
    public function renderFormCategoryUpdate($idCategoria){
        require './templates/forms/update.category.phtml';
    }
    public function renderFormCategory(){
        require './templates/forms/new.category.phtml';
    }

}

 


    