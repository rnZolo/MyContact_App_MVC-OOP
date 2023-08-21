<?php
    class Model_Contacts extends Model_Conn {
        private const q_all = "SELECT * FROM  contact_table";

        protected function select_all_contacts(){
            $result = $this->query(self::q_all);
            return $result;
        }

        protected function insert_contact($ar){
            $insert_q = "INSERT INTO contact_table (contact_name, contact_nickname,
                        contact_number) VALUES (?, ?, ?)";
            $result = $this->prepared($insert_q, $ar);

            return $result;
        }

        protected function select_where_contact($ar){
            $search_id = "SELECT contact_name, contact_nickname,
            contact_number FROM  contact_table WHERE contact_id = ? ";
            $result = $this->prepared($search_id, $ar);

            return $result;
        }

        protected function update_this_contact($ar){
            $update = "UPDATE contact_table SET contact_name = ?, contact_nickname = ?,
                        contact_number = ? where contact_id = ?";
            $up_status = $this->prepared($update, $ar);

            return $up_status; 
        }
        
        protected function delete_where($id){
            $del = "DELETE FROM contact_table WHERE contact_id = ?";
            $del_status = $this->prepared($del, $id);
    
            return $del_status;
        }
    }
?>