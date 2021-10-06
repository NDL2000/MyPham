<?php 
    include '../admin/connect.php'; 
    $id=$_GET['id'];
    $sql="update hoadon set TrangThai='Đã hủy' where MaHD='$id'";
    $query=mysqli_query($conn,$sql);
    header('Location: ./user.php?rs=1');
?>