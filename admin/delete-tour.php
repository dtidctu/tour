<?php 
    include('../includes/config.php');
    
    if(isset($_GET['id']) AND isset($_GET['nameimage']))
    {
        $id = $_GET['id'];
        $nameimage = $_GET['nameimage'];

        if($nameimage != "")
        {
            $path = "../images/tour/".$nameimage;
            $remove = unlink($path);

            if($remove == false)
            {
                $_SESSION['remove'] = "<div class='error'>Faile to Remove Tour Image.</div>";
                header('location:'.SITEURL.'admin/manage-tour.php');
                die();
            }
        }

        $sql = "DELETE FROM tbltour WHERE id=$id";

        $res = mysqli_query($conn, $sql);

        if($res == true)
        {
            $_SESSION['delete'] = "<div class='success'>Tour Deleted Successfully.</div>";
            header('location:'.SITEURL.'admin/manage-tour.php');
        }
        else
        {
            $_SESSION['delete'] = "<div class='error'>Faile to Delete Tour.</div>";
            header('location:'.SITEURL.'admin/manage-tour.php');
        }
    }
    else
    {
        $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access.</div>";
        header('location:'.SITEURL.'admin/manage-tour.php');
    }
?>