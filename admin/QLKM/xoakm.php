<?php 
    include '../admin/connect.php';
    if(isset($_GET['id'])&&isset($_GET['function']))
    {
        switch($_GET['function']){
            case '1':
                $qr = "delete from khuyenmai where MaKM='".$_GET['id']."'";
                $result = mysqli_query($conn,$qr);
                if($result==1) header("Location:./index.php?url=khuyenmai&kq=2");
                break;
        }
       
    }
   
?>