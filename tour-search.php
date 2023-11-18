<?php include('includes/header.php'); ?>

    <!-- tour sEARCH Section Starts Here -->
    <section class="tour-search text-center">
        <div class="container">
            
            <?php
                $search = $_POST['search'];
            ?>

            <h2>Your Search is <a href="#" class="text-red">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <!-- tour sEARCH Section Ends Here -->

    <section class="tour-menu">
        <div class="container">
            <h2 class="text-center">LIST TOUR</h2>


            <?php
                $search = $_POST['search'];
                $sql = "SELECT * FROM tbltour WHERE title  LIKE '%$search%' OR description LIKE '%$search%'";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res)){
                        $id = $row['id'];
                        $title = $row['title'];
                        $nameimage = $row['image_name'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $time = $row['time'];

                        ?>
                            <div class="tour-menu-box">
                                <div class="tour-menu-img">
                                    <?php
                                        if($nameimage=="")
                                        {
                                            echo "<div class='error'>Image not Available.";
                                        }
                                        else
                                        {
                                            ?>
                                                <img src="<?php echo SITEURL; ?>images/tour/<?php echo $nameimage ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                            <?php
                                        }    
                                    ?>
                                    
                                </div>

                                <div class="tour-menu-desc">
                                    <h4><?php echo $title ?></h4>
                                    <p class="tour-price">$<?php echo $price ?></p>
                                    <p class="tour-price"><?php echo $time ?> ngày</p>
                                    <p class="tour-detail">
                                            <?php echo $description ?>
                                    </p>
                                    <br>
                                    <a href="<?php echo SITEURL; ?>bookingtour.php?tour_id=<?php echo $id ?>" class="btn btn-primary">Book Now</a>
                                </div>
                            </div>

                        <?php
                    }
                }
                else
                {
                    echo "<div class='error'>Không tìm thấy nội dung.</div>";
                    ?>

                    <tr>
                        <td colspan="6"><div class="">No Category Added</div></td>
                    </tr>
                    <?php
                }

            ?>




            

            <div class="clearfix"></div>
            
        </div>

        <p class="text-center">

        </p>
    </section>
    <!-- tour Menu Section Ends Here -->

<?php include('includes/footer.php') ?>