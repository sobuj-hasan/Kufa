<?php
    session_start();
    require_once 'includes/database.php';
    
    $email_address = $_SESSION['email_address_from_login_page'];
    $encript_password = md5($_POST['old_password']);

    $check_query = "SELECT COUNT(*) AS total_check FROM users WHERE email_address = '$email_address' AND password = '$encript_password'";

    $from_database = mysqli_query($db_connect, $check_query);
    $after_assoc = mysqli_fetch_assoc($from_database);
    $after_assoc['total_check'];

    if($after_assoc['total_check'] == 1){
        if($_POST['new_password'] == $_POST['confirm_password']){
            $encript_new_password = md5($_POST['new_password']);
            $password_update_query = "UPDATE users SET password = '$encript_new_password' WHERE email_address = '$email_address'";
            mysqli_query($db_connect, $password_update_query);
            if(mysqli_query($db_connect, $password_update_query)){
                $_SESSION['password_update_successfully_msg'] = "Password updated Successfully!";
                header('location: profile.php');
            }
        }
        else{
            echo "New password and confirm password don't match";
        }
    }
    else{
        $_SESSION['Old_password_checking'] = "Old password is wrong!";
        header('location: profile.php');
    }


?>