<?php ob_start(); include('../admin/include/header.php') ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <div class="main-content">
        <div class="wrapper">
            <h1>Add Category</h1>

            <br>

            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add']; //in ra đã add
                    unset($_SESSION['add']); // f5 mất thông báo
                }
            ?>

            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td>Title:</td>
                        <td>
                            <input type="text" name="title" placeholder="Title of tour" required>
                        </td>
                    </tr>
                    <tr>
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
                    </tr>
                    <tr>
                        <td>Hotel:</td>
                        <td>
                            <select class="" name="hotel" id="hotel"></select>
                        </td>
                    </tr>

                    <tr>
                        <td>Time:</td>
                        <td>
                            <input type="text" name="time" placeholder="Time of tour" required>
                        </td>
                    </tr>

                    <tr>
                        <td>Description: </td>
                        <td>
                            <textarea name="description" cols="30" rows="5" placeholder="Enter description of tour" required></textarea > 
                        </td>
                    </tr>

                    <tr>
                        <td>Tour price: </td>
                        <td>
                            <input type="number" name="price" required>
                        </td>
                    </tr>

                    <tr>
                        <td>Tour cost: </td>
                            <td>
                                <input type="number" name="tourcost" required>
                            </td>
                    </tr>

                    <tr>
                        <td>Select Image: </td>
                        <td>
                            <input type="file" name="image1" required>
                        </td>
                    </tr>

                    <tr>
                    <td>Category: </td>
                        <td>
                            <select name="category">
                                <?php
                                    $sql = "SELECT * FROM tblcategory WHERE active = 'Yes'";
                                    $res = mysqli_query($conn, $sql);
                                    $count = mysqli_num_rows($res);

                                    if($count > 0)
                                    {
                                        while($row=mysqli_fetch_assoc($res))
                                        {
                                            $id = $row['id'];
                                            $title = $row['title'];

                                            ?>
                                                <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                            <?php
                                        }
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                        <!-- <td>Category: </td>
                        <td>
                            <select name="category" id="">
                                <option value="1">Gia đình</option>
                                <option value="2">Mạo hiểm</option>
                            </select>
                        </td> -->
                    </tr>

                    <tr>
                        <td>Featured: </td>
                        <td>
                            <input type="radio" name="featured" value="Yes" required> Yes
                            <input type="radio" name="featured" value="No" required> No
                        </td>
                    </tr>

                    <tr>
                        <td>Active: </td>
                        <td>
                            <input type="radio" name="active" value="Yes" required> Yes
                            <input type="radio" name="active" value="No" required> No
                        </td>
                    </tr>

                    <br>

                    <tr>
                        <td colspan="2">
                            <br>
                            <input type="submit" name="submit" value="Add Tour" class="btn-addadmin">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>



<!-- btn addadmin -->
<?php include('../admin/include/footer.php') ?>


<?php 
ob_start();
    if(isset($_POST['submit'])){
        // post data

        
        $tourcost = $_POST['tour_cost'];
        $title = $_POST['title'];
        $time = $_POST['time'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $location = $_POST['location'];
        $hotel = $_POST['hotel'];
        $tourcost = $_POST['tourcost'];
        $category = $_POST['category'];

        if(isset($_POST['featured'])){
            $featured = $_POST['featured'];
        }
        else
        {
            $featured = "No";
        }
        if(isset($_POST['active']))
        {
            $active = $_POST['active'];
        }
        else
        {
            $active = "No";
        }

        //check image is selected or not
        if(isset($_FILES['image1']['name']))
        {
            $nameimage = $_FILES['image1']['name'];
            
            if($nameimage != "")
            {
                $source_path = $_FILES['image1']['tmp_name'];
            
                $destination_path = "../images/tour/" . $nameimage;
                
                $upload = move_uploaded_file($source_path, $destination_path);
                
                if($upload == false)
                {
                    $_SESSION['upload'] = "<div class='error'>Faild to Upload Image</div>";
                    header('location:'.SITEURL.'admin/giaodienmoi/doc/table-data-product.php');
                    die();
                }
            }   
        }
        else
        {
            $nameimage="";
        }

        // insert data
        $sql2 = "INSERT INTO tbltour SET 
            title = '$title',
            time = '$time',
            description = '$description',
            price = '$price',
            location = '$location',
            hotel = '$hotel',
            tour_cost = '$tourcost',
            image_name = '$nameimage',
            category_id = '$category',
            featured = '$featured',
            active = '$active'
        ";

        // execute sql

        $res2 = mysqli_query($conn, $sql2) or die("Can not execute!");

        // check data
        if($res2==TRUE)
        {
            // echo "Data Inserted";
            // create a sesion
            $_SESSION['add'] = "<div class='success'>Category Added Successfully</div>";
            // chuyển hướng đến manage admin
            header("location:".SITEURL.'admin/manage-tour.php');
            ob_end_flush();
        }
        else
        {
            // echo "Faile to Insert Data";
            $_SESSION['add'] = "<div class='error'>Failed to Add Category</div>";
            // chuyển hướng đến manage admin
            header("location:".SITEURL.'admin/manage-tour.php');
        }
    }
?>

<script type="text/javascript">
    $(document).ready(function(){
        $('#location').change(function(){
            var id = $(this).val();
            $.ajax({
                url: "../admin/data.php",
                method: "POST",
                data:{id:id},
                success:function(data){
                    $('#hotel').html(data);
                }
            })
        });
    });
</script>
