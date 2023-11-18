<?php include('../admin/include/header.php') ?>
   <!-- nội dung chính phần bắt đầu -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Admin</h1>


                <br /> <br>

                <?php 
                    if(isset($_SESSION['add'])){
                        echo $_SESSION['add']; //in ra đã add
                        unset($_SESSION['add']); // f5 mất thông báo
                    }
                ?>
                <br> <br><br>
                <!-- button thêm admin -->
                <a href="add-admin.php" class="btn-addadmin">Add Admin</a>

                <br> <br>
                    <table class="tbl-full">
                        <tr>
                            <th>STT</th>
                            <th>Full Name</th>
                            <th>Username</th>
                            <th>Actions</th>
                        </tr>

                        <?php
                            $sql = "SELECT * FROM tbladmin";
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
                                        $fullname=$rows['fullname'];
                                        $username=$rows['username'];

                                        ?>
                                            <tr>
                                                <td><?php echo $sn++; ?></td>
                                                <td><?php echo $fullname; ?></td>
                                                <td><?php echo $username; ?></td>
                                                <td>
                                                        <a href="" class="btn-updateadmin">Update Admin</a>
                                                        <a href="" class="btn-deleteadmin">Delete Admin</a>
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