<?php

/**
 * Thống kê tài khoản bình luận nhiều nhất 
 * @return array trả về một mảng gồm (tai_khoan_id, ho_va_ten, hinh, so_luong_binh_luan)
 */
function MostCommentedAccountStatistics()
{
    $sql = "SELECT BL.tai_khoan_id, TK.ho_va_ten, TK.hinh, COUNT(*) AS so_luong_binh_luan
    FROM binh_luan AS BL
    INNER JOIN tai_khoan AS TK ON TK.tai_khoan_id = BL.tai_khoan_id
    GROUP BY tai_khoan_id
    ORDER BY so_luong_binh_luan DESC
    LIMIT 1;";
    return pdo_query($sql);
}

/**
 * Thống kê sản phẩm được bình luận nhiều nhất
 * @return array trả về một mảng gồm (san_pham_id, ten_san_pham, so_luong_binh_luan)
 */
function MostCommentedProductStatistics()
{
    $sql = "SELECT BL.san_pham_id, SP.ten_san_pham, COUNT(*) AS so_luong_binh_luan
    FROM binh_luan AS BL
    INNER JOIN san_pham AS SP ON SP.san_pham_id = BL.san_pham_id
    GROUP BY san_pham_id
    ORDER BY so_luong_binh_luan DESC
    LIMIT 1;";
    return pdo_query($sql);
}

/**
 * Thống kê tổng số lượng bình luận
 * @return array trả về một mảng gồm (so_luong_binh_luan)
 */
function StatisticsOfTheTotalNumberOfComments()
{
    $sql = "SELECT COUNT(*) AS so_luong_binh_luan FROM binh_luan";
    return pdo_query($sql);
}

/**
 * Thống kê sản phẩm có số lượng xem nhiều nhất
 * @return array trả về một mảng gồm (ten_san_pham, gia, hinh, so_luot_xem)
 */
function ProductStatisticsWithTheMostViews()
{
    $sql = "SELECT ten_san_pham, gia, hinh, so_luot_xem 
    FROM san_pham
    ORDER BY so_luot_xem DESC
    LIMIT 1";
    return pdo_query($sql);
}

/**
 * Thống kê các sản phẩm có ngày nhập mới nhất
 * @return array trả về danh sách mảng gồm (san_pham_id, ten_san_pham, ngay_nhap)
 */
function StatisticsOfProductsWithTheLatestImportDate()
{
    $sql = "SELECT san_pham_id, ten_san_pham, ngay_nhap
    FROM san_pham
    WHERE ngay_nhap = (
        SELECT MAX(ngay_nhap) 
        FROM san_pham
    );";
    return pdo_query($sql);
}

/**
 * Thống kê sản phẩm được mua nhiều nhất
 * @return array trả về một mảng gồm (ten_san_pham, gia, hinh, so_luot_mua)
 */
function MostPurchasedProductStatistics()
{
    $sql = "SELECT SP.ten_san_pham, SP.gia, SP.hinh, COUNT(*) so_luot_mua 
    FROM chi_tiet_don_hang AS CTDH
    LEFT JOIN san_pham AS SP ON SP.san_pham_id = CTDH.san_pham_id
    GROUP BY SP.ten_san_pham, SP.gia, SP.hinh
    ORDER BY so_luot_mua DESC
    LIMIT 1";
    return pdo_query($sql);
}

/**
 * Thống kê số lượng người dùng
 * @return array trả về một mảng gồm (so_luong_nguoi_dung)
 */
function StatisticsOnTheNumberOfUsers()
{
    $sql = "SELECT COUNT(*) AS so_luong_nguoi_dung FROM tai_khoan";
    return pdo_query($sql);
}

/**
 * Thống kê số lượng đơn hàng
 * @return array trả về một mảng gồm (so_luong_don_hang)
 */
function OrderQuantityStatistics()
{
    $sql = "SELECT COUNT(*) AS so_luong_don_hang FROM don_hang";
    return pdo_query($sql);
}

/**
 * Thống kê tổng doanh thu
 * @return array trả về một mảng gồm (tong_doanh_thu)
 */
function TotalRevenueStatistics()
{
    $sql = "SELECT SUM(tong_tien) AS tong_doanh_thu FROM don_hang WHERE trang_thai = 4";
    return pdo_query($sql);
}

/**
 * Thống kê số lượng sản phẩm trong danh mục
 * @return array trả về danh sách mảng gồm (ten_danh_muc, so_luong_san_pham)
 */
function StatisticsOnTheNumberOfProductsInTheCategory()
{
    $sql = "SELECT DM.ten_danh_muc, COUNT(SP.san_pham_id) AS so_luong_san_pham 
    FROM danh_muc AS DM
    LEFT JOIN san_pham AS SP ON SP.danh_muc_id = DM.danh_muc_id
    GROUP BY DM.ten_danh_muc";
    return pdo_query($sql);
}
