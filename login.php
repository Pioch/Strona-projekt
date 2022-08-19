<?php
    require('db_connection.php');

    $user_login = mysqli_real_escape_string($db_conn, $_POST["login"]);
    $user_password = mysqli_real_escape_string($db_conn, $_POST["password"]);

    $query_login = mysqli_query($db_conn, "SELECT * FROM users WHERE user_email ='$user_email'");

    if(mysqli_num_rows($query_login) > 0) {
        $record = mysqli_fetch_assoc($query_login);
        $hash = $record["user_passworhash"];
        if (password_verify($user_password, $hash)) {
           $_SESSION["current_user"] = $record["user_id"];
        }
     }

     session_start();
     if (isset($_SESSION["current_user"])){
        /* Użytkownik jest zalogowany */
        echo "Zalogowano";
     } else {
        /* Użytkownik nie jest zalogowany */
        echo "Błąd logowania";
     }
 
?>