<div class="title">
    <h1>Đăng Nhập</h1>
</div>

<form action="index.php?act=login" method="post">
    <div class="form-group">
        <label for="">Email</label>
        <input type="email" name="email" placeholder="Nhập email....">
    </div>
    <div class="form-group">
        <label for="">Mật khẩu</label>
        <input type="password" name="mat_khau" placeholder="Nhập mật khẩu....">
    </div>

    <div class="form-group">
        <input type="submit" name="btn_login" value="Đăng nhập">
        <a href="index.php?act=register"><input type="button" value="Đăng ký"></a>
    </div>
    <?php
    if (isset($msg) && ($msg != "")) echo $msg
    ?>
</form>