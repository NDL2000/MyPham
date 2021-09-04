<!DOCTYPE html>
<html lang="en">
    <head>
      <title>Admin</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://kit.fontawesome.com/c52f7154f4.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="./assets/css/index.css"/>
    </head>
    
    <body>
		<?php session_start(); ?>
		<!-- Check thong tin truoc khi login admin -->
		<?php if($_SESSION['user']==null) header("Location:../DangNhap/dangnhap.php");?>
        <div class="content">	
			<div id="jquery-accordion-menu" class="jquery-accordion-menu">
				<div class="jquery-accordion-menu-header">    
                    <img src="./assets/images/profile.png" alt="./assets/images/profile.png" width="80" class="mr-3 rounded-circle">      
                    <h4 class="name"><?php if(isset($_SESSION['user'])) echo $_SESSION['user'];?></h4>
                </div>
				<ul>
					<li class="active"><a href="./index.php?url=QlTK"><i class="far fa-user" id="icon"></i>Quản lý tài khoản </a></li>
					<li><a href="./index.php?url=qldm"><i class="fas fa-list-ul" id="icon"></i>Quản lý danh mục </a></li>
					<li><a href="#"><i class="fas fa-tags" id="icon"></i>Quản lý sản phẩm</a>
					<li><a href="#"><i class="fas fa-file-invoice" id="icon"></i>Quản lý hóa đơn</a>
						<ul class="submenu">
							<li><a href="./index.php?url=hdchoduyet">Hóa đơn chờ xét duyệt</a></li>
							<li><a href="./index.php?url=hddanggiao">Hóa đơn đang giao</a></li>
							<!-- <li><a href="#">Design </a>
								<ul class="submenu">
									<li><a href="#">Graphics </a></li>
									<li><a href="#">Vectors </a></li>
									<li><a href="#">Photoshop </a></li>
									<li><a href="#">Fonts </a></li>
								</ul>
							</li> -->
							<li><a href="./index.php?url=hddagiao">Hóa đơn đã giao</a></li>
                            <li><a href="./index.php?url=hddahuy">Hóa đơn đã hủy</a></li>
						</ul>
					</li>
					<li><a href="./index.php?url=khuyenmai"><i class="fas fa-percentage" id="icon"></i>Quản lý khuyến mại</a>
						<!-- <ul class="submenu">
							<li><a href="#">Web Design </a></li>
							<li><a href="#">Graphics </a>
							<li><a href="#">Photoshop </a></li>
							<li><a href="#">Programming </a></li>
						</ul> -->
					</li>
                    <li><a href="#"><i class="far fa-comments" id="icon"></i>Quản lý đánh giá</a></li>
					<li><a href="#"><i class="far fa-chart-bar" id="icon"></i>Thống kê</a></li>
					<li><a href="./index.php?url=dangxuat"><i class="fas fa-sign-out-alt" id="icon"></i>Đăng xuất</a></li>
				</ul>
				<div class="jquery-accordion-menu-footer"></div>      <!--Footer-->
			</div>         
		</div>
		<!-- Content -->
		<div class="content-right">
               <?php 
			   		if(isset($_GET['url'])){
						   switch($_GET['url']){
								// Quan ly hoa don
							    case 'hdchoduyet': include './QLHD/hdchoduyet.php';break;
								case 'hddanggiao': include './QLHD/hddanggiao.php';break;
								case 'hddagiao': include './QLHD/hddagiao.php';break;
								case 'hddahuy': include './QLHD/hddahuy.php';break;
								case 'cthoadon': include './QLHD/cthoadon.php';break;
								case 'checkhd': include './QLHD/checkhd.php';break;

								// Quan ly khuyen mai
								case 'khuyenmai': include './QLKM/khuyenmai.php';break;
								case 'themdotkm': include './QLKM/themdotkm.php';break;
								case 'ctkhuyenmai': include './QLKM/ctkhuyenmai.php';break;
								case 'themspkm': include './QLKM/themspkm.php';break;
								case 'suakm': include './QLKM/suakm.php';break;
								case 'xoakm': include './QLKM/xoakm.php';break;
								
								// Quan ly tai khoan
								case 'QlTK' : include './QuanLyTK/DsTK.php';break;
								case 'themtk' : include './QuanLyTK/ThemTK.php';break;
								case 'suatk' : include './QuanLyTK/SuaTK.php';break;
								case 'suatksb' : include './QuanLyTK/SuaTK_submit.php';break;
								case 'doimk' : include './QuanLyTK/DoiMK.php';break;
								case 'xoatk' : include './QuanLyTK/XoaTK_submit.php';break;

								// Quan ly danh muc
								case 'qldm' : include './QuanLyDM/DsDM.php';break;
								case 'themdm' : include './QuanLyDM/ThemDM.php';break;
								case 'suadm' : include './QuanLyDM/SuaDM.php';break;
								case 'xoadm' : include './QuanLyDM/XoaDM_submit.php';break;

								case 'dangxuat': include './dangxuat.php';break;
						   }
					   }	
			   ?>
		</div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>    
        <script src="./assets/js/index.js"></script>
		
    </body>
</html>
