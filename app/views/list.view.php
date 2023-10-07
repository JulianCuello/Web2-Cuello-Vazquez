<?php


class ListView {

    public function renderList($list) {//check
        require('./templates/admin/admin.table.items.phtml');        
    }
    
    public function renderItemListById($list) {
        require './templates/show/showListItemById.phtml';        
        
    }

    public function renderFormUpdate($list) {
        require './templates/forms/form_update.phtml';        
        
    }

}




   // $clave='admin';
   // echo password_hash($clave,PASSWORD_BCRYPT);
    
