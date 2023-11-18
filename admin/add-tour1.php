<?php include('../admin/include/header.php') ?>


    <div class="main-content">
        <div class="wrapper">
            <h1>Add Tour</h1>

            <br>

            <?php
                
                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload']; //in ra đã add
                    unset($_SESSION['upload']); // f5 mất thông báo
                }
            ?>

            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Title:</td>
                        <td>
                            <input type="text" name="title" placeholder="Enter title" required>
                        </td>
                    </tr>

                    <tr>
                        <td>Description: </td>
                        <td>
                            <textarea name="description" cols="30" rows="5" placeholder="Enter description of tour" required></textarea > 
                        </td>
                    </tr>

                    <tr>
                        <td>Price: </td>
                        <td>
                            <input type="number" name="price" required>
                        </td>
                    </tr>

                    <tr>
                        <td>Image tour: </td>
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
                            <input type="submit" name="submit" value="Add Tour" class="btn-addadmin">
                        </td>
                    </tr>
                </table>
            </form>


            <?php 

                if(isset($_POST['submit']))
                {
                // post data
                    $title = $_POST['title'];
                    $description = $_POST['description'];
                    $price = $_POST['price'];
                    

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
                        
                            $src = $_FILES['image1']['tmp_name'];
                        
                            $dst = "../images/tour/".$nameimage;
                            
                            $upload = move_uploaded_file($src, $dst);
                            
                            if($upload == false)
                            {
                                $_SESSION['upload'] = "<div class='error'>Faild to Upload Image</div>";
                                header('location:'.SITEURL.'admin/add-tour');
                                die();
                            }
                        }
                        
                    }
                    else
                    {
                        $nameimage="";
                    }
                    $category = $_POST['category'];

                    // insert data
                    $sql2 = "INSERT INTO tbltour SET 
                        title = '$title',
                        description = '$description',
                        price = '$price',
                        image_name = '$nameimage',
                        category_id = '$category',
                        featured = '$featured',
                        active = '$active'
                    ";

                    // execute sql

                    $res2 = mysqli_query($conn, $sql2);

                    // check data
                    if($res2==TRUE)
                    {
                        // echo "Data Inserted";
                        // create a sesion
                        $_SESSION['add'] = "<div class='success'>Tour Added Successfully</div>";
                        // chuyển hướng đến manage admin
                        // header("location:".SITEURL.'admin/manage-category.php');
                        echo "<script> window.location.href='manage-tour.php';</script>";
                    }
                    else
                    {
                        // echo "Faile to Insert Data";
                        $_SESSION['add'] = "<div class='error'>Failed to Add Tour</div>";
                        // chuyển hướng đến manage admin
                        header("location:".SITEURL.'admin/manage-tour.php');
                    }
    }



?>
        </div>
    </div>



<!-- btn addadmin -->
<?php include('../admin/include/footer.php')?>

