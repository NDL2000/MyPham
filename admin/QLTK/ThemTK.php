<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./assets/css/QLTK/themtk.css"/>
    <title>Thêm tài khoản</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <div class="container-themtk">
    <h1 class="title">ĐĂNG KÝ TÀI KHOẢN</h1>
    <br>
    <h2 class="title">THÔNG TIN TÀI KHOẢN</h2>
    <form action="<?php include("ThemTK_submit.php"); ?>" method="post">
        <table>
            <tr>
                <td>Tên đăng nhập(*) : </td>
                <td><input type="text" name="tendangnhap" value="<?php echo $tendangnhap?>" class="form-control" ></td>
                <td><div class="error"><?php echo $errors['tendangnhap']; ?></div></td>
            </tr>
            <tr>
                <td>Email(*) : </td>
                <td><input type="text" name="email" value="<?php echo $email?>" class="form-control" ></td>
                <td><div class="error"><?php echo $errors['email']; ?></div></td>
            </tr>
            <tr>
                <td>Mật khẩu(*) : </td>
                <td><input type="password" name="matkhau" value="<?php echo $matkhau?>" class="form-control"></td>
                <td><div class="error"><?php echo $errors['matkhau']; ?></div></td>
            </tr>
        </table>
           
        <h2 class="title">THÔNG TIN CÁ NHÂN</h2> 
        <table> 
            <tr>
                <td>Họ tên : </td>
                <td><input type="text" name="hoten" value="<?php echo $hoten?>" class="form-control input-tk" style="width:260% !important"></td>
            </tr>
            <tr>
                <td>Giới tính : </td>
                <td>
                    <select class="form-select input-tk" name="sex" >
                        <option value="1">Nam</option>
                        <option value="0">Nữ</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Số điện thoại : </td>
                <td><input type="number" name="sodienthoai" value="<?php echo $sodienthoai?>" class="form-control input-tk" style="width:260% !important"></td>
                <td><div class="error"><?php echo $errors['sodienthoai']; ?></div></td>
            </tr>
            <tr>
                <td>Địa chỉ : </td>
                <td><input type="text" name="diachi" value="<?php echo $diachi?>" class="form-control input-tk" style="width:260% !important"></td>
            </tr>
            <tr>
                <td>Mã loại : </td>
                <td>
                    <select class="form-select input-tk" name="maloai" >
                        
                        <?php
                            include ("./connect.php");
                            $sql = "select * from loaitk";
                            $old = mysqli_query($conn,$sql);
                            while ($row = mysqli_fetch_assoc($old)){
                        ?>
                            <option value="<?php echo $row["MaLoai"] ?>"><?php echo $row["TenLoai"] ?> </option>
                        <?php
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Trạng thái : </td>
                <td>
                    <select class="form-select input-tk" name="trangthai" >
                        <option value="1">Mở</option>
                        <option value="0">Khóa</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" name="submit" value="submit" class="btn btn-primary btn-themtk">Thêm tài khoản</button>
                   
                </td>
            </tr>
        </table>
    </form>
    </div>
</body>
</html>

