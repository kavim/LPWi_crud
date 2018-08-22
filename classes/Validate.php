<?php

class Validate {
    
    static function isEmpty($key){
        
        if(isset($_POST[$key]) && $_POST[$key] != ""){
            return false;
        }
        
        return true;
    }
    
    
    static function isNumber($key){
        
        if(isset($_POST[$key]) && is_int($_POST[$key])){
            return false;
        }
        
        return true;
    }    
    
}

