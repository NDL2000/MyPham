<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./assets/css/QLSP/QLSP.css"/>
    <link rel="stylesheet" href="./assets/css/QLSP/view.css"/>
    <link rel="stylesheet" href="./assets/css/QLSP/QLSP_add.css"/>
    <link rel="stylesheet" href="./assets/css/index.css"/>
</head>
<body>
<?php include './connect.php'; 
      $id=$_GET["id"];
?>

    <h1 class="title">Chi tiết sản phẩm</h1>
  <table class="table " style="text-align:center;">
  <thead class="thead-dark">
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Mã sản phẩm</th>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Đơn giá</th>
      <th scope="col">Hình ảnh</th>
      <th scope="col">Mã danh mục</th>
      <th scope="col">Trạng thái</th>
      <th scope="col">Số Lượng</th>
    </tr>
  </thead>
  <tbody>
      <?php
      $sql="SELECT sp.MaSP,sp.TenSP,nx.GiaXuat,sp.HinhAnh,sp.MaDM,sp.TrangThai,nx.SoLuongNhap FROM sanpham as sp,nhapxuat as nx where sp.MaSP=$id and nx.MaSP=$id ";
      
      $result = mysqli_query($conn,$sql);
     
      if(mysqli_num_rows($result)>0){
        $count=0;
        while($row=mysqli_fetch_array($result)){
            $count++;
      ?>
    <tr>
    
      <th scope="row"><?php echo $count ?></th>
      <td><?php echo $row['MaSP'] ?></td>
      <td><?php echo $row['TenSP'] ?></td>
      <td><?php echo number_format($row['GiaXuat'],0,",",".")." VNĐ"; ?></td>
      <td><img  class="image" src="./assets/images/QLSP_image/<?php echo $row['HinhAnh'] ?>"></td>
      <td><?php echo $row['MaDM'] ?></td>
      <td><?php if($row['TrangThai']==1) echo "Đang hiển thị";
        else echo "Chưa hiển thị"?></td>
      <td><?php echo $row["SoLuongNhap"] ?></td>
      <div>
    
        </div>
    </tr>
    <?php }}?>
  </tbody>
</table>
    <button onclick="goBack()" type="button" class="btn-back1"><i class="fas fa-hand-point-left" id="icon"></i></button>

</body>
</html>
<script>
    function goBack(){
      window.location.href="./index.php?url=qlsanpham"
}


</script>
