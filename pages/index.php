<?php
   include_once '../config/autoload.php';

       session_start();
       if(empty($_SESSION['id'])){
        echo "Anda harus login dahulu"."<br/>";
        echo create_anchor('index.php', 'Index');
    }
    else{
       echo "Howdy ";
       echo "<b>". $_SESSION['nama']."!!</b>";
       echo " [".create_anchor('logout_process.php', ' logout')."]<br/>";
       echo create_anchor('compose.php', 'Compose')."<br/>";
       echo create_anchor('mails.php', 'Mails');
    }
?>
