<?php include('config.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DU LỊCH VIỆT</title>

<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/admin.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/jquery.datetimepicker.min.css" type='text/css' />
<link rel="stylesheet" href="css/jquery-ui.css" />

</head>

<body>
    <!-- Navbar Section Starts Here -->
 
    
        <div class="top-header">
.
            <ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s">
            
            <?php   
                
                 if (isset($_SESSION['username'])){
                    echo '<li>Welcome </li>      '.$_SESSION['fullname'];
                    echo '  &#8194;    <li class="hm"><a href="yourtour.php">Tour của bạn</a></li> &#8194;';
                    
                    echo '      <li><a href="logoutuser.php">Logout</a></li>'; 
                }
                else{
            ?>
            <li ><a href="register.php" >Đăng ký</a></li>
			<li ><a href="loginuser.php">/ Đăng nhập</a></li>
            <?php }?> 
            
            <!-- <div class="clearfix"></div> -->
            </div>
        </div>    
            
        <div class="container">

            <div class="logo">
                <a href="index.php" title="Logo">
                    <img src="images/logo.png"  class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="tours.php">Tour</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>

        </div>
        