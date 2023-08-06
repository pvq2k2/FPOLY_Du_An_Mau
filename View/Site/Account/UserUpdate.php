<div class="title">
    <h1>Cập nhật tài khoản</h1>
</div>

<?php if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) extract($_SESSION['user']); ?>

<form action="index.php?act=update_information" method="post">

    <div class="form-group">
        <label for="">Họ và tên</label>
        <input type="text" name="ho_va_ten" placeholder="Nhập họ và tên...." value="<?= $ho_va_ten ?>">
    </div>
    <div class="form-group">
        <label for="">Email</label>
        <input type="email" name="email" placeholder="Nhập email...." value="<?= $email ?>">
    </div>
    <div class="form-group">
        <label for="">Số điện thoại</label>
        <input type="text" name="so_dien_thoai" placeholder="Nhập số điện thoại...." value="<?= $so_dien_thoai ?>">
    </div>

    <div class="form-group">
        <label for="">Địa chỉ</label>
        <input type="text" name="dia_chi" placeholder="Nhập địa chỉ...." value="<?= $dia_chi ?>">
    </div>

    <div class="form-group">
        <input type="hidden" name="tai_khoan_id" value="<?= $tai_khoan_id ?>">
        <input type="submit" name="btn_update_information" value="Cập nhật tài khoản">
    </div>
    <?php
    if (isset($msg) && ($msg != "")) echo $msg
    ?>
</form>