<div class="title">
    <h1>Thêm Mới Sản Phẩm</h1>
</div>

<form action="index.php?act=add_product" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="">Mã sản phẩm</label>
        <input type="text" name="san_pham_id" disabled placeholder="Tự tăng">
    </div>

    <div class="form-group">
        <label for="">Tên sản phẩm</label>
        <input type="text" name="ten_san_pham" placeholder="Nhập tên sản phẩm....">
    </div>

    <div class="form-group">
        <label for="">Giá sản phẩm</label>
        <input type="number" name="gia" placeholder="Nhập giá sản phẩm....">
    </div>

    <div class="form-group">
        <label for="">Hình</label>
        <input type="file" name="hinh" placeholder="Chọn ảnh sản phẩm....">
    </div>

    <div class="form-group">
        <label for="">Ngày nhập</label>
        <input type="date" name="ngay_nhap" pattern="\d{4}/\d{2}/\d{2}" required>
    </div>

    <div class="form-group">
        <label for="">Danh mục</label>
        <select name="danh_muc_id">
            <?php
            foreach ($ListCategory as $Category) {
                extract($Category);
                echo '<option value="' . $danh_muc_id . '">' . $ten_danh_muc . '</option>';
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="">Mô tả</label>
        <textarea name="mo_ta" cols="30" rows="10" placeholder="Nhập mô tả..."></textarea>
    </div>




    <div class="form-group">
        <input type="submit" name="btn_add_product" value="Thêm mới">
        <input type="reset" name="btn_reset" value="Nhập lại">
        <a href="index.php?act=list_product"><input type="button" value="Danh Sách"></a>
    </div>
    <?php
    if (isset($msg) && ($msg != "")) echo $msg
    ?>
</form>