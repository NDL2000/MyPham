<?php
    include './connect.php';
    if(isset($_GET['id'])&&isset($_GET['function']))
    {
        switch($_GET['function']){
            case '1':
                $qr = "update hoadon set TrangThai=N'Đang giao' where MaHD='".$_GET['id']."'";
                $result = mysqli_query($conn,$qr);
                header("Location:./index.php?url=hddanggiao&page=1&kq=".$result);
                break;
            case '2':
                $qr = "update hoadon set TrangThai=N'Đã hủy' where MaHD='".$_GET['id']."'";
                $result = mysqli_query($conn,$qr);
                header("Location:./index.php?url=hddahuy&page=1&kqa=".$result);
                break;
            case '3':
                $qr = "update hoadon set TrangThai=N'Đã giao' where MaHD='".$_GET['id']."'";
                $result = mysqli_query($conn,$qr);
                header("Location:./index.php?url=hddagiao&page=1&kq=".$result);
                break;
            case '4':
                $qr = "delete from hoadon where MaHD='".$_GET['id']."'";
                $result = mysqli_query($conn,$qr);
                header("Location:./index.php?url=hddahuy&page=1&kq=".$result);
                break;
            case '5':
                $qr = "update hoadon set TrangThai=N'Chờ xét duyệt' where MaHD='".$_GET['id']."'";
                $result = mysqli_query($conn,$qr);
                header("Location:./index.php?url=hdchoduyet&page=1&kq=5");
                break;
            case '6':
                $qr = "update hoadon set TrangThai=N'Đang giao' where MaHD='".$_GET['id']."'";
                $result = mysqli_query($conn,$qr);
                header("Location:./index.php?url=hddanggiao&page=1&kq=5");
                break;
            default: echo "<script>alert('Lỗi không hợp lệ')</script>";break;
        }
       
    }
?>