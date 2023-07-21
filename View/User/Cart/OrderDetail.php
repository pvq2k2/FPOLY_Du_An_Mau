<a href="index.php?act=my_order">Quay lại</a>
<div class="info_order">
    <h2>Thông tin đơn hàng</h2>
    <span>Đơn hàng ID: <?= $Order['don_hang_id'] ?></span>
    <span>Ngày đặt: <?= $Order['ngay_dat'] ?></span>
    <span>Tổng tiền: <?= FormatPrice($Order['tong_tien']) ?></span>
    <span>Phương thức thanh toán: <?= FormatPaymentMethods($Order['phuong_thuc_thanh_toan']) ?></span>
</div>

<div class="info_cart">
    <h2>Thông tin giỏ hàng</h2>
    <table>
        <tr>
            <th>Tên sản phảm</th>
            <th>Hình</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Hành động</th>
        </tr>
        <?php
        foreach ($ListOrderDetail as $Product) {
            extract($Product);
            $hinh = $IMG_PATH . "Product/" . $hinh;
            echo '<tr>
                <td>' . $ten_san_pham . '</td>
                <td><img src="' . $hinh . '" width="100"></td>
                <td>' . FormatPrice($gia) . 'đ</td>
                <td>' . $so_luong . '</td>
            </tr>';
        }
        ?>
    </table>
</div>