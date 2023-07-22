<?php
function CreateProduct($ten_san_pham, $gia, $hinh, $ngay_nhap, $mo_ta, $danh_muc_id)
{
    $sql = "INSERT INTO san_pham(ten_san_pham, gia, hinh, ngay_nhap, mo_ta, danh_muc_id) VALUES('$ten_san_pham', '$gia', '$hinh', '$ngay_nhap', '$mo_ta', '$danh_muc_id')";
    pdo_execute($sql);
}

function GetAllProduct($keyWord, $danh_muc_id)
{
    $sql = "SELECT * FROM san_pham WHERE 1";
    if ($keyWord != '') {
        $sql .= " AND ten_san_pham LIKE '%" . $keyWord . "%'";
    }
    if ($danh_muc_id > 0) {
        $sql .= " AND danh_muc_id = '" . $danh_muc_id . "'";
    }
    $sql .= " ORDER BY san_pham_id DESC";
    return pdo_query($sql);
}

function GetLimitProduct()
{
    $sql = "SELECT * FROM san_pham WHERE 1 ORDER BY san_pham_id DESC LIMIT 0,10";
    return pdo_query($sql);
}

function GetTop10Product()
{
    $sql = "SELECT * FROM san_pham WHERE 1 ORDER BY so_luot_xem DESC LIMIT 0,10";
    return pdo_query($sql);
}

function SimilarProduct($san_pham_id, $danh_muc_id)
{
    $sql = "SELECT * FROM san_pham WHERE danh_muc_id= '" . $danh_muc_id . "' AND san_pham_id <>" . $san_pham_id;
    return pdo_query($sql);
}

function UpdateViewProduct($san_pham_id)
{
    $sql = "UPDATE san_pham SET so_luot_xem = so_luot_xem + 1 WHERE san_pham_id= " . $san_pham_id;
    pdo_execute($sql);
}

function GetOneProduct($san_pham_id)
{
    $sql = "SELECT * FROM san_pham WHERE san_pham_id=" . $san_pham_id;
    return pdo_query_one($sql);
}

function UpdateProduct($san_pham_id, $ten_san_pham, $gia, $hinh, $ngay_nhap, $mo_ta, $danh_muc_id)
{
    if ($hinh == '')
        $sql = "UPDATE san_pham SET ten_san_pham = '$ten_san_pham', gia = '$gia', ngay_nhap = '$ngay_nhap', mo_ta = '$mo_ta', danh_muc_id = '$danh_muc_id'  WHERE san_pham_id=" . $san_pham_id;
    else
        $sql = "UPDATE san_pham SET ten_san_pham = '$ten_san_pham', gia = '$gia', hinh = '$hinh', ngay_nhap = '$ngay_nhap', mo_ta = '$mo_ta', danh_muc_id = '$danh_muc_id'  WHERE san_pham_id=" . $san_pham_id;
    pdo_execute($sql);
}

function RemoveProduct($san_pham_id)
{
    $sql = "DELETE FROM san_pham WHERE san_pham_id=" . $san_pham_id;
    pdo_query($sql);
}
