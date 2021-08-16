<?php
    session_start();
    require_once 'includes/database.php';

    $full_name = $_POST['full_name'];
    $email_address = $_POST['email_address'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $gender = $_POST['gender'];

    if($password == $confirm_password){

        $count_query = "SELECT COUNT(*) AS total_check FROM users WHERE email_address = '$email_address'";
        $from_db = mysqli_query($db_connect, $count_query);
        $after_assoc = mysqli_fetch_assoc($from_db);

        if($after_assoc['total_check'] == 0){

            $encript_password = md5($password);
        
            $insert_query = "INSERT INTO users (full_name, email_address, password, gender) VALUES ('$full_name', '$email_address', '$encript_password', '$gender')"; 
            mysqli_query($db_connect, $insert_query);
            header("location: login.php");
        }
        else{
            $_SESSION['duplicate_email_error'] = "This Email address is already been used!";
            header("location: registration.php");
        }
    }
    else{
        $_SESSION['password_matching_error'] = "Your password doesn't match";
        header("location: registration.php");
    }
?>