<?php

//vista de productos
class ListView {

    public function renderList($list,$adm) {
        require('./templates/show/list.items.phtml');        
    }
    
    public function renderItemListById($list) {
        require './templates/show/list.itemById.phtml';           
    }

    public function renderFormUpdate($categoria, $item) {
        require './templates/forms/update.phtml';          
    }
    
    public function showForm($categoria){
        require './templates/forms/new.item.phtml';
    }


}

    
