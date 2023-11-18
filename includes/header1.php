<?php include('config.php') ?>
<!DOCTYPE html>
<html lang="en">
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>DU LỊCH VIỆT</title>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/jquery.datetimepicker.min.css" type='text/css' />
<!-- <link href="../css/font-awesome.min.css" rel='stylesheet' type='text/css' /> -->
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">


<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
    <script>
        $(document).ready(function() {
            $('#search').on('input', function() {
                var searchTerm = $(this).val().trim();

                if (searchTerm !== '') {
                    $.ajax({
                        url: 'search.php',
                        type: 'GET',
                        data: {
                            q: searchTerm
                        },
                        success: function(response) {
                            $('#search-results').empty();

                            if (response.length > 0) {
                                var containerDiv = $('<div style="overflow-y: auto; height: 200px; border-radius: 12px;">').addClass('search-results-container'); // Tạo một div lớn

                                // Thêm title vào div lớn
                                // var titleElement = $('<h3>').text('Search Results');
                                // containerDiv.append(titleElement);

                                // Thêm đường kẻ ngang trước các kết quả tìm kiếm
                                // var hrElementBefore = $('<hr>');
                                // containerDiv.append(hrElementBefore);

                                $.each(response, function(index, result) {
                                    // Tạo các phần tử kết quả tìm kiếm
                                    var id = result.id;
                                    var title = result.title;
                                    var description = result.description;
                                    var price = result.price;
                                    var image = result.image;

                                    var div = $('<div class="" id="">').addClass('search-result').css({
                                        'background-color': 'white',
                                        'height': '40px',
                                        'display': 'flex',
                                        'align-items': 'center',
                                        'z-index': '1',
                                        'padding-top': '10px'
                                    }).on('click', function() {
                                        window.location.href = '<?php echo SITEURL; ?>tourdetail.php?tour_id=' + id;
                                    }).on('mouseenter', function() {
                                        $(this).css('background-color', 'gray');
                                    }).on('mouseleave', function() {
                                        $(this).css('background-color', 'white');
                                    });

                                    var imageElement = $('<img>').attr('src', '<?php echo SITEURL; ?>/admin/giaodienmoi/doc/images/tour/' + image).css({
                                        'width': '100px',
                                        'padding': '20px 50px 20px 10px'
                                    });

                                    var titleElement = $('<h3>').css('margin-left', '1px').text(title);

                                    div.append(imageElement);
                                    div.append(titleElement);
                                    containerDiv.append(div); // Gắn div vào div lớn
                                });

                                // Thêm đường kẻ ngang sau các kết quả tìm kiếm
                                var hrElementAfter = $('<hr>');
                                containerDiv.append(hrElementAfter);

                                $('#search-results').empty().append(containerDiv); // Thay thế div hiện tại bằng div lớn
                            } else {
                                $('#search-results').html('<p>No results found.</p>');
                            }
                        }
                    });
                } else {
                    $('#search-results').empty();
                }
            });
        });
    </script>

    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DU LỊCH VIỆT</title>

    <link rel="stylesheet" href="css/jquery.datetimepicker.min.css" type='text/css' />
    <link rel="stylesheet" href="css/jquery-ui.css" />
</head>

<body>
    <div class="top-header">
        <ul class="wow fadeInRight animated" data-wow-delay=".5s" style="font-size: 15px; color:#fff; list-style-type: none; display: inline-block;">
            <?php
            if (isset($_SESSION['username'])) {
                echo '<li>&emsp;&emsp;Xin chào <strong style="font-size:18px">' . $_SESSION['fullname'] . '</strong>' .
                    '<a href="manageprofile.php">&emsp; Quản lý tài khoản</a>' .
                    '<a href="yourtour.php">&emsp; Tour của bạn</a>' . 
                    '<a style="margin-left:1250px" href="logoutuser.php">Đăng xuất</a> </li>';
            } else {
            ?>
                <li style="margin-left: 1500px;">
                    <a href="register.php" class="btn btn-primary rounded-pill py-2 px-4">Đăng ký</a>
                    <a href="loginuser.php" class="btn btn-primary rounded-pill py-2 px-4">Đăng nhập</a>
                </li>
            <?php } ?>

        </ul>
    </div>
    </div>
    <div style="width: 100%;" class="position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var currentLocation = window.location.href;
                    var navLinks = document.querySelectorAll('.navbar-nav .nav-link');

                    navLinks.forEach(function(link) {
                        if (link.href === currentLocation) {
                            link.classList.add('active');
                        } else {
                            link.classList.remove('active');
                        }
                    });
                });
            </script>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <a href="index.php" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-map-marker-alt me-3"></i>DU LICH VIỆT</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div style="margin-left:850px" class="navbar-nav py-0">
                    <a style="width: 100px;" href="index.php" class="nav-item nav-link active">Trang chủ</a>
                    <!-- <a href="tour1.php" class="nav-item nav-link">Tours</a> -->
                    <div class="nav-item dropdown">
                        <a style="width: 70px;" href="tour1.php" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Tour</a>
                        <div class="dropdown-menu m-0">
                            <div class="tour-table">
                                <div class="table-column">
                                    <h3>Du lịch Miền Bắc</h3>
                                    <a href="tour1.php" class="dropdown-item">Hà Nội</a>
                                    <a href="tour1.php" class="dropdown-item">Hạ Long</a>
                                    <a href="tour1.php" class="dropdown-item">Sapa</a>
                                    <a href="tour1.php" class="dropdown-item">Ninh Bình</a>
                                    <a href="tour1.php" class="dropdown-item">Hòa Bình</a>
                                </div>
                                <div class="table-column">
                                    <h3>Du lịch Miền Trung</h3>
                                    <a href="booking.html" class="dropdown-item">Đà Nẵng</a>
                                    <a href="booking.html" class="dropdown-item">Huế</a>
                                    <a href="booking.html" class="dropdown-item">Hội An</a>
                                    <a href="booking.html" class="dropdown-item">Quảng Bình</a>
                                    <a href="booking.html" class="dropdown-item">Quảng Nam</a>
                                </div>
                                <div class="table-column">
                                    <h3>Du lịch Miền Nam</h3>
                                    <a href="team.html" class="dropdown-item">TP.HCM</a>
                                    <a href="team.html" class="dropdown-item">Vũng Tàu</a>
                                    <a href="team.html" class="dropdown-item">Đà Lạt</a>
                                    <a href="team.html" class="dropdown-item">Nha Trang</a>
                                    <a href="team.html" class="dropdown-item">Phú Quốc</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a style="width: 100px;" href="categories1.php" class="nav-item nav-link">Danh Mục</a>
                    <a style="width: 70px;" href="new.php" class="nav-item nav-link">Tin tức</a>
                    <div style="position: relative; width: 160px;" class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Tiện ích</a>
                        <div class="dropdown-menu m-0">
                            <a href="destination.html" class="dropdown-item">Cẩm Nang Du Lịch</a>
                            <a href="booking.html" class="dropdown-item">Booking</a>
                            <a href="team.html" class="dropdown-item">Travel Guides</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="404.html" class="dropdown-item">404 Page</a>
                        </div>
                    </div>
                    <a style="right: 40px; width: 70px" href="contact.php" class="nav-item nav-link">Liên lạc</a>
                </div>
            </div>
        </nav>
        <div class="">
            <div class="search-container">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 style="font-size: 25px; padding-top:10px;" class="display-3 text-white mb-3 animated slideInDown">"DISCOVER THE WORLD, DISCOVER YOURSELF"</h1>
                        <div style="height: 80px;" class="position-relative w-100 mx-auto animated slideInDown">
                            <form action="<?php echo SITEURL; ?>tour-search1.php" method="POST">
                                <input id="search" class="form-control border-0 rounded-pill h-100 py-3 ps-10 pe-5" type="search" name="search" placeholder="Nhập nội dung tìm kiếm!">
                                <div id="search-results"></div>
                                <button type="submit" name="submit" value="Search" class="btn btn-primary rounded-pill py-2 px-4 position-absolute top-0 end-0 me-2" style="margin-top: 5px; margin-left: 50px">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slideshow">
                <img src="./images/banner.jpg" alt="Image 1">
                <img src="./images/banner2.jpeg" alt="Image 2">
                <img src="./images/banner3.jpg" alt="Image 3">
            </div>
            <div class="dots-container">
                <span class="dot active"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./lib/wow/wow.min.js"></script>
    <script src="./lib/easing/easing.min.js"></script>
    <script src="./lib/waypoints/waypoints.min.js"></script>
    <script src="./lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="./lib/tempusdominus/js/moment.min.js"></script>
    <script src="./lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="./lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="./js/main.js"></script>

    <!-- Navbar & Hero End -->

    <!-- <script>
        const searchInput = document.getElementById('search-input');
        const searchResults = document.getElementById('search-results');

        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.trim();

            if (searchTerm !== '') {
                // Hiển thị "searching"
                searchResults.innerHTML = '<li>Searching...</li>';
                searchResults.style.display = 'block';

                // Gửi yêu cầu tìm kiếm
                fetch(`search.php?q=${encodeURIComponent(searchTerm)}`)
                    .then(response => response.json())
                    .then(data => {
                        // Xóa kết quả tìm kiếm hiện tại
                        searchResults.innerHTML = '';

                        if (data.length > 0) {
                            // Hiển thị kết quả tìm kiếm gợi ý
                            data.forEach(item => {
                                const li = document.createElement('li');
                                li.textContent = item.title;
                                searchResults.appendChild(li);
                            });
                        } else {
                            const li = document.createElement('li');
                            li.textContent = 'Không tìm thấy kết quả';
                            searchResults.appendChild(li);
                        }
                    })
                    .catch(error => {
                        console.error('Lỗi khi tìm kiếm:', error);
                        searchResults.innerHTML = '';
                    })
                    .finally(() => {
                        searchResults.style.display = 'block';
                    });
            } else {
                // Nếu không có từ khóa tìm kiếm, ẩn danh sách gợi ý
                searchResults.innerHTML = '';
                searchResults.style.display = 'none';
            }
        });

        searchResults.addEventListener('click', function(event) {
            const selectedResult = event.target.textContent;
            searchInput.value = selectedResult;
            searchResults.innerHTML = '';
            searchResults.style.display = 'none';
        });
    </script> -->
</body>

</html>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>


<!-- banner-image -->
<style>
    .tour-table {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 200px;
    }

    .table-column {
        border: 1px solid white;
        padding: 10px;
    }

    .table-column h3 {
        margin: 0 0 10px;
    }

    .submenu {
        display: none;
        position: absolute;
        top: 0;
        left: 100%;
        z-index: 999;
        min-width: 200px;
    }

    .dropdown-item.active+.submenu {
        display: block;
    }

    .slideshow {
        position: relative;
        width: 100%;
        height: 500px;
        /* Điều chỉnh kích thước của slideshow */
        overflow: hidden;
        padding: 0 0 0 0;
    }

    .slideshow img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        transition: opacity 1s ease-in-out;
        z-index: -999;
    }

    .slideshow img.active {
        opacity: 1;
    }

    .dots-container {
        display: flex;
        justify-content: center;
        margin-top: -30px;
    }

    .dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.5);
        margin: 0 5px;
        cursor: pointer;
    }

    .dot.active {
        background-color: #fff;
    }

    .search-container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 2;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var images = document.querySelectorAll(".slideshow img");
        var dots = document.querySelectorAll(".dot");
        var currentImageIndex = 0;
        var isFirstImageShown = false;

        function showImage(index) {
            images.forEach(function(img) {
                img.classList.remove("active");
            });

            dots.forEach(function(dot) {
                dot.classList.remove("active");
            });

            images[index].classList.add("active");
            dots[index].classList.add("active");
        }

        function handleDotClick(index) {
            showImage(index);
            currentImageIndex = index;
        }

        dots.forEach(function(dot, index) {
            dot.addEventListener("click", function() {
                handleDotClick(index);
            });
        });

        function showNextImage() {
            if (!isFirstImageShown) {
                showImage(currentImageIndex);
                isFirstImageShown = true;
            } else {
                currentImageIndex = (currentImageIndex + 1) % images.length;
                showImage(currentImageIndex);
            }
        }

        setInterval(showNextImage, 3000); // Chuyển đổi hình ảnh sau 3 giây (3000ms)
    });
</script>