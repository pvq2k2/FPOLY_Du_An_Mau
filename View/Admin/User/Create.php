<div class="title">
    <h1>Thêm Mới Tài Khoản</h1>
</div>

<form action="index.php?act=add_user" method="post">

    <div class="form-group">
        <label for="">Mã tài khoản</label>
        <input type="text" name="danh_muc_id" disabled placeholder="Tự tăng">
    </div>

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
        <label for="">Địa chỉ</label>
        <input type="text" name="dia_chi" placeholder="Nhập địa chỉ....">
    </div>

    <div class="form-group">
        <label for="">Số điện thoại</label>
        <input type="text" name="so_dien_thoai" placeholder="Nhập số điện thoại....">
    </div>

    <div class="form-group">
        <label for="">Vai trò</label>
        <select name="vai_tro">
            <option value="0" selected>User</option>
            <option value="1">Admin</option>
        </select>
    </div>

    <div class="form-group">
        <input type="submit" name="btn_add_user" value="Thêm mới">
        <a href="index.php?act=list_user"><input type="button" value="Danh Sách"></a>
    </div>
    <?php
    if (isset($msg) && ($msg != "")) echo $msg
    ?>
</form>