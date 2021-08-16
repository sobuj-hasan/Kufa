<?php
    session_start();
    require_once 'includes/database.php';

    $id = $_GET['id'];
    $delete_user = "DELETE FROM services WHERE id = $id";

    if(mysqli_query($db_connect, $delete_user)){
        
        $_SESSION['service_delete_status'] = "Deleted user successfully!";

        header('location: service.php');
    }    
    else{
        echo "No";
    }

?>