
<?php
$conn = mysqli_connect("localhost","root","","projectbansach");

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
?>