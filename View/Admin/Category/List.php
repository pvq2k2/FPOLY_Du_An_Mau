<div class="title">
    <h1>Danh Sách Danh Mục</h1>
</div>

<div class="box-table">
    <table>
        <tr>
            <th></th>
            <th>ID Danh mục</th>
            <th>Tên danh mục</th>
            <th></th>
        </tr>
        <?php
        foreach ($ListCategory as $Category) {
            extract($Category);
            $URLGetUpdateCategory = "index.php?act=get_update_category&id=" . $danh_muc_id;
            $URLRemoveCategory = "index.php?act=remove_category&id=" . $danh_muc_id;
            echo /*html*/ '<tr>
                <td><input type="checkbox" name="" id=""></td>
                <td>' . $danh_muc_id . '</td>
                <td>' . $ten_danh_muc . '</td>
                <td>
                    <a href="' . $URLGetUpdateCategory . '"><input type="button" value="Sửa"></a>
                    <a href="' . $URLRemoveCategory . '"><input type="button" value="Xóa"></a>
                </td>
            </tr>';
        }
        ?>

    </table>
    <div class="box-btn">
        <input type="button" value="Chọn tất cả">
        <input type="button" value="Chọn tất cả">
        <input type="button" value="Xóa các mục đã chọn">
        <a href="index.php?act=add_category"><input type="button" value="Thêm mới"></a>
    </div>
</div>