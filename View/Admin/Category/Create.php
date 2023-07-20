<div class="title">
    <h1>Thêm Mới Danh Mục</h1>
</div>

<form action="index.php?act=add_category" method="post">

    <div class="form-group">
        <label for="">Mã danh mục</label>
        <input type="text" name="danh_muc_id" disabled placeholder="Tự tăng">
    </div>

    <div class="form-group">
        <label for="">Tên danh mục</label>
        <input type="text" name="ten_danh_muc" placeholder="Nhập tên danh mục....">
    </div>

    <div class="form-group">
        <input type="submit" name="btn_add_category" value="Thêm mới">
        <input type="reset" name="btn_reset" value="Nhập lại">
        <a href="index.php?act=list_category"><input type="button" value="Danh Sách"></a>
    </div>
    <?php
    if (isset($msg) && ($msg != "")) echo $msg
    ?>
</form>