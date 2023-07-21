<?php
function FormatPrice($price)
{
    return number_format($price, 0, ',', '.') . "đ";
}
function FormatPaymentMethods($phuong_thuc_thanh_toan)
{
    switch ($phuong_thuc_thanh_toan) {
        case 1:
            return "Thanh toán khi nhận hàng";
            break;
        case 2:
            return "Thanh toán qua ngân hàng";
            break;
    }
}
function FormatOrderStatus($trang_thai)
{
    switch ($trang_thai) {
        case 1:
            return "Chờ xác nhận";
            break;
        case 2:
            return "Đang xử lý";
            break;
        case 3:
            return "Đang giao hàng";
            break;
        case 4:
            return "Thành công";
            break;
    }
}
