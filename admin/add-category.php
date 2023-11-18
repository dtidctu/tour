<?php include('../admin/include/header.php') ?>


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
                        <td>Select Image: </td>
                        <td>
                            <input type="file" name="image1" required>
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
                            <br>
                            <input type="submit" name="submit" value="Add Category" class="btn-addadmin">
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
        $title = $_POST['title'];

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
            
                $destination_path = "../images/category/".$nameimage;
                
                $upload = move_uploaded_file($source_path, $destination_path);
                
                if($upload == false)
                {
                    $_SESSION['upload'] = "<div class='error'>Faild to Upload Image</div>";
                    header('location:'.SITEURL.'admin/add-category.php');
                    die();
                }
            }   
        }
        else
        {
            $nameimage="";
        }

        // insert data
        $sql = "INSERT INTO tblcategory SET 
            title = '$title',
            nameimage = '$nameimage',
            featured = '$featured',
            active = '$active'
        ";

        // execute sql

        $res = mysqli_query($conn, $sql) or die("Can not execute!");

        // check data
        if($res==TRUE)
        {
            // echo "Data Inserted";
            // create a sesion
            $_SESSION['add'] = "<div class='success'>Category Added Successfully</div>";
            // chuyển hướng đến manage admin
            header("location:".SITEURL.'admin/manage-category.php');
        }
        else
        {
            // echo "Faile to Insert Data";
            $_SESSION['add'] = "<div class='error'>Failed to Add Category</div>";
            // chuyển hướng đến manage admin
            header("location:".SITEURL.'admin/manage-category.php');
        }
    }



?>
