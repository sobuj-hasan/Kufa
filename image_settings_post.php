<?php
session_start();
    require_once 'includes/database.php';

    $logo_image_name = $_FILES['logo_image_name']['name'];
    $banner_image_name = $_FILES['banner_image_name']['name'];
    $about_image_name = $_FILES['about_image_name']['name'];
    
    // Logo image upload start
    $logo_image_after_explode = explode(".", $logo_image_name);
    $logo_image_extention = end($logo_image_after_explode);
    $logo_image_new_name = time() . "-" . rand(1111, 9999) . "." . $logo_image_extention;

    $logo_image_temp_location = $_FILES['logo_image_name']['tmp_name'];
    $logo_image_new_location = "image/settings_image/" . $logo_image_new_name;
    move_uploaded_file($logo_image_temp_location, $logo_image_new_location);
    // Logo image upload End

    // banner image upload start
    $banner_image_after_explode = explode(".", $banner_image_name);
    $banner_image_extention = end($banner_image_after_explode);
    $banner_image_new_name = time() . "-" . rand(1111, 9999) . "." . $banner_image_extention;

    $banner_image_temp_location = $_FILES['banner_image_name']['tmp_name'];
    $banner_image_new_location = "image/settings_image/" . $banner_image_new_name;
    move_uploaded_file($banner_image_temp_location, $banner_image_new_location);
    // banner image upload End

    // about image upload start
    $about_image_after_explode = explode(".", $about_image_name);
    $about_image_extention = end($about_image_after_explode);
    $about_image_new_name = time() . "-" . rand(1111, 9999) . "." . $about_image_extention;

    $about_image_temp_location = $_FILES['about_image_name']['tmp_name'];
    $about_image_new_location = "image/settings_image/" . $about_image_new_name;
    move_uploaded_file($about_image_temp_location, $about_image_new_location);
    //about image upload End

    $image_setting_insert_query = "INSERT INTO image_settings (logo_image_value, banner_image_value, about_image_value) VALUES ('$logo_image_new_location', '$banner_image_new_location', '$about_image_new_location')";
    mysqli_query($db_connect, $image_setting_insert_query);
    $_SESSION['image_settings_status'] = "Images Added Successfully";
    header('location: image_settings.php');

    











?>