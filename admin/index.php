<?php include('../admin/include/header.php') ?>
<?php include('./login-check.php') ?>
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




<!-- nội dung chính phần bắt đầu -->
<div class="main-content">
  <div class="wrapper">

    <h1>DASHBOARD</h1>

    <?php
    //session_start();
    if (!isset($_SESSION['username'])) {
      header('location:login.php');
    }
    ?>

    <br><br>

    <?php
    if (isset($_SESSION['login'])) {
      echo $_SESSION['login'];
      unset($_SESSION['login']);
    }
    ?>

    <br>

    <a href="<?php echo SITEURL; ?>admin/manage-admin.php">
      <div class="col-4 text-center">

        <?php
        $sql = "SELECT * FROM tbladmin";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        ?>

        <h1><?php echo $count; ?></h1>
        <br>
        Admin
      </div>
    </a>

    <a href="<?php echo SITEURL; ?>admin/manage-category.php">
      <div class="col-4 text-center">
        <?php
        $sql2 = "SELECT * FROM tblcategory";
        $res2 = mysqli_query($conn, $sql2);
        $count2 = mysqli_num_rows($res2);
        ?>

        <h1><?php echo $count2; ?></h1>
        <br>
        Categories
      </div>
    </a>

    <a href="<?php echo SITEURL; ?>admin/manage-tour.php">
      <div class="col-4 text-center">
        <?php
        $sql3 = "SELECT * FROM tbltour";
        $res3 = mysqli_query($conn, $sql3);
        $count3 = mysqli_num_rows($res3);
        ?>

        <h1><?php echo $count3; ?></h1>
        <br>
        Tour
      </div>
    </a>

    <a href="<?php echo SITEURL; ?>admin/manage-booking.php">
      <div class="col-4 text-center">
        <h1>
          <?php
          $sql3 = "SELECT * FROM tblbooking";
          $res3 = mysqli_query($conn, $sql3);
          $count3 = mysqli_num_rows($res3);
          ?>
          <?= $count3 ?>
        </h1>
        <br>
        Booking
      </div>
    </a>

    <a href="<?php echo SITEURL; ?>admin/manage-user.php">
      <div class="col-4 text-center">
        <?php
        $sql5 = "SELECT * FROM tblusers";
        $res5 = mysqli_query($conn, $sql5);
        $count5 = mysqli_num_rows($res5);
        ?>

        <h1><?php echo $count5; ?></h1>
        <br>
        User
      </div>
    </a>



    <div class="clearfix"></div>

  </div>

  <!-- <p>Thống kê theo: <span id="text-date"></span></p>
            <p>
                <select class="select-date" name="" id="">
                    <option value="7ngay">7 ngày qua</option>
                    <option value="30ngay">30 ngày qua</option>
                    <option value="90ngay">90 ngày qua</option>
                    <option value="365ngay">365 ngày qua</option>
                </select>
            </p> -->
  <div>

    <?php
    if (isset($_GET['days'])) {
      $max_date = $_GET['days'];}
      else{
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
      <input type="button" value="Xem" onclick="updateMaxDate()">
    </form>
  </div>

  <div style="margin-left: 26%; " class="text-center">
    <figure class="highcharts-figure">
      <div id="container"></div>
      <p class="highcharts-description">
        <style>
          code {
            font-family: Consolas, "courier new";
            color: crimson;
            background-color: #f1f1f1;
            padding: 2px;
            font-size: 105%;
          }
        </style>
        Basic line chart showing trends in a dataset. This chart includes the
        <code>Series-Label</code> module, which adds a label to each line for
        enhanced readability.
      </p>
    </figure>
  </div>


</div>
<!-- nội dung chính phần kết thúc -->
<?php include('../admin/include/footer.php') ?>


<!-- <?php
      require '../carbon/autoload.php';

      use Carbon\Carbon;
      use Carbon\CarbonInterval;

      printf("Now: %s", Carbon::now('Asia/Ho_Chi_Minh'));

      ?>
<div>


<?php
$last_month = date('M', strtotime("-1 month"));
echo "$last_month";
?>
</div> -->






<script type="text/javascript">
  Highcharts.chart('container', {
    chart: {
      type: 'spline',
      
    },
    title: {
      text: 'Thống Kê Doanh Thu',
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
          color: '#333333'
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
        fontWeight: 'normal'
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
        data: <?php echo json_encode($arrY) ?>
      },
      {
        name: 'Lợi nhuận',
        data: <?php echo json_encode($arrYY) ?>
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