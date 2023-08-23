<?php
        class Controller_Contacts extends Model_Contacts implements Controller_Data{
            private const table = "contact_table";
            private const ciphering = "AES-128-CTR";
            private const options = 0;
            private const ed_iv = '1234567891011121';
            private const ed_key = "rnzolo";
            // public $realname;
            // public $nickname;
            // public $number;

            // public function __construct( string $realname,  string $nickname,
            //                      string $number){}

            public function inc($id){
                $iv_length = openssl_cipher_iv_length(self::ciphering);
                
                $encryption = openssl_encrypt($id, self::ciphering,
                 self::ed_key, self::options, self::ed_iv);
                
                 return $encryption;
            }

            public function dec($id){
                $decryption = openssl_decrypt($id, self::ciphering, self::ed_key,
                 self::options, self::ed_iv);
                 return $decryption;
            }

            public function show_all_contacts(){
                $datas = $this->select_all_contacts();
                $list_cols = self::get_columns(self::table);
                
                return include_once './view/contacts.php';
                
            }
            
            public function get_columns($t){
               $list_cols = $this->select_columns($t);
               return $list_cols;
            }

            public function add_contact($ar){
                // $ar = [$this->realname, $this->nickname, $this->number];
                if(!self::valid_inputs($ar)){
                    header('location: ?contact=invalid');
                    $this->show_add_forms();
                    
                }else{
                    $ar = self::format_contact_details($ar);
                    $result = $this->insert_contact($ar);
                    header('location: ?contact=success');
                    
                }
                self::disconnect();
                exit();
            }
            
            public function get_specific_contact($ar){
                $ar = self::dec($ar);
                $details = $this->select_where_contact([$ar]);
                if($details->num_rows == 1 ){
                    $detail =  $details->fetch_assoc();
                    $up_nm = $detail['contact_name'];
                    $up_nn = $detail['contact_nickname'];
                    $up_nmb = $detail['contact_number'];
                    self::show_update_forms($up_nm, $up_nn, $up_nmb);
                }else{ // prevent url deleting
                    header('location: .');
                }
                // exit(); //even updating is stopped
            }

            public function change_details($ar, $id){
               
                if(!self::valid_inputs($ar)){
                    $id = 'location: ?update='.$id.'&upstatus=failed';
                    header($id);
                    exit();      
                }else{
                    $id = self::dec($id);
                    $ar = self::format_contact_details($ar);
                    array_push($ar, $id);
                    
                    $up_status = $this->update_this_contact($ar);
                    echo "is success ". var_dump($up_status);
                    // exit();  
                    if(!$up_status){
                        header('location: ?upstatus=success');
                        exit();
                    }
                    // header('location: ?upstatus=failed');
                }
                exit();    
            }

            public function delete_contact($id){
                [$id] = $id;
                $id = self::dec($id);
                $del_status = $this->delete_where([$id]);

                if(!$del_status){
                   header('location: ?delstatus=success');
                }
                exit();
            }

            private function valid_inputs($ar){
                $valid;
                if (!self::is_empty($ar[0])){
                    return $valid = false;
                }elseif(!self::is_empty($ar[2])){
                    return $valid = false;
                }elseif(!self::is_Contact($ar[2])){
                    return $valid = false;
                }
                return $valid = true;
            }
            
            private function format_contact_details($ar){
                $formated = [];
                $is_name = true;
                foreach($ar as $a){
                    $a = trim($a);
                    $a = stripslashes($a);
                    $a = htmlspecialchars($a);
                    if($is_name){
                        $is_name = false;
                        $a = ucwords($a);
                    }
                    array_push($formated, $a);
                }
                
                return $formated;
            }

            private function is_empty($i){
                if(!empty($i)){
                    return true;
                }
                return false;
            }

            private function is_Contact($i){
                $i = filter_var($i, FILTER_SANITIZE_NUMBER_INT);
                $pattern = "/^[0-9]{11}+$/";
                if(preg_match($pattern, $i)) {
                    return true;
                } 
                return false;

            }
            public function show_add_forms(){
                return include_once './view/add_contact.php';
            }
            public function show_update_forms($n, $nn, $nb){
                $up_nm = $n;
                $up_nn = $nn;
                $up_nmb = $nb;
                return include_once './view/update_contact.php';
            }
        }
?>