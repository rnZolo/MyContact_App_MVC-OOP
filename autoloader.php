<?php
    spl_autoload_register(function($class_name){
        // echo var_dump($class_name);
        $path = "./".strtolower(str_ireplace("_","/",$class_name).".php");
        // echo var_dump($path);
        require_once $path;
    });
?>