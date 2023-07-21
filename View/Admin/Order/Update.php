<?php
if (is_array($Order)) {
    extract($Order);
}
?>
<div class="title">
    <h1>Cập nhật đơn hàng</h1>
</div>
<form action="index.php?act=update_order" method="post">
    <div class="form-group">
        <label for="">Người đặt hàng</label>
        <input type="text" name="ho_va_ten" placeholder="Nhập họ và tên...." value="<?= $ho_va_ten ?>">
    </div>

    <div class="form-group">
        <label for="">Email</label>
        <input type="email" name="email" placeholder="Nhập email...." value="<?= $email ?>">
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
        <label for="">Trạng thái</label>
        <select name="trang_thai">
            <option value="1" <?php echo $trang_thai == 1 ? 'selected' : '' ?>>Chờ xác nhận</option>
            <option value="2" <?php echo $trang_thai == 2 ? 'selected' : '' ?>>Đang xử lý</option>
            <option value="3" <?php echo $trang_thai == 3 ? 'selected' : '' ?>>Đang giao hàng</option>
            <option value="4" <?php echo $trang_thai == 4 ? 'selected' : '' ?>>Thành công</option>
        </select>
    </div>
    <?php
    if (isset($msg) && ($msg != "")) echo $msg;
    ?>
    <div class="form-group">
        <input type="hidden" name="don_hang_id" value="<?= $don_hang_id ?>">
        <input type="submit" value="Cập nhật" name="btn_update_order">
        <a href="index.php?act=list_order"><input type="button" value="Danh Sách"></a>
    </div>
</form>