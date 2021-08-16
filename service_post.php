<?php 
    session_start();
    require_once 'includes/database.php';

    $service_icon = $_POST['service_icon'];
    $service_title = $_POST['service_title'];
    $service_description = $_POST['service_description'];

        $insert_query = "INSERT INTO services (service_icon, service_title, service_description) VALUES ('$service_icon', '$service_title', '$service_description')"; 
        mysqli_query($db_connect, $insert_query);
        $_SESSION['service_status'] = "Service Added successfully";
        header("location: service.php");

?>