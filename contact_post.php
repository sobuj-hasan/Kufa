<?php
    session_start();
    require_once 'includes/database.php';

    $guest_name = $_POST['guest_name'];
    $guest_email = $_POST['guest_email'];
    $guest_message = $_POST['guest_message'];

    $insert_query = "INSERT INTO contacts (guest_name, guest_email, guest_message) VALUES ('$guest_name', '$guest_email', '$guest_message')"; 
            mysqli_query($db_connect, $insert_query);
            $_SESSION['contact_form_status'] = "Message Sent Successfully";
            header("location: index.php#contact");

?>