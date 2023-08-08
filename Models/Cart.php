<?php
function AddToCart($tai_khoan_id, $san_pham_id, $so_luong)
{
    $sql = "INSERT INTO gio_hang(tai_khoan_id, san_pham_id, so_luong) VALUES('$tai_khoan_id', '$san_pham_id', '$so_luong')";
    pdo_execute($sql);
}

function GetQuantityCart($tai_khoan_id)
{
    $sql = "SELECT SUM(so_luong) AS tong_so_luong
    FROM gio_hang
    WHERE tai_khoan_id =" . $tai_khoan_id;
    return pdo_query_one($sql);
}


function UpdateQuantityProductExistInCart($gio_hang_id, $so_luong)
{
    $sql = "UPDATE gio_hang SET so_luong = so_luong + '" . $so_luong . "' WHERE gio_hang_id=" . $gio_hang_id;
    pdo_execute($sql);
}

function UpdateQuantityProductInCart($gio_hang_id, $so_luong)
{
    $sql = "UPDATE gio_hang SET so_luong = '" . $so_luong . "' WHERE gio_hang_id=" . $gio_hang_id;
    pdo_execute($sql);
}

function FindProductInCart($tai_khoan_id, $san_pham_id)
{
    $sql = "SELECT * FROM gio_hang WHERE tai_khoan_id = '" . $tai_khoan_id . "' AND san_pham_id =" . $san_pham_id;
    return pdo_query($sql);
}

function GetAllProductsWhereCartExist($tai_khoan_id)
{
    $sql = "SELECT SP.san_pham_id, SP.ten_san_pham, SP.hinh, SP.gia, GH.gio_hang_id, GH.so_luong
    FROM gio_hang AS GH
    INNER JOIN san_pham AS SP ON SP.san_pham_id = GH.san_pham_id
    WHERE GH.tai_khoan_id = '" . $tai_khoan_id . "'
    GROUP BY SP.san_pham_id, SP.ten_san_pham, SP.hinh, SP.gia";
    return pdo_query($sql);
}

function RemoveProductInCart($gio_hang_id)
{
    $sql = "DELETE FROM gio_hang WHERE gio_hang_id=" . $gio_hang_id;
    pdo_query($sql);
}
