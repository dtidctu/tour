<?php
ob_start();
include('../doc/include/header-admin.php');
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Thêm tour | Quản trị Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- or -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
    <script src="http://code.jquery.com/jquery.min.js" type="text/javascript"></script>
    <script>
        function readURL(input, thumbimage) {
            if (input.files && input.files[0]) { //Sử dụng  cho Firefox - chrome
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#thumbimage").attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            } else { // Sử dụng cho IE
                $("#thumbimage").attr('src', input.value);

            }
            $("#thumbimage").show();
            $('.filename').text($("#uploadfile").val());
            $('.Choicefile').css('background', '#14142B');
            $('.Choicefile').css('cursor', 'default');
            $(".removeimg").show();
            $(".Choicefile").unbind('click');

        }
        $(document).ready(function() {
            $(".Choicefile").bind('click', function() {
                $("#uploadfile").click();

            });
            $(".removeimg").click(function() {
                $("#thumbimage").attr('src', '').hide();
                $("#myfileupload").html('<input type="file" id="uploadfile"  onchange="readURL(this);" />');
                $(".removeimg").hide();
                $(".Choicefile").bind('click', function() {
                    $("#uploadfile").click();
                });
                $('.Choicefile').css('background', '#14142B');
                $('.Choicefile').css('cursor', 'pointer');
                $(".filename").text("");
            });
        })
    </script>
</head>

<body class="app sidebar-mini rtl">
    <style>
        .Choicefile {
            display: block;
            background: orange;
            border: 1px solid #fff;
            color: black;
            width: 150px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            padding: 5px 0px;
            border-radius: 5px;
            font-weight: 500;
            align-items: center;
            justify-content: center;
        }

        .Choicefile:hover {
            text-decoration: none;
            color: white;
        }

        #uploadfile,
        .removeimg {
            display: none;
        }

        #thumbbox {
            position: relative;
            width: 100%;
            margin-bottom: 20px;
        }

        .removeimg {
            height: 25px;
            position: absolute;
            background-repeat: no-repeat;
            top: 5px;
            left: 5px;
            background-size: 25px;
            width: 25px;
            /* border: 3px solid red; */
            border-radius: 50%;

        }

        .removeimg::before {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            content: '';
            border: 1px solid red;
            background: red;
            text-align: center;
            display: block;
            margin-top: 11px;
            transform: rotate(45deg);
        }

        .removeimg::after {
            /* color: #FFF; */
            /* background-color: #DC403B; */
            content: '';
            background: red;
            border: 1px solid red;
            text-align: center;
            display: block;
            transform: rotate(-45deg);
            margin-top: -2px;
        }
    </style>
    <!-- Navbar-->

    <!-- Sidebar menu-->

    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item">Danh sách tour</li>
                <li class="breadcrumb-item">Thêm tour</li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Tạo tour mới</h3>
                    <div class="tile-body">
                        <div class="row element-button">
                            <div class="col-sm-2">
                                <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-folder-plus"></i> Thêm nhà cung cấp</a>
                            </div>
                            <div class="col-sm-2">
                                <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#adddanhmuc"><i class="fas fa-folder-plus"></i> Thêm danh mục</a>
                            </div>
                            <div class="col-sm-2">
                                <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#addtinhtrang"><i class="fas fa-folder-plus"></i> Thêm tình trạng</a>
                            </div>
                        </div>
                        <form method="POST" action="" class="row" enctype="multipart/form-data">
                            <table>
                                <div class="form-group col-md-3">
                                    <label class="control-label">Tên tour</label>
                                    <input class="form-control" type="text" name="title" required>
                                </div>


                                <div class="form-group col-md-3">
                                    <label class="control-label">Ngày</label>
                                    <select name="time" class="form-control" id="timeSelect" required>
                                        <option value="">Chọn ngày</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>



                                <div class="form-group col-md-3 ">
                                    <label for="exampleSelect1" class="control-label">Địa điểm</label>
                                    <select name="location" id="location" class="form-control" id="exampleSelect1">
                                        <option>-- Chọn địa điểm --</option>
                                        <?php
                                        $sql = "SELECT * FROM tbllocation order by id ASC";
                                        $res = mysqli_query($conn, $sql);
                                        $count = mysqli_num_rows($res);

                                        if ($count > 0) {
                                            while ($row = mysqli_fetch_array($res)) {
                                                $id = $row['id'];
                                                $title_location = $row['title_location'];
                                                $_GET['location_id'] = $id;

                                                echo '<option value="' . $id . '">' . $title_location . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="exampleSelect1" class="control-label">Danh mục</label>
                                    <select name="category" class="form-control" id="exampleSelect1">
                                        <option>-- Chọn danh mục --</option>
                                        <?php
                                        $sql = "SELECT * FROM tblcategory";
                                        $res = mysqli_query($conn, $sql);
                                        $count = mysqli_num_rows($res);

                                        if ($count > 0) {
                                            while ($row = mysqli_fetch_assoc($res)) {
                                                $id = $row['id'];
                                                $title = $row['title'];

                                        ?>
                                                <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3 ">
                                    <label for="exampleSelect1" class="control-label">Khách sạn</label>
                                    <select class="form-control" name="hotel" id="hotel"></select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label">Chi phí tour</label>
                                    <input class="form-control" type="number" name="tourcost" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label">Giá tour</label>
                                    <input class="form-control" type="number" name="price" required>
                                </div>


                                <div class="form-group col-md-3">
                                    <label class="control-label">Ảnh đại diện</label>
                                    <div id="">
                                        <input type="file" name="image1" />
                                    </div>
                                    <br>
                                    <label class="control-label">Thư viện ảnh</label>
                                    <div id="">
                                        <input type="file" multiple name="images[]" />
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="control-label">Mô tả</label>
                                    <textarea id="tour-content" name="description" cols="30" rows="5" class="form-control" type="text"></textarea>

                                </div>
                                <div id="textareaContainer" name="" class="form-group col-md-12">
                                </div>


                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        for (var i = 1; i <= selectedValue; i++) {
                                            CKEDITOR.replace('tour-content-' + i);
                                        }
                                    });
                                </script>

                                <div class="form-group col-md-12">
                                    <br><br>
                                    <input style="width: 85px; border:none;" type="submit" name="submit" value="Thêm tour" class="btn btn-add btn-sm"></input> &ensp;
                                    <a class="btn btn-cancel" href="table-data-product.php">Hủy bỏ</a>
                                </div>
                            </table>
                        </form>
                        <?php
                        ob_start();
                        if (isset($_POST['submit'])) {
                            // Các trường dữ liệu khác
                            $tourcost = $_POST['tourcost'];
                            $title = $_POST['title'];
                            $time = $_POST['time'];
                            $description = $_POST['description'];
                            $price = $_POST['price'];
                            $location = $_POST['location'];
                            $hotel = $_POST['hotel'];
                            $category = $_POST['category'];

                            if (isset($_POST['featured'])) {
                                $featured = $_POST['featured'];
                            } else {
                                $featured = "No";
                            }
                            if (isset($_POST['active'])) {
                                $active = $_POST['active'];
                            } else {
                                $active = "No";
                            }

                            // Kiểm tra ảnh đã được chọn hay chưa
                            if (isset($_FILES['image1']['name'])) {
                                $nameimage = $_FILES['image1']['name'];

                                if ($nameimage != "") {
                                    $source_path = $_FILES['image1']['tmp_name'];

                                    $destination_path = "images/tour/" . $nameimage;
                                    $upload = move_uploaded_file($source_path, $destination_path);

                                    if ($upload == false) {
                                        header('location:' . SITEURL . 'admin/giaodienmoi/doc/form-add-tour.php');
                                        $_SESSION['upload'] = "<div class='error'>Faild to Upload Image</div>";
                                        die();
                                    }
                                }
                            } else {
                                $nameimage = "";
                            }

                            // Thêm dữ liệu vào bảng tbltour
                            $sql2 = "INSERT INTO tbltour SET 
        title = '$title',
        time = '$time',
        description = '$description',
        price = '$price',
        location = '$location',
        hotel = '$hotel',
        tour_cost = '$tourcost',
        image_name = '$nameimage',
        category_id = '$category',
        featured = '$featured',
        active = '$active'
    ";

                            $res2 = mysqli_query($conn, $sql2) or die("Can not execute!");

                            // Lấy ID tour vừa được thêm vào
                            $tourId = mysqli_insert_id($conn);

                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                $files = $_FILES['images'];

                                // Thư mục lưu trữ ảnh tải lên
                                $targetDir = 'images/tour/';

                                // Lặp qua mảng các tệp đã tải lên
                                for ($i = 0; $i < count($files['name']); $i++) {
                                    $fileName = basename($files['name'][$i]);
                                    $targetPath = $targetDir . $fileName;

                                    // Di chuyển tệp đã tải lên vào thư mục lưu trữ
                                    if (move_uploaded_file($files['tmp_name'][$i], $targetPath)) {
                                        // Thêm thông tin về ảnh vào cơ sở dữ liệu
                                        $query = "INSERT INTO images (id_tour, filename) VALUES (?, ?)";
                                        $stmt = $conn->prepare($query);
                                        $stmt->bind_param('is', $tourId, $fileName);
                                        $stmt->execute();

                                        echo "File uploaded successfully: " . $fileName . "<br>";
                                    } else {
                                        echo "Error uploading file: " . $fileName . "<br>";
                                    }
                                }
                            }

                            // Lấy số lượng lịch trình từ mảng POST
                            $selectedValue = count($_POST) - 1; // Số lượng trường textarea được gửi trong biểu mẫu

                            if ($selectedValue > 0) {
                                for ($i = 1; $i <= $selectedValue; $i++) {
                                    $textareaName = 'textarea' . $i;

                                    if (isset($_POST[$textareaName]) && !empty($_POST[$textareaName])) {
                                        $textareaContent = $_POST[$textareaName];

                                        // Thêm dữ liệu vào bảng "schedule"
                                        $sql3 = "INSERT INTO tblschedule (id_tour, content) VALUES ($tourId, '$textareaContent')";
                                        $res3 = mysqli_query($conn, $sql3) or die("Can not execute!");
                                    }
                                }

                                // Kiểm tra dữ liệu đã được thêm thành công hay chưa
                                if ($res2 == TRUE && $res3 == TRUE) {
                                    $_SESSION['add'] = "<div class='success'>Category Added Successfully</div>";
                                    header("location:" . SITEURL . 'admin/giaodienmoi/doc/table-data-product.php');
                                    ob_end_flush();
                                } else {
                                    $_SESSION['add'] = "<div class='error'>Failed to Add Category</div>";
                                    header("location:" . SITEURL . 'admin/giaodienmoi/doc/form-add-tour.php');
                                    ob_end_flush();
                                }
                            } else {
                                $_SESSION['add'] = "<div class='error'>Failed to Add Category</div>";
                                header("location:" . SITEURL . 'admin/giaodienmoi/doc/form-add-tour.php');
                                ob_end_flush();
                            }
                        }
                        ?>


                    </div>

                </div>
    </main>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#location').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "../../giaodienmoi/doc/data.php",
                    method: "POST",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $('#hotel').html(data);
                    }
                })
            });
        });
    </script>



    <!--
  MODAL CHỨC VỤ 
-->



    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="row">
                        <div class="form-group  col-md-12">
                            <span class="thong-tin-thanh-toan">
                                <h5>Thêm mới nhà cung cấp</h5>
                            </span>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Nhập tên chức vụ mới</label>
                            <input class="form-control" type="text" required>
                        </div>
                    </div>
                    <BR>
                    <button class="btn btn-save" type="button">Lưu lại</button>
                    <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
                    <BR>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <!--
MODAL
-->



    <!--
  MODAL DANH MỤC
-->
    <div class="modal fade" id="adddanhmuc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="row">
                        <div class="form-group  col-md-12">
                            <span class="thong-tin-thanh-toan">
                                <h5>Thêm mới danh mục </h5>
                            </span>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Nhập tên danh mục mới</label>
                            <input class="form-control" type="text" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Danh mục sản phẩm hiện đang có</label>
                            <ul style="padding-left: 20px;">
                                <li>Bàn ăn</li>
                                <li>Bàn thông minh</li>
                                <li>Tủ</li>
                                <li>Ghế gỗ</li>
                                <li>Ghế sắt</li>
                                <li>Giường người lớn</li>
                                <li>Giường trẻ em</li>
                                <li>Bàn trang điểm</li>
                                <li>Giá đỡ</li>
                            </ul>
                        </div>
                    </div>
                    <BR>
                    <button class="btn btn-save" type="button">Lưu lại</button>
                    <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
                    <BR>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <!--
MODAL
-->
    <!--
  MODAL TÌNH TRẠNG
-->
    <div class="modal fade" id="addtinhtrang" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="row">
                        <div class="form-group  col-md-12">
                            <span class="thong-tin-thanh-toan">
                                <h5>Thêm mới tình trạng</h5>
                            </span>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Nhập tình trạng mới</label>
                            <input class="form-control" type="text" required>
                        </div>
                    </div>
                    <BR>
                    <button class="btn btn-save" type="button">Lưu lại</button>
                    <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
                    <BR>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <!--
MODAL
-->



    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/plugins/pace.min.js"></script>
    <script>
        const inpFile = document.getElementById("inpFile");
        const loadFile = document.getElementById("loadFile");
        //const previewContainer = document.getElementById("imagePreview");
        //const previewContainer = document.getElementById("imagePreview");
        const previewImage = previewContainer.querySelector(".image-preview__image");
        const previewDefaultText = previewContainer.querySelector(".image-preview__default-text");
        inpFile.addEventListener("change", function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                previewDefaultText.style.display = "none";
                previewImage.style.display = "block";
                reader.addEventListener("load", function() {
                    previewImage.setAttribute("src", this.result);
                });
                reader.readAsDataURL(file);
            }
        });
    </script>

    <script>
        const fileUpload = document.querySelector("#file-upload");

        fileUpload.addEventListener("change", (e) => {
            const files = e.target.files;

            for (const file of files) {
                const {
                    name,
                    type,
                    size,
                    lastModified
                } = file;
                // Làm gì đó với các thông tin trên

                console.log(file)
            }
        })
    </script>

    <script>
        var timeSelect = document.getElementById('timeSelect');
        var textareaContainer = document.getElementById('textareaContainer');

        timeSelect.addEventListener('change', function() {
            var selectedValue = parseInt(this.value);
            textareaContainer.innerHTML = ''; // Xóa các trường textarea và nhãn hiện tại

            for (var i = 1; i <= selectedValue; i++) {
                var label = document.createElement('label');
                label.setAttribute('class', 'control-label');
                label.textContent = 'Ngày ' + i;

                var textarea = document.createElement('textarea');
                textarea.setAttribute('name', 'textarea' + i);
                textarea.setAttribute('class', 'form-control');
                textarea.setAttribute('id', 'tour-content-' + i);

                textareaContainer.appendChild(label);
                textareaContainer.appendChild(textarea);
            }

            // Gọi CKEDITOR.replace sau khi các trường textarea được thêm vào
            setTimeout(function() {
                for (var i = 1; i <= selectedValue; i++) {
                    CKEDITOR.replace('tour-content-' + i);
                }
            }, 0);
        });
    </script>
</body>

</html>