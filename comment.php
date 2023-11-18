<?php ob_start();
include('includes/header2.php'); ?>

<?php
if (isset($_SESSION['1'])) {
    echo $_SESSION['1']; //in ra đã add
    unset($_SESSION['1']); // f5 mất thông báo
}

?>

<?php
if (isset($_SESSION['paymentsuccess'])) {
    echo $_SESSION['paymentsuccess']; //in ra đã add
    unset($_SESSION['paymentsuccess']); // f5 mất thông báo
}

?>

<?php
if (isset($_GET['tour_id'])) {
    $tour_id = $_GET['tour_id'];
    $sql = "SELECT * FROM tbltour WHERE id=$tour_id";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);

    if ($count == 1) {
        $row = mysqli_fetch_assoc($res);
        $id = $row['id'];
        $title = $row['title'];
        $price = $row['price'];
        $image_name = $row['image_name'];
        $time = $row['time'];
    }
}
?>

<?php
if (isset($_SESSION['paymentsuccess'])) {
    echo $_SESSION['paymentsuccess']; //in ra đã add
    unset($_SESSION['paymentsuccess']); // f5 mất thông báo
}

?>

<head>
    <meta charset="utf-8">
    <title>Tourist - Travel Agency HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/cssindex.css" rel="stylesheet">
    <link href="css/admin.css" rel="stylesheet">
</head>

<!-- Booking Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="booking p-5">
            <div class="row g-5 align-items-center">
                <div class="col-md-6 text-white">
                    <h6 class="text-white text-uppercase">Thank you</h6>
                    <h1 class="text-white mb-4">Dear valued customer,</h1>
                    <p class="mb-4">We would like to extend our sincerest gratitude to you for choosing to book a tour with us. Your trust and confidence in our services mean the world to us. We are committed to providing you with an exceptional travel experience that exceeds your expectations.</p>
                    <p class="mb-4">Our team is dedicated to ensuring that your trip is not only enjoyable but also safe and comfortable. We will do everything in our power to make your experience with us a memorable one.</p>
                    <p class="mb-4">Once again, thank you for choosing us as your travel partner. We look forward to providing you with an unforgettable journey.</p>
                    <p class="mb-4">Best regards,</p>
                    <h3 class="mx-5 text-white text-uppercase">       --DU LỊCH VIỆT--</h3>
                </div>
                <div class="col-md-6">
                    <h1 class="text-white mb-4">Comment about Tour and Service</h1>
                    <form action="" method="POST">
                        <table>
                            <div class="container">
                                <div class="rating-wrap">
                                    <h3 class="text-white">Star Rating</h3>
                                    <div class="center">
                                        <fieldset name="rating" class="rating">
                                            <input type="radio" id="star5" name="rating" value="5" /><label for="star5" class="full" title="Awesome"></label>

                                            <input type="radio" id="star4" name="rating" value="4" /><label for="star4" class="full"></label>

                                            <input type="radio" id="star3" name="rating" value="3" /><label for="star3" class="full"></label>

                                            <input type="radio" id="star2" name="rating" value="2" /><label for="star2" class="full"></label>

                                            <input type="radio" id="star1" name="rating" value="1" /><label for="star1" class="full"></label>

                                        </fieldset>
                                    </div>

                                    <h6 class="text-white" id="rating-value"></h6>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input name="fullname" type="text" class="form-control bg-transparent" id="name" placeholder="Your Name" required>
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input name="email" type="email" class="form-control bg-transparent" id="email" placeholder="Your Email" required>
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea name="comment" class="form-control bg-transparent" placeholder="Your comment" id="message" style="height: 150px" required></textarea>
                                        <label for="message">Your Comment</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <input name="submit" class="btn btn-outline-light w-100 py-3" type="submit" value="Send">
                                </div>
                            </div>
                        </table>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>
<!-- Booking Start -->


<script src="./js/star-ratings.js"></script>


<?php
if (isset($_POST['submit'])) {
    $idtour = $id;
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];
    $rating = $_POST['rating'];

    $sql = "INSERT INTO tblcomment SET
            tour_id = '$idtour',
            fullname = '$fullname',
            email = '$email',
            comment = '$comment',
            rating = '$rating'
        ";
    $res = mysqli_query($conn, $sql);
    // $count = mysqli_num_rows($res);
    if ($res == true) {
        $_SESSION['comment'] = "<div class='success text-center'><h1>You have paid and commented successfully.</h1></div>";
        header("location:" . SITEURL . 'index1.php');
        ob_end_flush();
    } else {
        $_SESSION['comment'] = "<div class='error text-center'><h1>ERROR</h1></div>";
        header("location:" . SITEURL . 'comment.php');
        ob_end_flush();
    }
}
?>