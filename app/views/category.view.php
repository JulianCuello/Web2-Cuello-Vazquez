<?php
    //vista de categorias
class CategoryView{

    public function renderCategory($categorias,$adm){
        require './templates/show/list.category.phtml';
    }

    public function renderItemsCategoryById($categoria){
        require './templates/show/list.categoryById.phtml';
    }
    
    public function renderFormCategoryUpdate($categoria){
        require './templates/forms/update.category.phtml';
    }
    
    public function renderFormCategory(){
        require './templates/forms/new.category.phtml';
    }

}

 


    