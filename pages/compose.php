<?php
 include_once '../config/autoload.php';
 session_start();
 if(empty($_SESSION['id'])){
        echo "Anda harus login dahulu"."<br/>";
        echo create_anchor('index.php', 'Index');
    }
    else{
         if(isset($_SESSION['status'])){
             if($_SESSION['status']==0)
                 echo "Invalid Recipient";
             if($_SESSION['status']!=0)
                 echo "Message Sent";
         }
?>
<h2>Compose
    <form method="post" action="compose_process.php">
    <table border="1">
        <tr>
            <td>to</td>
            <td>:</td>
            <td><input type="text" size="50" name="recipient"></td>
        </tr>
        <tr>
            <td>subject</td>
            <td>:</td>
            <td><input type="text" size="50" name="sbj"></td>
        </tr>
        <tr>
            <td>message</td>
            <td>:</td>
            <td><input type="text" size="50" name="msg"></td>
        </tr>
    </table>
        <input type="submit" value="Send">
        <input type="reset" value="Reset">
        
    <?php 
        echo "<br/>".create_anchor('index.php', 'Index');

    }
    ?>