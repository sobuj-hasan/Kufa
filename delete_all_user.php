<?php
    session_start();
    require_once 'includes/database.php';

    $id = $_GET['id'];
    $delete_all_user = "DELETE FROM users ";

    if(mysqli_query($db_connect, $delete_all_user)){
        
        $_SESSION['status'] = "Deleted All users successfully!";

        header('location: user_list.php');
    }    
    else{
        echo "No";
    }

?>