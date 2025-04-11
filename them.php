<?php
// nhận dữ liệu từ form
$ts = $_POST['tensach'];
$gia = $_POST['giasach'];
$sl = $_POST['soluong'];

//ket noi cs
require_once 'ketnoi.php';


// Viet sql de them du lieu

$themsql = "INSERT INTO book(bookname,price,amount) VALUES('$ts','$gia','$sl')";

//thuc thi cau lenh them
if (mysqli_query($conn,$themsql)){
    // tro ve trang liet ke
    header("Location: lietke.php");
};


