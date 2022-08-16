<?php
    $db_host = "192.168.50.121";
    $db_name = "WebServer";
    $db_user = "piotr";
    $db_pass = "domserver";
    $db_conn = mysqli_connect($dbhost,$dbuser,$dbpass)
    or die ("Odpowiedź: Błąd połączenia z serwerem $host");
    mysqli_select_db($db_conn, $dbname) or die("Trwa konserwacja bazy danych… Odśwież stronę za kilka sekund.");
?>