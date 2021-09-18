<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/QLHD/hdchoduyet.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limontesweetalert2/7.2.0/sweetalert2.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <title>Hóa đơn đang giao</title>
</head>
<body>
    <?php include './connect.php'; 
          $qr = "SELECT * FROM hoadon where TrangThai = 'Đang giao'";
          $result = mysqli_query($conn, $qr);
    ?>
    <h1 class="title">Hóa đơn đang giao</h1>
     <!-- Loc hoa don -->
     <div class="filter">
    <form method="post" action="<?php include("loc.php"); ?>">
            <table class="table-date">
                <tr>
                    <td> Từ ngày </td>
                    <td> <input type="date"  name="fromdate" id="fromdate"> </td>
                    <td> Đến ngày </td>
                    <td> <input  type="date" name="todate" id="todate"> </td>          
                 </tr>
            </table>           
        
        <br>
        <div class="button-filter">           
            <button  type="submit" name="filter" class="btn-filter">Lọc</button>
            <button  class="btn-filter" type="button" onclick="window.location.href='./index.php?url=hddanggiao'">Huỷ lọc</button>          
         </div>
           </form>
    </div>
<!-- ------------------------------------------------------- -->
    <table class="table table-bordered table-hover table-1">
  <thead class="table-success"> 
    <tr>
    <th scope="col" class="title-table" style="width: 3%">STT</th>
      <th scope="col" class="title-table" style="width: 7%">Mã hóa đơn</th>
      <th scope="col" class="title-table" style="width: 15%">Tên đăng nhập</th>
      <th scope="col" class="title-table" style="width: 10%">Ngày hóa đơn</th>
      <th scope="col" class="title-table" style="width: 10%">Trạng Thái</th>
      <th scope="col" class="title-table" style="width: 10%">Chức năng</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        if(mysqli_num_rows($result)>0){
            $count =0;
            while($row = mysqli_fetch_array($result)) {   
                $count++; 
    ?>
    <tr>
      <td style="font-weight: bold"><?php echo $count?></td>
      <td><?php echo $row['MaHD'];?></td>
      <td style="word-wrap:break-word"><?php echo $row['TenDangNhap'];?></td>
      <td><?php echo $row['NgayHD'];?></td>
      <td><div class="status st2"><?php echo $row['TrangThai'];?></div></td>
      <td>
        <a href="./index.php?url=cthoadon&id=<?php echo $row['MaHD']?>&fc=4" class="btn btn-primary"><i class="far fa-eye"></i></a>
        <a href="./index.php?url=checkhd&id=<?php echo $row['MaHD']?>&function=3" onclick="return confirm('Bạn có muốn chuyển trạng thái đơn sang đã giao không?')" class="btn btn-success"><i class="far fa-check-circle"></i></a>
      
      </td>   
    </tr>
    <?php }}else{?>
      <tr>
        <td colspan="6">Không có hóa đơn nào đang giao!</td>
      </tr>
      <?php }?>
  </tbody>
</table>
<!-- Thong bao  -->
<?php if(isset($_GET['kq'])&&$_GET['kq']==1) {?>
  <script>swal("","Đơn hàng đã chuyển sang trạng thái Đã giao","success")</script><?php } ?>
</body>
</html>