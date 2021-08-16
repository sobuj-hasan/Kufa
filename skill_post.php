<?php
    require_once 'includes/oop-database.php';

    $skill_name = $_POST['skill_name'];
    $skill_header = $_POST['skill_header'];
    $skill_percentage = $_POST['skill_percentage'];

    $object_db->insert('skills', [
        'skill_name' => $skill_name,
        'skill_header' => $skill_header,
        'skill_percentage' => $skill_percentage12
    ]);
    // $insert_query = "INSERT INTO skills (skill_name, skill_header, skill_percentage) VALUES ('$skill_name', '$skill_header', '$skill_percentage')";
    // mysqli_query($db_connect, $insert_query);
    // $_SESSION['skill_added_status'] = "New skill Added successfully";
    // header('location: skill.php');

?>