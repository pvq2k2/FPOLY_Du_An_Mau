<?php
include "Models/pdo.php";
include "Models/Category.php";
include "Models/Product.php";
include "Models/Slides.php";
include "Models/User.php";
include "Models/Cart.php";
include "Models/Order.php";
include "Models/Comment.php";
include "Models/OrderDetail.php";
include "Helper/FormatHelper.php";
include "Global.php";
$ListSlides = GetAllSlidesActive();
$ListNewProduct = GetLimitProduct();
$ListCategory = GetAllCategory();
$ListTop10Product = GetTop10Product();

if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'logout':
            session_unset();
            echo '<script> window.location.href = "' . $ROOT_URL . 'index.php?act=login"; </script>';
            break;

        case 'forgot_password':
            if (isset($_POST['btn_forgot_password']) && ($_POST['btn_forgot_password'])) {
                $email = $_POST['email'];
                $isEmail = ForgotPassword($email);
                if (is_array($isEmail)) {
                    $msg = "Mật khẩu của bạn là: " . $isEmail['mat_khau'];
                } else {
                    $_SESSION['error_message'] = "Email không tồn tại!";
                }
            }
            include "View/Site/Account/ForgotPassword.php";
            break;

        case 'login':
            if (isset($_POST['btn_login']) && ($_POST['btn_login'])) {
                $email = $_POST['email'];
                $mat_khau = $_POST['mat_khau'];
                $isLogin = Login($email, $mat_khau);
                if (is_array($isLogin)) {
                    $_SESSION['user'] = $isLogin;
                    $_SESSION['success_message'] = "Đăng nhập thành công!";
                    echo '<script> window.location.href = "' . $ROOT_URL . 'index.php"; </script>';
                } else {
                    $_SESSION['error_message'] = "Tài khoản hoặc mật khẩu không chính xác!";
                }
            }
            include "View/Site/Account/Login.php";
            break;

        case 'register':
            if (isset($_POST['btn_register']) && ($_POST['btn_register'])) {
                $ho_va_ten = $_POST['ho_va_ten'];
                $email = $_POST['email'];
                $mat_khau = $_POST['mat_khau'];
                $so_dien_thoai = $_POST['so_dien_thoai'];
                $dia_chi = $_POST['dia_chi'];

                $gioi_tinh = $_POST['gioi_tinh'];
                $hinh = $gioi_tinh == 1 ? "nam.jpg" : "nu.jpg";

                $isExistPhoneNumber = GetUserBySoDienThoai($so_dien_thoai);
                if ($isExistPhoneNumber) {
                    $_SESSION['error_message'] = "Số điện thoại đã được sử dụng!";
                } else {
                    $isExistEmail = GetUserByEmail($email);
                    if ($isExistEmail) {
                        $_SESSION['error_message'] = "Email đã được sử dụng!";
                    } else {
                        Register($ho_va_ten, $email, $mat_khau, $so_dien_thoai, $dia_chi, $gioi_tinh, $hinh);
                        $_SESSION['success_message'] = "Đăng ký thành công";
                    }
                }
            }
            include "View/Site/Account/Register.php";
            break;

        case 'search':
            if (isset($_POST['keyWord']) && ($_POST['keyWord'] != "")) {
                $KeyWord = $_POST['keyWord'];
                $ListProduct = GetAllProduct($KeyWord, 0);
                include "View/Site/Product/Search.php";
            } else {
                include "View/Site/404.php";
            }
            break;

        case 'product':
            if (isset($_GET['category_id']) && ($_GET['category_id'] > 0)) {
                $danh_muc_id = $_GET['category_id'];
                $ListProduct = GetAllProduct("", $danh_muc_id);
                $NameCategory = GetOneCategory($danh_muc_id)['ten_danh_muc'];
                include "View/Site/Product/Product.php";
            } else {
                include "View/Site/404.php";
            }
            break;

        case 'product_detail':
            if (isset($_GET['product_id']) && ($_GET['product_id'] > 0)) {
                $Product = GetOneProduct($_GET['product_id']);
                extract($Product);
                $Category = GetOneCategory($danh_muc_id);
                UpdateViewProduct($_GET['product_id']);
                $ListSimilarProduct = SimilarProduct($_GET['product_id'], $danh_muc_id);

                if (isset($_POST['btn_add_comment']) && ($_POST['btn_add_comment'])) {
                    if (isset($_SESSION['user']) && is_array($_SESSION['user'])) {
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $noi_dung = $_POST['noi_dung'];
                        $tai_khoan_id = $_POST['tai_khoan_id'];
                        $san_pham_id = $_POST['san_pham_id'];
                        $ngay_binh_luan = date("Y-m-d H:i:s");
                        CreateComment($noi_dung, $tai_khoan_id, $san_pham_id, $ngay_binh_luan);
                    } else {
                        $_SESSION['error_message'] = "Vui lòng đăng nhập!";
                    }
                }
                include "View/Site/Product/ProductDetail.php";
            } else {
                include "View/Site/404.php";
            }
            break;

        case 'add_to_cart':
            if (isset($_POST['btn_add_to_cart']) && ($_POST['btn_add_to_cart'])) {
                $san_pham_id = $_POST['san_pham_id'];
                if (!isset($_SESSION['user'])) {
                    $_SESSION['error_message'] = 'Bạn phải đăng nhập mới có thể đặt hàng!';
                    echo '<script> window.location.href = "index.php?act=product_detail&product_id=' . $san_pham_id . '"; </script>';
                    die();
                }
                $tai_khoan_id = $_SESSION['user']['tai_khoan_id'];
                $so_luong = $_POST['so_luong'];

                $isProductExistInCart = FindProductInCart($tai_khoan_id, $san_pham_id);
                if (count($isProductExistInCart) == 0) {
                    AddToCart($tai_khoan_id, $san_pham_id, $so_luong);
                } else {
                    $gio_hang_id = $isProductExistInCart[0]['gio_hang_id'];
                    UpdateQuantityProductExistInCart($gio_hang_id, $so_luong);
                }

                $_SESSION['success_message'] = 'Sản phẩm đã được thêm vào giỏ hàng thành công!';
                echo '<script> window.location.href = "index.php?act=product_detail&product_id=' . $san_pham_id . '"; </script>';
            }
            break;

        case 'cart':
            if (isset($_POST['increaseBtn'])) {
                $san_pham_id = $_POST['san_pham_id'];
                $tai_khoan_id = $_SESSION['user']['tai_khoan_id'];
                $so_luong = $_POST['so_luong'] + 1;
                $gio_hang_id = $_POST['gio_hang_id'];

                $isProductExistInCart = FindProductInCart($tai_khoan_id, $san_pham_id);
                if (count($isProductExistInCart) > 0) {
                    UpdateQuantityProductInCart($gio_hang_id, $so_luong);
                }
            } else if (isset($_POST['decreaseBtn'])) {
                $san_pham_id = $_POST['san_pham_id'];
                $tai_khoan_id = $_SESSION['user']['tai_khoan_id'];
                $gio_hang_id = $_POST['gio_hang_id'];
                $so_luong = $_POST['so_luong'];

                if ($so_luong == 1) {
                    $_SESSION['error_message'] = 'Số lượng không được nhỏ hơn 1!';
                } else {
                    $so_luong--;
                    $isProductExistInCart = FindProductInCart($tai_khoan_id, $san_pham_id);
                    if (count($isProductExistInCart) > 0) {
                        UpdateQuantityProductInCart($gio_hang_id, $so_luong);
                    }
                }
            }
            if (isset($_SESSION['user'])) {
                $ListProductInCart = GetAllProductsWhereCartExist($_SESSION['user']['tai_khoan_id']);
            }
            include "View/Site/Cart/Cart.php";
            break;

        case 'remove_cart':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                RemoveProductInCart($_GET['id']);
                $_SESSION['success_message'] = 'Xóa thành công!';
                echo 'success';
                exit();
            } else {
                echo 'error';
                exit();
            }
            break;

        case 'bill':
            if (isset($_SESSION['user'])) {
                $ListProductInCart = GetAllProductsWhereCartExist($_SESSION['user']['tai_khoan_id']);
            }
            include "View/Site/Cart/Bill.php";
            break;

        case 'check_out':
            if (isset($_POST['btn_check_out']) && ($_POST['btn_check_out'])) {
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $tai_khoan_id = $_POST['tai_khoan_id'];
                $ho_va_ten = $_POST['ho_va_ten'];
                $dia_chi = $_POST['dia_chi'];
                $so_dien_thoai = $_POST['so_dien_thoai'];
                $email = $_POST['email'];
                $ngay_dat = date("Y-m-d H:i:s");
                $tong_tien = $_POST['tong_tien'];
                $phuong_thuc_thanh_toan = $_POST['phuong_thuc_thanh_toan'];
                $trang_thai = 1;
                $don_hang_id = CreateOrder(
                    $tai_khoan_id,
                    $ho_va_ten,
                    $dia_chi,
                    $so_dien_thoai,
                    $email,
                    $ngay_dat,
                    $tong_tien,
                    $phuong_thuc_thanh_toan,
                    $trang_thai
                );

                if (isset($_SESSION['user'])) {
                    $ListProductInCart = GetAllProductsWhereCartExist($_SESSION['user']['tai_khoan_id']);
                    foreach ($ListProductInCart as $Cart) {
                        extract($Cart);
                        $total_product_amount = $gia * $so_luong;
                        CreateOrderDetail($don_hang_id, $san_pham_id, $so_luong, $gia, $total_product_amount);
                        RemoveProductInCart($gio_hang_id);
                    }
                }
            }
            $Order = GetOneOrder($don_hang_id);
            $ListOrderDetail = GetAllProductsWhereOrderExist($don_hang_id);
            include "View/Site/Cart/CheckOut.php";
            break;

        case 'introduce':
            include "View/Site/Introduce.php";
            break;

        case 'contact':
            include "View/Site/Contact.php";
            break;

        case 'feedback':
            include "View/Site/Feedback.php";
            break;

        case 'qa':
            include "View/Site/Q&A.php";
            break;

        default:
            include "View/Site/404.php";
            break;
    }
} else {
    include "View/Site/Layout/Home.php";
}
