        <?php
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            ini_set('implicit_flush', false);

            include_once './autoloader.php';
            
            // $seacrhed_user = null;
            if(isset($_POST['add_btn']) || isset($_POST['add_contact']) ||
                (isset($_GET['contact']) && $_GET['contact'] == "invalid") ||
                (isset($_GET['contact']) && $_GET['contact'] == "success")){
                $add_contact = new Controller_Contacts();
                if(isset($_POST['add_contact'])){
                    $n = $_POST['realname'];
                    $nn = $_POST['nickname'];
                    $nm = $_POST['number'];
                    $add_contact->add_contact([$n , $nn , $nm]);
                }
                $add_contact->show_add_forms();
            }elseif(isset($_GET['update']) || isset($_POST['update_contact']) ){
                $edit_contact = new Controller_Contacts();
                $contact_id =  $_GET['update'];
                // $get_status =  $_GET['upstatus'];
                    // get info put into edit info in form
                $edit_contact->get_specific_contact([$contact_id]);
                    // update
                if(isset($_POST['update_contact'])){
                    $n = $_POST['realname'];
                    $nn = $_POST['nickname'];
                    $nm = $_POST['number'];
                    //
                    $edit_contact->change_details([$n, $nn, $nm, $contact_id]);
                }
            }elseif(isset($_GET['del'])){
                $del_id = $_GET['del'];
                $delete = new Controller_Contacts();
                $delete->delete_contact([$del_id]);
            }else{
                $all =  new Controller_Contacts();
                $all->show_all_contacts();
            }

        ?>