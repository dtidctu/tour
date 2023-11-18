<?php ob_start(); include('../admin/include/header.php') ?>


    <div class="main-content">
        <div class="wrapper">
            <h1>Update Category</h1>

            <br>


            <?php  
                if(isset($_GET['id']))
                {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM tblcategory WHERE id=$id";

                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);

                    if($count==1)
                    {
                        $row = mysqli_fetch_assoc($res);
                        $title1 = $row['title'];
                        $current_image = $row['nameimage'];
                        $featured = $row['featured'];
                        $active = $row['active'];
                    }
                    else
                    {
                        $_SESSION['notfound'] = "<div class='error'>Category not Found.</div>";
                        header('location:'.SITEURL.'admin/manage-category.php');
                    }
                }
                else
                {
                    
                    header('location:'.SITEURL.'admin/manage-category.php');
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
                        <td>Current Image: </td>
                        <td>
                            <?php 
                                if($current_image != "")
                                {
                                    ?>
                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" alt="" width="500    ">
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
                        <td>Featured: </td>
                        <td>
                            <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes" required> Yes
                            <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="No" required> No
                        </td>
                    </tr>

                    <tr>
                        <td>Active: </td>
                        <td>
                        <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes" required> Yes
                            <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No" required> No
                        </td>
                    </tr>

                    <br>

                    <tr>
                        <td colspan="2">
                            <br>
                            <input type="hidden" name="current_image" value="<?php echo $current_image; ?>" class="btn-addadmin">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="Update Category" class="btn-addadmin">
                        </td>
                    </tr>
                </table>
            </form>

            <?php
                ob_start();
                if(isset($_POST['submit']))
                {
                    $id = $_POST['id'];
                    $title4 = $_POST['title'];
                    $current_image = $_POST['current_image'];
                    $featured = $_POST['featured'];
                    $active = $_POST['active'];

                    if(isset($_FILES['image']['name']))
                    {
                        $nameimage = $_FILES['image']['name'];
                        
                        if($nameimage != "")
                        {
                            // $ext = end(explode('.', $nameimage));

                            $source_path = $_FILES['image']['tmp_name'];
                        
                            $destination_path = "../images/category/".$nameimage;
                        
                            $upload = move_uploaded_file($source_path, $destination_path);

                            if($upload == false)
                            {
                                $_SESSION['upload'] = "<div class='error'>Faild to Upload Image</div>";
                                header('location:'.SITEURL.'admin/manage-category.php');
                                die();
                            }
                            
                            if($current_image != "")
                            {
                                $remove_path = "../images/category/".$current_image;
                                $remove = unlink($remove_path);

                                if($remove==false)
                                {
                                    $_SESSION['failed-remove'] = "<div class='error'>Failed to remove current Image.</div>";
                                    header('location:'.SITEURL.'admin/manage-category.php');
                                    die();
                                }
                            }

                        }
                        else
                        {
                            $nameimage = $current_image;
                        }
                    }

                    $sql2 = "UPDATE tblcategory SET
                        title = '$title4',
                        nameimage = '$nameimage',
                        featured = '$featured',
                        active = '$active'
                        WHERE id = $id
                    ";

                    $res2 = mysqli_query($conn, $sql2);

                    if ($res2==true)
                    {
                        $_SESSION['update'] = "<div class='success'>Category Updated Successfully.</div>";
                        header('location:'.SITEURL.'admin/manage-category.php');
                    }
                    else
                    {
                        $_SESSION['update'] = "<div class='error'>Failed to Update Category.</div>";
                        header('location:'.SITEURL.'admin/manage-category.php');
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



