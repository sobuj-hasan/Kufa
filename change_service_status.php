<?php
    require_once 'includes/database.php';

    $id = $_GET['id'];
    $what_to_do = $_GET['what_to_do'];

    $update_query = "UPDATE services SET status = '$what_to_do' WHERE id = $id";
    mysqli_query($db_connect, $update_query);
    header('location: service.php');


?>