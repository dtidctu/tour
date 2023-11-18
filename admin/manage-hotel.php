<?php include('../admin/include/header.php') ?>
   <!-- nội dung chính phần bắt đầu -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Hotel</h1>


                <br /> <br>

                <?php
                    if(isset($_SESSION['delete-hotel']))
                    {
                        echo $_SESSION['delete-hotel']; //in ra đã add
                        unset($_SESSION['delete-hotel']); // f5 mất thông báo
                    }
                ?>

                <!-- button thêm admin -->
                <a href="add-hotel.php" class="btn-addadmin">Add Hotel</a>

                <br> <br>
                    <table class="tbl-full">
                        <tr>
                            <th>STT</th>
                            <th>Name Hotel</th>
                            <th>Actions</th>
                        </tr>

                        <?php
                            $sql = "SELECT * FROM tlbhotel";
                            $res = mysqli_query($conn, $sql);

                            if($res==TRUE)
                            {
                                //check whether we have dât in database or not
                                $count = mysqli_num_rows($res); //func to get all the rows in dâtbase
                                
                                $sn = 1; //id tự động tăng sau khi xóa
                                //check the num of rows
                                if($count>0)
                                {
                                    // have data in đatabase
                                    while($rows=mysqli_fetch_assoc($res))
                                    {
                                        $id=$rows['id'];
                                        $name_hotel=$rows['name_hotel'];

                                        ?>
                                            <tr>
                                                <td><?php echo $sn++; ?></td>
                                                <td><?php echo $name_hotel; ?></td>
                                                <td>
                                                    <a href="<?php echo SITEURL; ?>admin/update-hotel.php?id=<?php echo $id; ?>"  class="btn-updateadmin">Update Hotel</a>
                                                    <a href="<?php echo SITEURL; ?>admin/delete-hotel.php?id=<?php echo $id; ?>" class="btn-deleteadmin">Delete Hotel</a>
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                }
                            }
                        ?>

                        

            
                    </table>





                <div class="clearfix"></div>

            </div>
        </div>
        <!-- nội dung chính phần kết thúc -->

<?php include('../admin/include/footer.php') ?>