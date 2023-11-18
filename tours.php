<?php include('includes/header.php'); ?>

        <section class="tour-search text-center">
            <div class="container">
                <form action="<?php echo SITEURL; ?>tour-search.php" method="POST">
                    <input type="search" name="search" placeholder="Nhập nội dung tìm kiếm!" >
                    <input type="submit" name="submit" value="Search" class="btn btn-primary">
                </form>
            </div>
        </section>



    <!-- tour MEnu Section Starts Here -->
    <section class="tour-menu">
        <div class="container">
            <h2 class="text-center">List Tour</h2>

            <?php
                $sql = "SELECT * FROM tbltour WHERE active = 'Yes'";
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
                                                <img src="<?php echo SITEURL; ?>images/tour/<?php echo $nameimage ?>" class="img-responsive img-curve">
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
                    echo "<div class='error'>Tour not Availabe.</div>";
                    ?>

                    <tr>
                        <td colspan="6"><div class="">No Category Added</div></td>
                    </tr>
                    <?php
                }
            ?> 




        
            <!-- <div class="tour-menu-box">
                <div class="tour-menu-img">
                    <img src="images/hanoi.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="tour-menu-desc">
                    <h4>Tour Ha Noi</h4>
                    <p class="tour-price">$222</p>
                    <p class="tour-detail">
                    Có rất nhiều cảnh đẹp về thủ đô, với nhiều kiến trúc cổ.
                    </p>
                    <br>

                    <a href="bookingtour.php" class="btn btn-primary">Book Now</a>
                </div>
            </div>

            <div class="tour-menu-box">
                <div class="tour-menu-img">
                    <img src="images/phuquoc.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="tour-menu-desc">
                    <h4>Tour Phu Quoc</h4>
                    <p class="tour-price">$2.3</p>
                    <p class="tour-detail">
                    Phú Quốc được mệnh danh là đảo ngọc của Việt Nam với nhiều bãi biễn đẹp.
                    </p>
                    <br>

                    <a href="bookingtour.php" class="btn btn-primary">Book Now</a>
                </div>
            </div>

            <div class="tour-menu-box">
                <div class="tour-menu-img">
                    <img src="images/sapa.jpg" alt="Chicke Hawain Burger" class="img-responsive img-curve">
                </div>

                <div class="tour-menu-desc">
                    <h4>Tour SaPa</h4>
                    <p class="tour-price">$2.3</p>
                    <p class="tour-detail">
                    Thời tiết SaPa mát mẻ quanh năm, với nhiều cảnh quan hùng vĩ của núi rừng.
                    </p>
                    <br>

                    <a href="bookingtour.php" class="btn btn-primary">Book Now</a>
                </div>
            </div>

            <div class="tour-menu-box">
                <div class="tour-menu-img">
                    <img src="images/vungtau.gif" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="tour-menu-desc">
                    <h4>Tour Vung Tau</h4>
                    <p class="tour-price">$2.3</p>
                    <p class="tour-detail">
                    Vũng Tàu là một trong những địa điểm có bờ biển đẹp tại Việt Nam, thu hút nhiều khách du lịch trong và ngoài nước.
                    </p>
                    <br>

                    <a href="bookingtour.php" class="btn btn-primary">Book Now</a>
                </div>
            </div>

            <div class="tour-menu-box">
                <div class="tour-menu-img">
                    <img src="images/travinh.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="tour-menu-desc">
                    <h4>Tour Tra Vinh</h4>
                    <p class="tour-price">$2.3</p>
                    <p class="tour-detail">
                    Trà Vinh nổi tiếng với nhiều chùa mang phong tục của nhiều dân tộc.
                    </p>
                    <br>

                    <a href="bookingtour.php" class="btn btn-primary">Book Now</a>
                </div>
            </div>

            <div class="tour-menu-box">
                <div class="tour-menu-img">
                    <img src="images/cantho.jpg" alt="Chicke Hawain Momo" class="img-responsive img-curve">
                </div>

                <div class="tour-menu-desc">
                    <h4>Tour Can Tho</h4>
                    <p class="tour-price">$2.3</p>
                    <p class="tour-detail">
                    Cần Thơ nổi tiếng về chợ nổi Cái Răng, nơi mà khách du lịch có thể được lênh đênh trên sông nước để thưởng thức các món ăn.
                    </p>
                    <br>

                    <a href="bookingtour.php" class="btn btn-primary">Book Now</a>
                </div>
            </div> -->


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- tour Menu Section Ends Here -->

    <?php include('includes/footer.php') ?>