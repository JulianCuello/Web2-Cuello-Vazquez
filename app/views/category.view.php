<?php

    class CategoryView{


    function renderCategory($path,$categorias){
        require './templates/user/user.table.category.phtml';
    }

    function renderItemsCategoryById($path,$categorias){
        require './templates/user/user.table.itemsId.phtml';
    }
        // gestion categorias
       /* function showCategoriesAdmin ($categories){
            require './templates/admin/admin.table.category.phtml';
        }*/
    function renderFormCategoryUpdate($idCategoria){
        require './templates/forms/form_update.category.phtml';
    }
    function renderFormCategory(){
        require './templates/forms/form_alta.category.phtml';
    }
 }

 


    