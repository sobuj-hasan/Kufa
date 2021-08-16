<?php
    session_start();
    require_once 'includes/database.php';

    $customer_review = $_POST['customer_review'];
    $customer_name = $_POST['customer_name'];
    $company_name = $_POST['company_name'];

    $customer_image_name = $_FILES['customer_image']['name'];
    $customer_image_after_explode = explode(".", $customer_image_name);
    $customer_image_extention = end($customer_image_after_explode);
    $customer_image_new_name = time() . "-" . rand(1111, 9999) . "." . $customer_image_extention;
    
    $customer_image_temporary_location = $_FILES['customer_image']['tmp_name'];
    $customer_image_new_location = "image/testimonial_image/" . $customer_image_new_name;
    move_uploaded_file($customer_image_temporary_location, $customer_image_new_location);

    $insert_query = "INSERT INTO testimonials (customer_image, customer_opinion, customer_name, customer_company) VALUES ('$customer_image_new_name', '$customer_review', '$customer_name', '$company_name')";    
    mysqli_query($db_connect, $insert_query);
    $_SESSION['testimonial_status'] = "Your Testimonial Added Successfully!";
    header('location: testimonial.php');


?>