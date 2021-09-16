<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="../assets/css/dangnhap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limontesweetalert2/7.2.0/sweetalert2.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <script src="https://kit.fontawesome.com/c52f7154f4.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php session_start(); include '../admin/connect.php';include '../DangNhap/taocaptcha.php'?>
<form method="post" action="../DangNhap/xulydangnhap.php">
<div class="login">
  <div class="login-header">
    <h1>Đăng nhập</h1>
  </div>
  <div class="login-form">
    <h3>Tài khoản:</h3>
    <input name="username" type="text" placeholder="Username" required /><br>
    <h3>Mật khẩu:</h3>
    <input name="password" type="password" placeholder="Password" required />
    <br>
    <h3>Mã xác nhận:</h3>
    <input name="code" type="text" placeholder="Mã xác nhận" required/>
    <br>
    <h2 class="captcha"><?php if(isset($_SESSION['captcha'])) echo $_SESSION['captcha']; ?></h2>
    <input name="login" type="submit" value="Đăng nhập" class="login-button"/>
    <br>
    <a href="../DangKy/dangky.php" class="sign-up">Đăng ký!</a>
    <br>
    <h6 class="no-access">Quên mật khẩu?</h6>
  </div>
</div>
</form> 
<?php if(isset($_GET['kq'])&&$_GET['kq']==-2){ ?>
<script>swal("","Tài khoản của bạn đã bị khóa","error")</script><?php } ?>
<?php if(isset($_GET['kq'])&&$_GET['kq']==-1){ ?>
<script>swal("","Vui lòng kiểm tra lại thông tin","error")</script><?php } ?>
<?php if(isset($_GET['kq'])&&$_GET['kq']==0){ ?>
<script>swal("","Tài khoản không tồn tại","error")</script><?php } ?>
<!-- Thong bao dang ky thanh cong va xoa bien tam -->
<?php if(isset($_GET['kq'])&&$_GET['kq']==1){ ?>
<script>swal("","Đăng ký thành công","success")</script><?php unset($_SESSION['username-reg'],$_SESSION['password-reg'],$_SESSION['name-reg'],$_SESSION['gender-reg'],$_SESSION['phone-reg'],$_SESSION['add-reg']); } ?>
<script src="../assets/js/dangky.js"></script>
</body>
</html>