<?php
include('../../../includes/config.php');
include('../../../admin/login-check.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="../css/main.css">
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
  <header class="app-header">
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->

    <ul class="app-nav">
      <!-- User Menu-->
      <li>
        <a class="app-nav__item" href="../../logout.php">
          <i class='bx bx-log-out bx-rotate-180'>
          </i>
        </a>
      </li>
    </ul>
  </header>
  <!-- Sidebar menu-->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <aside class="app-sidebar">

    <div class="app-sidebar__user">
      <div>
        <?php
        if (isset($_SESSION['id'])) {
          $id = $_SESSION['id'];
          $sql2 = "SELECT * FROM tblusers where id = $id";
          $res2 = mysqli_query($conn, $sql2);
          $count2 = mysqli_num_rows($res2);

          if ($count2 > 0) {
            while ($row = mysqli_fetch_assoc($res2)) {
              $id = $row['id'];
              $role_id = $row['role_id'];
              $fullname = $row['fullname'];
              $email = $row['email'];
              $mobilenumber = $row['mobilenumber'];
              $username = $row['username'];
            }
            $sql = "SELECT * FROM tblroles where id = $role_id";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);

            if ($count > 0) {
              while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['id'];
                $name_role = $row['name_role'];
              }
            }
          }
        }
        ?>
        <p style="color: aliceblue;" class="app-sidebar__user-name"><b><?php echo $fullname; ?></b></p>
        <p style="color: aliceblue; text-transform: uppercase;" class="app-sidebar__user-designation"><b>Chức vụ: <?=$name_role?></b></p>
      </div>
    </div>
    <hr>
    
    <?php
      if($role_id == 1){
        echo "<li><a class='app-menu__item haha' href='phan-mem-ban-hang.html'><i class='app-menu__icon bx bx-cart-alt'></i>
        <span class='app-menu__label'>POS Bán Hàng</span></a></li>";
      }else{
        echo "<ul class='app-menu'>
        <li><a class='app-menu__item haha' href='phan-mem-ban-hang.html'><i class='app-menu__icon bx bx-cart-alt'></i>
            <span class='app-menu__label'>POS Bán Hàng</span></a></li>
        <li><a class='app-menu__item active' href='index.php'><i class='app-menu__icon bx bx-tachometer'></i><span class='app-menu__label'>Bảng điều khiển</span></a></li>
        <li><a class='app-menu__item ' href='table-data-staff.php'><i class='app-menu__icon bx bx-id-card'></i> <span class='app-menu__label'>Quản lý nhân viên</span></a></li>
        <li><a class='app-menu__item' href='../../giaodienmoi/doc/table-data-customer.php'><i class='app-menu__icon bx bx-user-voice'></i><span class='app-menu__label'>Quản lý khách hàng</span></a></li>
        <li><a class='app-menu__item' href='../../giaodienmoi/doc/table-data-product.php'><i class='app-menu__icon bx bx-cable-car'></i><span class='app-menu__label'>Quản lý tour</span></a>
        </li>
        <li><a class='app-menu__item' href='../../giaodienmoi/doc/table-data-category.php'><i class='app-menu__icon bx bx-category-alt'></i><span class='app-menu__label'>Quản lý danh mục</span></a></li>
        <li><a class='app-menu__item' href='../../giaodienmoi/doc/table-data-location.php'><i class='app-menu__icon bx bx-location-plus'></i><span class='app-menu__label'>Quản lý địa điểm</span></a></li>
        <li><a class='app-menu__item' href='../../giaodienmoi/doc/table-data-hotel.php'><i class='app-menu__icon bx bx-hotel'></i><span class='app-menu__label'>Quản lý khách sạn</span></a></li>
  
        <li><a class='app-menu__item' href='table-data-booking.php'><i class='app-menu__icon bx bx-task'></i><span class='app-menu__label'>Quản lý Booking</span></a></li>
        <li><a class='app-menu__item' href='table-data-banned.html'><i class='app-menu__icon bx bx-run'></i><span class='app-menu__label'>Quản lý nội bộ
            </span></a></li>
        <li><a class='app-menu__item' href='table-data-money.html'><i class='app-menu__icon bx bx-dollar'></i><span class='app-menu__label'>Bảng kê lương</span></a></li>
        <li><a class='app-menu__item' href='quan-ly-bao-cao.html'><i class='app-menu__icon bx bx-pie-chart-alt-2'></i><span class='app-menu__label'>Báo cáo doanh thu</span></a>
        </li>
        <li><a class='app-menu__item' href='page-calendar.html'><i class='app-menu__icon bx bx-calendar-check'></i><span class='app-menu__label'>Lịch công tác </span></a></li>
        <li><a class='app-menu__item' href='#'><i class='app-menu__icon bx bx-cog'></i><span class='app-menu__label'>Cài đặt hệ thống</span></a></li>
      </ul>";
      }
    ?>

    
  </aside>



  <script src="js/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="js/popper.min.js"></script>
  <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
  <!--===============================================================================================-->
  <script src="js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="js/main.js"></script>
  <!--===============================================================================================-->
  <script src="js/plugins/pace.min.js"></script>
  <!--===============================================================================================-->
  <script type="text/javascript" src="js/plugins/chart.js"></script>
  <!--===============================================================================================-->
  <script type="text/javascript">
    var data = {
      labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6"],
      datasets: [{
          label: "Dữ liệu đầu tiên",
          fillColor: "rgba(255, 213, 59, 0.767), 212, 59)",
          strokeColor: "rgb(255, 212, 59)",
          pointColor: "rgb(255, 212, 59)",
          pointStrokeColor: "rgb(255, 212, 59)",
          pointHighlightFill: "rgb(255, 212, 59)",
          pointHighlightStroke: "rgb(255, 212, 59)",
          data: [20, 59, 90, 51, 56, 100]
        },
        {
          label: "Dữ liệu kế tiếp",
          fillColor: "rgba(9, 109, 239, 0.651)  ",
          pointColor: "rgb(9, 109, 239)",
          strokeColor: "rgb(9, 109, 239)",
          pointStrokeColor: "rgb(9, 109, 239)",
          pointHighlightFill: "rgb(9, 109, 239)",
          pointHighlightStroke: "rgb(9, 109, 239)",
          data: [48, 48, 49, 39, 86, 10]
        }
      ]
    };
    var ctxl = $("#lineChartDemo").get(0).getContext("2d");
    var lineChart = new Chart(ctxl).Line(data);

    var ctxb = $("#barChartDemo").get(0).getContext("2d");
    var barChart = new Chart(ctxb).Bar(data);
  </script>
  <script type="text/javascript">
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