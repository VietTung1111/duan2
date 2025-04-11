<?php
//lay id cua edit

$uid = $_GET['id'];

require_once 'ketnoi.php';

// cau lenh de lay thong tin sinh vien co id = $uid

$edit_sql = "SELECT * FROM book WHERE id=$uid";

$result = mysqli_query($conn,$edit_sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa sách</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Cập nhập thông tin sách</h2>
        <form action="update.php" method="POST">
            <input type="hidden" name ="uid" value = "<?php echo $uid;?>" id = "">
            <div class="form-group">
                <label for="">Tên sách</label>
                <input type="text" id ="tensach" name ="tensach" class="form-control" value ="<?php echo $row['bookname']?>">
            </div>
            <div class="form-group">
                <label for="">Giá sách</label>
                <input type="number" id ="giasach" name ="giasach" class="form-control" value ="<?php echo $row['price']?>">
            </div>
            <div class="form-group">
                <label for="">Số lượng</label>
                <input type="number" id ="soluong" name ="soluong" class="form-control" value ="<?php echo $row['amount']?>">
            </div>
            <button type="submit" class="btn btn-success">Cập nhập thông tin</button>
        </form>
    </div>
</body>
</html>

