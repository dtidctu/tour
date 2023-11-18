<?php include('../admin/include/header.php') ?>
   <!-- nội dung chính phần bắt đầu -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Tour</h1>

                <br /> <br>
                <?php 
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add']; //in ra đã add
                        unset($_SESSION['add']); // f5 mất thông báo
                    }

                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update']; //in ra đã add
                        unset($_SESSION['update']); // f5 mất thông báo
                    }

                    if(isset($_SESSION['remove']))
                    {
                        echo $_SESSION['remove']; //in ra đã add
                        unset($_SESSION['remove']); // f5 mất thông báo
                    }
                    
                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete']; //in ra đã add
                        unset($_SESSION['delete']); // f5 mất thông báo
                    }

                    if(isset($_SESSION['notfound']))
                    {
                        echo $_SESSION['notfound']; //in ra đã add
                        unset($_SESSION['notfound']); // f5 mất thông báo
                    }

                    if(isset($_SESSION['upload']))
                    {
                        echo $_SESSION['upload']; //in ra đã add
                        unset($_SESSION['upload']); // f5 mất thông báo
                    }

                    if(isset($_SESSION['failed-remove']))
                    {
                        echo $_SESSION['failed-remove']; //in ra đã add
                        unset($_SESSION['failed-remove']); // f5 mất thông báo
                    }
                    
                    if(isset($_SESSION['unauthorize']))
                    {
                        echo $_SESSION['unauthorize']; //in ra đã add
                        unset($_SESSION['unauthorize']); // f5 mất thông báo
                    }
                ?>
                <br><br>
                <!-- button thêm admin -->
                <a href="add-tour.php" class="btn-addadmin">Add Tour</a>

                <br> <br>
                    <table class="tbl-full">
                        <colgroup>
                            <col width="30" span="1">
                            <col width="80" span="1">
                            <col width="80" span="1">
                            <col width="300" span="1">
                            <col width="90" span="1">
                            <col width="90" span="1">
                            <col width="90" span="1">
                            <col width="100" span="1">
                            <col width="50" span="1">
                            <col width="50" span="1">
                            <col width="50" span="1">
                            <col width="100" span="1">
                        </colgroup>
                        <tr>
                            <th class="text-center">STT</th>
                            <th class="text-center">Title</th>
                            <th class="text-center">Time</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Tour price</th>
                            <th class="text-center">Hotel</th>
                            <th class="text-center">Tour cost</th>
                            <th class="text-center">Image tour</th>
                            <th class="text-center">Category</th>
                            <th class="text-center">Featured</th>
                            <th class="text-center">Active</th>
                            <th class="text-center">Action</th>
                        </tr>

                        <?php 
                            $sql = "SELECT * FROM tbltour";
                            $res = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($res);

                            

                            $stt=1;

                            if($count>0)
                            {
                                while($row=mysqli_fetch_assoc($res)){
                                    $id = $row['id'];
                                    $title = $row['title'];
                                    $time = $row['time'];
                                    $description = $row['description'];
                                    $price = $row['price'];
                                    $hotel = $row['hotel'];
                                    $nameimage = $row['image_name'];
                                    $category = $row['category_id'];
                                    $featured = $row['featured'];
                                    $active = $row['active'];
                                    $tourcost = $row['tour_cost'];

                                    $sql2 = "SELECT * FROM tblcategory where id = $category";
                                    $res2 = mysqli_query($conn, $sql2);
                                    $count2 = mysqli_num_rows($res2);
                                    
                                    if($count2>0){
                                        while($row=mysqli_fetch_assoc($res2)){
                                            $category_name = $row['title'];
                                        }
                                    }

                                    $sql3 = "SELECT * FROM tlbhotel where id = $hotel";
                                    $res3 = mysqli_query($conn, $sql3);
                                    $count3 = mysqli_num_rows($res3);
                                    
                                    if($count3>0){
                                        while($row=mysqli_fetch_assoc($res3)){
                                            $hotel_name = $row['name_hotel'];
                                        }
                                    }
                                    ?>
                                        <tr>
                                            <td><?php echo $stt++; ?></td>
                                            <td class="text-center"><?php echo $title ?></td>
                                            <td class="text-center"><?php echo $time ?> ngày</td>
                                            <td><?php echo $description ?></td>
                                            <td class="text-center">$<?php echo $price ?></td>
                                            <td class="text-center"><?php echo $hotel_name ?></td>
                                            <td class="text-center">$<?php echo $tourcost ?></td>
                                            <td class="text-center">
                                                <?php 
                                                    if($nameimage!="")
                                                    {
                                                        ?>
                                                            <img src="<?php echo SITEURL;?>images/tour/<?php echo $nameimage; ?>" width="100px" >

                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        echo "<div class='error'>Image not Added.</div>";
                                                    }
                                                ?>
                                            </td>
                            
                                            <td class="text-center"><?php echo $category_name ?></td>
                                            <td class="text-center"><?php echo $featured ?></td>
                                            <td class="text-center"><?php echo $active ?></td>
                                            <td class="text-center">
                                                    <a href="<?php echo SITEURL; ?>admin/update-tour.php?id=<?php echo $id; ?>"  class="btn-updateadmin">Update Tour</a> <br>
                                                    <a href="<?php echo SITEURL; ?>admin/delete-tour.php?id=<?php echo $id; ?>&nameimage=<?php echo $nameimage; ?>" class="btn-deleteadmin">Delete Tour</a>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            }
                            else
                            {
                                ?>

                                <tr>
                                    <td colspan="6"><div class="">No Category Added</div></td>
                                </tr>
                                <?php
                            }
                        ?>


                    </table>





                <div class="clearfix"></div>

            </div>
        </div>
        <!-- nội dung chính phần kết thúc -->

<?php include('../admin/include/footer.php') ?>

