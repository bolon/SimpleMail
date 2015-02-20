<?php
 include_once '../config/autoload.php';
 session_start();
 
 $mail=get_mail($_GET['id']);
 if(empty($_SESSION['id'])){
        echo "Anda harus login dahulu"."<br/>";
        echo create_anchor('index.php', 'Index');
    }
    else{
         if(empty($mail)){
             $_SESSION['valid']++;
             redirect_to('mails.php');
         }
          else{
              if($_SESSION['id']!=$mail[0]['to_user_id']){
                  $_SESSION['revalid']++;
                  redirect_to('mails.php');
              }
              else{
                  $_SESSION['valid']=0;
                  $_SESSION['revalid']=0;
    ?>
    <h2>Compose
        <form method="post" action="compose_process.php">
        <table border="1">
            <tr>
                <td>from</td>
                <td>:</td>
                <td><input type="text" size="50" name="recipient" value="<?php echo $mail[0]['username']; ?>"></td>
            </tr>
            <tr>
                <td>subject</td>
                <td>:</td>
                <td><input type="text" size="50" name="" value="<?php echo $mail[0]['subject']; ?>"></td>
            </tr>
            <tr>
                <td>message</td>
                <td>:</td>
                <td><input type="text" size="50" name="msg" value="<?php echo $mail[0]['message']; ?>"></td>
            </tr>
        </table>
            <?php
                echo create_anchor('index.php','Home')."<br/>";
                echo create_anchor('mails.php', 'Mails');
            }

          }    
    }
        ?>
