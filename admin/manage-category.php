<?php include('../admin/include/header.php') ?>
   <!-- nội dung chính phần bắt đầu -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Category</h1>

                <br /> <br> 

                <?php
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add']; //in ra đã add
                        unset($_SESSION['add']); // f5 mất thông báo
                    }
                    echo "<br/>";
                    if(isset($_SESSION['upload']))
                    {
                        echo $_SESSION['upload']; //in ra đã add
                        unset($_SESSION['upload']); // f5 mất thông báo
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
                ?>
            <br> <br>
                <!-- button thêm admin -->
                <a href="<?php echo SITEURL; ?>admin/add-category.php"  class="btn-addadmin">Add Category</a>

                <br> <br>
                    <table class="tbl-full">
                        <tr>
                            <th>STT</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Featured</th>
                            <th>Active</th>
                            <th>Actions</th>
                        </tr>

                        <?php 
                            $sql = "SELECT * FROM tblcategory";
                            $res = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($res);

                            $stt=1;

                            if($count>0)
                            {
                                while($row=mysqli_fetch_assoc($res)){
                                    $id = $row['id'];
                                    $title = $row['title'];
                                    $nameimage = $row['nameimage'];
                                    $featured = $row['featured'];
                                    $active = $row['active'];

                                    ?>
                                        <tr>
                                            <td><?php echo $stt++; ?></td>
                                            <td><?php echo $title ?></td>
                                            <td>
                                                <?php 
                                                    if($nameimage!="")
                                                    {
                                                        ?>
                                                            <img src="<?php echo SITEURL;?>images/category/<?php echo $nameimage; ?>" width="100px" >

                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        echo "<div class='error'>Image not Added.</div>";
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo $featured ?></td>
                                            <td><?php echo $active ?></td>
                                            <td>
                                                    <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>"  class="btn-updateadmin">Update Category</a>
                                                    <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&nameimage=<?php echo $nameimage; ?>" class="btn-deleteadmin">Delete Category</a>
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