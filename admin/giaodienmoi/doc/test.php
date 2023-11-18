<?php 
  include('../../../includes/config.php');
 
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Danh sách nhân viên | Quản trị Admin</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Main CSS-->
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <!-- or -->
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
      
        <!-- Font-icon css-->
        <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
      
      </head>

<body>
    
<div class="modal fade" id="ModalUP" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static"
data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">

    <div class="modal-body">
      <div class="row">
        <div class="form-group  col-md-12">
          <span class="thong-tin-thanh-toan">
            <h5>Chỉnh sửa thông tin sản phẩm cơ bản</h5>
          </span>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-6">
            <label class="control-label">Mã sản phẩm </label>
            <input class="form-control" type="number" value="71309005">
          </div>
        <div class="form-group col-md-6">
            <label class="control-label">Tên sản phẩm</label>
          <input class="form-control" type="text" required value="Bàn ăn gỗ Theresa">
        </div>
        <div class="form-group  col-md-6">
            <label class="control-label">Số lượng</label>
          <input class="form-control" type="number" required value="20">
        </div>
        <div class="form-group col-md-6 ">
            <label for="exampleSelect1" class="control-label">Tình trạng sản phẩm</label>
            <select class="form-control" id="exampleSelect1">
              <option>Còn hàng</option>
              <option>Hết hàng</option>
              <option>Đang nhập hàng</option>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label class="control-label">Giá bán</label>
            <input class="form-control" type="text" value="5.600.000">
          </div>
          <div class="form-group col-md-6">
            <label for="exampleSelect1" class="control-label">Danh mục</label>
            <select class="form-control" id="exampleSelect1">
              <option>Bàn ăn</option>
              <option>Bàn thông minh</option>
              <option>Tủ</option>
              <option>Ghế gỗ</option>
              <option>Ghế sắt</option>
              <option>Giường người lớn</option>
              <option>Giường trẻ em</option>
              <option>Bàn trang điểm</option>
              <option>Giá đỡ</option>
            </select>
          </div>
      </div>
      <BR>
      <a href="#" style="    float: right;
    font-weight: 600;
    color: #ea0000;">Chỉnh sửa sản phẩm nâng cao</a>
      <BR>
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
<!-- -sdsds -->



      <form action="" method="POST">
<div class="modal fade" id="ModalUP" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static"
data-keyboard="false">
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">

    <div class="modal-body">
      <div class="row">
        <div class="form-group  col-md-12">
          <span class="thong-tin-thanh-toan">
            <h5>Chỉnh sửa thông tin sản phẩm cơ bản</h5>
          </span>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-6">
            <label class="control-label">Tên tour </label>
            <input class="form-control" type="text" value="<?php echo $id ?>">
          </div>
        <div class="form-group col-md-6">
            <label class="control-label">Thời gian</label>
          <input class="form-control" type="text" required value="<?php echo $time ?>">
        </div>
        <div class="form-group col-md-6 ">
            <label for="exampleSelect1" class="control-label">Danh mục</label>
            <select class="form-control" name="category" id="exampleSelect1">
              <?php
                $sql = "SELECT * FROM tblcategory WHERE id= $category";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if($count > 0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title2 = $row['title'];

                        ?>
                            <option value="<?php echo $id; ?>"><?php echo $title2; ?></option>
                        <?php

                        ?>
                            
                        <?php
                            $sql = "SELECT * FROM tblcategory";
                            $res = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($res);

                            if($count > 0)
                            {
                                while($row=mysqli_fetch_array($res))
                                {
                                    $id = $row['id'];
                                    $title_category = $row['title'];
                                    

                                echo '<option value="'.$id.'">'.$title_category.'</option>';
                                }
                            }
                    }
                }
              ?>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label class="control-label">Giá tour</label>
            <input class="form-control" type="text" value="<?php echo $price ?>">
          </div>
          <div class="form-group col-md-6">
            <label class="control-label">Chi phí tour</label>
            <input class="form-control" type="text" value="<?php echo $tourcost ?>">
          </div>
          <div class="form-group col-md-6">
            <label class="control-label">Khách sạn</label>
            <input class="form-control" type="text" value="<?php echo $hotel_name ?>">
          </div>
          <div class="form-group col-md-6">
            <label class="control-label">Nổi bật</label><br>
            <td>
              <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes" > Yes
              <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="No" > No
            </td>
          </div>
          <div class="form-group col-md-6">
            <label class="control-label">Ưa thích</label><br>
            <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes" > Yes
            <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No" > No
          </div>
          <div class="form-group  col-md-6">
            <label class="control-label">Mô tả</label>
          <textarea cols="30" rows="5" class="form-control" type="text" required><?php echo $description; ?></textarea>
          </div>
          <div class="form-group col-md-6">
            <label class="control-label">Hình ảnh hiện tại</label>
            <?php 
              if($current_image != "")
              {
                  ?>
                      <img src="<?php echo SITEURL; ?>images/tour/<?php echo $current_image; ?>" alt="" width="200px">
                  <?php
              }
              else
              {
                  echo "<div class='error'>Image Not Added.</div>";
              }
            ?>
            <tr>
            <td>New Image: </td>
            <td>
                <input type="file" name="image" >
            </td>
          </tr>
          </div>
          
          
      </div>
      <BR>
      <BR>
      <div>
        <input type="submit" name="submit" class="btn btn-save">Lưu lại</input>
          <a a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
      </div>
    </div>
    <div class="modal-footer">
    </div>
  </div>
</div>
</div>
</form>
</body>
</html>