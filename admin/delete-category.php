<?php 
    include('../includes/config.php');
    
    if(isset($_GET['id']) AND isset($_GET['nameimage']))
    {
        $id = $_GET['id'];
        $nameimage = $_GET['nameimage'];

        if($nameimage != "")
        {
            $path = "../images/category/".$nameimage;
            $remove = unlink($path);

            if($remove == false)
            {
                $_SESSION['remove'] = "<div class='error'>Faile to Remove Category Image.</div>";
                header('location:'.SITEURL.'admin/manage-category.php');
                die();
            }
        }

        $sql = "DELETE FROM tblcategory WHERE id=$id";

        $res = mysqli_query($conn, $sql);

        if($res == true)
        {
            $_SESSION['delete'] = "<div class='success'>Caregory Deleted Successfully.</div>";
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        else
        {
            $_SESSION['delete'] = "<div class='error'>Faile to Delete Category.</div>";
            header('location:'.SITEURL.'admin/manage-category.php');
        }
    }
    else
    {
        
        header('location:'.SITEURL.'admin/manage-category.php');
    }
?>