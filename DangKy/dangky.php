<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/dangky.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limontesweetalert2/7.2.0/sweetalert2.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <title>Đăng ký</title>
</head>
<body>
<?php session_start(); ?>
<form method="post" action="./xulydangky.php">
  <div class="container">
    <h1 class="title-reg">Đăng ký</h1>
    <hr>
    <label><b>Email (*)</b></label>
    <input type="email" placeholder="Nhập Email" name="email" id="email" required>

    <label><b>Mật khẩu (*)</b></label>
    <input type="password" placeholder="Nhập mật khẩu" name="password" id="psw" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$">

    <label><b>Xác nhận mật khẩu (*)</b></label>
    <input type="password" placeholder="Xác nhận mật khẩu" name="password-repeat" id="psw-repeat" required>
    
    <label><b>Họ tên (*)</b></label>
    <input type="text" placeholder="Họ tên" name="name" required>
    </br></br>
    <label><b>Giới tính</b></label>
    <select name="gender" class="gender">
        <option value="1">Nam</>
        <option value="0">Nữ</>
    </select>
    </br></br></br>
    <label><b>Số điện thoại (*)</b></label>
    <input type="text" placeholder="Số điện thoại" name="phone" required>

    <label><b>Địa chỉ (*)</b></label>
    <input type="text" placeholder="Địa chỉ" name="address" required>

    <hr>
    <button type="submit" class="registerbtn" name="register">Đăng ký</button>
  </div>

  <div class="container signin">
    <p>Already have an account? <a href="../DangNhap/dangnhap.php">Đăng nhập</a>.</p>
  </div>
</form>
   <!-- Thong bao  -->
<?php if(isset($_GET['kq'])&&$_GET['kq']==0) {?>
  <script>swal("","Email này đã tồn tại","error")</script><?php } ?>     
           
</body>
</html>