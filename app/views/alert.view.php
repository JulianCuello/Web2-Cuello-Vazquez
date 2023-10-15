<?php
//la utilizan todos los controllers para renderizar todos los mensajes o erorres.
class AlertView{

    public function renderError($error){
        require './templates/alerts/error.phtml';
    }

    public function renderEmpty($text){
        require './templates/alerts/empty.phtml';
    }
}
