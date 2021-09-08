<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/hdchoduyet.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limontesweetalert2/7.2.0/sweetalert2.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <title>Hóa đơn đã giao</title>
</head>
<body>
    <?php include './connect.php'; ?>
    <h1 class="title">Hóa đơn đã giao</h1>
    <table class="table table-bordered table-hover table-1">
  <thead>
    <tr>
      <th scope="col" class="title-table">STT</th>
      <th scope="col" class="title-table">Mã hóa đơn</th>
      <th scope="col" class="title-table">Tên đăng nhập</th>
      <th scope="col" class="title-table">Ngày hóa đơn</th>
      <th scope="col" class="title-table">Trạng Thái</th>
      <th scope="col" class="title-table">Chức năng</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        $qr = "SELECT * FROM hoadon where TrangThai = 'Đã giao'";
        $result = mysqli_query($conn, $qr);
        if(mysqli_num_rows($result)>0){
            $count =0;
            while($row = mysqli_fetch_array($result)) {   
                $count++; 
    ?>
    <tr>
      <td style="font-weight: bold"><?php echo $count?></td>
      <td><?php echo $row['MaHD'];?></td>
      <td><?php echo $row['TenDangNhap'];?></td>
      <td><?php echo $row['NgayHD'];?></td>
      <td><div class="status st3"><?php echo $row['TrangThai'];?></div></td>
      <td>
        <a href="./index.php?url=cthoadon&id=<?php echo $row['MaHD']?>" class="btn btn-primary"><i class="far fa-eye"></i></a>
      </td>   
    </tr>
    <?php }}?>
  </tbody>
</table>
</body>
</html>