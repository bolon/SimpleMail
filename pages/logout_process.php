<?php
    include_once '../config/autoload.php';
    session_start();

    if(!empty($_SESSION['name'])){
        echo "Terimakasih sudah berkunjung<br/>";
        session_destroy();
        echo create_anchor('login.php','Index');
    }
    

?>