<?php

    class CategoryView{


    function renderCategory($path,$categorias){
        require './templates/show/table.category.phtml';
    }

    function renderItemsCategoryById($path,$categorias){
        require './templates/show/table.itemsId.phtml';
    }
    
    function renderFormCategoryUpdate($idCategoria){
        require './templates/forms/update.category.phtml';
    }
    function renderFormCategory(){
        require './templates/forms/alta.category.phtml';
    }
    public function renderEmpty($text){
        require './templates/alerts/empty.phtml';
    }
    
    public function renderError($error){
        require './templates/alerts/error.phtml';
    }

}

 


    