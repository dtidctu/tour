<?php ob_start();
include('includes/header2.php'); ?>

<head>
    <meta charset="utf-8">
    <title>Du Lịch Việt - Cùng Người Việt</title>
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

<?php
if (isset($_GET['tour_id'])) {
    $tour_id = $_GET['tour_id'];
    $sql = "SELECT * FROM tbltour WHERE id=$tour_id";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);

    if ($count == 1) {
        $row = mysqli_fetch_assoc($res);

        $id_tour = $row['id'];
        $title = $row['title'];
        $price = $row['price'];
        $image_name = $row['image_name'];
        $time = $row['time'];

        $sql1 = "SELECT * FROM images WHERE id_tour=$tour_id";
        $res1 = mysqli_query($conn, $sql1);
        $count1 = mysqli_num_rows($res1);

        if ($count1 > 0) {
            while ($row = mysqli_fetch_assoc($res1)) {

                $images[] = $row['filename'];
                $id_tour = $row['id_tour'];
            }
        }
    }
}
?>
<br><br>

<body>
    <div class="container-xxl py-5">
        <div class="container">
            <div style="display: flex; flex-wrap: wrap; margin-top: calc(var(--bs-gutter-y) * -1); margin-right: calc(var(--bs-gutter-x) / -2); margin-left: -227px;" class="g-6">
                <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative h-50">
                        <?php
                        $allImages = array_merge([$image_name], $images); // Kết hợp $image_name với danh sách $images
                        $imageNames = array_values(array_filter($allImages)); // Lưu trữ danh sách tên hình ảnh không trống
                        ?>

                        <img style="width: 700px; height: 400px;" src="<?php echo SITEURL; ?>/admin/giaodienmoi/doc/images/tour/<?php echo $image_name; ?>" alt="" class="" id="main-image">
                        <span class="arrow-left" onclick="showPreviousImage()">&lt;</span>
                        <span class="arrow-right" onclick="showNextImage()">&gt;</span>
                    </div>
                    <br><br><br><br><br>
                    <div style="margin-left: 155px" class="d-flex">
                        <?php
                        if (!empty($imageNames)) {
                            foreach ($imageNames as $index => $image) {
                                if ($image === $image_name) {
                                    echo "<img style='width: 100px; height: 75px;' src='" . SITEURL . "/admin/giaodienmoi/doc/images/tour/" . $image . "' alt='' class='img-curve active' onclick='showImage($index)'>";
                                } else {
                                    echo "<img style='width: 100px; height: 75px;' src='" . SITEURL . "/admin/giaodienmoi/doc/images/tour/" . $image . "' alt='' class='img-curve' onclick='showImage($index)'>";
                                }
                            }
                        } else {
                            echo "<div class='error'>Image not Available.</div>";
                        }
                        ?>
                    </div>
                </div>

                <style>
                    .img-curve.active {
                        border: 5px solid #92bf2e;
                    }

                    .arrow-left,
                    .arrow-right {
                        cursor: pointer;
                        font-size: 20px;
                        position: absolute;
                        top: 50%;
                        transform: translateY(-50%);
                        z-index: 1;
                        width: 50px;
                        height: 50px;
                        color: whitesmoke;
                        font-size: 30px;
                    }

                    .arrow-left {
                        top: 210px;
                        left: 5px;
                    }

                    .arrow-right {
                        top: 210px;
                        right: 137px;
                    }

                    .arrow-left img:hover,
                    .arrow-right img:hover {
                        transform: scale(1.2);
                    }
                </style>

                <script>
                    var imageNames = <?php echo json_encode(array_values(array_filter($allImages))); ?>;
                    var currentIndex = imageNames.findIndex(function(name) {
                        return name === "<?php echo $image_name; ?>";
                    });
                    var mainImage = document.getElementById('main-image');
                    var siteURL = "<?php echo SITEURL; ?>"; // Lưu trữ giá trị của SITEURL trong biến JavaScript

                    function showPreviousImage() {
                        if (currentIndex === 0) {
                            currentIndex = imageNames.length - 1;
                        } else {
                            currentIndex--;
                        }
                        mainImage.src = siteURL + "/admin/giaodienmoi/doc/images/tour/" + imageNames[currentIndex];
                        updateActiveClass();
                    }

                    function showNextImage() {
                        if (currentIndex === imageNames.length - 1) {
                            currentIndex = 0;
                        } else {
                            currentIndex++;
                        }
                        mainImage.src = siteURL + "/admin/giaodienmoi/doc/images/tour/" + imageNames[currentIndex];
                        updateActiveClass();
                    }

                    function showImage(index) {
                        currentIndex = index;
                        mainImage.src = siteURL + "/admin/giaodienmoi/doc/images/tour/" + imageNames[currentIndex];
                        updateActiveClass();
                    }

                    function updateActiveClass() {
                        var thumbnailImages = document.getElementsByClassName('img-curve');
                        for (var i = 0; i < thumbnailImages.length; i++) {
                            if (i === currentIndex) {
                                thumbnailImages[i].classList.add('active');
                            } else {
                                thumbnailImages[i].classList.remove('active');
                            }
                        }
                    }
                </script>

                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">DU LỊCH VIỆT</h6>
                    <h1 class="mb-4"><?=$title?></h1>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
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
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>150 Premium City Tours</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>24/7 Service</p>
                        </div>
                    </div>
                    <a href="<?php echo SITEURL;?>bookingtour.php?tour_id=<?php echo $tour_id?>" class="btn btn-primary py-3 px-5 mt-2" >Đặt Ngay</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial Start -->
    <div style="width: 50%; margin-right: 0; margin-left: 88px; margin-top: -70px" class="py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">Lịch trình</h6>
            </div>

            <div style="border: 1px solid #000; border-top: none; border-right: none; border-left: none;" class="testimonial-item bg-white text-center  p-4">
                <h5 class="mb-0">
                    <h3>Ngày 1</h3>
                </h5>
                <p></p>
                <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
            </div>
            <div style=" border: 1px solid #000; border-top: none; border-right: none; border-left: none;" class="testimonial-item bg-white text-center p-4">
                <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="img/testimonial-2.jpg" style="width: 80px; height: 80px;">
                <h5 class="mb-0">John Doe</h5>
                <p>New York, USA</p>
                <p class="mt-2 mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
            </div>
            <div class="testimonial-item bg-white text-center p-4" class="testimonial-item bg-white text-center p-4">
                <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="img/testimonial-3.jpg" style="width: 80px; height: 80px;">
                <h5 class="mb-0">John Doe</h5>
                <p>New York, USA</p>
                <p class="mt-2 mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
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
    <script src="js/main.js"></script>
</body>

</html>