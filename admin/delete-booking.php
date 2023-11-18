<?php 
    include('../includes/config.php');
    
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $sql = "DELETE FROM tblbooking WHERE id=$id";

        $res = mysqli_query($conn, $sql);

        if($res == true)
        {
            $_SESSION['delete-booking'] = "<div class='text-center success'><h1>Tour Deleted Successfully</h1></div>";
            header('location:'.SITEURL.'admin/manage-booking.php');
        }
        else
        {
            $_SESSION['delete-booking'] = "<div class='error'>Faile to Delete Tour.</div>";
            header('location:'.SITEURL.'admin/manage-booking.php');
        }
    }
    else
    {
        $_SESSION['unauthorize1'] = "<div class='error'>Unauthorized Access.</div>";
        header('location:'.SITEURL.'admin/manage-booking.php');
    }
?>