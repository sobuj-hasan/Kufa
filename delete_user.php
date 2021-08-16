<?php
    session_start();
    require_once 'includes/database.php';

    $id = $_GET['id'];
    $delete_user = "DELETE FROM users WHERE id = $id";

    if(mysqli_query($db_connect, $delete_user)){
        
        $_SESSION['status'] = "$id This user is deleted successfully!";

        header('location: user_list.php');
    }    
    else{
        echo "No";
    }

?>