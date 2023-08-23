<?php
    if(isset($_GET['update'])){
        $params = $_SERVER['REQUEST_URI'];
        $updateParam = parse_url($params);
        parse_str($updateParam['query'], $par);
    }
    
    if(isset($_GET['contact']) && $_GET['contact'] == 'success'){
        echo "<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/toastify-js'></script>
        <script> 
        Toastify({
            text: 'Add Success',
            className: 'info',
            style: {
                background: 'green',
            }
            }).showToast();</script>";
    }elseif (isset($_GET['contact']) && $_GET['contact'] == 'invalid') {
        echo "<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/toastify-js'></script>
        <script> 
        Toastify({
            text: 'Invalid',
            className: 'info',
            style: {
                background: 'red',
            }
            }).showToast();</script>";
        echo "<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/toastify-js'></script>
        <script> 
        Toastify({
            text: 'Name and Number is Required',
            className: 'info',
            style: {
                background: 'red',
            }
            }).showToast();
        </script>";
        echo "<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/toastify-js'></script>
        <script> 
        Toastify({
            text: 'Number must 11 digits',
            className: 'info',
            style: {
                background: 'red',
            }
            }).showToast();
        </script>";
    }elseif(isset($_GET['upstatus']) && $_GET['upstatus'] == 'success'){
        echo "<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/toastify-js'></script>
            <script> 
            Toastify({
                text: 'Update Success',
                className: 'info',
                style: {
                    background: 'green',
                }
                }).showToast();
               
                setTimeout(function(){
                    intoIndex()}, 2000);
                
            function intoIndex(){  
                window.location.href = './index.php';
            }
            </script>";
    }elseif ((isset($par['upstatus']) && $par['upstatus'] == 'failed')) {
            echo "<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/toastify-js'></script>
                <script> 
                Toastify({
                    text: 'Update Failed',
                    className: 'info',
                    style: {
                        background: '#ca8a04',
                        position: 'absolute',
                    }
                    }).showToast();
                </script>";
        echo "<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/toastify-js'></script>
            <script> 
            Toastify({
                text: 'Name and Number is Required',
                className: 'info',
                style: {
                    background: '#ca8a04',
                }
                }).showToast();
            </script>";
            echo "<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/toastify-js'></script>
            <script> 
            Toastify({
                text: 'Number must 11 digits',
                className: 'info',
                style: {
                    background: '#ca8a04',
                }
                }).showToast();
            </script>";

    }elseif(isset($_GET['delstatus']) && $_GET['delstatus'] == 'success'){
        echo "<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/toastify-js'></script>
            <script> 
            Toastify({
                text: 'Delete Success',
                className: 'info',
                style: {
                    background: 'green',
                }
                }).showToast();
               
                setTimeout(function(){
                    intoIndex()}, 2000);
                
            function intoIndex(){  
                window.location.href = './index.php';
            }
            </script>";
    }elseif(isset($_GET['delstatus']) && $_GET['delstatus'] == 'faileds'){
        echo "<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/toastify-js'></script>
            <script> 
            Toastify({
                text: 'Delete Failed',
                className: 'info',
                style: {
                    background: 'red',
                }
                }).showToast();
               
                setTimeout(function(){
                    intoIndex()}, 2000);
                
            function intoIndex(){  
                window.location.href = './index.php';
            }
            </script>";
    }

?>