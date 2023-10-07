<?php


class ListView {

    public function showItemList($list) {
        require 'templates/show/show.list.phtml';        
    }
    
    public function showItemListById($list) {
        require './templates/show/showListItemById.phtml';        
        
    }
}




   // $clave='admin';
   // echo password_hash($clave,PASSWORD_BCRYPT);
    
