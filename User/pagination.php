<?php 
    include '../admin/connect.php';
    $sql = "SELECT sp.MaSP,sp.TenSP,sp.DonGia,ct.TyLeKM FROM sanpham as sp LEFT JOIN ctkhuyenmai as ct on sp.MaSP=ct.MaSP";
    if(isset($_GET["dm"])){
        $MaDM = $_GET["dm"];
        $sql = "SELECT sp.MaSP,sp.TenSP,sp.DonGia,ct.TyLeKM FROM sanpham as sp LEFT JOIN ctkhuyenmai as ct on sp.MaSP=ct.MaSP where sp.MaDM='$MaDM'";
    }
    $kq = mysqli_query($conn,$sql);
    $num_rows = mysqli_num_rows($kq); //So rows trong database
    $rows = 6;  //So rows muon hien thi
    if(isset($_GET['page'])&&$_GET['page']>0){
      $page = ($_GET['page']-1)*$rows;  //Vi tri record 
    }
    if($_GET['page']<1) $page = 1;
    if(isset($_GET["dm"])){
        $sql="SELECT sp.MaSP,sp.TenSP,sp.DonGia,sp.HinhAnh,ct.TyLeKM FROM sanpham as sp LEFT JOIN ctkhuyenmai as ct on sp.MaSP=ct.MaSP where sp.MaDM='$MaDM' limit $page,$rows";
    }
    else{
    $sql="SELECT sp.MaSP,sp.TenSP,sp.DonGia,sp.HinhAnh,ct.TyLeKM FROM sanpham as sp LEFT JOIN ctkhuyenmai as ct on sp.MaSP=ct.MaSP limit $page,$rows";
    }
?>