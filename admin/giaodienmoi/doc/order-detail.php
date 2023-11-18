<?php
ob_start();
include('../doc/include/header-admin.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Danh sách Booking | Quản trị Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- or -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

</head>

<body onload="time()" class="app sidebar-mini rtl">
    <!-- Navbar-->


    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active"><a href="#"><b>Danh sách Booking</b></a></li>
            </ul>
            <div id="clock"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                            <div class="col-sm-2">

                                <a class="btn btn-add btn-sm" href="form-add-tour.php" title="Thêm"><i class="fas fa-plus"></i>
                                    Tạo mới</a>
                            </div>
                            <div class="col-sm-2">
                                <a class="btn btn-delete btn-sm nhap-tu-file" type="button" title="Nhập" onclick="myFunction(this)"><i class="fas fa-file-upload"></i> Tải từ file</a>
                            </div>

                            <div class="col-sm-2">
                                <a class="btn btn-delete btn-sm print-file" type="button" title="In" onclick="myApp.printTable()"><i class="fas fa-print"></i> In dữ liệu</a>
                            </div>
                            <div class="col-sm-2">
                                <a class="btn btn-delete btn-sm print-file js-textareacopybtn" type="button" title="Sao chép"><i class="fas fa-copy"></i> Sao chép</a>
                            </div>

                            <div class="col-sm-2">
                                <a class="btn btn-excel btn-sm" href="" title="In"><i class="fas fa-file-excel"></i> Xuất Excel</a>
                            </div>
                            <div class="col-sm-2">
                                <a class="btn btn-delete btn-sm pdf-file" type="button" title="In" onclick="myFunction(this)"><i class="fas fa-file-pdf"></i> Xuất PDF</a>
                            </div>
                            <div class="col-sm-2">
                                <a class="btn btn-delete btn-sm" type="button" title="Xóa" onclick="myFunction(this)"><i class="fas fa-trash-alt"></i> Xóa tất cả </a>
                            </div>
                        </div>
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>

                                <tr>
                                    <th width="10"><input type="checkbox" id="all"></th>
                                    <th>Tên tour</th>
                                    <th>Giá tour</th>
                                    <th>Số lượng khách</th>
                                    <th>Tổng số tiền</th>
                                    <th>Ngày bắt đầu</th>
                                    <th>Ngày kết thúc</th>
                                    <th>Trạng thái Booking</th>
                                    <th>Chức năng</th>

                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $idbk = $_GET['id'];
                            $sql = "SELECT * FROM tblbooking where id=$idbk";
                            $res = mysqli_query($conn,$sql);
                            $count = mysqli_num_rows($res);
                            $stt = 1;

                            if($count>0)
                            {
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    $id  = $row['id'];
                                    $tour = $row['tour'];
                                    $price = $row['price'];
                                    $quantity = $row['quantity'];
                                    $total = $row['total'];
                                    $to_date = $row['to_date'];
                                    $from_date = $row['from_date'];
                                    $status = $row['status'];
                                    $customer_name = $row['customer_name'];
                                    $customer_contact = $row['customer_contact'];
                                    $customer_email = $row['customer_email'];
                                    $customer_address = $row['customer_address'];
                                    $updationdate = $row['updationdate'];

                                    ?>
                                    
                                        <tr>
                                            <td><?php echo $stt++; ?>.</td>
                                            <td class="text-center"><?php echo $tour; ?></td>
                                            <td><?php echo $price; ?></td>
                                            <td><?php echo $quantity; ?></td>
                                            <td><?php echo $total; ?></td>
                                            <td><?php echo $to_date; ?></td>
                                            <td><?php echo $from_date; ?></td>
                                            <!-- <td><?php echo $status; ?></td> -->
                                            <td class="mb-3">
                                                <div>
                                                <form action="" method="POST">
                                                    <select name="status1" id="" >
                                                        <option value="0" <?= $row['status']==0?"selected":"" ?>>Processing</option>                       
                                                        <option value="1" <?= $row['status']==1?"selected":"" ?>>Confirmed</option>
                                                        <option value="2" <?= $row['status']==2?"selected":"" ?>>Cancelled</option>
                                                    </select>

                                                    <td><input style="display:flex; 
                                                                    justify-content:center; 
                                                                    align-items:center; 
                                                                    max-width:120px; 
                                                                    border: none;
                                                                    margin:auto;
                                                                    font-size: 20px;
                                                                " 
                                                                type="submit" name="submit" value="Update" class="btn btn-updateadmin"></td>
                                                </form>
                                                </div>
                                            </td>
                                            
                                        </tr>
                                        
                                    <?php
                                }
                            }
                            else
                            {
                                echo "<tr><td colspan='12' class='error'>not Available.</td></tr>";
                            }
                        ?>
                            </tbody>
                        </table>
                        <?php
                            if(isset($_POST['submit'])){

                                $status1 = $_POST['status1'];
                                $sql = "UPDATE tblbooking SET status='$status1'where id=$idbk";
                                $res = mysqli_query($conn, $sql);
                                
                                if($res==true){
                                    $updationdate = date('Y-m-d G.i:s<br>',time());
                                    $sql1 = "UPDATE tblbooking SET updationdate='$updationdate' where id=$idbk";
                                    $res1 = mysqli_query($conn, $sql1);
                                    $_SESSION['updatee'] = "<div class='success text-center'><h1>Updated Successfully</h1></div>";
                                    // chuyển hướng đến manage admin
                                    header('location:' . SITEURL . 'admin/giaodienmoi/doc/table-data-booking.php');
                                    ob_end_flush();
                                }
                                
                            
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!--
  MODAL
-->
    <div class="modal fade" id="ModalUP" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="row">
                        <div class="form-group  col-md-12">
                            <span class="thong-tin-thanh-toan">
                                <h5>Chỉnh sửa thông tin sản phẩm cơ bản</h5>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label">Mã sản phẩm </label>
                            <input class="form-control" type="number" value="71309005">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Tên sản phẩm</label>
                            <input class="form-control" type="text" required value="Bàn ăn gỗ Theresa">
                        </div>
                        <div class="form-group  col-md-6">
                            <label class="control-label">Số lượng</label>
                            <input class="form-control" type="number" required value="20">
                        </div>
                        <div class="form-group col-md-6 ">
                            <label for="exampleSelect1" class="control-label">Tình trạng sản phẩm</label>
                            <select class="form-control" id="exampleSelect1">
                                <option>Còn hàng</option>
                                <option>Hết hàng</option>
                                <option>Đang nhập hàng</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Giá bán</label>
                            <input class="form-control" type="text" value="5.600.000">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleSelect1" class="control-label">Danh mục</label>
                            <select class="form-control" id="exampleSelect1">
                                <option>Bàn ăn</option>
                                <option>Bàn thông minh</option>
                                <option>Tủ</option>
                                <option>Ghế gỗ</option>
                                <option>Ghế sắt</option>
                                <option>Giường người lớn</option>
                                <option>Giường trẻ em</option>
                                <option>Bàn trang điểm</option>
                                <option>Giá đỡ</option>
                            </select>
                        </div>
                    </div>
                    <BR>
                    <a href="#" style="    float: right;
    font-weight: 600;
    color: #ea0000;">Chỉnh sửa sản phẩm nâng cao</a>
                    <BR>
                    <BR>
                    <button class="btn btn-save" type="button">Lưu lại</button>
                    <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
                    <BR>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <!--
MODAL
-->

    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="src/jquery.table2excel.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <!-- Data table plugin-->
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
        $('#sampleTable').DataTable();
        //Thời Gian
        function time() {
            var today = new Date();
            var weekday = new Array(7);
            weekday[0] = "Chủ Nhật";
            weekday[1] = "Thứ Hai";
            weekday[2] = "Thứ Ba";
            weekday[3] = "Thứ Tư";
            weekday[4] = "Thứ Năm";
            weekday[5] = "Thứ Sáu";
            weekday[6] = "Thứ Bảy";
            var day = weekday[today.getDay()];
            var dd = today.getDate();
            var mm = today.getMonth() + 1;
            var yyyy = today.getFullYear();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            nowTime = h + " giờ " + m + " phút " + s + " giây";
            if (dd < 10) {
                dd = '0' + dd
            }
            if (mm < 10) {
                mm = '0' + mm
            }
            today = day + ', ' + dd + '/' + mm + '/' + yyyy;
            tmp = '<span class="date"> ' + today + ' - ' + nowTime +
                '</span>';
            document.getElementById("clock").innerHTML = tmp;
            clocktime = setTimeout("time()", "1000", "Javascript");

            function checkTime(i) {
                if (i < 10) {
                    i = "0" + i;
                }
                return i;
            }
        }
    </script>
    <script>
        jQuery(function() {
            jQuery(".trash").click(function() {
                var row = this.parentNode.parentNode;
                var dataId = row.getAttribute("data-id");

                swal({
                    title: "Cảnh báo",
                    text: "Bạn có chắc chắn là muốn xóa khách hàng này?",
                    buttons: ["Hủy bỏ", "Đồng ý"],
                }).then((willDelete) => {
                    if (willDelete) {
                        deleteRecord(row);
                        swal("Đã xóa thành công!", {}).then(() => {
                            location.reload();
                        });
                    }
                });
            });
        });

        oTable = $('#sampleTable').dataTable();
        $('#all').click(function(e) {
            $('#sampleTable tbody :checkbox').prop('checked', $(this).is(':checked'));
            e.stopImmediatePropagation();
        });

        function deleteRecord(element) {
            // Lấy giá trị data-id từ phần tử được nhấp
            var id = element.parentNode.parentNode.getAttribute("data-id");

            // Gửi yêu cầu xóa thông qua AJAX hoặc phương pháp khác
            // Ở đây, chúng ta sẽ sử dụng AJAX để gửi yêu cầu xóa
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "form-delete-customer.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.status === "success") {
                        // Xóa thành công, thực hiện các hành động bổ sung (nếu cần)
                        console.log(response.message);
                        location.reload();

                        // Ví dụ: Cập nhật giao diện, hiển thị thông báo thành công, vv.
                    } else {
                        // Xóa thất bại, xử lý lỗi (nếu cần)
                        console.log(response.message);
                        // Ví dụ: Hiển thị thông báo lỗi, vv.
                    }
                }
            };
            xhr.send("id=" + id);
        }
    </script>
</body>

</html>