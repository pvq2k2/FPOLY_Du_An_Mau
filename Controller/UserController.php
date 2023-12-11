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
                $ListOrder = GetLimitOrderByUserID($_SESSION['user']['tai_khoan_id']);
            }
            include "../../View/User/Layout/Home.php";
            break;

        case 'update_information':
            if (isset($_POST['btn_update_information']) && ($_POST['btn_update_information'])) {
                $tai_khoan_id = $_POST['tai_khoan_id'];
                $ho_va_ten = $_POST['ho_va_ten'];
                $email = $_POST['email'];
                $dia_chi = $_POST['dia_chi'];
                $so_dien_thoai = $_POST['so_dien_thoai'];
                $gioi_tinh = $_POST['gioi_tinh'];


                $isExistPhoneNumber = GetUserBySoDienThoai($so_dien_thoai);
                if ($isExistPhoneNumber && $isExistPhoneNumber['tai_khoan_id'] != $tai_khoan_id) {
                    $_SESSION['error_message'] = "Số điện thoại đã được sử dụng!";
                } else {
                    $isExistEmail = GetUserByEmail($email);
                    if ($isExistEmail && $isExistEmail['tai_khoan_id'] != $tai_khoan_id) {
                        $_SESSION['error_message'] = "Email đã được sử dụng!";
                    } else {
                        $hinh = $_FILES['hinh'];
                        if ($hinh['name'] == '') {
                            $hinh = $gioi_tinh == 1 ? "nam.jpg" : "nu.jpg";
                            if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
                                UserUpdate(
                                    $tai_khoan_id,
                                    $ho_va_ten,
                                    $email,
                                    $dia_chi,
                                    $so_dien_thoai,
                                    $gioi_tinh,
                                    $hinh
                                );
                                $_SESSION['user'] = Login($email, $_SESSION['user']['mat_khau']);
                                echo '<script> setTimeout(() => {window.location.href = "' . $ROOT_URL . 'View/User/index.php?act=update_information";}, 1000); </script>';
                                $_SESSION['success_message'] = "Cập nhật tài khoản thành công";
                            }
                        } else {
                            $UPLOAD_DIR = '../../Upload/User/';
                            $isUploadFile = UploadImage($hinh, $UPLOAD_DIR);
                            if ($isUploadFile[1]) {
                                if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
                                    UserUpdate(
                                        $tai_khoan_id,
                                        $ho_va_ten,
                                        $email,
                                        $dia_chi,
                                        $so_dien_thoai,
                                        $gioi_tinh,
                                        $isUploadFile[2]
                                    );
                                    $_SESSION['user'] = Login($email, $_SESSION['user']['mat_khau']);
                                    echo '<script> setTimeout(() => {window.location.href = "' . $ROOT_URL . 'View/User/index.php?act=update_information";}, 1000); </script>';
                                    $_SESSION['success_message'] = "Cập nhật tài khoản thành công";
                                }
                            } else {
                                $_SESSION['error_message'] = $isUploadFile[0];
                            }
                        }
                    }
                }
            }

            if (isset($_POST['btn_change_password']) && ($_POST['btn_change_password'])) {
                $tai_khoan_id = $_POST['tai_khoan_id'];
                $odd_password = $_POST['odd_password'];
                $new_password = $_POST['new_password'];
                if ($odd_password == $_SESSION['user']['mat_khau']) {
                    ChangePassword($tai_khoan_id, $new_password);
                    $_SESSION['success_message'] = "Đổi mật khẩu thành công";
                } else {
                    $_SESSION['error_message'] = "Mật khẩu cũ không khớp !";
                }
            }

            include "../../View/User/UserUpdate.php";
            break;

        case 'my_order':
            if (isset($_SESSION['user'])) {
                $ListOrder = GetAllOrderByUserID($_SESSION['user']['tai_khoan_id']);
            }
            include "../../View/User/MyOrder.php";
            break;

        case 'order_detail':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $Order = GetOneOrder($_GET['id']);
                $ListOrderDetail = GetAllProductsWhereOrderExist($_GET['id']);
            }
            include "../../View/User/OrderDetail.php";
            break;
        default:
            include "../../View/Site/404.php";
            break;
    }
} else {
    echo '<script> window.location.href = "' . $ROOT_URL . 'View/User/index.php?act=dashboard"; </script>';
}
