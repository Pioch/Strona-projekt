<?php
    require('db_connection.php');

    $user_fullname = mysqli_real_escape_string($db_conn, $_POST["name"]);
    $user_email = mysqli_real_escape_string($db_conn, $_POST["email"]);
    $user_password = mysqli_real_escape_string($db_conn, $_POST["password"]);

    $user_passwordhash = password_hash($user_password, PASSWORD_DEFAULT);

    if(mysqli_query($db_conn, "INSERT INTO users (user_fullname, user_email, user_passwordhash) VALUES('$user_fullname', '$user_email', '$user_passwordhash')")) {
        echo "Rejestracja przebiegła poprawnie";
    } 
    else {
        echo "Nieoczekiwany błąd - użytkownik już istnieje lub błąd serwera MySQL.";
    }
    
?>