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
            $x = 'sss';
            $result = $this->prepared($insert_q, $x, $ar);

            return $result;
        }

        protected function select_where_id($ar){
            $search_id = "SELECT contact_name, contact_nickname,
            contact_number FROM  contact_table WHERE contact_id = ? ";
            $x = 's';
            $result = $this->prepared($search_id, $x, $ar);

            return $result;
        }

        protected function select_where_name($search){
            $search_id = "SELECT contact_name, contact_nickname,
            contact_number FROM  contact_table WHERE contact_name = '$search' ";

            $result = $this->query($search_id);
          
            return $result;
        }

        protected function update_this_contact($ar){
            $update = "UPDATE contact_table SET contact_name = ?, contact_nickname = ?,
                        contact_number = ? where contact_id = ?";
              $x = "ssss";
            $up_status = $this->prepared($update, $x, $ar);
            
            return $up_status;  
        }
        
        protected function delete_where($id){
            $del = "DELETE FROM contact_table WHERE contact_id = ?";
            $x = "s";
            $del_status = $this->prepared($del, $x, $id);
            
            return $del_status;
        }

        protected function select_columns($t){
            $cols = "SELECT COLUMN_NAME  FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '".$t."'";
            $list_cols = $up_status = $this->query($cols);
            return $list_cols;
        }

    }

?>