<?php 
    include '../admin/connect.php'; 
    $id=$_GET['id'];
    $sql="Delete From hoadon where MaHD='$id'";
    $query=mysqli_query($conn,$sql);
    header('Location: ./user.php');
?>