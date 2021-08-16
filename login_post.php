<?php
    session_start();
    require_once 'includes/database.php';

    $full_name = $_POST['full_name'];
    $email_address = $_POST['email_address']; 
    $password = md5($_POST['password']);

    $count_query = "SELECT COUNT(*) AS total_check FROM users WHERE email_address = '$email_address' AND password = '$password'";
    
    $from_db = mysqli_query($db_connect, $count_query);
    $after_assoc = mysqli_fetch_assoc($from_db);
    if($after_assoc['total_check'] == 1){
        $_SESSION['login_status'] = "Yes";
        $_SESSION['email_address_from_login_page'] = $email_address;

        $name_select_query = "SELECT full_name, profile_image, role FROM users WHERE email_address = '$email_address'";
        $name_from_db = mysqli_query($db_connect, $name_select_query);
        $name_from_db_after_assoc = mysqli_fetch_assoc($name_from_db);
        $_SESSION['name_from_login_page'] = $name_from_db_after_assoc['full_name'];
        $_SESSION['profile_image_from_login_page'] = $name_from_db_after_assoc['profile_image'];
        $_SESSION['role_from_login_page'] = $name_from_db_after_assoc['role'];
        header("location: dashboard.php");
    }
    else{
        $_SESSION['email_password_error'] = "Your email or password is wrong!";
        header("location: login.php");
    }




?>