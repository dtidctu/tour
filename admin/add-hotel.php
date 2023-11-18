<?php include('../admin/include/header.php') ?>


    <div class="main-content">
        <div class="wrapper">
            <h1>Add Hotel</h1>

            <br>


            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Name hotel:</td>
                        <td>
                            <input type="text" name="namehotel" placeholder="Enter name hotel" required>
                        </td>
                    </tr>

                    <td>Location: </td>
                            <td>
                                <select class="" name="location" id="location">
                                    <option value="">Địa điểm</option>
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
                    <br>

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Hotel" class="btn-addadmin">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>



<!-- btn addadmin -->
<?php include('../admin/include/footer.php') ?>


<?php 

    if(isset($_POST['submit'])){
        // post data
        $namehotel = $_POST['namehotel'];
        $location = $_POST['location'];

        // insert data
        $sql = "INSERT INTO tlbhotel SET 
            name_hotel = '$namehotel',
            location_id = '$location'
        ";

        // execute sql

        $res = mysqli_query($conn, $sql) or die("Can not execute!");

        // check data
        if($res==TRUE)
        {
            // echo "Data Inserted";
            // create a sesion
            $_SESSION['add'] = "Hotel Added Successfully";
            // chuyển hướng đến manage admin
            header("location:".SITEURL.'admin/manage-hotel.php');
        }
        else
        {
            // echo "Faile to Insert Data";
            $_SESSION['add'] = "Failed to Add Admin";
            // chuyển hướng đến manage admin
            header("location:".SITEURL.'admin/manage-admin.php');
        }
    }



?>
