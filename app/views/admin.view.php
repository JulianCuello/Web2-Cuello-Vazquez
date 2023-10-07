<?php

class AdminView {

    public function showItemList($list) {
        require('./templates/admin/admin.table.items.phtml');
    }

    public function showCategory($categories) {
        require('./templates/admin/admin.table.category.phtml');
    }
    function showCategoriesAdmin ($categories){
        require './templates/admin/admin.table.category.phtml';
    }

    function showForm(){
        require './templates/forms/form_alta.phtml';
    }
}