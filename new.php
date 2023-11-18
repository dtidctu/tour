<?php include('includes/header1.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Tin tức du lịch</title>
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
<br><br>

<body>
    <div class="container">
        <h1 style="font-size: 60px;" class="text-center">Tin Tức Về Du Lịch</h1>
        <br><br>
        <?php
        $rss_url = 'https://www.dulichvn.net.vn/rss/du-lich.rss'; // RSS feed URL
        $rss = simplexml_load_file($rss_url); // Read RSS file and convert to SimpleXMLElement object

        if ($rss) {
            $items = $rss->channel->item; // Get list of items from RSS

            foreach ($items as $item) {
                $title = $item->title; // Title of item
                $link = $item->link; // Link to item
                $description = $item->description; // Description of item
                $_SESSION['titlenew']=$title;
                // Display information of each item
                echo '<div style="border: 1px solid #000; border-top: none; border-right: none; border-left: none;" class="py-5 wow fadeInUp" data-wow-delay="0.1s">';
                echo '<div  class="testimonial-item bg-white text-center  p-4">';
                echo '<h2  class="card-title" ><a href="' . $link . '">' . '&nbsp'. $title . '</a></h2>';
                echo '<p  class="card-text">' . $description . '</p>';

                // Add CSS styles for images and hover effect
                echo '<style>';
                echo '.card img {';
                echo '    border-radius: 10px;'; // Set border-radius for images
                echo '}';
                echo '.card:hover img {';
                echo '    box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);'; // Add hover effect
                echo '}';
                echo '</style>';

                echo '</div>';
                echo '</div>';
            }
        } else {
            echo 'Unable to read RSS file.';
        }
        ?>
    </div>
</body>
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

</html>
<?php include('includes/footer.php') ?>