<?php
if (isset($Order) && (is_array($Order))) {
    extract($Order);
} else {
    header("Location: index.php");
}
if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
    extract($_SESSION['user']);
} else {
    header("Location: index.php");
}
if (!isset($ListOrderDetail) && (!is_array($ListOrderDetail))) {
    header("Location: index.php");
}
?>
<h1>Cảm ơn quý khách đã đặt hàng</h1>
<div class="info_order">
    <h2>Thông tin đơn hàng</h2>
    <span>Đơn hàng ID: <?= $don_hang_id ?></span>
    <span>Ngày đặt: <?= $ngay_dat ?></span>
    <span>Tổng tiền: <?= $tong_tien ?></span>
    <span>Phương thức thanh toán: <?= $phuong_thuc_thanh_toan ?></span>
</div>
<div class="info_user">
    <h2>Thông tin người đặt</h2>
    <span>Họ và tên: <?= $ho_va_ten ?></span>
    <span>Số điện thoại: <?= $so_dien_thoai ?></span>
    <span>Dịa chỉ: <?= $dia_chi ?></span>
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
            $formatted_amount = number_format($gia, 0, ',', '.');
            $hinh = $IMG_PATH . "Product/" . $hinh;
            echo '<tr>
                <td>' . $ten_san_pham . '</td>
                <td><img src="' . $hinh . '" width="100"></td>
                <td>' . $formatted_amount . 'đ</td>
                <td>' . $so_luong . '</td>
            </tr>';
        }
        ?>
    </table>
    <a href="index.php">Trang chủ</a>
    <a href="index.php?act=my_order">Đơn hàng của tôi</a>
</div>