<?php ob_start(); include('../admin/include/header.php') ?>


    <div class="main-content">
        <div class="wrapper">
            <h1>Update Hotel</h1>

            <br>


            <?php  
                if(isset($_GET['id']))
                {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM tlbhotel WHERE id=$id";

                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);

                    if($count==1)
                    {
                        $row = mysqli_fetch_assoc($res);
                        $namehotel = $row['name_hotel'];
                        $location_id = $row['location_id'];
                        

                        // $sql3 = "SELECT * FROM tbllocation where id = $location_id";
                        // $res3 = mysqli_query($conn, $sql3);
                        // $count3 = mysqli_num_rows($res3);
                        
                        // if($count3>0){
                        //     while($row=mysqli_fetch_assoc($res3)){
                        //         $location = $row['title_location'];
                        //         $id_location = $row['id'];
                        //     }
                        // }
                    }
                    else
                    {
                        $_SESSION['notfound'] = "<div class='error'>Hotel not Found.</div>";
                        header('location:'.SITEURL.'admin/manage-hotel.php');
                    }
                }
                else
                {
                    
                    header('location:'.SITEURL.'admin/manage-hotel.php');
                }
            ?>

            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td>Name hotel:</td>
                        <td>
                            <input type="text" name="namehotel" value="<?php echo $namehotel;  ?>" placeholder="Title of hotel" required>
                        </td>
                    </tr>

                    <tr>
                        <td>Location: </td>
                            <td>
                                <select class="" name="location" id="location">
                                    <option value=""><?php echo $location_id; ?></option >
                                    <?php
                                        $sql = "SELECT * FROM tbllocation order by id ASC";
                                        $res = mysqli_query($conn, $sql);
                                        $count = mysqli_num_rows($res);

                                        

                                        if($count > 0)
                                        {
                                            while($row=mysqli_fetch_array($res))
                                            {
                                                $id = $row['id'];
                                                $title_location = $row['title_location'];
                                                $_GET['location_id'] = $id;

                                            echo '<option value="'.$id.'">'.$title_location.'</option>';
                                            }
                                        }
                                    ?>
                                </select>
                            </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <br>
                            <input type="hidden" name="current_image" value="<?php echo $current_image; ?>" class="btn-addadmin">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="Update Hotel" class="btn-addadmin">
                        </td>
                    </tr>
                </table>
            </form>

            <?php
                ob_start();
                if(isset($_POST['submit']))
                {
                    $id = $_GET['id'];
                    $namehotel = $_POST['namehotel'];
                    $location = $_POST['location'];                    

                    $sql2 = "UPDATE tlbhotel SET
                        name_hotel = '$namehotel',
                        location_id = '$location'
                        WHERE id = $id
                    ";

                    $res2 = mysqli_query($conn, $sql2);

                    if ($res2==true)
                    {
                        $_SESSION['update'] = "<div class='success'>Hotel Updated Successfully.</div>";
                        header('location:'.SITEURL.'admin/manage-hotel.php');
                    }
                    else
                    {
                        $_SESSION['update'] = "<div class='error'>Failed to Update Hotel.</div>";
                        header('location:'.SITEURL.'admin/manage-hotel.php');
                    }

                    // if(isset($_SESSION['update']))
                    // {
                    //     echo $_SESSION['update'];
                    //     unset($_SESSION['update']);
                    // }
                }
            ?>

        </div>
    </div>



<!-- btn addadmin -->
<?php include('../admin/include/footer.php') ?>



