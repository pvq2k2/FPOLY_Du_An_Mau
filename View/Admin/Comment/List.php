<div class="title">
    <h1>Danh Sách Sảm Phẩm Có Bình Luận</h1>
</div>
<form action="index.php?act=list_product_comment" method="post">
    <input type="text" name="keyWord" placeholder="Nhập tên sản phẩm...">
    <select name="danh_muc_id">
        <option value="0" selected>Tất cả</option>
        <?php
        foreach ($ListCategory as $Category) {
            extract($Category);
            echo '<option value="' . $danh_muc_id . '">' . $ten_danh_muc . '</option>';
        }
        ?>
    </select>
    <input type="submit" name="btn_filler_product" value="Lọc">
</form>
<div class="box-table">
    <table>
        <tr>
            <th></th>
            <th>ID Sản Phẩm</th>
            <th>Tên Sản Phẩm</th>
            <th>Hình</th>
            <th>Giá</th>
            <th>Số lượng bình luận</th>
            <th>Hành động</th>
        </tr>
        <?php
        foreach ($ListProduct as $Product) {
            extract($Product);
            $URLDetailComment = "index.php?act=detail_product_comment&id=" . $san_pham_id;
            $hinhPath = "../../Upload/Product/" . $hinh;
            $formatted_amount = number_format($gia, 0, ',', '.');
            if (is_file($hinhPath)) {
                $hinh = "<img src='" . $hinhPath . "' height=80 >";
            } else {
                $hinh = "No Photo";
            }
            echo /*html*/ '<tr>
                <td><input type="checkbox" name="" id=""></td>
                <td>' . $san_pham_id . '</td>
                <td>' . $ten_san_pham . '</td>
                <td>' . $hinh . '</td>
                <td>' . $formatted_amount . 'đ</td>
                <td>' . $so_luong_binh_luan . '</td>
                <td>
                    <a href="' . $URLDetailComment . '"><input type="button" value="Chi tiết"></a>
                </td>
            </tr>';
        }
        ?>

    </table>
    <div class="box-btn">
        <input type="button" value="Chọn tất cả">
        <input type="button" value="Chọn tất cả">
        <input type="button" value="Xóa các mục đã chọn">
        <a href="index.php?act=add_product"><input type="button" value="Thêm mới"></a>
    </div>
</div>