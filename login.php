<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<?php
session_start(); // Bắt đầu session

// Tạo kết nối
$conn = new mysqli("localhost", "root", "", "projectbansach");

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy thông tin đăng nhập từ form
$user = $_POST['username'];
$pass = $_POST['password'];

// Truy vấn cơ sở dữ liệu để kiểm tra thông tin đăng nhập
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $user, $pass); // Giả định mật khẩu chưa được mã hóa
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Đăng nhập thành công
    $row = $result->fetch_assoc();
    $_SESSION['username'] = $row['username']; // Lưu tên người dùng vào session
    $_SESSION['role'] = $row['role']; // Lưu vai trò vào session

    // Chuyển hướng dựa trên vai trò
    if ($row['role'] == 'admin') {
        header("Location: them.php"); // Trang dành cho admin
    } else {
        header("Location: index.php"); // Trang dành cho user
    }
    exit();
} else {
    $login_error = true; // Biến báo lỗi
}

// Đóng kết nối
$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!-- Modal -->
    <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Thông báo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="reloadPage()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Sai tên đăng nhập hoặc mật khẩu. Vui lòng thử lại.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="reloadPage()">Đóng</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Tự động hiển thị modal nếu có lỗi đăng nhập
        <?php if (isset($login_error) && $login_error): ?>
            $(document).ready(function() {
                $('#myModal').modal('show');
            });
        <?php endif; ?>

        // Hàm reload lại trang
        function reloadPage() {
            window.location.href = "dangky_nhap.php"; // Đặt đường dẫn về chính trang login.php
        }
    </script>
</body>
</html>
