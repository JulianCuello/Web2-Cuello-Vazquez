<?php


class ListView {

    public function renderList($list,$path) {//check
        require('./templates/admin/admin.table.items.phtml');        
    }
    
    public function renderItemListById($list,$path) {
        require './templates/show/showListItemById.phtml';        
        
    }

    public function renderFormUpdate($id) {
        //var_dump($id,$category);
        //die();
        require './templates/forms/form_update.phtml';        
        
    }

}




   // $clave='admin';
   // echo password_hash($clave,PASSWORD_BCRYPT);
    
