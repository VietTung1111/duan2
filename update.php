<?php
// nhận dữ liệu từ form
$ts = $_POST['tensach'];
$gia = $_POST['giasach'];
$sl = $_POST['soluong'];
$id = $_POST['uid'];
//ket noi cs
require_once 'ketnoi.php';


// Viet sql de them du lieu

$updatesql = "UPDATE book SET bookname = '$ts', price = '$gia', amount = '$sl' WHERE id = $id";
//echo $updatesql;exit;
//thuc thi cau lenh them
if (mysqli_query($conn,$updatesql)){
    // tro ve trang liet ke
    header("Location: lietke.php");
};