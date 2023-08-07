<?php
include "../../Models/pdo.php";
include "../../Models/Product.php";
include "../../Models/User.php";
include "../../Models/Cart.php";
include "../../Models/Order.php";
include "../../Models/OrderDetail.php";
include "../../Helper/FormatHelper.php";
include "../../Global.php";

if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'dashboard':
            if (isset($_SESSION['user'])) {
                $ListOrder = GetAllOrderByUserID($_SESSION['user']['tai_khoan_id']);
            }
            include "../../View/User/Layout/Home.php";
            break;

        case 'update_information':
            if (isset($_POST['btn_update_information']) && ($_POST['btn_update_information'])) {
                $TaiKhoanId = $_POST['tai_khoan_id'];
                $HoVaTen = $_POST['ho_va_ten'];
                $Email = $_POST['email'];
                $SoDienThoai = $_POST['so_dien_thoai'];
                $DiaChi = $_POST['dia_chi'];

                if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
                    UserUpdate($TaiKhoanId, $HoVaTen, $Email, $SoDienThoai, $DiaChi);
                    extract($_SESSION['user']);
                    $_SESSION['user'] = Login($Email, $mat_khau);
                    $msg = "Cập nhật thành công";
                    header('Location: index.php?act=update_information');
                }
            }
            include "../../View/User/Account/UserUpdate.php";
            break;

        case 'my_order':
            if (isset($_SESSION['user'])) {
                $ListOrder = GetAllOrderByUserID($_SESSION['user']['tai_khoan_id']);
            }
            include "../../View/Site/Account/MyOrder.php";
            break;

        case 'order_detail':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $Order = GetOneOrder($_GET['id']);
                $ListOrderDetail = GetAllProductsWhereOrderExist($_GET['id']);
            }
            include "../../View/User/Cart/OrderDetail.php";

        default:
            include "../../View/Site/404.php";
            break;
    }
} else {
    echo '<script> window.location.href = "' . $ROOT_URL . 'View/User/index.php?act=dashboard"; </script>';
}
