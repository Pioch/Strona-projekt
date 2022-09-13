<?php
    require('db_connection.php');
    require('PHPMailer/src/PHPMailer.php');
    require('PHPMailer/src/SMTP.php');

    $input_email = mysqli_real_escape_string($db_conn, $_POST["email"]);

    $query_user = mysqli_query($db_conn, "SELECT * FROM users WHERE user_email='$input_email");
    
    if(mysqli_num_rows($query_user)==1) {
        $record = mysqli_fetch_array($query_user);
        $email=md5($record['user_email']);
        $pass=$record['user_passwordhash'];
    
        $link="<a href='https://partisan-armadillo-0984.dataplicity.io/reset_pass.php?key=".$email."&reset=".$pass."'>Click To Reset password</a>";
        require_once('PHPMailer/src/PHPMailer.php');
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->IsSMTP(); // enable SMTP
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = 'a49bb030cc13c7';
        $mail->Password = 'faa73316395cb0';
    
        $mail->From='pitertest0408@gmail.com';
        $mail->FromName='Piotr';
        $mail->AddAddress($email);
        $mail->Subject  =  'Reset Password';
        $mail->IsHTML(true);
        $mail->Body = 'Click On This Link to Reset Password '.$pass.'';
        if($mail->Send())
        {
          echo 'Sprawdź meila i kliknij na otrzymane łącze';
        }
        else
        {
          echo "Mail Error - >".$mail->ErrorInfo;
        }    

    }
   
?>