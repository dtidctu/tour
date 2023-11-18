<?php include('includes/header.php'); ?>

<section class="tour-search">
        <div class="container">

        </div>
    </section>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Categories Tour</h2>

            <?php
                $sql = "SELECT * FROM tblcategory WHERE active = 'Yes'";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res)){
                        $id = $row['id'];
                        $title = $row['title'];
                        $nameimage = $row['nameimage'];
                        ?>
                            <a href="<?php echo SITEURL; ?>category-tours.php?category_id=<?php echo $id;   ?>">
                                <div class="box-3 float-container">
                                    <?php
                                        if($nameimage=="")
                                        {
                                            echo "<div class='error'>Image not Available.";
                                        }
                                        else
                                        {
                                            ?>
                                                <img src="<?php echo SITEURL; ?>images/category/<?php echo $nameimage; ?>" class="img-responsive img-curve" width="500" height="333">
                                            <?php
                                        }    
                                    ?>
                                    
                                    <h3 class="float-text text-white"><?php echo $title ?></h3>
                                </div>
                            </a>

                        <?php
                    }
                }
                else
                {
                    ?>

                    <tr>
                        <td colspan="6"><div class="">No Category Added</div></td>
                    </tr>
                    <?php
                }
            ?> 


            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <?php include('includes/footer.php') ?>