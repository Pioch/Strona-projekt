<?php
    session_start();

    $alert_text = array();
    if($_SESSION['alert'] != '') {
        $alert_text = $_SESSION['alert'];
        echo json_encode($alert_text);
        $_SESSION['alert'] = '';
    }
?>