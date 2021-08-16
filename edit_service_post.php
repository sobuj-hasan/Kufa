<?php
session_start();
    require_once 'includes/database.php';

    $id = $_POST['id'];
    $service_icon = $_POST['service_icon'];    
    $service_title = $_POST['service_title'];    
    $service_description = $_POST['service_description'];
    
    $update_query = "UPDATE services SET service_icon='$service_icon', service_title='$service_title', service_description='$service_description' WHERE id = $id";
    mysqli_query($db_connect, $update_query);

    $_SESSION['service_status'] = "Service Updated Successfully";

    header('location: service.php');


?>