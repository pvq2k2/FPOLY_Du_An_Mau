<?php
function CreateOrder(
    $tai_khoan_id,
    $ho_va_ten,
    $dia_chi,
    $so_dien_thoai,
    $email,
    $ngay_dat,
    $tong_tien,
    $phuong_thuc_thanh_toan,
    $trang_thai
) {
    $sql = "INSERT INTO don_hang(
    tai_khoan_id, 
    ho_va_ten, 
    dia_chi,
    so_dien_thoai,
    email,
    ngay_dat, 
    tong_tien, 
    phuong_thuc_thanh_toan, 
    trang_thai) 
    VALUES('$tai_khoan_id', 
    '$ho_va_ten', 
    '$dia_chi',
    '$so_dien_thoai',
    '$email',
    '$ngay_dat', 
    '$tong_tien', 
    '$phuong_thuc_thanh_toan', 
    '$trang_thai')";
    return pdo_execute_return_lastInsertId($sql);
}
function GetOneOrder($don_hang_id)
{
    $sql = "SELECT * FROM don_hang WHERE don_hang_id=" . $don_hang_id;
    return pdo_query_one($sql);
}
function GetAllOrderByUserID($tai_khoan_id)
{
    $sql = "SELECT * FROM don_hang WHERE tai_khoan_id=" . $tai_khoan_id;
    return pdo_query($sql);
}
