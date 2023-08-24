<?php
    class Model_Conn{
        private  $server = "localhost";
        private  $user_name = 'root'; 
        private  $user_pass = 'rnzolo030100'; 
        private  $db_name = "contact_db";
        private  $conn;

        public function __construct(){
            $this->conn = new mysqli( $this->server,  $this->user_name,
            $this->user_pass,  $this->db_name);
        }

        private function connect(){  
            if($this->conn->connect_error){

                die($this->conn);
            }else{

                return $this->conn;
            }
        }

        protected function query($q) {
            $result = $this->connect()->query($q);
            
            return $result;
        }

        protected function prepared($q, $x, $p){
            $prep = $this->conn->prepare($q);
            $prep->bind_param($x, ...$p);
            $prep->execute();
            $result = $prep->get_result(); 

            return $result;
        }

        public function disconnect(){
            
            return $this->conn->close();
        } 
        
    }
?>