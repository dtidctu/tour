<?php
ob_start();
include('../doc/include/header-admin.php');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sửa danh mục | Quản trị Admin</title>
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
    <script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
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
            background: #14142B;
            border: 1px solid #fff;
            color: #fff;
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

    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item">Danh sách danh mục</li>
                <li class="breadcrumb-item"><a href="#">Sửa danh mục</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Sửa danh mục</h3>
                    <div class="tile-body">

                        <?php
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $sql2 = "SELECT * FROM tblcategory WHERE id=$id";

                            $res2 = mysqli_query($conn, $sql2);
                            $count2 = mysqli_num_rows($res2);



                            if ($count2 == 1) {
                                $row2 = mysqli_fetch_assoc($res2);
                                $title = $row2['title'];
                                $description = $row2['description'];
                                $current_image = $row2['nameimage'];
                            }
                        } else {

                            header('location:' . SITEURL . 'admin/giaodienmoi/doc/table-data-category.php');
                        }
                        ?>

                        <form method="POST" class="row" enctype="multipart/form-data">
                            <div class="form-group col-md-3">
                                <label class="control-label">Tên danh mục</label>
                                <input class="form-control" type="text" name="title" value="<?php echo $title;  ?>" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label">Mô tả</label>
                                <textarea name="description" cols="30" rows="5" class="form-control" type="text"><?php echo $description; ?></textarea>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="control-label"> Ảnh hiện tại</label>
                                <div id="">
                                    <?php
                                    if ($current_image != "") {
                                    ?>
                                        <img src="<?php echo SITEURL; ?>admin/giaodienmoi/doc/images/tour/<?php echo $current_image; ?>" alt="" width="200px">
                                    <?php
                                    } else {
                                        echo "<div class='error'>Image Not Added.</div>";
                                    }
                                    ?>
                                    <br>
                                    <label class="control-label">Chọn ảnh mới &emsp;
                                        <td>
                                            <input type="file" name="image1">
                                        </td>
                                    </label>

                                </div>
                                <br>
                                <div class="form-group col-md-12">

                                </div>
                                <br><br>
                                <input style="width: 85px; border:none;" type="submit" name="submit" value="Lưu danh mục" class="btn btn-add btn-sm"></input> &ensp;
                                <a class="btn btn-cancel" href="table-data-category.php">Hủy bỏ</a>
                            </div>
                        </form>

                        <?php
                        ob_start();
                        if (isset($_POST['submit'])) {
                            $id = $_GET['id'];
                            $title4 = $_POST['title'];
                            $description = $_POST['description'];
                            $current_image = $_FILES['image1']['name'];
                            // $featured = $_POST['featured'];
                            // $active = $_POST['active'];

                            if (isset($_FILES['image']['name'])) {
                                $nameimage = $_FILES['image1']['name'];

                                if ($nameimage != "") {
                                    // $ext = end(explode('.', $nameimage));

                                    $src_path = $_FILES['image1']['tmp_name'];

                                    $dest_path = "images/tour/" . $nameimage;

                                    $upload = move_uploaded_file($src_path, $dest_path);

                                    if ($upload == false) {
                                        $_SESSION['upload'] = "<div class='error'>Faild to Upload new Image</div>";
                                        header('location:' . SITEURL . 'admin/giaodienmoi/doc/form-add-category.php');
                                        die();
                                    }

                                    if ($current_image = "") {
                                        $remove_path = "images/tour/" . $current_image;
                                        $remove = unlink($remove_path);

                                        if ($remove == false) {
                                            $_SESSION['failed-remove'] = "<div class='error'>Failed to remove current Image.</div>";
                                            header('location:' . SITEURL . 'admin/giaodienmoi/doc/table-data-categoty.php');
                                            die();
                                        }
                                    }
                                } else {
                                    $nameimage = $current_image;
                                }
                            }

                            $sql4 = "UPDATE tblcategory SET 
                    title = '$title4',
                    description = '$description',
                    nameimage = '$current_image'
                    WHERE id = $id
                    ";

                            $res4 = mysqli_query($conn, $sql4);

                            if ($res4 == true) {
                                $_SESSION['update'] = "<div class='success'>Tour Updated Successfully.</div>";
                                header('location:' . SITEURL . 'admin/giaodienmoi/doc/table-data-category.php');
                                ob_end_flush();
                            } else {
                                $_SESSION['update'] = "<div class='error'>Failed to Update Tour.</div>";
                                header('location:' . SITEURL . 'admin/giaodienmoi/doc/table-data-category.php');
                                ob_end_flush();
                            }
                        }

                        ?>
                    </div>

                </div>
            </div>
        </div>
    </main>

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
</body>

</html>