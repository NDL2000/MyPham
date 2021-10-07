<?php
    session_start();
    include '../admin/connect.php';
    $gid= $_POST['id'];
   if(isset($gid))
       {
          $sql_sp="SELECT * FROM sanpham WHERE MaSP=$gid";
          $query_sp= mysqli_query($conn, $sql_sp); 
          $row_sp=mysqli_fetch_array($query_sp);
          if(!empty($_SESSION['cart']))                 
          {  if(array_key_exists($gid, $_SESSION['cart']))              
             { 
                 $_SESSION['cart'][$gid]=array(
                  "id"=>$gid,"name"=>$row_sp['TenSP'],"sl"=>(int) $_SESSION['cart'][$gid]['sl'] +1,"price"=> 
                   $row_sp['DonGia']
                  );
                 echo 'Đã thêm sản phẩm vào giỏ';
                 
                  
              }
              else
               {
                  $_SESSION['cart'][$gid]=array(
                  "id"=>$gid,"name"=>$row_sp['TenSP'],"sl"=>1,"price"=> 
                   $row_sp['DonGia']
                );
                echo 'Đã thêm sản phẩm vào giỏ';
                 
              }
              
          } 
          else
              {
                $_SESSION['cart'][$gid]=array(
                  "id"=>$gid,"name"=>$row_sp['TenSP'],"sl"=>1,"price"=> 
                   $row_sp['DonGia']
                );
                echo 'Đã thêm sản phẩm vào giỏ';
                }
              
       }
     else
         {
           header("location:./header.php?url=sanpham&id=$gid");
         }
   
?>
