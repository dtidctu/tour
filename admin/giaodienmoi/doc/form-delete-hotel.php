<?php
ob_start();
include('../doc/include/header-admin.php');

    

// Khởi tạo kết nối database ở đây

if (isset($_POST['id'])) {
  $id = $_POST['id'];

  // Xử lý xóa bản ghi dựa trên id
  $sql = "DELETE FROM tlbhotel WHERE id = $id";
  $res = mysqli_query($conn, $sql);

  if ($res) {
    // Xóa thành công
    echo json_encode(array('status' => 'success', 'message' => 'Xóa thành công'));
  } else {
    // Xóa thất bại
    echo json_encode(array('status' => 'error', 'message' => 'Xóa thất bại'));
  }
}
?>
