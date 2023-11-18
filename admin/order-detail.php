<?php ob_start(); include('../admin/include/header.php') ?>
   <!-- nội dung chính phần bắt đầu -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Detail Booking</h1>

                <br> <br>
                    <table class="tbl-full">

                        <tr>
                            <th class="text-center">STT</th>
                            <th class="text-center">Tour</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Qtt</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">From date</th>
                            <th class="text-center">To date</th>
                            <th class="text-center">Action</th>
                        </tr>

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
                    </table>

                <div class="clearfix"></div>

                
            </div>
        </div>


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
                    header("location:".SITEURL.'admin/manage-booking.php');
                    ob_end_flush();
                }
                
            
            }
        ?>

        <?php
            // if(isset($_POST['submit'])){
            //     $updationdate = date('Y-m-d G.i:s');
            //     // $updationdate = date('Y-m-d', strtotime($_POST['updationdate']));
            //     $sql1 = "INSERT INTO tblbooking SET updationdate='$updationdate' where id=$idbk";
            //     $res1 = mysqli_query($conn, $sql1);
                
            //     if($res1==true){
                    
            //         $_SESSION['updatee'] = "<div class='success text-center'><h1>Updated Successfully</h1></div>";
            //         // chuyển hướng đến manage admin
            //         header("location:".SITEURL.'admin/manage-booking.php');
            //         ob_end_flush();
            //     }
            // }
        ?>
        <!-- nội dung chính phần kết thúc -->

<?php include('../admin/include/footer.php') ?>