<?php
session_start();
    require_once 'includes/database.php';


    $portfolio_title = $_POST['portfolio_title'];
    $portfolio_details = $_POST['portfolio_details'];

    $author_unique_email_address = $_SESSION['email_address_from_login_page'];

    // Thumbnail image upload start
    $user_thumbnail_image_name = $_FILES['portfolio_thumbnail_photo']['name'];
    $after_explode = explode(".", $user_thumbnail_image_name);
    $image_extension = end($after_explode);

    $thumbnail_image_new_name = time() . rand(1000, 9999) . "." . $image_extension;
    $user_image_temp_lcation = $_FILES['portfolio_thumbnail_photo']['tmp_name'];
    $image_new_location = "image/portfolio_image/thumbnail/" . $thumbnail_image_new_name;
    move_uploaded_file($user_image_temp_lcation, $image_new_location);
    // Thumbnail image upload End

    // Feature image upload start
    $user_feature_image_name = $_FILES['portfolio_feature_photo']['name'];
    $after_explode = explode(".", $user_feature_image_name);
    $image_extension = end($after_explode);

    $feature_image_new_name = time() . rand(1000, 9999) . "." . $image_extension;
    $user_image_temp_lcation = $_FILES['portfolio_feature_photo']['tmp_name'];
    $image_new_location = "image/portfolio_image/feature/" . $feature_image_new_name;
    move_uploaded_file($user_image_temp_lcation, $image_new_location);
    // Feature image upload End

    $insert_query = "INSERT INTO portfolios (post_by, portfolio_title, portfolio_details, portfolio_thumbnail, portfolio_feature_photo) VALUES ('$author_unique_email_address', '$portfolio_title', '$portfolio_details', '$thumbnail_image_new_name', '$feature_image_new_name')";
    mysqli_query($db_connect, $insert_query);
    $_SESSION['portfolio_image_status'] = "Portfolio Details Added successfully";
    header('location: portfolio_add.php');


?>