<?php
include "../../Models/pdo.php";
include "../../Models/Category.php";
include "../../Models/Product.php";
include "../../Models/User.php";
include "../../Models/Comment.php";
include "../../Models/Order.php";
include "../../Models/OrderDetail.php";
include "../../Helper/UploadHelper.php";
include "../../Helper/FormatHelper.php";


if (!isset($_SESSION['user']) || $_SESSION['user']['vai_tro'] == 0) {
    header('Location: http://localhost/FPOLY_DAM/index.php');
    exit();
}
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
            // Category
        case 'list_category':
            $ListCategory = GetAllCategory();
            include "../../View/Admin/Category/List.php";
            break;

        case 'add_category':
            if (isset($_POST['btn_add_category']) && ($_POST['btn_add_category'])) {
                $ten_danh_muc = $_POST['ten_danh_muc'];
                CreateCategory($ten_danh_muc);
                $msg = "Thêm thành công";
            }
            include "../../View/Admin/Category/Create.php";
            break;

        case 'get_update_category':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $Category = GetOneCategory($_GET['id']);
            }
            include "../../View/Admin/Category/Update.php";
            break;

        case 'update_category':
            if (isset($_POST['btn_update_category']) && ($_POST['btn_update_category'])) {
                $ten_danh_muc = $_POST['ten_danh_muc'];
                $danh_muc_id = $_POST['danh_muc_id'];
                UpdateCategory($danh_muc_id, $ten_danh_muc);
                $msg = "Cập nhật thành công";
            }
            $ListCategory = GetAllCategory();
            include "../../View/Admin/Category/List.php";
            break;

        case 'remove_category':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                RemoveCategory($_GET['id']);
            }
            $ListCategory = GetAllCategory();
            include "../../View/Admin/Category/List.php";
            break;
            // End Category

            // Product
        case 'list_product':
            if (isset($_POST['btn_filler_product']) && ($_POST['btn_filler_product'])) {
                $keyWord = $_POST['keyWord'];
                $danh_muc_id = $_POST['danh_muc_id'];
            } else {
                $keyWord = '';
                $danh_muc_id = 0;
            }
            $ListCategory = GetAllCategory();
            $ListProduct = GetAllProduct($keyWord, $danh_muc_id);
            include "../../View/Admin/Product/List.php";
            break;

        case 'add_product':
            if (isset($_POST['btn_add_product']) && ($_POST['btn_add_product'])) {
                $ten_san_pham = $_POST['ten_san_pham'];
                $gia = $_POST['gia'];

                $hinh = $_FILES['hinh'];
                $UPLOAD_DIR = '../../Upload/Product/';
                $isSuccess = UploadImage($hinh, $UPLOAD_DIR);

                $ngay_nhap = $_POST['ngay_nhap'];
                $mo_ta = $_POST['mo_ta'];
                $danh_muc_id = $_POST['danh_muc_id'];
                if ($isSuccess[1]) {
                    CreateProduct($ten_san_pham, $gia, $isSuccess[2], $ngay_nhap, $mo_ta, $danh_muc_id);
                    $msg = "Thêm thành công";
                } else {
                    echo $isSuccess[0];
                }
            }
            $ListCategory = GetAllCategory();
            include "../../View/Admin/Product/Create.php";
            break;

        case 'get_update_product':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $Product = GetOneProduct($_GET['id']);
            }
            $ListCategory = GetAllCategory();
            include "../../View/Admin/Product/Update.php";
            break;

        case 'update_product':
            if (isset($_POST['btn_update_product']) && ($_POST['btn_update_product'])) {
                $san_pham_id = $_POST['san_pham_id'];
                $ten_san_pham = $_POST['ten_san_pham'];
                $gia = $_POST['gia'];
                $ngay_nhap = $_POST['ngay_nhap'];
                $mo_ta = $_POST['mo_ta'];
                $danh_muc_id = $_POST['danh_muc_id'];

                $hinh = $_FILES['hinh'];

                if ($hinh['name'] == '') {
                    UpdateProduct($san_pham_id, $ten_san_pham, $gia, $hinh['name'], $ngay_nhap, $mo_ta, $danh_muc_id);
                    $msg = "Cập nhật thành công";
                } else {
                    $UPLOAD_DIR = $IMG_PATH . 'Product/';
                    $isSuccess = UploadImage($hinh, $UPLOAD_DIR);
                    if ($isSuccess[1]) {
                        UpdateProduct($san_pham_id, $ten_san_pham, $gia, $isSuccess[2], $ngay_nhap, $mo_ta, $danh_muc_id);
                        $msg = "Cập nhật thành công";
                    } else {
                        echo $isSuccess[0];
                    }
                }
            }
            $ListProduct = GetAllProduct('', 0);
            include "../../View/Admin/Product/List.php";
            break;

        case 'remove_product':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {

                RemoveProduct($_GET['id']);
            }
            $ListProduct = GetAllProduct('', 0);
            include "../../View/Admin/Product/List.php";
            break;
            // End Product

            // User
        case 'list_user':
            $ListUser = GetAllUser();
            include "../../View/Admin/User/List.php";
            break;

        case 'remove_user':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                if ($_SESSION['user']['tai_khoan_id'] == $_GET['id']) {
                    echo "Không thể xóa tài khoản này!";
                } else {
                    RemoveUser($_GET['id']);
                }
            }
            $ListUser = GetAllUser();
            include "../../View/Admin/User/List.php";
            break;

        case 'add_user':
            if (isset($_POST['btn_add_user']) && ($_POST['btn_add_user'])) {
                $ho_va_ten = $_POST['ho_va_ten'];
                $email = $_POST['email'];
                $mat_khau = $_POST['mat_khau'];
                $dia_chi = $_POST['dia_chi'];
                $so_dien_thoai = $_POST['so_dien_thoai'];
                $vai_tro = $_POST['vai_tro'];

                CreateUser($ho_va_ten, $email, $mat_khau, $dia_chi, $so_dien_thoai, $vai_tro);
                $msg = "Thêm thành công";
            }
            include "../../View/Admin/User/Create.php";
            break;

        case 'get_update_user':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $User = GetOneUser($_GET['id']);
            }
            include "../../View/Admin/User/Update.php";
            break;

        case 'update_user':
            if (isset($_POST['btn_update_user']) && ($_POST['btn_update_user'])) {
                $tai_khoan_id = $_POST['tai_khoan_id'];
                $ho_va_ten = $_POST['ho_va_ten'];
                $email = $_POST['email'];
                $mat_khau = $_POST['mat_khau'];
                $dia_chi = $_POST['dia_chi'];
                $so_dien_thoai = $_POST['so_dien_thoai'];
                $vai_tro = $_POST['vai_tro'];

                UpdateUser($tai_khoan_id, $ho_va_ten, $email, $mat_khau, $so_dien_thoai, $dia_chi, $vai_tro);
                $msg = "Cập nhật thành công";
            }
            $ListUser = GetAllUser();
            include "../../View/Admin/User/List.php";
            break;
            // End User

            //Comment
        case 'list_product_comment':
            if (isset($_POST['btn_filler_product']) && ($_POST['btn_filler_product'])) {
                $keyWord = $_POST['keyWord'];
                $danh_muc_id = $_POST['danh_muc_id'];
            } else {
                $keyWord = '';
                $danh_muc_id = 0;
            }
            $ListCategory = GetAllCategory();
            $ListProduct = GetAllProductsWhereCommentsExist($keyWord, $danh_muc_id);
            include "../../View/Admin/Comment/List.php";
            break;

        case 'detail_product_comment':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $Product = GetOneProduct($_GET['id']);

                if (isset($_POST['btn_filler_comment']) && ($_POST['btn_filler_comment'])) {
                    $keyWord = $_POST['keyWord'];
                } else {
                    $keyWord = '';
                }
                $ListComment = GetAllCommentByID($keyWord, $_GET['id']);
                include "../../View/Admin/Comment/Detail.php";
            }
            break;

        case 'remove_comment':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                RemoveComment($_GET['id']);
                echo 'success';
                exit();
            } else {
                echo 'error';
                exit();
            }
            break;

        case 'get_update_comment':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $Comment = GetOneComment($_GET['id']);
            }
            include "../../View/Admin/Comment/Update.php";
            break;

        case 'update_comment':
            if (isset($_POST['btn_update_comment']) && ($_POST['btn_update_comment'])) {
                UpdateComment($_POST['binh_luan_id'], $_POST['noi_dung']);
                echo 'success';
                exit();
            } else {
                echo 'error';
                exit();
            }
            break;
            // End Comment

            // Order
        case 'list_order':
            if (isset($_POST['btn_filler_order']) && ($_POST['btn_filler_order'])) {
                $keyWord = $_POST['keyWord'];
                $trang_thai = $_POST['trang_thai'];
                $ngay_bat_dau = $_POST['ngay_bat_dau'];
                $ngay_ket_thuc = $_POST['ngay_ket_thuc'];
            } else {
                $keyWord = '';
                $trang_thai = 0;
                $ngay_bat_dau = '';
                $ngay_ket_thuc = '';
            }
            $ListOrder = GetAllOrder($keyWord, $trang_thai, $ngay_bat_dau, $ngay_ket_thuc);
            include "../../View/Admin/Order/List.php";
            break;

        case 'order_detail':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $Order = GetOneOrder($_GET['id']);
                $ListOrderDetail = GetAllProductsWhereOrderExist($_GET['id']);
            }
            include "../../View/Admin/Order/Detail.php";
            break;
        default:
            // include "Layout/content.php";
            break;
    }
} else {
    // include "Layout/content.php";
}
