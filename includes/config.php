<?php

    session_start();

    define('SITEURL', 'http://localhost:8080/tour/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'tour');

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die("Can not connect to mysql");
    $db_select = mysqli_select_db($conn, DB_NAME) or die("Can not connect to mysql");
?>