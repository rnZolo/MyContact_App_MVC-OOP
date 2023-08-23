<?php
    class Controller_Js extends Controller_Contacts{
        public  $name;
        public $nickname;
        public $number;
        function construct($name, $nickname, $number){
            $this->name = $name;
            $this->nickname = $nickname;
            $this->number = $number;
        }

       function insert_js(){
        self::add_contact($this->name, $this->nickname, $this->number);
       }

    }
 

     
     
     
     
     
     


?>