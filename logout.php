<?php

session_start();
    unset($_SESSION['login_status']);
    unset($_SESSION['email_address_from_login_page']);
    header('location: login.php');

    
?>