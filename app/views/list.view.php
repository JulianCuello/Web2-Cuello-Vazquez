<?php


class ListView {

    public function renderList($list,$adm) {//check
        require('./templates/show/list.items.phtml');        
    }
    
    public function renderItemListById($list,$path) {
        require './templates/show/list.itemById.phtml';        
        
    }

    public function renderFormUpdate($id, $categoria) {
        require './templates/forms/update.phtml';          
    }
    
    public function showForm($categoria){
        require './templates/forms/new.item.phtml';
    }


}

    
