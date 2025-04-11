<?php
// lay du lieu id can xoa
$uid = $_GET['id'];
//echo $id;

require_once 'ketnoi.php';

$xoa_sql = "DELETE FROM book WHERE id=$uid";

mysqli_query($conn,$xoa_sql);
// echo "<h1> Xoa thanh cong </h1>";
// tro ve trang liet ke

header("Location: lietke.php");