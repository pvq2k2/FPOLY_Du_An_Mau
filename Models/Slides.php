<?php
function CreateSlides($san_pham_id, $img, $trang_thai)
{
    $sql = "INSERT INTO slides(san_pham_id, img, trang_thai) VALUES('$san_pham_id', '$img', '$trang_thai')";
    pdo_execute($sql);
}

function GetAllSlides()
{
    $sql = "SELECT * FROM slides ORDER BY slides_id DESC";
    return pdo_query($sql);
}

function GetAllSlidesActive()
{
    $sql = "SELECT * FROM slides WHERE trang_thai = 1 ORDER BY slides_id DESC";
    return pdo_query($sql);
}

function GetOneSlides($slides_id)
{
    $sql = "SELECT * FROM slides WHERE slides_id=" . $slides_id;
    return pdo_query_one($sql);
}

function UpdateSlides($slides_id, $san_pham_id, $img, $trang_thai)
{
    $sql = "UPDATE slides SET san_pham_id = '$san_pham_id', img = '$img', trang_thai = '$trang_thai' WHERE slides_id=" . $slides_id;
    pdo_execute($sql);
}

function RemoveSlides($slides_id)
{
    $sql = "DELETE FROM slides WHERE slides_id=" . $slides_id;
    pdo_query($sql);
}
