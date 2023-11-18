<?php 
    include('../includes/config.php');
    
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $sql = "DELETE FROM tlbhotel WHERE id=$id";

        $res = mysqli_query($conn, $sql);

        if($res == true)
        {
            $_SESSION['delete-hotel'] = "<div class='text-center success'><h1>Hotel Deleted Successfully</h1></div>";
            header('location:'.SITEURL.'admin/manage-hotel.php');
        }
        else
        {
            $_SESSION['delete-hotel'] = "<div class='error'>Faile to Delete Hotel.</div>";
            header('location:'.SITEURL.'admin/manage-hotel.php');
        }
    }
    else
    {
        $_SESSION['unauthorize1'] = "<div class='error'>Unauthorized Access.</div>";
        header('location:'.SITEURL.'admin/manage-hotel.php');
    }
?>