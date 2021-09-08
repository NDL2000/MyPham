<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tài khoản</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limontesweetalert2/7.2.0/sweetalert2.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <link  rel="stylesheet" href="./assets/css/qltk.css"/>
</head>

<body>
    <div class="container-qltk">
    <h1 class="title">DANH SÁCH TÀI KHOẢN</h1>
    <table class="table table-hover table-qltk">
        <tr>
            <th>STT</th>
            <th>Tên đăng nhập</th>
            <th>Email</th>
            <th>Họ tên</th>
            <th>Giới tính</th>
            <th>Loại</th>
            <th>Trạng thái</th>
            <th>Xử lý</th>
        </tr>

        <?php
        include("../admin/connect.php");
        $sql = "select * from taikhoan";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $count = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $count++;
        ?>
                <tr>
                    <td><?php echo $count ?></td>
                    <td><?php echo $row["TenDangNhap"] ?></td>
                    <td><?php echo $row["Email"] ?></td>
                    <td><?php echo $row["HoTen"] ?></td>
                    <td><?php if ($row["GioiTinh"] == 0) echo "Nữ";
                        else echo "Nam" ?></td>
                    <td><?php if ($row["MaLoai"] == "AD") echo "Admin";
                        else echo "User" ?></td>
                    <td><?php echo ($row["TrangThai"] == 1) ?  "Mở" : "Khóa" ?></td>
                    <td>
                        <a href="./index.php?url=suatk&id=<?php echo $row["TenDangNhap"]; ?>" class="btn btn-outline-primary">Sửa</a>
                        <a href="./index.php?url=doimk&id=<?php echo $row["TenDangNhap"]; ?>" class="btn btn-outline-primary">Đổi mật khẩu</a>
                        <a href="./index.php?url=xoatk&id=<?php echo $row["TenDangNhap"]; ?>" class="btn btn-outline-primary" onclick="return xoa('<?php echo $row['TenDangNhap']; ?>')">Xóa</a>
                    </td>
                </tr>
        <?php }
        }  ?>

        <td colspan="8" align="center">
            <button class="btn btn-secondary btn-qltk" type="submit" onclick="myFunction()">Thêm mới </button>
        </td>
    </table>
    </div>
</body>

</html>

<script>
    function myFunction() {
        location.replace("./index.php?url=themtk");
    }

    function xoa(name) {
        return confirm("Bạn có muốn xóa tài khoản : " + name + " ?");
    }
</script>

<?php if (isset($_GET['kq']) && $_GET['kq'] == 1) { ?>
    <script>
        swal("", "Thêm thành công", "success")
    </script>
<?php } ?>

<?php if (isset($_GET['kq']) && $_GET['kq'] == 2) { ?>
    <script>
        swal("", "Cập nhật thành công", "success")
    </script>
<?php } ?>

<?php if (isset($_GET['kq']) && $_GET['kq'] == 3) { ?>
    <script>
        swal("", "Xóa thành công", "success")
    </script>
<?php } ?>

<?php if (isset($_GET['kq']) && $_GET['kq'] == 4) { ?>
    <script>
        swal("", "Đổi mật khẩu thành công", "success")
    </script>
<?php } ?>