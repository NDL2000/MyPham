<?php
 include("connect.php");
if(isset($_POST['filter'])){
                $fromdate = trim($_POST['fromdate']);
                $todate = trim($_POST['todate']);
                $sql1 = "select * from hoadon where NgayHD between date('$fromdate') and date('$todate') and TrangThai='Đã giao' limit $page,$rows";
                $result = mysqli_query($conn,$sql1);
                
}
mysqli_close($conn);
?>