<?php
function GetAllCommentByID($keyWord, $san_pham_id)
{
    $sql = "SELECT * FROM binh_luan AS BL WHERE 1";
    if ($keyWord != '') {
        $sql .= " AND noi_dung LIKE '%" . $keyWord . "%'";
    }
    $sql .= " AND BL.san_pham_id = '$san_pham_id' ORDER BY ngay_binh_luan DESC";
    return pdo_query($sql);
}

function GetAllProductsWhereCommentsExist($keyWord, $danh_muc_id)
{
    $sql = "SELECT SP.san_pham_id, SP.ten_san_pham, SP.hinh, SP.gia, COUNT(BL.binh_luan_id) AS so_luong_binh_luan
    FROM san_pham AS SP
    INNER JOIN binh_luan AS BL ON BL.san_pham_id = SP.san_pham_id WHERE 1";
    if ($keyWord != '') {
        $sql .= " AND ten_san_pham LIKE '%" . $keyWord . "%'";
    }
    if ($danh_muc_id > 0) {
        $sql .= " AND danh_muc_id = '" . $danh_muc_id . "'";
    }
    $sql .= " GROUP BY SP.san_pham_id, SP.ten_san_pham, SP.hinh
    HAVING COUNT(BL.binh_luan_id) > 0 
    ORDER BY san_pham_id DESC";
    return pdo_query($sql);
};

function GetOneComment($binh_luan_id)
{
    $sql = "SELECT * FROM binh_luan WHERE binh_luan_id=" . $binh_luan_id;
    return pdo_query_one($sql);
}

function UpdateComment($binh_luan_id, $noi_dung)
{
    $sql = "UPDATE binh_luan SET noi_dung = '$noi_dung' WHERE binh_luan_id=" . $binh_luan_id;
    pdo_execute($sql);
}

function RemoveComment($binh_luan_id)
{
    $sql = "DELETE FROM binh_luan WHERE binh_luan_id=" . $binh_luan_id;
    pdo_query($sql);
}
