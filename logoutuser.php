<?php 
    include('./includes/config.php'); 
    session_destroy();

    header('location:'.SITEURL.'index.php');


?>