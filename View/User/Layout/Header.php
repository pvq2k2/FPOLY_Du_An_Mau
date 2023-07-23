<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <!-- Đường dẫn tới các tệp tin CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.16/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Đường dẫn tới các tệp tin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.16/dist/sweetalert2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <header>
        <ul>
            <li><a href="index.php">Trang chủ</a></li>
            <li><a href="index.php?act=introduce">Giới thiệu</a></li>
            <li><a href="index.php?act=contact">Liên hệ</a></li>
            <li><a href="index.php?act=feedback">Góp ý</a></li>
            <li><a href="index.php?act=qa">Hỏi đáp</a></li>

            <form action="index.php?act=search" class="formSearch" method="post">
                <input type="text" name="keyWord">
                <input type="submit" name="search" value="Tìm kiếm">
            </form>

            <div>
                <?php if (isset($_SESSION['user'])) {
                    extract($_SESSION['user']);
                ?>

                    <h2>Xin chào <?= $ho_va_ten ?></h2>
                    <a href="index.php?act=my_order">Đơn hàng của tôi</a>
                    <a href="index.php?act=forgot_password">Quên mật khẩu</a>
                    <?php if ($vai_tro == 1) { ?>
                        <a href="view/admin/index.php?act=dashboard">Trang quản trị</a>
                    <?php } ?>
                    <a href="index.php?act=update_information">Cập nhật thông tin</a>
                    <a href="index.php?act=logout">Đăng xuất</a>
                <?php } else { ?>
                    <a href="index.php?act=login">Đăng nhập</a>
                    <a href="index.php?act=register">Đăng ký</a>
                <?php } ?>
            </div>

            <a href="index.php?act=cart">Giỏ hàng</a>
        </ul>
    </header>