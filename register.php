<?php include('./includes/config.php'); ?>
<link href="css/admin.css" rel='stylesheet' type='text/css' />
<html>

<head>
    <title>Login - Tour System</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <div class="login">
        <h1 class="text-center">Đăng ký ngay!</h1>
        <br><br>
        <?php
        //  if(isset($_SESSION['login']))
        //  {
        //     echo $_SESSION['login'];
        //     unset($_SESSION['login']);
        //  }

        //  if(isset($_SESSION['no-login-message']))
        //  {
        //     echo $_SESSION['no-login-message'];
        //     unset($_SESSION['no-login-message']);
        //  }
        ?>

        <!-- login form -->
        <form action="" method="POST">
            <br> <br>

            <h2 class="coloruserpass">Tên đăng nhập</h2>
            <div class="text-center">
                <input type="text" name="username" placeholder="Enter Username" class="input" required=""> <br><br>
            </div>

            <h2 class="coloruserpass">Mật khẩu</h2>
            <div class="text-center">
                <input type="password" name="password" placeholder="Enter Password" class="input" required=""><br><br>
            </div>

            <h2 class="coloruserpass">Họ và tên</h2>
            <div class="text-center">
                <input type="text" name="fullname" placeholder="Enter Fullname" class="input" required=""> <br><br>
            </div>
            <h2 class="coloruserpass">Số điện thoại</h2>
            <div class="text-center">
                <input type="text" name="mobilenumber" placeholder="Enter Your Number" class="input" required=""> <br><br>
            </div>
            <h2 class="coloruserpass">Sinh nhật</h2>
            <div class="text-center">
                <input type="date" name="birthday" placeholder="Enter Your Birthday" class="input" required=""> <br><br>
                <input type="submit" name="submit" value="Đăng ký" class="btn-login">
            </div>

            <br>
            <div class="backhome">
                <p>Bạn đã có tài khoản! <a style="text-decoration: none; color:yellow;" href="loginuser.php">Đăng nhập ngay</a></p>
            </div>


        </form>
    </div>
</body>

</html>

<?php

if (isset($_POST['submit'])) {
    // post data
    $role_id = 2;
    $valid = 1;
    if (empty($_POST['fullname'])) {
        $valid = 0;
        $error_message = "Nhập tên người dùng<br>";
    }
    $fullname = trim($_POST['fullname']);
    $username = trim($_POST['username']);
    $password = trim(md5($_POST['password']));
    $mobilenumber = trim($_POST['mobilenumber']);
    $birthday = trim($_POST['birthday']);

    if ($valid == 1) {
        $cust_datetime = date('Y-m-d h:i:s');
        $cust_timestamp = time();
    }

    // insert data
    $sql = "INSERT INTO tblusers SET 
            fullname = '$fullname',
            role_id = '$role_id',
            username = '$username',
            password = '$password',
            mobilenumber = '$mobilenumber',
            sinhnhat = '$birthday'
        ";

    // execute sql

    $res = mysqli_query($conn, $sql) or die("Can not execute!");

    // check data
    if ($res == TRUE) {
        // echo "Data Inserted";
        // create a sesion
        $_SESSION['add'] = "<div class='loginsuccess text-center'>User Added Successfully! Now, You can Login</div>";
        // chuyển hướng đến manage admin
        header("location:" . SITEURL . 'loginuser.php');
        $_SESSION['fullname'] = $fullname;
    } else {
        // echo "Faile to Insert Data";
        $_SESSION['add'] = "Error when creating account! ";
        // chuyển hướng đến manage admin
        header("location:" . SITEURL . 'register.php');
    }
}



?>