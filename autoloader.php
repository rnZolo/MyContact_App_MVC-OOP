<?php

    spl_autoload_register(function($class_name){
        $path = "./".strtolower(str_ireplace("_","/",$class_name).".php");
        require_once $path;
        
    });
    
?>