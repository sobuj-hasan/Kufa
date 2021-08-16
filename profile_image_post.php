<?php
session_start();
    require_once 'includes/database.php';

    if(!$_FILES['new_profile_image']['name']){
        $_SESSION['image_select_missing'] = "Please select One image!";
        header("location: profile_image.php");
        die();
    }
    $user_image_name = $_FILES['new_profile_image']['name'];
    $after_explode = explode(".", $user_image_name);
    $image_extension = end($after_explode);
    $accepted_extension = ['jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG'];
    
    if(!in_array($image_extension, $accepted_extension)){
        $_SESSION['image_extention_missing'] = "This image formate is not accepted!";
        header("location: profile_image.php");
        die();
    } 
    if($_FILES['new_profile_image']['size'] > 50000){
        echo "";
        $_SESSION['file_size_not_accepting'] = "This file size greater than 50kb!";
        header("location: profile_image.php");
        die();
    }
    $email_address_from_login_page = $_SESSION['email_address_from_login_page'];
    $get_id_query = "SELECT id, profile_image FROM users WHERE email_address = '$email_address_from_login_page'";
    $store_user_id = mysqli_fetch_assoc(mysqli_query($db_connect, $get_id_query))['id'];
    $db_profile_image_name = mysqli_fetch_assoc(mysqli_query($db_connect, $get_id_query))['profile_image'];

    if($db_profile_image_name != "default.png"){
        unlink("image/profile_image/" . $db_profile_image_name);
    }
     // image uploade start
    $image_new_name = $store_user_id . "." . $image_extension;

    $user_temp_location = $_FILES['new_profile_image']['tmp_name'];    
    $new_location = "image/profile_image/" . $image_new_name;
    move_uploaded_file($user_temp_location, $new_location);
    // image uploade End

    // Database image update start
    $update_query = "UPDATE users SET profile_image = '$image_new_name' WHERE email_address = '$email_address_from_login_page'";
    mysqli_query($db_connect, $update_query);
    header('location: profile_image.php');
    // Database image update End




?>