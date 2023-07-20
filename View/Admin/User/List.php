<div class="title">
    <h1>Danh Sách Tài Khoản</h1>
</div>

<div class="box-table">
    <table>
        <tr>
            <th></th>
            <th>ID tài khoản</th>
            <th>Họ và tên</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Vai trò</th>
            <th></th>
        </tr>
        <?php
        foreach ($ListUser as $User) {
            extract($User);
            $URLGetUpdateUser = "index.php?act=get_update_user&id=" . $tai_khoan_id;
            $URLRemoveUser = "index.php?act=remove_user&id=" . $tai_khoan_id;

            $vai_tro = $vai_tro == 1 ? 'Admin' : 'User';

            echo /*html*/ '<tr>
                <td><input type="checkbox" name="" id=""></td>
                <td>' . $tai_khoan_id . '</td>
                <td>' . $ho_va_ten . '</td>
                <td>' . $email . '</td>
                <td>' . $so_dien_thoai . '</td>
                <td>' . $vai_tro . '</td>
                <td>
                    <a href="' . $URLGetUpdateUser . '"><input type="button" value="Sửa"></a>
                    <a href="' . $URLRemoveUser . '"><input type="button" value="Xóa"></a>
                </td>
            </tr>';
        }
        ?>

    </table>
    <div class="box-btn">
        <input type="button" value="Chọn tất cả">
        <input type="button" value="Chọn tất cả">
        <input type="button" value="Xóa các mục đã chọn">
        <a href="index.php?act=add_user"><input type="button" value="Thêm mới"></a>
    </div>
</div>