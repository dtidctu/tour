<link href="css/style2.css" rel='stylesheet' type='text/css' />
<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" rel="stylesheet" /> -->
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet" /> -->
<link href="css/style.css" rel='stylesheet' type='text/css' />

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
<link href="css/cssindex.css" rel="stylesheet">
<!-- Template Stylesheet -->
<link href="css/style.css" rel="stylesheet">



<?php ob_start();
include('./includes/header2.php') ?>

<?php
if (!isset($_SESSION['username'])) {
    header('location:loginuser.php');
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

        $id_tour = $row['id'];
        $title = $row['title'];
        $price = $row['price'];
        $image_name = $row['image_name'];
        $time = $row['time'];
    }
}
?>

<script>
    function myFunction() {
        alert("You have successfully booked the tour!");
    }
</script>

<br><br>

<section>
    <div class="container">
        <div id="booking" class="section">
            <div class="section-center">
                <div class="container">
                    <div style="width: 1000px; position: absolute; top: -10%; left: 50%; transform: translate(-50%, -50%);" class="row">
                        <div class="booking-form">
                            <div class="form-header">
                                <h1 style="font-family:'Courier New', Courier, monospace;">DU LỊCH VIỆT</h1>
                            </div>
                            <form action="" method="POST">
                                <fieldset style="border-color: #25ccbe;">
                                    <legend class="form-legend1">Selected Tour</legend>

                                    <div class="tour-menu-img">

                                        <?php
                                        if ($image_name == "") {
                                            echo "<div class='error'>Image not Available.</div>";
                                        } else {
                                        ?>
                                            <img src="<?php echo SITEURL; ?>/admin/giaodienmoi/doc/images/tour/<?php echo $image_name; ?>" alt="" class="img-responsive img-curve">
                                        <?php
                                        }
                                        ?>


                                    </div>

                                    <div class="tour-menu-desc">
                                        <h3 style="text-transform: uppercase; font-size:30px;" class="form-legend1"><?php echo $title; ?></h3> <br>
                                        <input type="hidden" name="tour" value="<?php echo $title; ?>">
                                        <div class="form-legend1">Giá/Người</div>
                                        <p class="form-legend">$<?php echo $price; ?></p>
                                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                                        <div class="form-legend1">Time</div>
                                        <p class="form-legend"><?php echo $time; ?> Ngày</p>
                                        <input type="hidden" name="time" value="<?php echo $time; ?>">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input class="form-control" type="number" min="1" max="15" name="quantity" class="input-responsive" value="1" required>
                                                    <span class="form-label">Quantity</span>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="date" class="form-control" min="<?= date('Y-m-d'); ?>" name="from-date" required="" />
                                                    <span class="form-label">From day</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </fieldset>

                                <fieldset>
                                    <div class="form-group">
                                        <input name="full-name" class="form-control" type="text" placeholder="Enter your fullname">
                                        <span class="form-label">Fullname</span>
                                    </div>

                                    <div class="form-group">
                                        <input name="address" class="form-control" type="text" placeholder="Enter your Address">
                                        <span class="form-label">Address</span>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input class="form-control" name="email" type="email" placeholder="Enter your Email">
                                                <span class="form-label">Email</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input class="form-control" type="tel" name="contact" placeholder="Enter you Phone">
                                                <span class="form-label">Phone</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-btn">
                                        <button onclick="myFunction()" name="submit" type="submit" style="margin-left: 24%" class="submit-btn">Book Now</button>
                                    </div>
                                </fieldset>
                            </form>

                            <?php

                            use PHPMailer\PHPMailer\PHPMailer;
                            use PHPMailer\PHPMailer\Exception;

                            require("vendor/PHPMailer-master/src/PHPMailer.php");
                            require("vendor/PHPMailer-master/src/SMTP.php");
                            require("vendor/PHPMailer-master/src/Exception.php");

                            if (!function_exists('GuiMail')) {
                                function GuiMail($customer_email)
                                {
                                    $mail = new PHPMailer(true);

                                    try {
                                        //Enable verbose debug output
                                        $mail->isSMTP();
                                        $mail->CharSet = "utf-8";                                           //Send using SMTP
                                        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                                        $mail->Username   = 'phantrantrung52@gmail.com';                     //SMTP username
                                        $mail->Password   = 'ntftkacurmfrnjvw';                               //SMTP password
                                        $mail->SMTPSecure = 'ssl';                                   //Enable implicit SSL encryption
                                        $mail->Port       = 465;                                    //TCP port to connect to

                                        //Recipients
                                        $mail->setFrom('phantrantrung52@gmail.com', 'Cty Du Lịch Việt');
                                        $mail->addAddress($customer_email, 'Đức Trung');     //Add a recipient

                                        //Content
                                        $mail->isHTML(true);                                  //Set email format to HTML
                                        $mail->Subject = 'Thư xác nhận';
                                        $noidungthu = file_get_contents("emailconfirm.html");
                                        $noidungthu = str_replace(
                                            ['{tour}', '{quantity}', '{price}', '{total}'],
                                            [$_POST['tour'], $_POST['quantity'], $_POST['price'], $_POST['price'] * $_POST['quantity']],
                                            $noidungthu
                                        );
                                        $mail->Body = $noidungthu;

                                        $mail->send();
                                        echo 'Message has been sent';
                                    } catch (Exception $e) {
                                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                                    }
                                }
                            }
                            ?>

                            <?php
                            if (isset($_POST['submit'])) {
                                $customer_email = isset($_POST['email']) ? $_POST['email'] : '';

                                $idtour = $id_tour;
                                $tour = $_POST['tour'];
                                $price = $_POST['price'];
                                $quantity = $_POST['quantity'];
                                $user_id = $_SESSION['user_id'];
                                $total = $price * $quantity;
                                $_SESSION['total'] = $total;
                                $time = $_POST['time'];
                                $from_date = date('Y-m-d', strtotime($_POST['from-date']));
                                $to_date = date("Y-m-d", strtotime("$from_date + $time day"));
                                $to_date = date('Y-m-d', strtotime($to_date));
                                // $to_date = date('Y-m-d', strtotime($_POST['to-date']));

                                //$status = "Confirm";

                                $customer_name = $_POST['full-name'];
                                $customer_contact = $_POST['contact'];
                                $customer_email = $_POST['email'];
                                $customer_address = $_POST['address'];

                                $sql1 = "SELECT * FROM tblbooking WHERE user_id='$user_id' AND from_date ='$from_date'";
                                $res1 = mysqli_query($conn, $sql1);
                                $count1 = mysqli_num_rows($res1);

                                if ($quantity >= 16) {
                                    $_SESSION['errorqtt'] = "<div class='error text-center'><h1>You have booked more than 15 people, please contact the staff for advice.</h1></div>";
                                    header('location:' . SITEURL . 'index.php');
                                } else {
                                    if ($count1 == 0) {
                                        $sql2 = "INSERT INTO tblbooking SET
                                        tour = '$tour',
                                        user_id ='$user_id',
                                        id_tour = '$idtour',
                                        price = '$price',
                                        quantity = '$quantity',
                                        total = '$total',
                                        to_date = '$to_date',
                                        from_date = '$from_date',
                                        status = '$status',
                                        status_bill = 0,
                                        customer_name = '$customer_name',
                                        customer_contact = '$customer_contact',
                                        customer_email = '$customer_email',
                                        customer_address = '$customer_address'
                                        ";

                                        $res2 = mysqli_query($conn, $sql2);

                                        if ($res2 == true) {
                                            $_SESSION['booking'] = "<div class='success text-center'><h1>Tour Booked Successfully.</h1></div>";
                                            GuiMail($customer_email);
                                            header('location:' . SITEURL . 'index.php');
                                            ob_end_flush();
                                        } else {
                                            $_SESSION['booking'] = "<div class='error text-center'>Tour Booked Failed.</div>";
                                            header('location:' . SITEURL . 'index.php');
                                            ob_end_flush();
                                        }
                                        // if($quantity>15)
                                        // {
                                        //     $_SESSION['errorqtt'] = "<div class='success text-center'><h1>Bạn đã đặt quá số lượng.</h1></div>";
                                        //     header('location:'.SITEURL);

                                        // }
                                        // else
                                        // {

                                        // }


                                    } else {
                                        $_SESSION['booking'] = "<div class='error text-center'><h1>Tour is available.</h1></div>";
                                        header('location:' . SITEURL . 'index.php');
                                        ob_end_flush();
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>