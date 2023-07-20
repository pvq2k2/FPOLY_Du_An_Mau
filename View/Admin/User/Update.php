<?php
if (is_array($User)) {
    extract($User);
}
?>
<div class="title">
    <h1>Cập nhật tài Khoản</h1>
</div>

<form action="index.php?act=update_user" method="post">

    <div class="form-group">
        <label for="">Mã tài khoản</label>
        <input type="text" name="tai_khoan_id" disabled placeholder="Tự tăng" value="<?= $tai_khoan_id ?>">
    </div>

    <div class="form-group">
        <label for="">Họ và tên</label>
        <input type="text" name="ho_va_ten" placeholder="Nhập họ và tên...." value="<?= $ho_va_ten ?>">
    </div>

    <div class="form-group">
        <label for="">Email</label>
        <input type="email" name="email" placeholder="Nhập email...." value="<?= $email ?>">
    </div>

    <div class="form-group">
        <label for="">Mật khẩu</label>
        <input type="password" name="mat_khau" placeholder="Nhập mật khẩu...." value="<?= $mat_khau ?>">
    </div>

    <div class="form-group">
        <label for="">Địa chỉ</label>
        <input type="text" name="dia_chi" placeholder="Nhập địa chỉ...." value="<?= $dia_chi ?>">
    </div>

    <div class="form-group">
        <label for="">Số điện thoại</label>
        <input type="text" name="so_dien_thoai" placeholder="Nhập số điện thoại...." value="<?= $so_dien_thoai ?>">
    </div>

    <div class="form-group">
        <label for="">Vai trò</label>
        <select name="vai_tro">
            <option value="0" <?php echo $vai_tro == 0 ? 'selected' : '' ?>>User</option>
            <option value="1" <?php echo $vai_tro == 1 ? 'selected' : '' ?>>Admin</option>
        </select>
    </div>

    <div class="form-group">
        <input type="hidden" name="tai_khoan_id" value="<?= $tai_khoan_id ?>">
        <input type="submit" name="btn_update_user" value="Cập nhật">
        <a href="index.php?act=list_user"><input type="button" value="Danh Sách"></a>
    </div>
    <?php
    if (isset($msg) && ($msg != "")) echo $msg
    ?>
</form>