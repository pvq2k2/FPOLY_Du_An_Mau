<div class="title">
    <h1>Quên mật khẩu</h1>
</div>

<form action="index.php?act=forgot_password" method="post">
    <div class="form-group">
        <label for="">Email</label>
        <input type="email" name="email" placeholder="Nhập email....">
    </div>
    <div class="form-group">
        <input type="submit" name="btn_forgot_password" value="Quên mật khẩu">
    </div>
    <?php
    if (isset($msg) && ($msg != "")) echo $msg
    ?>
</form>