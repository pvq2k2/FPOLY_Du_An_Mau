<?php
function Register($ho_va_ten, $email, $mat_khau)
{
    $sql = "INSERT INTO tai_khoan(ho_va_ten, email, mat_khau) VALUES('$ho_va_ten', '$email', '$mat_khau')";
    pdo_execute($sql);
}

function Login($email, $mat_khau)
{
    $sql = "SELECT * FROM tai_khoan WHERE email='" . $email . "' AND mat_khau='" . $mat_khau . "'";
    return pdo_query_one($sql);
}

function ForgotPassword($email)
{
    $sql = "SELECT * FROM tai_khoan WHERE email='" . $email . "'";
    return pdo_query_one($sql);
}

function UserUpdate($tai_khoan_id, $ho_va_ten, $email, $so_dien_thoai, $dia_chi)
{
    $sql = "UPDATE tai_khoan SET ho_va_ten = '$ho_va_ten', email = '$email', so_dien_thoai = '$so_dien_thoai', dia_chi = '$dia_chi' WHERE tai_khoan_id=" . $tai_khoan_id;
    pdo_execute($sql);
}

function GetAllUser()
{
    $sql = "SELECT * FROM tai_khoan ORDER BY tai_khoan_id DESC";
    return pdo_query($sql);
}

function RemoveUser($tai_khoan_id)
{
    $sql = "DELETE FROM tai_khoan WHERE tai_khoan_id=" . $tai_khoan_id;
    pdo_query($sql);
}

function CreateUser(
    $ho_va_ten,
    $email,
    $mat_khau,
    $dia_chi,
    $so_dien_thoai,
    $gioi_tinh,
    $hinh,
    $vai_tro
) {
    $sql = "INSERT INTO 
    tai_khoan(ho_va_ten, email, mat_khau, dia_chi, so_dien_thoai, gioi_tinh, hinh, vai_tro) 
    VALUES('$ho_va_ten', '$email', '$mat_khau', '$dia_chi', '$so_dien_thoai', '$gioi_tinh', '$hinh', '$vai_tro')";
    pdo_execute($sql);
}

function GetOneUser($tai_khoan_id)
{
    $sql = "SELECT * FROM tai_khoan WHERE tai_khoan_id=" . $tai_khoan_id;
    return pdo_query_one($sql);
}

function UpdateUser(
    $tai_khoan_id,
    $ho_va_ten,
    $email,
    $mat_khau,
    $dia_chi,
    $so_dien_thoai,
    $gioi_tinh,
    $hinh,
    $vai_tro
) {
    $sql = "UPDATE tai_khoan SET 
     ho_va_ten = '$ho_va_ten',
     email = '$email', 
     mat_khau = '$mat_khau', 
     dia_chi = '$dia_chi', 
     so_dien_thoai = '$so_dien_thoai', 
     gioi_tinh = '$gioi_tinh', 
     hinh = '$hinh', 
     vai_tro = '$vai_tro' 
     WHERE tai_khoan_id=" . $tai_khoan_id;
    pdo_execute($sql);
}
