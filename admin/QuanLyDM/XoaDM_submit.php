<?php
    include ("../admin/connect.php");
    $id=$_GET['id'];
        $sql="Delete from danhmuc where MaDM = '$id'";
        $old=mysqli_query($conn,$sql);
        if($old>0){
            header("location:./index.php?url=qldm&kq=3");
        }
        
    

?>