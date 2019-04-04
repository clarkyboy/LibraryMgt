<?php
    session_start();
    session_destroy();
    $page = $_GET['page'];

    if($page ==  1){
        header('Location: employee/');
    }else{
        header('Location: admin/');
    }
?>