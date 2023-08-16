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

function GetAllOrder($keyWord, $trang_thai, $ngay_bat_dau, $ngay_ket_thuc)
{
    $sql = "SELECT * FROM don_hang WHERE 1";
    if ($keyWord != '') {
        $sql .= " AND ho_va_ten LIKE '%" . $keyWord . "%'";
    }
    if ($trang_thai > 0) {
        $sql .= " AND trang_thai = '" . $trang_thai . "'";
    }
    if ($ngay_bat_dau != '' && $ngay_ket_thuc != '') {
        $sql .= " AND ngay_dat BETWEEN '" . $ngay_bat_dau . "' AND '" . $ngay_ket_thuc . "'";
    }
    $sql .= " ORDER BY don_hang_id DESC";
    return pdo_query($sql);
}

function UpdateOrder(
    $don_hang_id,
    $ho_va_ten,
    $email,
    $dia_chi,
    $so_dien_thoai,
    $trang_thai
) {
    $sql = "UPDATE don_hang SET 
    ho_va_ten = '$ho_va_ten', email = '$email', 
    dia_chi = '$dia_chi', so_dien_thoai = '$so_dien_thoai', 
    trang_thai = '$trang_thai' 
    WHERE don_hang_id = '$don_hang_id'";
    pdo_execute($sql);
}

function RemoveOrder($don_hang_id)
{
    $sql = "DELETE FROM don_hang WHERE don_hang_id=" . $don_hang_id;
    pdo_query($sql);
}
