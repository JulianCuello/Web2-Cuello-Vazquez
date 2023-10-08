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
    function formCategory(){
        require './templates/forms/form_alta.category.phtml';
    }
 }

 


    