<?php

    class CategoryView{


    function showCategories($categorias){
        require './templates/user/user.table.category.phtml';
    }

    function showItemsCategoriesById($categorias){
        require './templates/user/user.table.itemsId.phtml';
    }
        // gestion categorias
       /* function showCategoriesAdmin ($categories){
            require './templates/admin/admin.table.category.phtml';
        }*/
    
 }

 


    