<link rel="stylesheet" href="./assets/css/Product/product_add.css"/>
<script src="./assets/js/Product_js/add_product.js"></script>
<script src="./assets/js/Product_js/edit.js"></script>
<?php include "./connect.php";
  $id=$_GET["id"];
  $sql_category="SELECT * FROM danhmuc  ";
  $query_category=mysqli_query($conn,$sql_category);
  $sql_update="SELECT sp.MaSP,sp.TenSP,nx.GiaXuat,nx.GiaNhap,sp.HinhAnh,sp.MaDM,sp.TrangThai,nx.SoLuongNhap,nx.NgayApDung,sp.MoTa FROM sanpham as sp,nhapxuat as nx where sp.MaSP=$id and nx.MaSP=$id";
  $query_update=mysqli_query($conn,$sql_update);
  $row_update=mysqli_fetch_assoc($query_update);
  if(isset($_POST['sbm'])){
    $prd_id=$_POST['prd_id'];
    $prd_name=$_POST['prd_name'];
    if($_FILES['image']['name']==' '){

      $image1=$row_update['image'];
    }
    else{
      $image1=$_FILES['image']['name'];
      $image1_tmp=$_FILES['image']['tmp_name'];
      move_uploaded_file($image1_tmp,'./assets/images/'.$image1) ;

    }
    $price=$_POST['price'];
    $price_input=$_POST['price_input'];
    $price_output=$_POST['price_output'];
    $date=$_POST['date'];
    $category_id=$_POST['category_id'];
    $input_quality=$_POST['input_quality'];
    $status1=$_POST['status'];
    $description=$_POST['description'];
    
    $sql_input_output_update ="UPDATE nhapxuat SET GiaNhap = '$price_input', GiaXuat = '$price_output', NgayApDung = '$date', SoLuongNhap = '$input_quality' where MaSP='$id'";
    $sql_product_update = "UPDATE sanpham SET TenSP = '$prd_name', DonGia= '$price_output', HinhAnh = '$image1', MaDM= '$category_id', TrangThai= '$status1',MoTa='$description' where MaSP='$id'";
    $query_input_output_update=mysqli_query($conn,$sql_input_output_update);
    $query_product_update=mysqli_query($conn,$sql_product_update);



    header("Location: index.php?url=qlsanpham&kq1=".$query_product_update);
  }
?>

<div class="container-fluid">
   <div class="card-header">
       <h2>Sửa sản phẩm</h2>
   </div>
   <div class="card-body">
       <form method="POST" enctype="multipart/form-data" >
       <div class="form-group">
         <label for="">Mã sản phẩm</label>
         <input type="text" name="prd_id"class="form-control"   disabled   require value="<?php echo $row_update['MaSP']  ?>" >
        </div>
       <div class="form-group">
         <label for="">Tên sản phẩm</label>
         <input type="text" name="prd_name"class="form-control" require value="<?php echo  $row_update["TenSP"] ?>" >
        </div>
        <div class="form-group">
          <label for="">Tên danh mục</label>
          <select class="form-control" name="category_id"style="height: calc(2.25rem + 14px);">
            <?php
              while($row_category=mysqli_fetch_array($query_category)){?>
                <option value="<?php echo $row_category['MaDM']; ?> "><?php echo $row_category['TenDM']; ?></option>
              <?php } ?>
          </select>
        </div>
           <div class="form-group">
             <label for="">Ảnh sản phẩm</label> <b>
             <input type="file" name="image" class=image-file >
           </div>
           <div class="form-group">
             <label for="">Giá Nhập</label>
             <input type="number" name="price_input"class="form-control" require value="<?php echo  $row_update["GiaNhap"]?>">
           </div>
           <div class="form-group">
             <label for="">Giá Xuất</label>
             <input type="number" name="price_output"class="form-control" require value="<?php echo  $row_update["GiaXuat"]?>" >
           </div>
           <div class="form-group">
             <label for="">Số lượng nhập</label>
             <input type="text" name="input_quality"class="form-control" require value="<?php echo  $row_update['SoLuongNhap']?>" >
           </div>
           <div class="form-group">
             <label for="">Ngày Áp Dụng</label>
             <input type="text" name="date"class="form-control" require value="<?php echo $row_update["NgayApDung"] ?>" >
           </div>
           <!-- <div class="form-group">
                
                 <label for="birthday">Ngày Áp Dụng</label>
                 <div>
                 <input type="date" id="datetime" name="date" require value="<?php echo $row_update["NgayApDung"] ?>">
                 </div>
              </div>
           -->
           
           <div class="form-group">
         <label for="">Trạng thái</label>
         <select class="form-control" name="status"style="height: calc(2.25rem + 14px);" require value="<?php echo $row_update['TrangThai']?>">
          
            <option value="1">Hiển thị</option>
            <option value="0">Ẩn</option>
          </select>
        
        </div>
        <div class="form-group">
             <label for="">Mô tả</label>
             <!-- <input type="text" name="input_quality"class="form-control"required > -->
             <textarea type="text" name="description"  class="form-control-description" require value="" ><?php echo  $row_update["MoTa"]; ?></textarea>
           </div>
           
           <button onclick="return Edit('<?php echo $row_update['MaSP']?>') "name="sbm" class="btn-add" type="submit">Sửa</button>
           <button onclick="goBack()" type="button" class="btn-back">Quay Về</button>
           
        </form>
   </div>
   
</div>
<script>
    function Edit(name){
      return confirm (`Bạn có chắc là muốn sửa sản phẩm: ${name} ?`)

    }
    function goBack(){
      window.location.href="./index.php?url=qlsanpham"
}
   


</script>