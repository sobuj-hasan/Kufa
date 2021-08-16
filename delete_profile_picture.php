<?php
    require_once 'includes/database.php';

    $picture_name = $_GET['picture_name'];
    unlink("image/profile_image/".$picture_name);

    $update_query = "UPDATE users SET profile_image = 'default.png' WHERE profile_image = '$picture_name'";
    mysqli_query($db_connect, $update_query);
    header('location: profile_image.php');

?>