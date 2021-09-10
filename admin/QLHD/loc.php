<?php
 include("connect.php");
if(isset($_POST['filter'])){
                $fromdate = trim($_POST['fromdate']);
                $todate = trim($_POST['todate']);
                if(isset($_GET["url"])){
                  switch($_GET["url"]){
                    case "hdchoduyet": $status = "Chờ xét duyệt"; break;
                    case "hddanggiao": $status = "Đang giao"; break;
                    case "hddagiao": $status = "Đã giao"; break;
                    case "hddahuy": $status = "Đã hủy"; break;
                  }
                }
                $sql1 = "select * from hoadon where NgayHD between date('$fromdate') and date('$todate') and TrangThai='$status'";
                $result = mysqli_query($conn,$sql1);
}
mysqli_close($conn);
?>