<?php
if (is_array($Product)) {
    extract($Product);
    $hinhPath = "../../Upload/Product/" . $hinh;
    if (is_file($hinhPath)) {
        $hinh = "<img src='" . $hinhPath . "' height=80 >";
    } else {
        $hinh = "No Photo";
    }
}
?>
<div class="title">
    <h1>Cập Nhật Sản Phẩm</h1>
</div>

<form action="index.php?act=update_product" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="">Mã sản phẩm</label>
        <input type="text" name="san_pham_id" disabled placeholder="Tự tăng" value="<?php if (isset($san_pham_id) && ($san_pham_id > 0)) echo $san_pham_id; ?>">
    </div>

    <div class="form-group">
        <label for="">Tên sản phẩm</label>
        <input type="text" name="ten_san_pham" placeholder="Nhập tên sản phẩm...." value="<?php if (isset($ten_san_pham) && ($ten_san_pham != "")) echo $ten_san_pham; ?>">
    </div>

    <div class="form-group">
        <label for="">Giá sản phẩm</label>
        <input type="number" name="gia" placeholder="Nhập giá sản phẩm...." value="<?php if (isset($gia) && ($gia != "")) echo $gia; ?>">
    </div>

    <div class="form-group">
        <label for="">Hình</label>
        <input type="file" name="hinh" placeholder="Chọn ảnh sản phẩm....">
        <?= $hinh ?>
    </div>

    <div class="form-group">
        <label for="">Ngày nhập</label>
        <input type="date" name="ngay_nhap" pattern="\d{4}/\d{2}/\d{2}" required value="<?php if (isset($ngay_nhap) && ($ngay_nhap != "")) echo $ngay_nhap; ?>">
    </div>

    <div class="form-group">
        <label for="">Danh mục</label>
        <select name="danh_muc_id">
            <?php
            foreach ($ListCategory as $Category) {
                extract($Category);
                if ($danh_muc_id == $danh_muc_id) $s = 'selected';
                else $s = '';
                echo '<option value="' . $danh_muc_id . '" ' . $s . '>' . $ten_danh_muc . '</option>';
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="">Mô tả</label>
        <textarea name="mo_ta" cols="30" rows="10" placeholder="Nhập mô tả..."><?php if (isset($mo_ta) && ($mo_ta != "")) echo $mo_ta; ?></textarea>
    </div>




    <div class="form-group">
        <input type="hidden" name="san_pham_id" value="<?php if (isset($san_pham_id) && ($san_pham_id > 0)) echo $san_pham_id; ?>">
        <input type="submit" name="btn_update_product" value="Cập nhật">
        <input type="reset" name="btn_reset" value="Nhập lại">
        <a href="index.php?act=list_product"><input type="button" value="Danh Sách"></a>
    </div>
    <?php
    if (isset($msg) && ($msg != "")) echo $msg
    ?>
</form>