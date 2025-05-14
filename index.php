
<?php
// Thông tin kết nối
$servername = "localhost"; // Máy chủ MySQL (thường là localhost)
$username = "root";        // Tài khoản MySQL (mặc định là root)
$password = "";            // Mật khẩu MySQL (để trống nếu bạn không đặt mật khẩu)
$dbname = "ten_database";  // Tên cơ sở dữ liệu

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
echo "Kết nối thành công!";
?>
<?php

// Lấy danh sách sản phẩm
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Danh sách sản phẩm</title>
</head>

<body>
    <h1>Danh sách sản phẩm</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Giá</th>
            <th>Hình ảnh</th>
            <th>Mô tả</th>
            <th>Hành động</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['price']}</td>
                        <td><img src='{$row['img']}' alt='Image' width='100'></td>
                        <td>{$row['description']}</td>
                        <td><a href='delete_product.php?id={$row['id']}'>Xóa</a></td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Không có sản phẩm nào.</td></tr>";
        }
        ?>
    </table>
</body>

</html>

<?php
$conn->close(); // Đóng kết nối
?>