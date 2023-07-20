<?php
function CreateCategory($ten_danh_muc)
{
    $sql = "INSERT INTO danh_muc(ten_danh_muc) VALUES('$ten_danh_muc')";
    pdo_execute($sql);
}

function GetAllCategory()
{
    $sql = "SELECT * FROM danh_muc ORDER BY danh_muc_id DESC";
    return pdo_query($sql);
}

function GetOneCategory($danh_muc_id)
{
    $sql = "SELECT * FROM danh_muc WHERE danh_muc_id=" . $danh_muc_id;
    return pdo_query_one($sql);
}

function UpdateCategory($danh_muc_id, $ten_danh_muc)
{
    $sql = "UPDATE danh_muc SET ten_danh_muc = '$ten_danh_muc' WHERE danh_muc_id=" . $danh_muc_id;
    pdo_execute($sql);
}

function RemoveCategory($danh_muc_id)
{
    $sql = "DELETE FROM danh_muc WHERE danh_muc_id=" . $danh_muc_id;
    pdo_query($sql);
}
