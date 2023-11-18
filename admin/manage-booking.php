<?php include('../admin/include/header.php') ?>
   

<?php
    if(isset($_SESSION['updatee']))
    {
        echo $_SESSION['updatee'];
        unset($_SESSION['updatee']);
    }

    if(isset($_SESSION['delete-booking']))
    {
        echo $_SESSION['delete-booking'];
        unset($_SESSION['delete-booking']);
    }

    if(isset($_SESSION['unauthorize1']))
    {
        echo $_SESSION['unauthorize1'];
        unset($_SESSION['unauthorize1']);
    }

    ?>


<!-- nội dung chính phần bắt đầu -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Booking</h1>

                <br> <br>
                    <table class="tbl-full">
                    <colgroup>
                        <col width="30" span="1">
                        <col width="140" span="1">
                        <col width="100" span="1">
                        <col width="150" span="1">
                        <col width="100" span="1">
                        <col width="100" span="1">
                        <col width="270" span="1">
                        <col width="50" span="1">
                        <col width="50" span="1">
                        <col width="106" span="1">
                    </colgroup>
                        <tr>
                            <th class="text-center">STT</th>
                            <th class="text-center">Tour</th>
                            <th class="text-center">From date</th>
                            <th class="text-center">Full name</th>
                            <th class="text-center">Contact</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Address</th>
                            <th class="text-center">Status booking</th>
                            <th class="text-center">Status bill</th>
                            <th class="text-center">Action</th>
                        </tr>

                        <?php
                            $sql = "SELECT * FROM tblbooking";
                            $res = mysqli_query($conn,$sql);
                            $count = mysqli_num_rows($res);
                            $stt = 1;

                            if($count>0)
                            {
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    $id  = $row['id'];
                                    $tour = $row['tour'];
                                    $from_date = $row['from_date'];
                                    $customer_name = $row['customer_name'];
                                    $customer_contact = $row['customer_contact'];
                                    $customer_email = $row['customer_email'];
                                    $customer_address = $row['customer_address'];
                                    $status = $row['status'];                                    
                                    $statusbill = $row['status_bill'];
                                    ?>
                                    
                                        <tr>
                                            <td><?php echo $stt++; ?>.</td>
                                            <td class="text-center"><?php echo $tour; ?></td>
                                            <td><?php echo $from_date; ?></td>
                                            <td><?php echo $customer_name; ?></td>
                                            <td><?php echo $customer_contact; ?></td>
                                            <td><?php echo $customer_email; ?></td>
                                            <td><?php echo $customer_address; ?></td>

                                            <td>
                                                <?php 
                                                    if($status==0)
                                                    { 
                                                        echo "Processing";
                                                    }else
                                                        {
                                                            if($status==1)
                                                            { 
                                                                echo "Confirmed";
                                                            }
                                                            else{
                                                                echo "Cancelled";
                                                            }
                                                            } 
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    if($statusbill==1 && $status==1)
                                                        echo "Paid";
                                                    else
                                                        echo "Unpaid";
                                                ?>
                                            </td>
                                            
                                            <td class="text-center">
                                                <?php 
                                                    if($statusbill==1 && $status==1){
                                                        echo"<a style='pointer-events: none; opacity: 0.5; text-decoration:none;' href='order-detail.php?id=$id' class='btn-updateadmin' disabled>Detail</a>";
                                                    }
                                                    else{
                                                      echo"  <a  href='order-detail.php?id=$id' class='btn-updateadmin'>Detail</a>";
                                                    }
                                                ?>
                                                
                                                <?php 
                                                    if($statusbill==0)
                                                        echo "<a href='delete-booking.php?id=$id' class='btn-deleteadmin'>Cancel</a>";
                                                    else
                                                    {
                                                        
                                                    }
                                                ?>
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
        <!-- nội dung chính phần kết thúc -->

<?php include('../admin/include/footer.php') ?>