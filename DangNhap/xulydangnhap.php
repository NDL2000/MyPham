<?php
    session_start();
    include '../admin/connect.php';
    if(isset($_POST['login'])&&$_POST['code']!=null&&$_POST['code']==$_SESSION['captcha']){
        $username = $_POST['username'];
        $password = $_POST['password'];
        // Login Admin
        $sql = "SELECT MatKhau,HoTen,TrangThai from taikhoan where TenDangNhap='$username' and MaLoai='AD'";
        $kq = mysqli_query($conn,$sql);
        if(mysqli_num_rows($kq)>0){
            while($row = mysqli_fetch_array($kq)){
            $kq_pass = password_verify($password,$row['MatKhau']);
            if($kq_pass==true){
                if($row['TrangThai']=="1"){
                $_SESSION['user'] = $row['HoTen'];
                header("Location:../admin/index.php?ad=1");
                }
                else {
                     header("Location:./dangnhap.php?kq=-2");
                }
            }
        }
        
        }
        else {
            header("Location:./dangnhap.php?kq=0");
        }
            
            
    }
        // Login user
        
    else {
        header("Location:./dangnhap.php?kq=-1");
    }
    
?>