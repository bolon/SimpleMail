<?php
    include_once '../config/autoload.php';
    session_start();
    
    if(empty($_SESSION['id'])){
        echo "Anda harus login dahulu"."<br/>";
        echo create_anchor('index.php', 'Index');
    }
    else{
        $mails = get_all_mails($_SESSION['id']);
        if($_SESSION['valid']!=0){
            echo "Its not your email<br/>";
        }
        if($_SESSION['revalid']!=0){
            echo "Invalid mail";
        }
        echo "<h1>Mails";
        echo(array_to_table(array('NO','ID','From','Subject'),$mails));
        echo create_anchor('index.php','Home')."<br/>";
        echo create_anchor('compose.php', 'Compose');
    }
?>
