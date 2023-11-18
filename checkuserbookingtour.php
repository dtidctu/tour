<?php include('./loginuser-check.php') ?>


    <!-- tour sEARCH Section Ends Here -->

    <?php
    // click submit
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password=md5($_POST['password']);
    
    // take db sql
        $sql = "SELECT * FROM tblusers WHERE username='$username' AND password ='$password'";

    // Execute query
        $res = mysqli_query($conn, $sql);

    // test acount exitsts
        $count = mysqli_num_rows($res);
        if($count==1)
        {
            // login success
            $_SESSION['login'] = "<div class='loginsuccess'>Login Successful.</div>";
            // xác thực
            //$_SESSION['user'] = $username;

            header("Location:bookingtour.php");
    
            // return Home/ dashboard
        }
        else
        {
            // login fail
            $_SESSION['login'] = "<div class='loginerror text-center'>Username or Password fail.</div>";
            // return Home/ dashboard
            header('location:'.SITEURL.'booktour.php');
        }
    }
?>



<?php include('includes/footer.php') ?>