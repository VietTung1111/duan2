<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <h2 style="text-align: center; color: rgb(68, 153, 187); padding: 30px 0 20px;">Thông tin sách</h2>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" >
            Thêm sách mới
        </button>
        <button type="button" class="btn btn-primary" onclick="window.location.href='index.php';">Trang chủ</button><br><br>
        <table class="table">
        <thead class="thead-dark">
        <h3 style="padding: 10px;">Kho sách</h3>
        <tr>
            <th>Tên sách</th>
            <th>Giá</th>
            <th>Tồn kho</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        <?php
        // ket noi

        require_once 'ketnoi.php';

        $lietke_sql = "SELECT * FROM book order by id";

        //thuc thi cau lenh
        $result = mysqli_query($conn,$lietke_sql);

        // duyet qua result va in ra

        while($r = mysqli_fetch_assoc($result)){
            ?>
            <tr>
            <td><?php echo $r['bookname']; ?></td>
            <td><?php echo $r['price']; ?></td>
            <td><?php echo $r['amount']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $r['id']; ?>" class = "btn btn-info">Sửa</a> 
                <a onclick = "return confirm('Bạn có chắc chắn muốn xoá sách này không ?');" href ="xoa.php?id=<?php echo $r['id']; ?>" class = "btn btn-danger">Xoá</a>
            </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
        </table>
       
    </div>
    <!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Hãy thêm những quyển sách thú dị </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form action="them.php" method="POST">
            <div class="form-group">
                <label for="">Tên sách</label>
                <input type="text" id = "tensach" name = "tensach" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Giá</label>
                <input type="number" id ="giasach" name = "giasach" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Số lượng</label>
                <input type="number" id = "soluong" name = "soluong" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Xác nhận</button>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
</body>
</html>
