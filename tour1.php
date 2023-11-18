<?php include('includes/header1.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tourist - Travel Agency HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
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
    <link href="css/style.css" rel="stylesheet">
    <link href="css/cssindex.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Package Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Tours</h6>
                <h1 class="mb-5">Awesome Tours</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <?php
                $sql = "SELECT * FROM tbltour";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $nameimage = $row['image_name'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $time = $row['time'];

                        $sql2 = "SELECT * FROM tblcomment where tour_id = '$id'";
                        $res2 = mysqli_query($conn, $sql2);
                        $count2 = mysqli_num_rows($res2);

                        if ($count2 > 0) {
                            while ($row = mysqli_fetch_assoc($res2)) {
                                $c_id = $row['tour_id'];
                                $rating = $row['rating'];


                                $sql3 = "SELECT tour_id, ROUND(AVG(rating),0) as 'avg_rating' FROM tblcomment WHERE tour_id = $c_id group by tour_id";
                                $res3 = mysqli_query($conn, $sql3);
                                $count3 = mysqli_num_rows($res3);


                                if ($count3 > 0) {
                                    while ($row = mysqli_fetch_assoc($res3)) {

                                        $tttt = $row['tour_id'];
                                        $avg_rating = $row['avg_rating'];
                                    }
                                }
                            }
                        }

                ?>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="package-item">
                                <a href="<?php echo SITEURL; ?>tourdetail.php?tour_id=<?php echo $id ?>">
                                    <div style="height: 170px;" class="overflow-hidden">
                                        <?php
                                        if ($nameimage == "") {
                                            echo "<div class='error'>Image not Available.";
                                        } else {
                                        ?>
                                            <img src="<?php echo SITEURL; ?>/admin/giaodienmoi/doc/images/tour/<?php echo $nameimage ?>" alt="Chicke Hawain Pizza" class="img-fluid">
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </a>
                                <div class="d-flex border-bottom">
                                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt text-primary me-2"></i><?= $title ?></small>
                                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt text-primary me-2"></i><?= $time ?> ngày</small>
                                </div>
                                <div class="text-center p-4">
                                    <h3 class="mb-0">$<?= $price ?></h3>
                                    <div class="mb-3">
                                        <?php
                                        if (isset($avg_rating)) {
                                            if ($avg_rating == 5) {
                                                echo "
                                                                    <small class='fa fa-star text-primary'></small>
                                                                    <small class='fa fa-star text-primary'></small>
                                                                    <small class='fa fa-star text-primary'></small>
                                                                    <small class='fa fa-star text-primary'></small>
                                                                    <small class='fa fa-star text-primary'></small>
                                                                ";
                                            } elseif ($avg_rating == 4) {
                                                echo "
                                                                    <small class='fa fa-star text-primary'></small>
                                                                    <small class='fa fa-star text-primary'></small>
                                                                    <small class='fa fa-star text-primary'></small>
                                                                    <small class='fa fa-star text-primary'></small>
                                                                ";
                                            } elseif ($avg_rating == 3) {
                                                echo "
                                                                    <small class='fa fa-star text-primary'></small>
                                                                    <small class='fa fa-star text-primary'></small>
                                                                    <small class='fa fa-star text-primary'></small>
                                                                ";
                                            } elseif ($avg_rating == 2) {
                                                echo "
                                                                    <small class='fa fa-star text-primary'></small>
                                                                    <small class='fa fa-star text-primary'></small>
                                                                ";
                                            } else {
                                                echo "<small class='fa fa-star text-primary'></small>";
                                            }
                                        }
                                        ?>

                                    </div>
                                    <p ><?= $description ?></p>
                                    <div class="d-flex justify-content-center mb-2">
                                        <a href="<?php echo SITEURL; ?>bookingtour.php?tour_id=<?php echo $id ?>" class="btn btn-sm btn-primary px-3" style="border-radius:30px;">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php
                    }
                } else {
                    echo "<div class='error'>Tour not Availabe.</div>";
                    ?>

                    <tr>
                        <td colspan="6">
                            <div class="">No Category Added</div>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Package End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
                <h1 class="mb-5">Our Clients Say!!!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                <?php
                $sql = "SELECT * FROM tblcomment";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        $fullname = $row['fullname'];
                        $email = $row['email'];
                        $comment = $row['comment'];
                ?>
                        <div class="testimonial-item bg-white text-center border p-4">
                            <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="images/user.jpg" style="width: 80px; height: 80px;">
                            <h5 class="mb-0"><?= $fullname ?></h5>
                            <p<?= $email ?>< /p>
                                <p class="mb-0"><?= $comment ?></p>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Company</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Privacy Policy</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">FAQs & Help</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Gallery</h4>
                    <div class="row g-2 pt-2">
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/package-1.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/package-2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/package-3.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/package-2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/package-3.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/package-1.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-primary w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.

                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="./js/main.js"></script>
</body>

</html>