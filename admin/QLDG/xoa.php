<?php
 include("connect.php");
$id = $_GET['id'];
$sql = "DELETE FROM danhgia WHERE MaDG = '$id'";
$result= mysqli_query($conn,$sql);
if (mysqli_query($conn, $sql)) {
     header("Location:./index.php?url=qldg&kq=2");
}
mysqli_close($conn);
?>
