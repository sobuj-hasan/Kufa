<?php
session_start();
    require_once 'includes/database.php';

    $user_image_name = $_FILES['brand_image']['name'];
    $after_explode = explode(".", $user_image_name);
    $image_extension = end($after_explode);

    // image uploade start
    $image_new_name = time() . "-" . rand(1111,9999) . "." . $image_extension;

    $user_temp_location = $_FILES['brand_image']['tmp_name'];    
    $new_location = "image/brand_image/" . $image_new_name;
    move_uploaded_file($user_temp_location, $new_location);
    // image uploade End
    if($user_image_name == ""){
        $_SESSION['brand_image_status'] = "Please Select One Image";
        header('location: brand.php');
        die();
    }
    $insert_query = "INSERT INTO brands (brand_image_name) VALUES ('$image_new_name')";
    mysqli_query($db_connect, $insert_query);
    $_SESSION['brand_image_added_status'] = "Brand image Added successfully";
    header('location: brand.php');

?>