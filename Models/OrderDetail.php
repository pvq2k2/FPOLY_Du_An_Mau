<?php
function CreateOrderDetail($don_hang_id, $san_pham_id, $so_luong, $gia, $tong_tien)
{
    $sql = "INSERT INTO chi_tiet_don_hang(don_hang_id, san_pham_id, so_luong, gia, tong_tien) VALUES('$don_hang_id', '$san_pham_id', '$so_luong', '$gia', '$tong_tien')";
    pdo_execute($sql);
}

function GetAllProductsWhereOrderExist($don_hang_id)
{
    $sql = "SELECT SP.san_pham_id, SP.ten_san_pham, SP.hinh, SP.gia, CTDH.chi_tiet_don_hang_id, CTDH.so_luong
    FROM chi_tiet_don_hang AS CTDH
    INNER JOIN san_pham AS SP ON SP.san_pham_id = CTDH.san_pham_id
    WHERE CTDH.don_hang_id = '" . $don_hang_id . "'
    GROUP BY SP.san_pham_id, SP.ten_san_pham, SP.hinh, SP.gia";
    return pdo_query($sql);
}

function GetAllProductByOrderID($don_hang_id)
{
    $sql = "SELECT * FROM chi_tiet_don_hang WHERE don_hang_id = " . $don_hang_id;
    return pdo_query($sql);
}

function RemoveOrderDetail($chi_tiet_don_hang_id)
{
    $sql = "DELETE FROM chi_tiet_don_hang WHERE chi_tiet_don_hang_id=" . $chi_tiet_don_hang_id;
    pdo_query($sql);
}
