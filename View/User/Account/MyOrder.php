<?php
if (isset($_SESSION['user'])) {
    if (is_array($ListOrder) && count($ListOrder) > 0) {
        echo '
    <table>
    <tr>
        <th>Đơn hàng ID</th>
        <th>Ngày đặt</th>
        <th>Tổng tiền</th>
        <th>Trạng thái</th>
        <th>Hành động</th>
    </tr>
    ';
        foreach ($ListOrder as $Order) {
            extract($Order);
            echo '<tr>
            <td>' . $don_hang_id . '</td>
            <td>' . $ngay_dat . '</td>
            <td>' . FormatPrice($tong_tien) . 'đ</td>
            <td> ' . FormatOrderStatus($trang_thai) . '</td>
            <td>
                <a href="index.php?act=order_detail&id=' . $don_hang_id . '">Chi tiết</a>
            </td>
        </tr>';
        }
        echo '</table>';
    } else {
        echo '<h1>Không có đơn hàng nào</h1>';
    }
} else {
    echo '<h1>Không có đơn hàng nào</h1>';
}
