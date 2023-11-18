<?php ob_start();
include('includes/header2.php'); 
?>
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

<body style="background-color: rgb(233, 214, 214);">
    <div style="display: flex; margin-left: 100px;" class="main-content">
        <div class="wrapper">
            <h1 class="text-center">Your Tour</h1>

            <table class="tbl-full">
                <colgroup>
                    <col width="30" span="1">
                    <col width="130" span="1">
                    <col width="60" span="1">
                    <col width="50" span="1">
                    <col width="60" span="1">
                    <col width="150" span="1">
                    <col width="150" span="1">
                    <col width="190" span="1">
                    <col width="80" span="1">
                    <col width="250" span="1">
                    <col width="150" span="1">
                </colgroup>
                <tr>
                    <th class="text-center">STT</th>
                    <th class="text-center">Tour</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Qtt</th>
                    <th class="text-center">Total</th>
                    <th class="text-center">From date</th>
                    <th class="text-center">To date</th>
                    <th class="text-center">Full name</th>
                    <th class="text-center">Status bill</th>
                    <th class="text-center">Status booking</th>
                    <th class="text-center">Status booking</th>
                </tr>

                <?php
                $uid = $_SESSION['user_id'];
                $sql1 = "SELECT * FROM tblbooking where user_id= $uid";
                $res1 = mysqli_query($conn, $sql1);
                $count = mysqli_num_rows($res1);

                $stt = 1;

                if ($count > 0) {
                    while ($row = mysqli_fetch_assoc($res1)) {
                        $id = $row['id'];
                        $_SESSION['idbooking'] = $id;
                        $tour = $row['tour'];
                        $price = $row['price'];
                        $quantity = $row['quantity'];
                        $total = $row['total'];
                        $from_date = $row['from_date'];
                        $to_date = $row['to_date'];
                        $fullname = $row['customer_name'];
                        $status = $row['status'];
                        $status_bill = $row['status_bill'];
                        $updationdate = $row['updationdate'];
                        // $_SESSION['id_bk'] = $row['id'];

                ?>
                        <tr>
                            <td><?php echo $stt++; ?></td>
                            <td><?php echo $tour ?></td>
                            <td><?php echo $price ?></td>
                            <td><?php echo $quantity ?></td>
                            <td><?php echo $total ?></td>
                            <td><?php echo $from_date ?></td>
                            <td><?php echo $to_date ?></td>
                            <td><?php echo $fullname ?></td>
                            <td>
                                <?php
                                $idbk = $_SESSION['idbooking'];
                                $sql2 = "SELECT * FROM tblbill where id_bk = '$id' ";
                                $res2 = mysqli_query($conn, $sql2);
                                $count2 = mysqli_num_rows($res2);

                                if ($res2 == true) {
                                    $count2 = mysqli_num_rows($res2);
                                    if ($count2 > 0) {
                                        while ($rows = mysqli_fetch_assoc($res2)) {
                                            $code_bill = $rows['code_bill'];
                                            $user_id = $rows['user_id'];
                                            $status_bill = $rows['bill_status'];
                                            $id_bill = $rows['id_bill'];
                                            $_SESSION['code_bill'] = $rows['code_bill'];
                                            $_SESSION['idbill'] = $rows['id_bill'];
                                            $_SESSION['idbk'] = $rows['id_bk'];
                                        }
                                    }
                                }
                                if (isset($_SESSION['idbk']) == $id) {
                                    echo "Paid";
                                } else {
                                    echo "Unpaid bill";
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($status == 0) {
                                    echo "Processing";
                                } else {
                                    if ($status == 1) {
                                        echo "Confirmed by Admin ($updationdate)";
                                    } else {
                                        echo "Cancelled By Admin ($updationdate)";
                                    }
                                }
                                ?>
                            </td>

                            <td>

                                <?php




                                // if($res3==true){
                                //     $updationdate = date('Y-m-d G.i:s<br>',time());
                                //     $sql1 = "UPDATE tblbooking SET updationdate='$updationdate' where id=$idbk";
                                //     $res1 = mysqli_query($conn, $sql1);
                                //     $_SESSION['updatee'] = "<div class='success text-center'><h1>Updated Successfully</h1></div>";
                                //     // chuyển hướng đến manage admin
                                //     // header("location:".SITEURL.'admin/manage-booking.php');
                                //     ob_end_flush();
                                // }



                                ?>

                                <?php
                                if ($status == 1 && $status_bill == 0) {
                                    echo "<a href='orderdetail.php?bkid=$id'' style='display:flex; 
                                                    justify-content:center; 
                                                    align-items:center; 
                                                    background-color: #0a5cb9;
                                                    max-width:120px; 
                                                    border: none;
                                                    margin:auto;
                                                    font-size: 20px;
                                                    padding: 1.2px
                                                    ' class='btn btn-updateadmin'>Pay</a>";
                                } else {
                                    echo "<a style='display:flex; 
                                                justify-content:center; 
                                                align-items:center; 
                                                max-width:120px; 
                                                border: none;
                                                margin:auto;
                                                font-size: 20px;
                                                background-color: orange;
                                                ' class='btn btn-deleteadmin'>Can't Pay</a>";
                                }

                                if ($status_bill == 0)
                                    echo "<a href='deletebooking.php?id=$id' style='font-size: 20px; 
                                                background-color: red; display:flex; 
                                                justify-content:center; 
                                                align-items:center; 
                                                width:122px; 
                                                border: none;
                                                margin: 5px 20px 0 12px;' class='btn-deleteadmin'>Cancel</a>";
                                else {
                                }
                                ?>
                            </td>


                        </tr>
                    <?php
                    }
                } else {
                    ?>

                    <tr>
                        <td colspan="6">
                            <div class="">You have not booked a tour!</div>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
            <div class="clearfix"></div>
        </div>
    </div>
</body>