<?php
    include_once '../config/autoload.php';
    session_start();
    if(isset($_SESSION['attempt'])){
        if($_SESSION['attempt']==1){
            echo "Welcome ".$_SESSION['name']."!!!<br/>";
            echo create_anchor('logout.php','Log out');
        }    
        else
            echo "Invalid credential<br/>";  
    }
    
    
?>
<html>
    <body >
        <form method="post" action="login_process.php">
        <table align="center" border="1">
            <tr>
                <td colspan="3" align="center">Login</td>
            </tr>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="password" name="pwd"></td>
            </tr>
        </table>
        <p align="center"><input type="submit" name="Login" value="Login">
        <input type="reset" name="Login" value="Reset"></p>
        </form>
    </body>
</html>