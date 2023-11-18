<?php
include('../doc/include/header-admin.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Trang chủ | Quản trị Admin</title>
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
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/series-label.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>

  <style type="text/css">
    .highcharts-figure,
    .highcharts-data-table table {
      min-width: 360px;
      max-width: 800px;
      margin: 1em auto;
    }

    .highcharts-data-table table {
      font-family: Verdana, sans-serif;
      border-collapse: collapse;
      border: 1px solid #ebebeb;
      margin: 10px auto;
      text-align: center;
      width: 100%;
      max-width: 500px;
    }

    .highcharts-data-table caption {
      padding: 1em 0;
      font-size: 1.2em;
      color: #555;
    }

    .highcharts-data-table th {
      font-weight: 600;
      padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
      padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
      background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
      background: #f1f7ff;
    }
  </style>
</head>

<body onload="time()" class="app sidebar-mini rtl">
  <!-- Navbar-->
  <main class="app-content">
    <div class="row">
      <div class="col-md-12">
        <div class="app-title">
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="#"><b>Bảng điều khiển</b></a></li>
          </ul>
          <div id="clock"></div>
        </div>
      </div>
    </div>
    <div class="row">
      <!--Left-->
      <div class="col-md-12 col-lg-6">
        <div class="row">
          <!-- col-6 -->
          <div class="col-md-6">
            <div class="widget-small primary coloured-icon"><i class='icon bx bxs-user-account fa-3x'></i>
              <div class="info">
                <?php
                $sql2 = "SELECT * FROM tblusers";
                $res2 = mysqli_query($conn, $sql2);
                $count2 = mysqli_num_rows($res2);
                ?>
                <h4>Tổng khách hàng</h4>
                <p><b><?= $count2; ?> khách hàng</b></p>
                <p class="info-tong">Tổng số khách hàng được quản lý.</p>
              </div>
            </div>
          </div>
          <!-- col-6 -->
          <div class="col-md-6">
            <div class="widget-small info coloured-icon"><i class='icon bx bxs-data fa-3x'></i>
              <div class="info">
                <?php
                $sql2 = "SELECT * FROM tbltour";
                $res2 = mysqli_query($conn, $sql2);
                $count2 = mysqli_num_rows($res2);
                ?>
                <h4>Tổng số tour</h4>
                <p><b><?= $count2 ?> tour</b></p>
                <p class="info-tong">Tổng số tour được quản lý.</p>
              </div>
            </div>
          </div>
          <!-- col-6 -->
          <div class="col-md-6">
            <div class="widget-small warning coloured-icon"><i class='icon bx bx-task fa-3x'></i>
              <div class="info">
                <?php
                $sql2 = "SELECT * FROM tblbooking";
                $res2 = mysqli_query($conn, $sql2);
                $count2 = mysqli_num_rows($res2);
                ?>
                <h4>Tổng booking</h4>
                <p><b><?= $count2 ?> booking</b></p>
                <p class="info-tong">Tổng số booking được quản lý.</p>
              </div>
            </div>
          </div>
          <!-- col-6 -->
          <div class="col-md-6">
            <div class="widget-small danger coloured-icon"><i class='icon bx bxs-receipt fa-3x'></i>
              <div class="info">
                <?php
                $sql2 = "SELECT * FROM tblbooking";
                $res2 = mysqli_query($conn, $sql2);
                $count2 = mysqli_num_rows($res2);
                ?>
                <h4>Tổng hóa đơn</h4>
                <p><b><?= $count2 ?> hóa đơn</b></p>
                <p class="info-tong">Tổng số hóa đơn được quản lý.</p>
              </div>
            </div>
          </div>
          <!-- col-12 -->

          <?php
          $sql = "SELECT * FROM tblusers  where role_id = 2 ORDER BY id DESC LIMIT 5";
          $res = mysqli_query($conn, $sql);

          // Kiểm tra kết quả truy vấn
          if (mysqli_num_rows($res) > 0) {
            // Lặp qua các hàng kết quả
            while ($row = mysqli_fetch_assoc($res)) {
              // Lấy thông tin từng dòng
              $id = $row['id'];
              $fullname = $row['fullname'];
              //$column3 = $row['column3'];
            }

            $sql1 = "SELECT * FROM tblbooking where id = $id";
            $res1 = mysqli_query($conn, $sql1);

            if (mysqli_num_rows($res1) > 0) {
              while ($row = mysqli_fetch_assoc($res1)) {
                $id_bk = $row1['id'];
              }
            }
          } else {
            echo "Không có dữ liệu.";
          }
          ?>

          <div class="col-md-12">
            <div class="tile">
              <h3 class="tile-title">Tình trạng đơn hàng</h3>
              <div>
                <?php
                $sql = "SELECT * FROM tblbooking ORDER BY id DESC LIMIT 5";
                $res = mysqli_query($conn, $sql);

                // Kiểm tra kết quả truy vấn
                if (mysqli_num_rows($res) > 0) {
                  echo '<table class="table table-hover">';
                  echo '<thead>';
                  echo '<tr>';
                  echo '<th>ID đơn hàng</th>';
                  echo '<th>Tên khách hàng</th>';
                  echo '<th>Tổng tiền</th>';
                  echo '<th>Trạng thái</th>';
                  echo '</tr>';
                  echo '</thead>';
                  echo '<tbody>';

                  // Lặp qua các hàng kết quả và lưu trữ ID vào mảng
                  $idArray1 = array();
                  while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $idArray1[] = $id;
                  }

                  // Sắp xếp mảng ID theo thứ tự tăng dần
                  sort($idArray1);

                  // Lặp qua mảng ID và hiển thị thông tin đơn hàng theo thứ tự tăng dần
                  foreach ($idArray1 as $id) {
                    $sql1 = "SELECT * FROM tblbooking WHERE id = $id";
                    $res1 = mysqli_query($conn, $sql1);
                    $row1 = mysqli_fetch_assoc($res1);
                    $total = $row1['total'];
                    $user_id = $row1['user_id'];
                    $status = $row1['status'];

                    $sql2 = "SELECT * FROM tblusers WHERE id = $user_id";
                    $res2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_assoc($res2);
                    $fullname1 = $row2['fullname'];

                    echo '<tr>';
                    echo '<td>' . $id . '</td>';
                    echo '<td>' . $fullname1 . '</td>';
                    echo '<td>' . $total . '</td>';
                    echo "<td class='text-center'>";
                    if ($status == 0) {
                      echo "<b class='badge bg-primary'>Đang xử lí</b>";
                    } else {
                      if ($status == 1) {
                        echo "<b class='badge bg-success'>Đã xác nhận</b>";
                      } else {
                        echo "<b class='btn-deleteadmin badge bg-danger'>Đã hủy</b>";
                      }
                    }
                    echo "</td>";
                    echo '</tr>';
                  }

                  echo '</tbody>';
                  echo '</table>';
                } else {
                  echo "Không có dữ liệu.";
                }
                ?>
              </div>
              <!-- / div trống-->
            </div>
          </div>
          <!-- / col-12 -->
          <!-- col-12 -->
          <div class="col-md-12">
            <div class="tile">
              <h3 class="tile-title">Khách hàng mới</h3>
              <div>
                <?php
                $sql = "SELECT * FROM tblusers  where role_id = 2 ORDER BY id DESC LIMIT 5";
                $res = mysqli_query($conn, $sql);

                // Kiểm tra kết quả truy vấn
                if (mysqli_num_rows($res) > 0) {
                  echo '<table class="table table-hover">';
                  echo '<thead>';
                  echo '<tr>';
                  echo '<th>ID</th>';
                  echo '<th>Tên khách hàng</th>';
                  echo '<th>Ngày sinh</th>';
                  echo '<th>Số điện thoại</th>';
                  echo '</tr>';
                  echo '</thead>';
                  echo '<tbody>';

                  // Lặp qua các hàng kết quả
                  $idArray = array(); // Tạo một mảng để lưu trữ các giá trị id
                  while ($row = mysqli_fetch_assoc($res)) {
                    // Lấy thông tin từng dòng
                    $id = $row['id'];
                    $fullname = $row['fullname'];
                    $mobilenumber = $row['mobilenumber'];
                    $birthday = $row['sinhnhat'];

                    // Thêm giá trị id vào mảng
                    $idArray[] = $id;
                  }

                  // Sắp xếp mảng id theo thứ tự tăng dần
                  sort($idArray);

                  // Sử dụng mảng đã sắp xếp để hiển thị thông tin theo thứ tự tăng dần của id
                  foreach ($idArray as $sortedId) {
                    mysqli_data_seek($res, 0); // Đặt con trỏ dữ liệu trở lại vị trí đầu tiên
                    while ($row = mysqli_fetch_assoc($res)) {
                      if ($row['id'] == $sortedId) {
                        $fullname = $row['fullname'];
                        $mobilenumber = $row['mobilenumber'];
                        $birthday = $row['sinhnhat'];

                        echo '<tr>';
                        echo '<td>' . $sortedId . '</td>';
                        echo '<td>' . $fullname . '</td>';
                        echo '<td>' . date('d/m/Y', strtotime($birthday)) . '</td>';
                        echo '<td><span class="tag tag-success">' . $mobilenumber . '</span></td>';
                        echo '</tr>';

                        break;
                      }
                    }
                  }

                  echo '</tbody>';
                  echo '</table>';
                } else {
                  echo "Không có dữ liệu.";
                }
                ?>
              </div>

            </div>
          </div>
          <!-- / col-12 -->
        </div>
      </div>
      <!--END left-->
      <!--Right-->
      <div class="col-md-12 col-lg-6">
        <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <h3 class="tile-title">Thống kê Booking theo ngày</h3>
              <?php
              if (isset($_GET['days1'])) {
                $max_date1 = $_GET['days1'];
              } else {
                $max_date1 = 7;
              }
              $sql = "SELECT DATE_FORMAT(updationdate, '%e-%m') as 'ngay',
                count(id) as 'tong_so'
                from tblbooking
                where DATE(updationdate) >= CURDATE() - INTERVAL $max_date1 DAY
                group by DATE_FORMAT(updationdate, '%e-%m');
                ";

              $res = mysqli_query($conn, $sql);

              $arr = [];
              $today = date('d');
              if ($today < $max_date1) {
                $get_day_last_month = $max_date1 - $today;
                $last_month = date('m', strtotime("-1 month"));
                $last_month_date = date('Y-m-d', strtotime("-1 month"));
                $max_day_last_month = (new DateTime($last_month_date))->format('t');
                $start_day_last_month = $max_day_last_month - $get_day_last_month;
                for ($i = $start_day_last_month; $i <= $max_day_last_month; $i++) {
                  $key = $i . '-' . $last_month;
                  $arr[$key] = 0;
                }
                $start_date_this_month = 1;
              } else {
                $start_date_this_month = $today - $max_date1;
              }

              $this_month = date('m');

              for ($i = $start_date_this_month; $i <= $today; $i++) {
                $key = $i . '-' . $this_month;
                $arr[$key] = 0;
              }
              foreach ($res as $each) {
                $arr[$each['ngay']] = (float)$each['tong_so'];
              }

              $arrX1 = array_keys($arr);
              $arrY1 = array_values($arr);
              ?>


              <script>
                function updateMaxDate1() {
                  var maxDateSelect1 = document.getElementById('days1');
                  var maxDate1 = parseInt(maxDateSelect1.value);
                  document.getElementById('max_date1').value = maxDate1;
                  document.getElementById('form1').submit();
                }

                window.addEventListener('DOMContentLoaded', function() {
                  var maxDateSelect1 = document.getElementById('days1');
                  maxDateSelect1.addEventListener('change', updateMaxDate1);
                });
              </script>

              <form id="form1" method="GET" action="">
                <label for="days1">Chọn số ngày:</label>
                <select name="days1" id="days1">
                  <option value="7" <?php if ($max_date1 == 7) echo 'selected'; ?>>7 ngày</option>
                  <option value="15" <?php if ($max_date1 == 15) echo 'selected'; ?>>15 ngày</option>
                  <option value="30" <?php if ($max_date1 == 30) echo 'selected'; ?>>30 ngày</option>
                </select>
                <input type="hidden" name="max_date1" id="max_date1" value="<?php echo $max_date1; ?>">
              </form>
              <figure class="highcharts-figure">
                <div style="width: 740px" id="container1"></div>
              </figure>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <h3 class="tile-title">Thống kê lợi nhuận - doanh thu theo ngày</h3>
              <?php
              if (isset($_GET['days'])) {
                $max_date = $_GET['days'];
              } else {
                $max_date = 7;
              }
              $sql = "SELECT DATE_FORMAT(updationdate, '%e-%m') as 'ngay',
                sum(total) as 'doanh_thu',sum(price) as 'loi_nhuan'
                from tblbooking
                where DATE(updationdate) >= CURDATE() - INTERVAL $max_date DAY
                group by DATE_FORMAT(updationdate, '%e-%m');
                ";

              $res = mysqli_query($conn, $sql);

              $arr = [];
              $arr1 = [];
              $today = date('d');
              if ($today < $max_date) {
                $get_day_last_month = $max_date - $today;
                $last_month = date('m', strtotime("-1 month"));
                $last_month_date = date('Y-m-d', strtotime("-1 month"));
                $max_day_last_month = (new DateTime($last_month_date))->format('t');
                $start_day_last_month = $max_day_last_month - $get_day_last_month;
                for ($i = $start_day_last_month; $i <= $max_day_last_month; $i++) {
                  $key = $i . '-' . $last_month;
                  $arr[$key] = 0;
                  $arr1[$key] = 0;
                }
                $start_date_this_month = 1;
              } else {
                $start_date_this_month = $today - $max_date;
              }

              $this_month = date('m');

              for ($i = $start_date_this_month; $i <= $today; $i++) {
                $key = $i . '-' . $this_month;
                $arr[$key] = 0;
              }
              for ($i = $start_date_this_month; $i <= $today; $i++) {
                $key = $i . '-' . $this_month;
                $arr1[$key] = 0;
              }
              foreach ($res as $each) {
                $arr[$each['ngay']] = (float)$each['doanh_thu'];
              }
              foreach ($res as $each) {
                $arr1[$each['ngay']] = (float)$each['loi_nhuan'];
              }

              $arrX = array_keys($arr);
              $arrY = array_values($arr);
              $arrYY = array_values($arr1);
              ?>


              <script>
                function updateMaxDate() {
                  var maxDateSelect = document.getElementById('days');
                  var maxDate = parseInt(maxDateSelect.value);
                  document.getElementById('max_date').value = maxDate;
                  document.getElementById('form').submit();
                }

                window.addEventListener('DOMContentLoaded', function() {
                  var maxDateSelect = document.getElementById('days');
                  maxDateSelect.addEventListener('change', updateMaxDate);
                });
              </script>

              <form id="form" method="GET" action="">
                <label for="days">Chọn số ngày:</label>
                <select name="days" id="days">
                  <option value="7" <?php if ($max_date == 7) echo 'selected'; ?>>7 ngày</option>
                  <option value="15" <?php if ($max_date == 15) echo 'selected'; ?>>15 ngày</option>
                  <option value="30" <?php if ($max_date == 30) echo 'selected'; ?>>30 ngày</option>
                </select>
                <input type="hidden" name="max_date" id="max_date" value="<?php echo $max_date; ?>">
              </form>
              <figure class="highcharts-figure">
                <div style=" height: 500px; width: 740px" id="container"></div>
              </figure>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">
      Highcharts.chart('container1', {
        chart: {
          type: 'spline',

        },
        title: {
          text: 'Thống Kê Booking',
          align: 'center',
          style: {
            color: '#333333',
            fontSize: '18px',
            fontWeight: 'bold'
          }
        },
        yAxis: {
          title: {
            text: 'Số lượng',
            style: {
              color: '#333333',
              fontSize: '18px'
            }
          }
        },
        xAxis: {
          categories: <?php echo json_encode($arrX1) ?>,
          labels: {
            style: {
              color: '#333333'
            }
          }
        },
        legend: {
          layout: 'vertical',
          align: 'right',
          verticalAlign: 'middle',
          itemStyle: {
            color: '#333333',
            fontWeight: 'normal',
            fontSize: '12px'
          }
        },
        plotOptions: {
          series: {
            label: {
              connectorAllowed: false
            }
          }
        },
        series: [{
          name: 'Booking',
          data: <?php echo json_encode($arrY1) ?>,

        }],
        responsive: {
          rules: [{
            condition: {
              maxWidth: 500
            },
            chartOptions: {
              legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom'
              }
            }
          }]
        }
      });
    </script>

    <script type="text/javascript">
      Highcharts.chart('container', {
        chart: {
          type: 'areaspline',

        },
        title: {
          text: 'Thống Kê Lợi nhuận - Doanh Thu',
          align: 'center',
          style: {
            color: '#333333',
            fontSize: '18px',
            fontWeight: 'bold'
          }
        },
        yAxis: {
          title: {
            text: 'Price',
            style: {
              color: '#333333',
              fontSize: '18px'
            }
          }
        },
        xAxis: {
          categories: <?php echo json_encode($arrX) ?>,
          labels: {
            style: {
              color: '#333333'
            }
          }
        },
        legend: {
          layout: 'vertical',
          align: 'right',
          verticalAlign: 'middle',
          itemStyle: {
            color: '#333333',
            fontWeight: 'normal',
            fontSize: '12px'
          }
        },
        plotOptions: {
          series: {
            label: {
              connectorAllowed: false
            }
          }
        },
        series: [{
            name: 'Doanh Thu',
            data: <?php echo json_encode($arrY) ?>,

          },
          {
            name: 'Lợi nhuận',
            data: <?php echo json_encode($arrYY) ?>,
            color: '#FFD43B'
          }
        ],
        responsive: {
          rules: [{
            condition: {
              maxWidth: 500
            },
            chartOptions: {
              legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom'
              }
            }
          }]
        }
      });
    </script>
    </div>
    <!--END right-->
    </div>

  </main>
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
</body>

</html>