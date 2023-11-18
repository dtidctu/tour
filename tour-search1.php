<?php ob_start();
include('includes/header1.php'); ?>

<section class="text-center">
    <div class="container">
        <?php
        $search = $_POST['search'];
        ?>
        <h2>Your Search is <a href="#" class="text-red">"<?php echo $search; ?>"</a></h2>
    </div>
</section>

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
</head>

<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4 justify-content-center">
            <?php
            $search = $_POST['search'];
            $sql = "SELECT * FROM tbltour WHERE title  LIKE '%$search%' OR description LIKE '%$search%'";
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
                            <div style="height: 170px;" class="overflow-hidden">
                                <?php
                                if ($nameimage == "") {
                                    echo "<div class='error'>Image not Available.";
                                } else {
                                ?>
                                    <img src="<?php echo SITEURL; ?>images/tour/<?php echo $nameimage ?>" alt="Chicke Hawain Pizza" class="img-fluid">
                                <?php
                                }
                                ?>
                            </div>
                            <div class="d-flex border-bottom">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt text-primary me-2"></i><?= $title ?></small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt text-primary me-2"></i><?= $time ?> ngày</small>
                            </div>
                            <div class="text-center p-4">
                                <h3 class="mb-0">$<?= $price ?></h3>
                                <div class="mb-3">
                                    <?php
                                    if ($avg_rating == 5) {
                                        echo "<small class='fa fa-star text-primary'></small>
                                                            <small class='fa fa-star text-primary'></small>
                                                            <small class='fa fa-star text-primary'></small>
                                                            <small class='fa fa-star text-primary'></small>
                                                            <small class='fa fa-star text-primary'></small>";
                                    } elseif ($avg_rating == 4) {
                                        echo "<small class='fa fa-star text-primary'></small>
                                                                <small class='fa fa-star text-primary'></small>
                                                                <small class='fa fa-star text-primary'></small>
                                                                <small class='fa fa-star text-primary'></small>
                                                                ";
                                    } elseif ($avg_rating == 3) {
                                        echo "<small class='fa fa-star text-primary'></small>
                                                                    <small class='fa fa-star text-primary'></small>
                                                                    <small class='fa fa-star text-primary'></small>
                                                                    ";
                                    } elseif ($avg_rating == 2) {
                                        echo "<small class='fa fa-star text-primary'></small> 
                                                                        <small class='fa fa-star text-primary'></small>                                                                       
                                                                        ";
                                    } else
                                        echo "<small class='fa fa-star text-primary'></small>                                                                       
                                                                        ";

                                    ?>
                                </div>
                                <p style="height: 350px"><?= $description ?></p>
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

