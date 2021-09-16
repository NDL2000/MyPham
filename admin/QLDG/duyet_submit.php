<?php
include("connect.php");
$id = $_GET['id'];
$sql = "update danhgia set TrangThai=1 WHERE MaDG = '$id' " ; 
$result= mysqli_query($conn,$sql);
if (mysqli_query($conn, $sql)) {
    header("Location:./index.php?url=qldg&kq=1");
} 
mysqli_close($conn);
?>