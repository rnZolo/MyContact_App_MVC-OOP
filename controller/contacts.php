<?php
        class Controller_Contacts extends Model_Contacts {

            public function show_all_contacts(){
                $datas = $this->select_all_contacts();
                return include_once './view/contacts.php';
            }
            
            public function add_contact($ar){
                if(!self::valid_inputs($ar)){
                    header('location: ?contact=invalid');
                    // method to call a notif
                    $this->show_add_forms();
                    exit();
                }else{
                    $ar = self::format_contact_details($ar);
                    $this->insert_contact($ar);
                    header('location: ?contact=success');
                      // method to call a notif
                    exit();
                }
                
            }

            public function get_specific_contact($ar){
                $details = $this->select_where_contact($ar);
                if($details->num_rows == 1 ){
                    $detail =  $details->fetch_assoc();
                    $up_nm = $detail['contact_name'];
                    $up_nn = $detail['contact_nickname'];
                    $up_nmb = $detail['contact_number'];
                    self::show_update_forms($up_nm, $up_nn, $up_nmb);
                }
                else{
                    header('location: .');
                    exit();
                }
                
            }

            public function change_details($ar){
                if(!self::valid_inputs($ar)){
                        // add notif failed
                        exit();
                }else{
                    $ar = self::format_contact_details($ar);
                    $up_status = $this->update_this_contact($ar);
                    if(!$up_status){
                        // header('location: ?upstatus=success'); // cause redirect index.php
                        header('location: .'); // intended to redirect
                        // method to call a notif
                        // header('refresh:0;'); // refresh off bounce
                        // add notif failed
                    }else{ 
                        // header('location: .'); // intended to redirect
                        // header('location: ?upstatus=failed'); // auto redirect index.php
                        // method to call a notif
                        // add notif failed
                    }
                    exit();// avoid automatic exit
                }
            }

            public function delete_contact($id){
                $this->delete_where($id);
                header('location: .');
                return ;
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