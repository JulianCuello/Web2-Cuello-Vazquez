<?php

class ValidationHelper{
    
    public static function verifyForm($params){
        foreach($params as $param=>$paramValue){
            if(!isset($paramValue)|| empty($paramValue)){
                return false;
            }
        }return true;
    }
}