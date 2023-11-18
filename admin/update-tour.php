<?php
    ob_start();
include('../admin/include/header.php') 
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>



    <div class="main-content">
        <div class="wrapper">
            <h1>Update Tour</h1>

            <br>

            <?php  
                if(isset($_GET['id']))
                {
                    $id = $_GET['id'];
                    $sql2 = "SELECT * FROM tbltour WHERE id=$id";

                    $res2 = mysqli_query($conn, $sql2);
                    $count2 = mysqli_num_rows($res2);

                    

                    if($count2==1)
                    {
                        $row2 = mysqli_fetch_assoc($res2);
                        $location = $row2['location'];
                        $hotel = $row2['hotel'];
                        $tourcost = $row2['tour_cost'];
                        $title1 = $row2['title'];
                        $description = $row2['description'];
                        $price = $row2['price'];
                        $current_image = $row2['image_name'];
                        $featured = $row2['featured'];
                        $active = $row2['active'];
                        $category = $row2['category_id'];
                        $time = $row2['time'];

                        $sql3 = "SELECT * FROM tbllocation where id = $location";
                        $res3 = mysqli_query($conn, $sql3);
                        $count3 = mysqli_num_rows($res3);
                        
                        if($count3>0){
                            while($row=mysqli_fetch_assoc($res3)){
                                $location = $row['title_location'];
                                $id_location = $row['id'];
                            }
                        }
                    }
                    
                }
                else
                {
                    
                    header('location:'.SITEURL.'admin/manage-tour.php');
                }
            ?>


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
                            <input type="text" name="title" value="<?php echo $title1;  ?>" placeholder="Title of tour" required>
                        </td>
                    </tr>

                    <tr>
                        <td>Time:</td>
                        <td>
                            <input type="text" name="time" value="<?php echo $time;  ?>" placeholder="Time of tour" required>
                        </td>
                    </tr>

                    <!-- <tr>
                        <td>Location: </td>
                            <td>
                                <select class="" name="location" id="location">
                                    <option value=""><?php echo $location; ?></option >
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
                    </tr> -->

                    <tr>
                        <td>Description:</td>
                        <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Enter description of tour" required><?php echo $description; ?></textarea >  
                        </td>
                    </tr>

                    <tr>
                        <td>Price:</td>
                        <td>
                            <input type="number" name="price" value="<?php echo $price;  ?>" placeholder="Price of tour" required>
                        </td>
                    </tr>

                    <tr>
                        <td>Tour cost: </td>
                            <td>
                                <input type="number" name="tourcost" value="<?php echo $tourcost;  ?>" required>
                            </td>
                    </tr>

                    <tr>
                        <td>Current Image: </td>
                        <td>
                            <?php 
                                if($current_image != "")
                                {
                                    ?>
                                        <img src="<?php echo SITEURL; ?>images/tour/<?php echo $current_image; ?>" alt="" width="200px">
                                    <?php
                                }
                                else
                                {
                                    echo "<div class='error'>Image Not Added.</div>";
                                }
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td>New Image: </td>
                        <td>
                            <input type="file" name="image" >
                        </td>
                    </tr>

                    <tr>
                        <td>Category: </td>
                        <td>
                            <select name="category" id="">
                            <?php
                                    $sql = "SELECT * FROM tblcategory WHERE id= $category";
                                    $res = mysqli_query($conn, $sql);
                                    $count = mysqli_num_rows($res);

                                    if($count > 0)
                                    {
                                        while($row=mysqli_fetch_assoc($res))
                                        {
                                            $id = $row['id'];
                                            $title2 = $row['title'];

                                            ?>
                                                <option value="<?php echo $id; ?>"><?php echo $title2; ?></option>
                                            <?php

                                            ?>
                                                
                                            <?php
                                                $sql = "SELECT * FROM tblcategory";
                                                $res = mysqli_query($conn, $sql);
                                                $count = mysqli_num_rows($res);
        
                                                if($count > 0)
                                                {
                                                    while($row=mysqli_fetch_array($res))
                                                    {
                                                        $id = $row['id'];
                                                        $title_category = $row['title'];
                                                        
        
                                                    echo '<option value="'.$id.'">'.$title_category.'</option>';
                                                    }
                                                }
                                        }
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Featured: </td>
                        <td>
                            <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes" > Yes
                            <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="No" > No
                        </td>
                    </tr>

                    <tr>
                        <td>Active: </td>
                        <td>
                        <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes" > Yes
                            <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No" > No
                        </td>
                    </tr>

                    <br>

                    <tr>
                        <td colspan="2">
                            <br>
                            <input type="hidden" name="current_image" value="<?php echo $current_image; ?>" class="btn-addadmin">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="Update Tour" class="btn-addadmin">
                        </td>
                    </tr>
                </table>
            </form>

            <?php 
            ob_start();
                if(isset($_POST['submit']))
                {
                    $id = $_GET['id'];
                    $title4 = $_POST['title'];
                    $description = $_POST['description'];
                    $current_image = $_POST['current_image'];
                    $price = $_POST['price'];
                    $tourcost = $_POST['tourcost'];
                    $category = $_POST['category'];
                    // $hotel = $_POST['hotel'];
                    // $location = $_POST['location'];
                    $time = $_POST['time'];
                    $featured = $_POST['featured'];
                    $active = $_POST['active'];

                    if(isset($_FILES['image']['name']))
                    {
                        $nameimage = $_FILES['image']['name'];
                        
                        if($nameimage != "")
                        {
                            // $ext = end(explode('.', $nameimage));

                            $src_path = $_FILES['image']['tmp_name'];
                        
                            $dest_path = "../images/tour/".$nameimage;
                        
                            $upload = move_uploaded_file($src_path, $dest_path);

                            if($upload == false)
                            {
                                $_SESSION['upload'] = "<div class='error'>Faild to Upload new Image</div>";
                                header('location:'.SITEURL.'admin/manage-tour.php');
                                die();
                            }
                            
                            if($current_image != "")
                            {
                                $remove_path = "../images/tour/".$current_image;
                                $remove = unlink($remove_path);

                                if($remove==false)
                                {
                                    $_SESSION['failed-remove'] = "<div class='error'>Failed to remove current Image.</div>";
                                    header('location:'.SITEURL.'admin/manage-tour.php');
                                    die();
                                }
                            }

                        }
                        else
                        {
                            $nameimage = $current_image;
                        }
                    }

                    $sql4 = "UPDATE tbltour SET 
                    title = '$title4',
                    time = '$time',
                    description = '$description',
                    price = '$price',
                    tour_cost = '$tourcost',
                    image_name = '$nameimage',
                    -- hotel = '$hotel',
                    -- location = '$location',
                    category_id = '$category',
                    featured = '$featured',
                    active = '$active'
                    WHERE id = $id
                    ";

                    $res4 = mysqli_query($conn, $sql4);

                    if ($res4==true)
                    {
                        $_SESSION['update'] = "<div class='success'>Tour Updated Successfully.</div>";
                        header('location:'.SITEURL.'admin/manage-tour.php');
                        ob_end_flush();
                    }
                    else
                    {
                        $_SESSION['update'] = "<div class='error'>Failed to Update Tour.</div>";
                        header('location:'.SITEURL.'admin/manage-tour.php');
                        ob_end_flush();
                    }
                }

            ?>

        </div>
    </div>



<!-- btn addadmin -->
<?php include('../admin/include/footer.php') ?>



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