<link rel="stylesheet" href="./assets/css/QLSP/QLSP_add.css"/>
<script src="./assets/js/QLSP_js/add_QLSP.js"></script>
<?php include "./connect.php";
  $sql_category="SELECT * FROM danhmuc  ";
  $query_category=mysqli_query($conn,$sql_category);
  if(isset($_POST['sbm'])){
    $prd_id=$_POST['prd_id'];
    $prd_name=$_POST['prd_name'];
    // $price=$_POST['price'];
    $price_input=$_POST['price_input'];
    $price_output=$_POST['price_output'];
    $date=$_POST['date'];
    // $dt = \DateTime::createFromFormat('dd/mm/YYYY', $_POST['date']);
    // $date= date ("d-m-Y H:i:s"); 
    $datetime = date_create()->format('Y-m-d H:i:s');

    

    $image_tmp=$_FILES['image']['tmp_name'];
    $image1=$_FILES['image']['name'];
    $category_id=$_POST['category_id'];
    $input_quality=$_POST['input_quality'];
    $status1=$_POST['status'];
    $description=$_POST['description'];

    $qr = "select MAX(MaSP) as MaSP from nhapxuat";
    $kq = mysqli_query($conn,$qr);
    if(mysqli_num_rows($kq) > 0){
      while($row = mysqli_fetch_array($kq)) {
        if($row['MaSP']==null) $prd_id=1;
        else $prd_id = (integer)($row['MaSP'])+1;
      }
    }
    
    $sql_input_output ="INSERT INTO nhapxuat (MaSP,GiaNhap,GiaXuat,NgayApDung, SoLuongNhap)  VALUES('$prd_id','$price_input','$price_output','$datetime','$input_quality')";
    $sql_QLSP="INSERT INTO sanpham(MaSP,TenSP,DonGia,HinhAnh,MaDM,TrangThai,MoTa) VALUES ('$prd_id','$prd_name','$price_output','$image1','$category_id','$status1','$description')";
    $query_input_output=mysqli_query($conn,$sql_input_output);
    $query_QLSP=mysqli_query($conn,$sql_QLSP);
    move_uploaded_file($image_tmp,'./assets/images/'.$image1);
    header("Location: ./index.php?url=qlsanpham&kq=".$query_QLSP);
  
  }
?>

<div class="container-fluid">
   <div class="card-header">
       <h2>Thêm sản phẩm</h2>
   </div>
   <div class="card-body">
       <form method="POST" enctype="multipart/form-data" >
      
       <div class="form-group">
         <label for="">Tên sản phẩm</label>
         <input type="text" name="prd_name"class="form-control" required  >
        </div>
        <div class="form-group">
          <label for="">Tên danh mục</label>
          <select class="form-control" name="category_id" style="height: calc(2.25rem + 14px);">
            <?php
              while($row_category=mysqli_fetch_array($query_category)){?>
                <option value="<?php echo $row_category['MaDM']; ?> "><?php echo $row_category['TenDM']; ?></option>
              <?php } ?>
          </select>
        </div>
           <div class="form-group">
             <label for="">Ảnh sản phẩm</label> <b>
             <input type="file" name="image" class="image-file" >
           </div>
           <div class="form-group">
             <label for="">Giá Nhập</label>
             <input type="number" name="price_input" class="form-control" id="price_input" required >
           </div>
           <div><span id="a"></span></div>
           <div class="form-group">
             <label for="">Giá Xuất</label>
             <input type="number" name="price_output"class="form-control" id="price_output" required >
           </div>
           <div class="form-group">
             <label for="">Số lượng nhập</label>
             <input type="text" name="input_quality"class="form-control"required >
           </div>
           <div class="form-group">
             <label for="">Ngày Áp Dụng</label>
             <input type="date" name="date" class="form-control" min="<?php echo date("Y-m-d") ?>" value="<?php echo date("Y-m-d")?>">
           </div> 
           <!-- <div class="form-group">
                
                 <label for="date">Ngày Áp Dụng</label>
                 <div>
                 <input type="date" id="datetime" name="date" class="form-control-date">
                 </div>
              </div> -->
          
           
           <div class="form-group">
         <label for="">Trạng thái</label>
         <select class="form-control-status" name="status">
          
            <option value="1">Hiển thị</option>
            <option value="0">Ẩn</option>
          </select>
      
        </div>
        <div class="form-group">
             <label for="">Mô tả</label>
             <!-- <input type="text" name="input_quality"class="form-control"required > -->
             <textarea type="text" name="description"  class="form-control-description" required></textarea>
           </div>
           <button name="sbm" class="btn-add" type="submit">Thêm</button>
           <!-- <button class="btn-back"><a type="button" href="./index.php?url=qlsanpham">Tro ve</a></button> -->
           <!-- <button class="btn-back"><a type="button" href="./index.php?url=qlsanpham">Quay về</a></button> -->
           <button onclick="goBack()" type="button" class="btn-back">Quay Về</button>
          
        </form>
   </div>
   
</div>
<script>
  function goBack(){
      window.location.href="./index.php?url=qlsanpham"
}
</script>
