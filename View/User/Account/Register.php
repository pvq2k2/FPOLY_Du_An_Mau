<div class="title">
    <h1>Đăng ký tài khoản</h1>
</div>

<form action="index.php?act=register" method="post">

    <div class="form-group">
        <label for="">Họ và tên</label>
        <input type="text" name="ho_va_ten" placeholder="Nhập họ và tên....">
    </div>
    <div class="form-group">
        <label for="">Email</label>
        <input type="email" name="email" placeholder="Nhập email....">
    </div>
    <div class="form-group">
        <label for="">Mật khẩu</label>
        <input type="password" name="mat_khau" placeholder="Nhập mật khẩu....">
    </div>


    <div class="form-group">
        <input type="submit" name="btn_register" value="Tạo tài khoản">
        <a href="index.php?act=login"><input type="button" value="Đăng nhập"></a>
    </div>
    <?php
    if (isset($msg) && ($msg != "")) echo $msg
    ?>
</form>