<?php
   include_once '../config/autoload.php';
   $user=array();
   $user['username']=get_post_parameter('username');
   $user['pwd']=get_post_parameter('pwd');
   
   $log=login($user['username'],$user['pwd']);
   
   if(!empty($log)){
       session_start();
       $id=selectID($user['username']);
       $_SESSION['nama']=$user['username'];
       $_SESSION['id']=$id[0]['id'];
       $_SESSION['valid']=0;
       $_SESSION['revalid']=0;
    
       redirect_to('index.php');
   }
   else{
       session_start();
       $_SESSION['attempt']=0;
       redirect_to('login.php');
       echo create_anchor('login.php', 'Login');
   }
?>
