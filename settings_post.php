<?php
session_start();
    require_once 'includes/database.php';

    foreach($_POST as $settings_name => $settings_value){

        $update_query = "UPDATE text_settings SET settings_value='$settings_value' WHERE settings_name='$settings_name'";
        mysqli_query($db_connect, $update_query);
    }
    $_SESSION['settings_status'] = "Settings update successfully!";
    header('location: settings.php');
?>