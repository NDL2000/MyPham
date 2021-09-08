<?php 
    include "./connect.php";
    $id=$_GET['id'];
    $sql="Delete From nhapxuat where MaSP=$id";
    $query=mysqli_query($conn,$sql);
    header('Location: ./index.php?url=qlsanpham')
?>