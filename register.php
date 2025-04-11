
<?php

include 'ketnoi.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    
    if ($password != $confirm_password) {
        echo "Mật khẩu xác nhận không khớp. Vui lòng thử lại.";
        exit;
    }

    
    $sql = "SELECT id FROM users WHERE username = ? OR email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        echo "Tên đăng nhập hoặc email đã tồn tại. Vui lòng thử lại.";
        exit;
    }

    // Mã hóa mật khẩu
    $hashed_password = $password;

    // Lưu thông tin người dùng vào cơ sở dữ liệu
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashed_password);

    if (mysqli_stmt_execute($stmt)) {
        // Hiển thị thông báo thành công bằng HTML + JavaScript
        echo "
        <html>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Đăng ký thành công</title>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
        </head>
        <body>
            <div class='container mt-5'>
                <div class='alert alert-success' role='alert'>
                    Tạo tài khoản thành công! Bạn sẽ được chuyển đến trang đăng nhập trong giây lát...
                </div>
            </div>
            <script>
                // Chuyển hướng đến trang đăng nhập sau 3 giây
                setTimeout(function(){
                    window.location.href = 'index.php';
                }, 3000);
            </script>
        </body>
        </html>
        ";
    } else {
        echo "Đã xảy ra lỗi. Vui lòng thử lại sau.";
    }

    // Đóng kết nối
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
