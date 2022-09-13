<?php
    if(isset($_POST['submit_password']) && $_POST['key'] && $_POST['reset'])
    {
        $email=$_POST['email'];
        $pass=$_POST['password'];
        $repass=$_POST['repassword'];
        require('db_connection.php');
    
        if($pass == $repass) {
            $passwordhash = password_hash($pass, PASSWORD_DEFAULT);
            $select=mysqli_query($db_conn, "Update users Set user_passwordhash='$passwordhash' where user_email='$email'");
        }
        else {
            echo 'Podano różne hasła'. "<br>\n";
        }

    }
?>