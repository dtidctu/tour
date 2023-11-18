<?php 
    include('../tour/includes/config.php');
    
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $sql = "DELETE FROM tblbooking WHERE id=$id";

        $res = mysqli_query($conn, $sql);

        if($res == true)
        {
            $_SESSION['delete-booking-user'] = "<div class='text-center success'><h1>Tour Deleted Successfully</h1></div>";
            header('location:'.SITEURL.'index.php');
        }
        else
        {
            $_SESSION['delete-booking-user'] = "<div class='error'>Faile to Delete Tour.</div>";
            header('location:'.SITEURL.'index.php');
        }
    }
    else
    {
        $_SESSION['unauthorize11'] = "<div class='error'>Unauthorized Access.</div>";
        header('location:'.SITEURL.'index.php');
    }
?>