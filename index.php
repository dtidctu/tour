<?php include('includes/header1.php'); ?>

<?php
if (isset($_SESSION['login'])) {
    echo $_SESSION['login']; //in ra đã add
    unset($_SESSION['login']); // f5 mất thông báo
}
if (isset($_SESSION['paymentsuccess'])) {
    echo $_SESSION['paymentsuccess']; //in ra đã add
    unset($_SESSION['paymentsuccess']); // f5 mất thông báo
}

if (isset($_SESSION['booking'])) {
    echo $_SESSION['booking']; //in ra đã add
    unset($_SESSION['booking']); // f5 mất thông báo
}

if (isset($_SESSION['1'])) {
    echo $_SESSION['1'];
    unset($_SESSION['1']);
}

if (isset($_SESSION['delete-booking-user'])) {
    echo $_SESSION['delete-booking-user'];
    unset($_SESSION['delete-booking-user']);
}

if (isset($_SESSION['unauthorize11'])) {
    echo $_SESSION['unauthorize11'];
    unset($_SESSION['unauthorize11']);
}

if (isset($_SESSION['errorqtt'])) {
    echo $_SESSION['errorqtt']; //in ra đã add
    unset($_SESSION['errorqtt']); // f5 mất thông báo
}

if (isset($_SESSION['comment'])) {
    echo $_SESSION['comment']; //in ra đã add
    unset($_SESSION['comment']); // f5 mất thông báo
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Du Lịch Việt - Cùng Người Việt</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">


    <!-- star -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

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

    <link href="css/cssindex.css" rel="stylesheet">
</head>

<script>
    (function(w, d) {
        w.CollectId = "653a9434df70161214cabe88";
        var h = d.head || d.getElementsByTagName("head")[0];
        var s = d.createElement("script");
        s.setAttribute("type", "text/javascript");
        s.async = true;
        s.setAttribute("src", "https://collectcdn.com/launcher.js");
        h.appendChild(s);
    })(window, document);
</script>


<body>


    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->



    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img style="right: 100px;border:20px red" class="img-fluid position-absolute w-100 h-100" src="images/logo1.png" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
                    <h1 class="mb-4">Welcome to <span class="text-primary">Du Lịch Việt</span></h1>
                    <p class="mb-4">Welcome to our travel website! We are dedicated to providing you with the best
                        information and resources for your travels. Whether you're looking for tips and tricks for
                        planning your next trip, or you simply want to learn more about different destinations around
                        the world, we've got you covered.</p>
                    <p class="mb-4">Our team of travel experts has scoured the globe to bring you the most up-to-date
                        and accurate information about top destinations, accommodations, and activities. From exotic
                        beaches to bustling cities, we have everything you need to plan a memorable and stress-free
                        vacation.</p>
                    <p class="mb-4">So take a look around, browse our articles and guides, and start planning your dream
                        trip today! We're here to help every step of the way, so don't hesitate to reach out if you have
                        any questions or need further assistance. Happy travels!</p>
                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>First Class Flights</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Handpicked Hotels</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>5 Star Accommodations</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Latest Model Vehicles</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>150 Premium City Tours
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>24/7 Service</p>
                        </div>
                    </div>
                    <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Destination Start -->
    <div class="container-xxl py-5 destination">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Destination</h6>
                <h1 class="mb-5">Popular Destination</h1>
            </div>
            <div class="row g-3">
                <div class="col-lg-7 col-md-6">
                    <div class="row g-3">
                        <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="images/hanoi.jpg" alt="">
                                <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">
                                    Hà Nội</div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img style="height: 212px" class="img-fluid" src="images/phuquoc1.webp" alt="">
                                <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">
                                    Phú Quốc</div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.5s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="images/laichau.webp" alt="">
                                <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">
                                    Lai Châu</div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                    <a class="position-relative d-block h-100 overflow-hidden" href="">
                        <img class="img-fluid position-absolute w-100 h-100" src="images/ninhbinh.jpg" alt="" style="object-fit: cover;">
                        <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">Ninh
                            Bình</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Destination Start -->

    <!-- Package Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Packages</h6>
                <h1 class="mb-5">Awesome Packages</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <?php
                $sql = "SELECT * FROM tbltour LIMIT 6";
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
                                    <h4><small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt text-primary me-2"></i><?= $title ?></small></h4>
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
                                    <p style="height: 115px"><?= $description ?></p>
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

    <p class="text-center">
        <a class="btn btn-sm btn-primary px-3" style="border-radius:30px;" href="tour1.php">See All Tours</a>
    </p>


    <!-- Process Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center pb-4 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Process</h6>
                <h1 class="mb-5">3 Easy Steps</h1>
            </div>
            <div class="row gy-5 gx-4 justify-content-center">
                <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative border border-primary pt-5 pb-4 px-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle position-absolute top-0 start-50 translate-middle shadow" style="width: 100px; height: 100px;">
                            <i class="fa fa-globe fa-3x text-white"></i>
                        </div>
                        <h5 class="mt-4">Choose A Destination</h5>
                        <hr class="w-25 mx-auto bg-primary mb-1">
                        <hr class="w-50 mx-auto bg-primary mt-0">
                        <p class="mb-0">Tempor erat elitr rebum clita dolor diam ipsum sit diam amet diam eos erat ipsum
                            et lorem et sit sed stet lorem sit</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="position-relative border border-primary pt-5 pb-4 px-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle position-absolute top-0 start-50 translate-middle shadow" style="width: 100px; height: 100px;">
                            <i class="fa fa-dollar-sign fa-3x text-white"></i>
                        </div>
                        <h5 class="mt-4">Pay Online</h5>
                        <hr class="w-25 mx-auto bg-primary mb-1">
                        <hr class="w-50 mx-auto bg-primary mt-0">
                        <p class="mb-0">Tempor erat elitr rebum clita dolor diam ipsum sit diam amet diam eos erat ipsum
                            et lorem et sit sed stet lorem sit</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="position-relative border border-primary pt-5 pb-4 px-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle position-absolute top-0 start-50 translate-middle shadow" style="width: 100px; height: 100px;">
                            <i class="fa fa-plane fa-3x text-white"></i>
                        </div>
                        <h5 class="mt-4">Fly Today</h5>
                        <hr class="w-25 mx-auto bg-primary mb-1">
                        <hr class="w-50 mx-auto bg-primary mt-0">
                        <p class="mb-0">Tempor erat elitr rebum clita dolor diam ipsum sit diam amet diam eos erat ipsum
                            et lorem et sit sed stet lorem sit</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Process Start -->

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
    <script src="js/main.js"></script>
</body>

</html>
<?php include('includes/footer.php') ?>