<?php include('includes/header.php'); ?>

    <?php 
        if(isset($_GET['category_id']))
        {
            $category_id = $_GET['category_id'];
            $sql = "SELECT title FROM tblcategory WHERE id=$category_id";
            $res = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($res);
            $category_title = $row['title'];
        }
        else
        {
            header('location:'. SITEURL);
        }
    ?>

    <!-- tour sEARCH Section Starts Here -->
    <section class="tour-search text-center">
        <div class="container">
            
            <h2>tours on <a href="#" class="text-red">"<?php echo $category_title; ?>"</a></h2>

        </div>
    </section>
    <!-- tour sEARCH Section Ends Here -->



    <!-- tour MEnu Section Starts Here -->
    <section class="tour-menu">
        <div class="container">
            <h2 class="text-center">Tour Menu</h2>

                <?php 
            
                    $sql2 = "SELECT * FROM tbltour WHERE category_id=$category_id";
                    $res2 = mysqli_query($conn, $sql2);
                    $count2 = mysqli_num_rows($res2);

                    if($count2 > 0)
                    {
                        while($row2=mysqli_fetch_assoc($res2))
                        {
                            $id = $row2['id'];
                            $title = $row2['title'];
                            $price = $row2['price'];
                            $description = $row2['description'];
                            $nameimage = $row2['image_name'];
                            ?>
                                <div class="tour-menu-box">
                                    <div class="tour-menu-img">
                                        <?php
                                            if($nameimage=="")
                                            {
                                                echo "<div class='error>Tour not Avaialbe.</div>";
                                            }
                                            else
                                            {
                                                ?>
                                                    <img src="<?php echo SITEURL; ?>images/tour/<?php echo $nameimage ?>" class="img-responsive img-curve">
                                                <?php
                                            }
                                        ?>
                                        
                                    </div>

                                    <div class="tour-menu-desc">
                                        <h4><?php echo $title; ?></h4>
                                        <p class="tour-price">$<?php echo $price; ?></p>
                                        <p class="tour-detail">
                                            <?php echo $description; ?> 
                                        </p>
                                        <br>

                                        <a href="<?php echo SITEURL; ?>bookingtour.php?tour_id=<?php echo $id ?>" class="btn btn-primary">Order Now</a>
                                    </div>
                                </div>
                            <?php
                        }
                    }
                    else
                    {
                        echo "<div class='error>Tour not Avaialbe.</div>";
                    }
                ?>


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- tour Menu Section Ends Here -->

<?php include('includes/footer.php') ?>