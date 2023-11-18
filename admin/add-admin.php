<?php include('../admin/include/header.php') ?>


    <div class="main-content">
        <div class="wrapper">
            <h1>Add Admin</h1>

            <br>

            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add']; //in ra đã add
                    unset($_SESSION['add']); // f5 mất thông báo
                }
            ?>

            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Full Name:</td>
                        <td>
                            <input type="text" name="fullname" placeholder="Enter your name" required>
                        </td>
                    </tr>

                    <tr>
                        <td>Username: </td>
                        <td>
                            <input type="text" name="username" placeholder="Your username" required>
                        </td>
                    </tr>

                    <tr>
                        <td>Password: </td>
                        <td>
                            <input type="text" name="password" placeholder="Your Password" required>
                        </td>
                    </tr>

                    <br>

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Admin" class="btn-addadmin">
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
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $password=md5($_POST['password']);

        // insert data
        $sql = "INSERT INTO tbladmin SET 
            fullname = '$fullname',
            username = '$username',
            password = '$password'
        ";

        // execute sql

        $res = mysqli_query($conn, $sql) or die("Can not execute!");

        // check data
        if($res==TRUE)
        {
            // echo "Data Inserted";
            // create a sesion
            $_SESSION['add'] = "Admin Added Successfully";
            // chuyển hướng đến manage admin
            header("location:".SITEURL.'admin/manage-admin.php');
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
