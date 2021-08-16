<?php
    define("HOST_NAME", "localhost");
    define("USERS_NAME", "root");
    define("PASSWORD", "");
    define("DATABASE_NAME", "lion");
    // Database connection start
    $db_connect = mysqli_connect(HOST_NAME, USERS_NAME, PASSWORD, DATABASE_NAME);
    
        if(mysqli_connect_errno()){
            echo "<h1>Something went wrong!</h1>";
        }
        // Database connection End
?>