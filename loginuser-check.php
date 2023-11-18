<?php
    if(!isset($_SESSION['user'])){
        $_SESSION['no-login-message'] = "<div class='error text-center'>Please login to Book tours!</div>";
        header('location:booktour.php');
    }
?>