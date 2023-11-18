<?php
// Thông tin kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tour";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lấy thông tin truy vấn từ tham số GET
$searchTerm = isset($_GET['q']) ? $_GET['q'] : ""; // Kiểm tra xem tham số truy vấn tồn tại
$searchTerm = trim($searchTerm); // Xóa khoảng trắng thừa
$searchTerm = mysqli_real_escape_string($conn, $searchTerm); // Xử lý đặc biệt trong truy vấn SQL

// Truy vấn cơ sở dữ liệu để tìm kiếm
$sql = "SELECT * FROM tbltour WHERE title LIKE '%$searchTerm%' OR description LIKE '%$searchTerm%'";
$result = $conn->query($sql);

// Tạo một mảng kết quả tìm kiếm
$searchResults = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $searchResults[] = array(
            'id' => $row['id'],
            'title' => $row['title'],
            'description' => $row['description'],
            'price' => $row['price'],
            'image' => $row['image_name']
        );
    }
}

// Trả về kết quả dưới dạng JSON
header('Content-Type: application/json');
echo  json_encode($searchResults);

// Đóng kết nối cơ sở dữ liệu
$conn->close();
