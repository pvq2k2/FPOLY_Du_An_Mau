<form action="index.php?act=check_out" method="post">
    <div class="form-box">
        <h2>Thông tin đặt hàng</h2>
        <?php
        if (isset($_SESSION['user'])) {
            $tai_khoan_id = $_SESSION['user']['tai_khoan_id'];
            $ho_va_ten = $_SESSION['user']['ho_va_ten'];
            $email = $_SESSION['user']['email'];
            $dia_chi = $_SESSION['user']['dia_chi'];
            $so_dien_thoai = $_SESSION['user']['so_dien_thoai'];
        } else {
            $ho_va_ten = "";
            $email = "";
            $dia_chi = "";
            $so_dien_thoai = "";
        }
        ?>
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
    </div>

    <div class="form-box">
        <div class="form-group">
            <input type="radio" value="0" name="phuong_thuc_thanh_toan" checked>
            <label for="">Thanh toán khi nhận hàng</label>
        </div>
        <div class="form-group">
            <input type="radio" value="1" name="phuong_thuc_thanh_toan">
            <label for="">Thanh toán qua ngân hàng</label>
        </div>
    </div>

    <?php
    if (isset($_SESSION['user'])) {
        if (count($ListProductInCart) > 0) {
            echo '
    <table>
    <tr>
        <th>Tên sản phảm</th>
        <th>Hình</th>
        <th>Giá</th>
        <th>Số lượng</th>
    </tr>
    ';
            $total_amount = 0;
            foreach ($ListProductInCart as $Cart) {
                extract($Cart);
                $formatted_amount = number_format($gia, 0, ',', '.');
                $total_amount += $gia * $so_luong;
                $hinh = $IMG_PATH . "Product/" . $hinh;
                echo '<tr>
            <td>' . $ten_san_pham . '</td>
            <td><img src="' . $hinh . '" width="100"></td>
            <td>' . $formatted_amount . 'đ</td>
            <td>' . $so_luong . '</td>
        </tr>';
            }
            $formatted_total_amount = number_format($total_amount, 0, ',', '.');
            echo '</table>
            <input type="hidden" name="tong_tien" value="' . $total_amount . '">
            <input type="hidden" name="tai_khoan_id" value="' . $tai_khoan_id . '">
    <h2>Tổng tiền: ' . $formatted_total_amount . 'đ</h2>';
        } else {
            echo '<h1>Không có sản phẩm nào</h1>';
        }
    } else {
        echo '<h1>Không có sản phẩm nào</h1>';
    }
    ?>


    <div class="form-group">
        <input type="submit" value="Đặt hàng" name="btn_check_out">
    </div>
</form>