<link href="css/style1.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel='stylesheet' type='text/css' />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<?php ob_start();
include('./includes/config.php'); ?>


<?php

$id = $_GET['bkid'];
$sql = "SELECT * FROM tblbooking where id=$id ";
$res = mysqli_query($conn, $sql);
$count = mysqli_num_rows($res);
if ($res == true) {
    while ($row = mysqli_fetch_assoc($res)) {
        $id = $row['id'];
        $tour = $row['tour'];
        $id_bk = $row['id'];
        $_SESSION['idbooking'] = $id_bk;
        $id_tour = $row['id_tour'];
        $price = $row['price'];
        $quantity = $row['quantity'];
        $total = $row['total'];
        $from_date = $row['from_date'];
        $to_date = $row['to_date'];
        $fullname = $row['customer_name'];
        $status = $row['status'];
        $address = $row['customer_address'];
        $contact = $row['customer_contact'];

        $sql2 = "SELECT * FROM tbltour WHERE id = $id_tour ";
        $res2 = mysqli_query($conn, $sql2);
        $count2 = mysqli_num_rows($res2);
        if ($res2 == true) {
            while ($row2 = mysqli_fetch_assoc($res)) {
                $idtour = $row2['id'];
            }
        }
    }
}
//  if(isset($_GET['id']))
//  {
//         $id = $_GET['id'];

//         $sql = "SELECT * FROM tblbooking where id=$id";
//         $res = mysqli_query($conn, $sql);
//         $count = mysqli_num_rows($res);

//         if($res==true){
//             while($row=mysqli_fetch_assoc($res)){
//                 $id = $row['id'];
//                 $tour = $row['tour'];
//                 $price = $row['price'];
//                 $quantity = $row['quantity'];
//                 $total = $row['total'];
//                 $from_date = $row['from_date'];
//                 $to_date = $row['to_date'];
//                 $fullname = $row['customer_name'];
//                 $status = $row['status'];    
//                 $address = $row['customer_address'];
//                 $contact = $row['customer_contact'];
//             }

//         }
//     }

?>
<form action="payment.php" method="POST">
    <table>
        <div class="page-content container">

            <div class="page-header text-blue-d2">
                <h1 class="page-title text-secondary-d1">
                    Hóa đơn
                    <small class="page-info">
                        <i class="fa fa-angle-double-right text-80"></i>

                        <?= $id; ?>
                    </small>
                </h1>

                <div class="page-tools">
                    <div class="action-buttons">
                        <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="Print">
                            <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                            Print
                        </a>
                        <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="PDF">
                            <i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>
                            Export
                        </a>
                    </div>
                </div>
            </div>

            <div class="container px-0">
                <div class="row mt-4">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center text-150">
                                    <a href="index.php" title="Logo">
                                        <img src="./admin/giaodienmoi/doc/images/tour/logo1.png" width="100px">
                                    </a>
                                    <span style="color:#41c975" class="text-default-d3">
                                        <h1>DU LỊCH VIỆT</h1>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- .row -->

                        <hr class="row brc-default-l1 mx-n1 mb-4" />

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="text-600 text-110 text-blue align-middle" class="my-1">
                                    <i class="fa fa-rotate-right fa-paper-plane fa-flip-horizontal text-secondary"></i> &nbsp;
                                    <b class="text-600"><?= $fullname ?></b>
                                </div>
                                <div class="text-grey-m2">
                                    <div class="text-600 text-110 text-blue align-middle" class="my-1">
                                        <i class="fa fa-address-card fa-flip-horizontal text-secondary"></i>&nbsp;
                                        <b class="text-600"><?= $address ?></b>
                                    </div>
                                    <div class="text-600 text-110 text-blue align-middle" class="my-1">
                                        <i class="fa fa-phone fa-flip-horizontal text-secondary"></i> &nbsp;
                                        <b class="text-600"><?= $contact ?></b>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col -->

                            <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                                <hr class="d-sm-none" />
                                <div class="text-grey-m2">
                                    <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                        Hóa đơn
                                    </div>

                                    <!-- <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">ID:</span> #111-222</div> -->

                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Ngày xuất:</span><?php echo date('d-m-Y') ?></div>

                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>
                                        <span class="text-600 text-90">Trạng thái:</span>
                                        <span style="color: #888a8d!important;">Đang thanh toán</span>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>

                        <div class="mt-4">
                            <div class="row text-600 text-white bgc-default-tp1 py-25">
                                <div class="d-none d-sm-block col-1">#</div>
                                <div class="col-9 col-sm-5">Tour du lịch</div>
                                <div class="d-none d-sm-block col-4 col-sm-2">Số lượng</div>
                                <div class="d-none d-sm-block col-sm-2">Giá/Người</div>
                                <div class="col-2">Tổng cộng</div>
                            </div>

                            <div class="text-95 text-secondary-d3">

                                <div method="POST" class="row mb-2 mb-sm-0 py-25">
                                    <?php

                                    $stt = 1;
                                    $sql2 = "SELECT * FROM tbltour";
                                    $res2 = mysqli_query($conn, $sql2);
                                    $count2 = mysqli_num_rows($res2);

                                    if ($count2 == 1) {
                                        while ($row = mysqli_fetch_assoc($res2)) {

                                            $title = $row['title'];
                                            $price = $row['price'];
                                            $image = $row['image_name'];
                                            $time = $row['time'];
                                        }
                                    }

                                    ?>


                                    <div method="POST" class="d-none d-sm-block col-1">
                                        <?= $stt++;
                                        echo "." ?>
                                    </div>
                                    <div class="col-9 col-sm-5"><?= $tour ?></div>
                                    <div class="d-none d-sm-block col-2"><?= $quantity ?></div>
                                    <div class="d-none d-sm-block col-2 text-95"><?= $price ?></div>
                                    <div class="col-2 text-secondary-d2"><?= $total ?></div>
                                </div>

                                <div class="row border-b-2 brc-default-l2"></div>


                                <div class="row mt-3">
                                    <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">

                                    </div>



                                    <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                        <div class="col-11 text-right">
                                            <b>Thành tiền:</b>
                                        </div>
                                        <div class="col-1">
                                            <span class="text-150 text-success-d3 opacity-2"><?= $total ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />
                            <div style="float:right">

                                <span class=" text-secondary-d1 text-105">Cảm ơn bạn vì đã chọn Du Lịch Việt</span>
                                <input name="redirect" id="redirect" type="submit" onclick="return pay()" class="btn btn-info btn-bold px-4 float-right mt-3 mt-lg-0" name="submit" value="Thanh toán">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </table>
</form>

    <?php
    // if (isset($_POST['submit'])) {
    //     $id = $_GET['bkid'];
    //     $uid = $_SESSION['user_id'];
    //     $codebill = rand(0, 9999);
    //     $sql = "INSERT INTO tblbill SET
    //         id_bk = '$id',
    //         code_bill = '$codebill',
    //         price = '$price',
    //         user_id = '$uid',
    //         bill_status = 1
    //     ";
    //     $res = mysqli_query($conn, $sql);
    //     // $count = mysqli_num_rows($res);
    //     if ($res == true) {
    //         $sql7 = "UPDATE tblbooking SET status_bill=1 where id=$id";
    //         $res7 = mysqli_query($conn, $sql7);

    //         $_SESSION['paymentsuccess'] = "<div class='success text-center'><h1>Payment Successfully</h1></div>";
    //         $_SESSION['1'] = "<div class='success text-center'><h1>Payment Successfully</h1></div>";
    //         header("location:" . SITEURL . 'comment.php');
    //         ob_end_flush();
    //     } else {
    //         header("location:" . SITEURL . 'orderdetail.php');
    //     }
    // }

    ?>


    <script>
        function pay() {
            return confirm("Are you sure to pay?")
        }
    </script>