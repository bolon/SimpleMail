<?php
 include_once '../config/autoload.php';

session_start();
$receiver=  get_post_parameter('recipient');
$idR=selectID($receiver);
$temp = isExist($receiver);

if(!empty($temp[0][1])){
    $_SESSION['status']=1;
    
    $sbj=get_post_parameter('sbj');
    $msg=get_post_parameter('msg');
    sendMail($_SESSION['id'], $idR[0]['id'], $sbj, $msg);
    redirect_to('compose.php');
}
else{
    $_SESSION['status']=0;
    redirect_to('compose.php');
    }
?>
