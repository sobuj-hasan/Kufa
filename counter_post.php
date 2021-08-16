<?php
    session_start();
    require_once 'includes/database.php';

    $id = $_POST['id'];  
    $count_icon = $_POST['count_icon']; 
    $count_number = $_POST['count_number']; 
    $count_title = $_POST['count_title'];

    $insert_query = "INSERT INTO counter (count_icon, count_number, count_title) VALUES ('$count_icon', $count_number, '$count_title')";
    mysqli_query($db_connect, $insert_query);
    $_SESSION['counter_status'] = "Counter Item Added Successfully";
    header('location: counter.php');



?>