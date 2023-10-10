<?php

class ValidationHelper{
    
    public static function veryfyForm($params){
        foreach($params as $param){
            if(!isset($_POST[$param])|| empty($_POST[$param])){
                return false;
            }
        }return true;
    }
}