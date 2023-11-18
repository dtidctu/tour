<?php
    ob_start();
    include('../includes/config.php'); 
?>

<html>
    <head>
        <title>Đăng nhập quản trị | Website quản trị</title>
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
        <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>

    <body>
        <div class="">
            <?php
                 if(isset($_SESSION['login']))
                 {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                 }
                 
                 if(isset($_SESSION['no-login-message']))
                 {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                 }
            ?>
            <?php
                $targetId = null; // Khởi tạo biến để lưu trữ id cần lấy

                $sql2 = "SELECT * FROM tblusers";
                $res2 = mysqli_query($conn, $sql2);
                $count2 = mysqli_num_rows($res2);
              
                if ($count2 > 0) {
                  while ($row = mysqli_fetch_assoc($res2)) {
                    $id = $row['id'];
                    $role_id = $row['role_id'];
              
                    if (isset($role_id)) {
                      $targetId = $id; // Gán giá trị id vào biến targetId nếu role_id = 1
                    break;
                    }
                  }
                }
            ?>

            <!-- login form -->
            <body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img style="height: 300px; width: 300px;" src="images/admin.png" alt="IMG">
                </div>

                <?php
                 
                 if(isset($_SESSION['no-login-message']))
                 {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                 }
                ?>
                <!--=====TIÊU ĐỀ======-->
                <form action="" method="POST" class="login100-form validate-form">
                    <span class="login100-form-title">
                        <b>ĐĂNG NHẬP HỆ THỐNG</b>
                    </span>
                    <!--=====FORM INPUT TÀI KHOẢN VÀ PASSWORD======-->
                    <form action="" method="POST">
                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="text" placeholder="Tài khoản quản trị" name="username1"
                                id="username">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class='bx bx-user'></i>
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input">
                            <input autocomplete="off" class="input100" type="password" placeholder="Mật khẩu"
                                name="password1" id="password-field">
                            <span toggle="#password-field" class="bx fa-fw bx-hide field-icon click-eye"></span>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class='bx bx-key'></i>
                            </span>
                        </div>

                        <!--=====ĐĂNG NHẬP======-->
                        <div class="container-login100-form-btn">
                            <input  type="submit" name="submit" value="Đăng nhập" id="submit" onclick="validate()" ></input>
                        </div>
                        <!--=====LINK TÌM MẬT KHẨU======-->
                        <div class="text-right p-t-12">
                            <a class="txt2" href="/forgot.html">
                                Bạn quên mật khẩu?
                            </a>
                        </div>
                    </form>
                    <!--=====FOOTER======-->
                </form>
            </div>
        </div>
    </div>
    <!--Javascript-->
    <script src="/js/main.js"></script>
    <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script type="text/javascript">
        //show - hide mật khẩu
        function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text"
            } else {
                x.type = "password";
            }
        }
        $(document).ready(function() {
        $(".click-eye").click(function () {
            $(this).toggleClass("bx-show bx-hide");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
        });
    </script>
</body>
</html>

<?php
ob_start();
    //session_start();
    if(isset($_SESSION['username']))
    {
        header("location:giaodienmoi/doc/index.php?id=" . $targetId);
    }
    // click submit
    if(isset($_POST['submit'])){
        $username1 = $_POST['username1'];
        $password1=md5($_POST['password1']);
    
    // take db sql
    $sql = "SELECT * FROM tblusers WHERE username='$username1' AND password ='$password1' AND (role_id = 3 or role_id = 1)";

    // Execute query
        $res = mysqli_query($conn, $sql);

    // test acount exitsts
        $count = mysqli_num_rows($res);
        if($count==1)
        {
            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['id'];
                $role_id = $row['role_id'];
            $_SESSION['id'] = $id;
            header("location:giaodienmoi/doc/index.php?id=".$_SESSION['id']);
            // login success
            $_SESSION['login'] = "<div class='loginsuccess'>Login Successful.</div>";
            ob_end_flush();
            // xác thực
            $_SESSION['user'] = $username1;
            ob_end_flush();

            $_SESSION['username'] = $username1;
            // return Home/ dashboard
            
            ob_end_flush();
        }}
        else
        {
            // login fail
            $_SESSION['login'] = "<div class='swal-icon--error text-center'>Username or Password fail.</div>";
            // return Home/ dashboard
            header('location:'.SITEURL.'admin/login.php');
            ob_end_flush();
        }
    }
?>