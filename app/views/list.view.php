<?php


class ListView {

    public function renderList($list,$path) {//check
        require('./templates/show/table.items.phtml');        
    }
    
    public function renderItemListById($list,$path) {
        require './templates/show/listItemById.phtml';        
        
    }

    public function renderFormUpdate($id, $categoria) {
        require './templates/forms/update.phtml';          
    }
    
    public function showForm($categoria){
        require './templates/forms/alta.phtml';
    }

    public function renderError($error){
        require './templates/alerts/error.phtml';
    }

    public function renderEmpty($text){
        require './templates/alerts/empty.phtml';
    }

}




   // $clave='admin';
   // echo password_hash($clave,PASSWORD_BCRYPT);
    
