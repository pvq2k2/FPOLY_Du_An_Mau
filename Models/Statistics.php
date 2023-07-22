<?php

/**
 * Thống kê tài khoản bình luận nhiều nhất 
 * @return array trả về một mảng gồm (tai_khoan_id, ho_va_ten, so_luong_binh_luan)
 */
function MostCommentedAccountStatistics()
{
    $sql = "SELECT BL.tai_khoan_id, TK.ho_va_ten, COUNT(*) AS so_luong_binh_luan
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
 * @return int trả về số lượng bình luận
 */
function StatisticsOfTheTotalNumberOfComments()
{
    $sql = "SELECT COUNT(*) AS so_luong_binh_luan FROM binh_luan";
    return pdo_query($sql);
}

/**
 * Thống kê sản phẩm có số lượng xem nhiều nhất
 * @return int trả về số lượng bình luận
 */
function ProductStatisticsWithTheMostViews()
{
    $sql = "SELECT san_pham_id, ten_san_pham, so_luot_xem 
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
 * @return array trả về một mảng gồm (san_pham_id, ten_san_pham, so_luot_mua)
 */
function MostPurchasedProductStatistics()
{
    $sql = "SELECT SP.san_pham_id, SP.ten_san_pham, COUNT(*) so_luong_mua 
    FROM chi_tiet_don_hang AS CTDH
    INNER JOIN san_pham AS SP ON SP.san_phan_id = CTDH.san_pham_id
    GROUP BY SP.san_pham_id, SP.ten_san_pham
    ORDER BY so_luong_mua DESC
    LIMIT 1";
    return pdo_query($sql);
}

/**
 * Thống kê số lượng người dùng
 * @return int trả về số lượng người dùng
 */
function StatisticsOnTheNumberOfUsers()
{
    $sql = "SELECT COUNT(*) AS so_luong_nguoi_dung FROM tai_khoan";
    return pdo_query($sql);
}

/**
 * Thống kê số lượng đơn hàng
 * @return int trả về số lượng đơn hàng
 */
function OrderQuantityStatistics()
{
    $sql = "SELECT COUNT(*) AS so_luong_don_hang FROM don_hang";
    return pdo_query($sql);
}

/**
 * Thống kê tổng doanh thu
 * @return int trả về tổng doanh thu
 */
function TotalRevenueStatistics()
{
    $sql = "SELECT SUM(tong_tien) AS tong_doanh_thu FROM don_hang";
    return pdo_query($sql);
}

/**
 * Thống kê số lượng sản phẩm trong danh mục
 * @return array trả về danh sách mảng gồm (san_pham_id, so_luong_san_pham)
 */
function StatisticsOnTheNumberOfProductsInTheCategory()
{
    $sql = "SELECT DM.ten_danh_muc, COUNT(*) AS so_luong_san_pham 
    FROM danh_muc AS DM
    INNER JOIN san_pham AS SP ON SP.san_pham_id = DM.san_pham_id
    GROUP BY DM.ten_danh_muc";
    return pdo_query($sql);
}
