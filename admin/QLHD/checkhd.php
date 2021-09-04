<?php
    include './connect.php';
    if(isset($_GET['id'])&&isset($_GET['function']))
    {
        switch($_GET['function']){
            case '1':
                $qr = "update hoadon set TrangThai=N'Đang giao' where MaHD='".$_GET['id']."'";
                $result = mysqli_query($conn,$qr);
                header("Location:./index.php?url=hdchoduyet&kq=".$result);
                break;
            case '2':
                $qr = "update hoadon set TrangThai=N'Đã hủy' where MaHD='".$_GET['id']."'";
                $result = mysqli_query($conn,$qr);
                header("Location:./index.php?url=hdchoduyet&kqa=".$result);
                break;
            case '3':
                $qr = "update hoadon set TrangThai=N'Đã giao' where MaHD='".$_GET['id']."'";
                $result = mysqli_query($conn,$qr);
                header("Location:./index.php?url=hddanggiao&kq=".$result);
                break;
            case '4':
                $qr = "delete from hoadon where MaHD='".$_GET['id']."'";
                $result = mysqli_query($conn,$qr);
                header("Location:./index.php?url=hddahuy&kq=".$result);
                break;
        }
       
    }
?>