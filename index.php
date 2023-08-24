

<?php

    // error handler
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    ini_set('implicit_flush', false);
    // auto load classes
    include_once './autoloader.php';

    // handle request
    if(isset($_POST['add_btn']) || isset($_POST['add_contact']) ||
        (isset($_GET['contact']) && $_GET['contact'] == "invalid") ||
        (isset($_GET['contact']) && $_GET['contact'] == "success")){ // handle Add Contact
        $add_contact = new Controller_Contacts();
        if(isset($_POST['add_contact'])){
            $n = $_POST['realname'];
            $nn = $_POST['nickname'];
            $nm = $_POST['number'];
            $add_contact->add_contact([$n , $nn , $nm]);
        }
        $add_contact->show_add_forms();
        $add_contact->disconnect();

    }elseif(isset($_GET['update'])){ // handle Update Contact
        $edit_contact = new Controller_Contacts(); 
        $contact_id =  $_GET['update'];
        $edit_contact->get_specific_contact($contact_id);
        
        if(isset($_POST['update_contact'])){
            $n = $_POST['realname'];
            $nn = $_POST['nickname'];
            $nm = $_POST['number'];

            $edit_contact->change_details([$n, $nn, $nm], $contact_id);
        }
        $edit_contact->disconnect();

    }elseif(isset($_GET['del'])){ // handle Delete Contact
        $del_id = $_GET['del'];
        $delete = new Controller_Contacts();
        $delete->delete_contact([$del_id]);

    }elseif (isset($_POST['search_btn'])) {
        $srch = new Controller_Contacts();
        $s = $_POST['search'];
        $srch->search_contact($s);
    }else{ // handle Delete Contact
        $all =  new Controller_Contacts();
        $all->show_all_contacts();
    }

?>