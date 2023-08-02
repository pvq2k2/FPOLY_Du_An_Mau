<?php
function CreateSlides($ten_danh_muc)
{
    $sql = "INSERT INTO danh_muc(ten_danh_muc) VALUES('$ten_danh_muc')";
    pdo_execute($sql);
}

function GetAllSlides()
{
    $sql = "SELECT * FROM slides ORDER BY slides_id DESC";
    return pdo_query($sql);
}

function GetOneSlides($danh_muc_id)
{
    $sql = "SELECT * FROM danh_muc WHERE danh_muc_id=" . $danh_muc_id;
    return pdo_query_one($sql);
}

function UpdateSlides($danh_muc_id, $ten_danh_muc)
{
    $sql = "UPDATE danh_muc SET ten_danh_muc = '$ten_danh_muc' WHERE danh_muc_id=" . $danh_muc_id;
    pdo_execute($sql);
}

function RemoveSlides($slides_id)
{
    $sql = "DELETE FROM slides WHERE slides_id=" . $slides_id;
    pdo_query($sql);
}
