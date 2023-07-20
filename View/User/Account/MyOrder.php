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
            $formatted_amount = number_format($tong_tien, 0, ',', '.');
            $status =  "";
            switch ($trang_thai) {
                case 0:
                    $status = "Chờ xác nhận";
                    break;
                case 1:
                    $status = "Đang xử lý";
                    break;
                case 2:
                    $status = "Đang giao hàng";
                    break;
                case 3:
                    $status = "Thành công";
                    break;
            }
            echo '<tr>
            <td>' . $don_hang_id . '</td>
            <td>' . $ngay_dat . '</td>
            <td>' . $formatted_amount . 'đ</td>
            <td> ' . $status . '</td>
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
