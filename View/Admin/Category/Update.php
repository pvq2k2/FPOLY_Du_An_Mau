<?php
if (is_array($Category)) {
    extract($Category);
}
?>

<div class="title">
    <h1>Sửa Danh Mục</h1>
</div>

<form action="index.php?act=update_category" method="post">

    <div class="form-group">
        <label for="">Mã danh mục</label>
        <input type="text" name="danh_muc_id" disabled placeholder="Tự tăng" value="<?php if (isset($danh_muc_id) && ($danh_muc_id > 0)) echo $danh_muc_id; ?>">
    </div>

    <div class="form-group">
        <label for="">Tên danh mục</label>
        <input type="text" name="ten_danh_muc" placeholder="Nhập tên danh mục...." value="<?php if (isset($ten_danh_muc) && ($ten_danh_muc != "")) echo $ten_danh_muc; ?>">
    </div>

    <div class="form-group">
        <input type="hidden" name="danh_muc_id" value="<?php if (isset($danh_muc_id) && ($danh_muc_id > 0)) echo $danh_muc_id; ?>">
        <input type="submit" name="btn_update_category" value="Cập nhật">
        <input type="reset" name="btn_reset" value="Nhập lại">
        <a href="index.php?act=list_category"><input type="button" value="Danh Sách"></a>
    </div>
    <?php
    if (isset($msg) && ($msg != "")) echo $msg
    ?>
</form>