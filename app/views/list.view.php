<?php


class ListView {

    public function renderList($list,$path) {//check
        require('./templates/show/table.items.phtml');        
    }
    
    public function renderItemListById($list,$path) {
        require './templates/show/listItemById.phtml';        
        
    }

    public function renderFormUpdate($id) {
        require './templates/forms/update.phtml';          
    }
    
    public function showForm(){
        require './templates/forms/alta.phtml';
    }

}




   // $clave='admin';
   // echo password_hash($clave,PASSWORD_BCRYPT);
    
