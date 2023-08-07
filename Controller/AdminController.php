<?php
include "../../Models/pdo.php";
include "../../Models/Category.php";
include "../../Models/Slides.php";
include "../../Models/Product.php";
include "../../Models/User.php";
include "../../Models/Comment.php";
include "../../Models/Order.php";
include "../../Models/OrderDetail.php";
include "../../Models/Statistics.php";
include "../../Helper/UploadHelper.php";
include "../../Helper/FormatHelper.php";
include "../../Global.php";


if (!isset($_SESSION['user']) || $_SESSION['user']['vai_tro'] == 0) {
    // header('Location: ' . $ROOT_URL . 'index.php');
    echo '<script> window.location.href = "' . $ROOT_URL . 'index.php"; </script>';
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
                $hinh = $_FILES['hinh'];
                $UPLOAD_DIR = '../../Upload/Category/';
                $isUploadFile = UploadImage($hinh, $UPLOAD_DIR);

                if ($isUploadFile[1]) {
                    CreateCategory($ten_danh_muc, $isUploadFile[2]);
                    $_SESSION['success_message'] = 'Thêm danh mục thành công!';
                } else {
                    $_SESSION['error_message'] = $isUploadFile[0];
                }
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
                $danh_muc_id = $_POST['danh_muc_id'];
                $ten_danh_muc = $_POST['ten_danh_muc'];

                $hinh = $_FILES['hinh'];

                if ($hinh['name'] == '') {
                    $Category = GetOneProduct($danh_muc_id);
                    UpdateCategory($danh_muc_id, $ten_danh_muc, $Category['hinh']);
                    $_SESSION['success_message'] = 'Cập nhật sản phẩm thành công!';
                } else {
                    $UPLOAD_DIR = '../../Upload/Category/';
                    $isUploadFile = UploadImage($hinh, $UPLOAD_DIR);
                    if ($isUploadFile[1]) {
                        UpdateCategory($danh_muc_id, $ten_danh_muc, $isUploadFile[2]);
                        $_SESSION['success_message'] = 'Cập nhật danh mục thành công!';
                    } else {
                        $_SESSION['error_message'] = $isUploadFile[0];
                    }
                }
            }
            $ListCategory = GetAllCategory();
            include "../../View/Admin/Category/List.php";
            break;

        case 'remove_category':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                RemoveCategory($_GET['id']);
                $_SESSION['success_message'] = 'Xóa danh mục thành công!';
                echo 'success';
                exit();
            } else {
                echo 'error';
                exit();
            }
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
                $isUploadFile = UploadImage($hinh, $UPLOAD_DIR);

                $ngay_nhap = $_POST['ngay_nhap'];
                $mo_ta = $_POST['mo_ta'];
                $danh_muc_id = $_POST['danh_muc_id'];
                if ($isUploadFile[1]) {
                    CreateProduct($ten_san_pham, $gia, $isUploadFile[2], $ngay_nhap, $mo_ta, $danh_muc_id);
                    $_SESSION['success_message'] = "Thêm sản phẩm thành công";
                } else {
                    $_SESSION['error_message'] = $isUploadFile[0];
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
                    $Product = GetOneProduct($san_pham_id);
                    UpdateProduct($san_pham_id, $ten_san_pham, $gia, $Product['hinh'], $ngay_nhap, $mo_ta, $danh_muc_id);
                    $_SESSION['success_message'] = 'Cập nhật sản phẩm thành công!';
                } else {
                    $UPLOAD_DIR = '../../Upload/Product/';
                    $isUploadFile = UploadImage($hinh, $UPLOAD_DIR);
                    if ($isUploadFile[1]) {
                        UpdateProduct($san_pham_id, $ten_san_pham, $gia, $isUploadFile[2], $ngay_nhap, $mo_ta, $danh_muc_id);
                        $_SESSION['success_message'] = 'Cập nhật sản phẩm thành công!';
                    } else {
                        $_SESSION['error_message'] = $isUploadFile[0];
                    }
                }
            }
            $ListProduct = GetAllProduct('', 0);
            include "../../View/Admin/Product/List.php";
            break;

        case 'remove_product':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                RemoveProduct($_GET['id']);
                $_SESSION['success_message'] = 'Xóa sản phẩm thành công!';
                echo 'success';
                exit();
            } else {
                echo 'error';
                exit();
            }
            break;

            // End Product

            // Slides
        case 'list_slides':
            $ListSlides = GetAllSlides();
            include "../../View/Admin/Slides/List.php";
            break;

        case 'add_slides':
            if (isset($_POST['btn_add_slides']) && ($_POST['btn_add_slides'])) {
                $san_pham_id = $_POST['san_pham_id'];
                $Product = GetOneProduct($san_pham_id);
                if (!$Product) {
                    $_SESSION['error_message'] = "Sản phẩm có ID '" . $san_pham_id . "' không tồn tại";
                } else {
                    $hinh = $_FILES['img'];
                    $UPLOAD_DIR = '../../Upload/Slides/';
                    $isUploadFile = UploadImage($hinh, $UPLOAD_DIR);
                    $trang_thai = $_POST['trang_thai'];

                    if ($isUploadFile[1]) {
                        CreateSlides($san_pham_id, $isUploadFile[2], $trang_thai);
                        $_SESSION['success_message'] = "Thêm thành công";
                    } else {
                        $_SESSION['error_message'] = $isUploadFile[0];
                    }
                }
            }
            include "../../View/Admin/Slides/Create.php";
            break;

        case 'get_update_slides':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $Slides = GetOneSlides($_GET['id']);
            }
            include "../../View/Admin/Slides/Update.php";
            break;

        case 'update_slides':
            if (isset($_POST['btn_update_slides']) && ($_POST['btn_update_slides'])) {
                $slides_id = $_POST['slides_id'];
                $san_pham_id = $_POST['san_pham_id'];
                $Product = GetOneProduct($san_pham_id);
                if (!$Product) {
                    $_SESSION['error_message'] = "Sản phẩm có ID '" . $san_pham_id . "' không tồn tại";
                } else {
                    $trang_thai = $_POST['trang_thai'];
                    $hinh = $_FILES['img'];
                    if ($hinh['name'] == '') {
                        $Slides = GetOneSlides($slides_id);
                        UpdateSlides($slides_id, $san_pham_id, $Slides['img'], $trang_thai);
                        $_SESSION['success_message'] = 'Cập nhật thành công!';
                    } else {
                        $UPLOAD_DIR = '../../Upload/Slides/';
                        $isUploadFile = UploadImage($hinh, $UPLOAD_DIR);
                        if ($isUploadFile[1]) {
                            UpdateSlides($slides_id, $san_pham_id, $isUploadFile[2], $trang_thai);
                            $_SESSION['success_message'] = 'Cập nhật thành công!';
                        } else {
                            $_SESSION['error_message'] = $isUploadFile[0];
                        }
                    }
                }
            }
            $ListSlides = GetAllSlides();
            include "../../View/Admin/Slides/List.php";
            break;

        case 'remove_slides':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                RemoveSlides($_GET['id']);
                $_SESSION['success_message'] = 'Xóa thành công!';
                echo 'success';
                exit();
            } else {
                echo 'error';
                exit();
            }
            break;

            // End Slides

            // User
        case 'list_user':
            $ListUser = GetAllUser();
            include "../../View/Admin/User/List.php";
            break;

        case 'remove_user':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                if ($_SESSION['user']['tai_khoan_id'] == (int)$_GET['id']) {
                    echo 'this account cannot be deleted';
                    exit();
                } else {
                    RemoveUser($_GET['id']);
                    $_SESSION['success_message'] = 'Xóa tài khoản thành công!';
                    echo 'success';
                    exit();
                }
            } else {
                echo 'error';
                exit();
            }
            break;

        case 'add_user':
            if (isset($_POST['btn_add_user']) && ($_POST['btn_add_user'])) {
                $ho_va_ten = $_POST['ho_va_ten'];
                $email = $_POST['email'];
                $mat_khau = $_POST['mat_khau'];
                $dia_chi = $_POST['dia_chi'];
                $so_dien_thoai = $_POST['so_dien_thoai'];
                $gioi_tinh = $_POST['gioi_tinh'];
                $vai_tro = $_POST['vai_tro'];



                $isExistPhoneNumber = GetUserBySoDienThoai($so_dien_thoai);
                if ($isExistPhoneNumber) {
                    $_SESSION['error_message'] = "Số điện thoại đã được sử dụng!";
                } else {
                    $isExistEmail = GetUserByEmail($email);
                    if ($isExistEmail) {
                        $_SESSION['error_message'] = "Email đã được sử dụng!";
                    } else {
                        $hinh = $_FILES['hinh'];
                        $UPLOAD_DIR = '../../Upload/User/';
                        $isUploadFile = UploadImage($hinh, $UPLOAD_DIR);

                        if ($isUploadFile[1]) {
                            CreateUser(
                                $ho_va_ten,
                                $email,
                                $mat_khau,
                                $dia_chi,
                                $so_dien_thoai,
                                $gioi_tinh,
                                $isUploadFile[2],
                                $vai_tro
                            );
                            $_SESSION['success_message'] = "Thêm tài khoản thành công";
                        } else {
                            $_SESSION['error_message'] = $isUploadFile[0];
                        }
                    }
                }
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
                $gioi_tinh = $_POST['gioi_tinh'];
                $vai_tro = $_POST['vai_tro'];


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
                            $User = GetOneUser($tai_khoan_id);
                            UpdateUser(
                                $tai_khoan_id,
                                $ho_va_ten,
                                $email,
                                $mat_khau,
                                $dia_chi,
                                $so_dien_thoai,
                                $gioi_tinh,
                                $User['hinh'],
                                $vai_tro
                            );
                            $_SESSION['success_message'] = "Cập nhật tài khoản thành công";
                        } else {
                            $UPLOAD_DIR = '../../Upload/User/';
                            $isUploadFile = UploadImage($hinh, $UPLOAD_DIR);
                            if ($isUploadFile[1]) {
                                UpdateUser(
                                    $tai_khoan_id,
                                    $ho_va_ten,
                                    $email,
                                    $mat_khau,
                                    $dia_chi,
                                    $so_dien_thoai,
                                    $gioi_tinh,
                                    $isUploadFile[2],
                                    $vai_tro
                                );
                                $_SESSION['success_message'] = 'Cập nhật tài khoản thành công!';
                            } else {
                                $_SESSION['error_message'] = $isUploadFile[0];
                            }
                        }
                    }
                }
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
                $_SESSION['success_message'] = 'Xóa bình luận thành công!';
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
                $Product = GetOneProduct($Comment['san_pham_id']);
            }
            include "../../View/Admin/Comment/Update.php";
            break;

        case 'update_comment':
            if (isset($_POST['btn_update_comment']) && ($_POST['btn_update_comment'])) {
                $san_pham_id = $_POST['san_pham_id'];
                UpdateComment($_POST['binh_luan_id'], $_POST['noi_dung']);
                $_SESSION['success_message'] = 'Cập nhật bình luận thành công!';
                $Product = GetOneProduct($san_pham_id);
                $ListComment = GetAllCommentByID('', $san_pham_id);
                include "../../View/Admin/Comment/Detail.php";
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

        case 'get_update_order':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $Order = GetOneOrder($_GET['id']);
            }
            include "../../View/Admin/Order/Update.php";
            break;

        case 'update_order':
            if (isset($_POST['btn_update_order']) && ($_POST['btn_update_order'])) {
                $ho_va_ten = $_POST['ho_va_ten'];
                $email = $_POST['email'];
                $dia_chi = $_POST['dia_chi'];
                $so_dien_thoai = $_POST['so_dien_thoai'];
                $trang_thai = $_POST['trang_thai'];
                $don_hang_id = $_POST['don_hang_id'];

                UpdateOrder($don_hang_id, $ho_va_ten, $email, $dia_chi, $so_dien_thoai, $trang_thai);
                $_SESSION['success_message'] = 'Cập nhật đơn hàng thành công!';
            }
            $keyWord = '';
            $trang_thai = 0;
            $ngay_bat_dau = '';
            $ngay_ket_thuc = '';
            $ListOrder = GetAllOrder($keyWord, $trang_thai, $ngay_bat_dau, $ngay_ket_thuc);
            include "../../View/Admin/Order/List.php";
            break;

        case 'remove_order':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $ListOrderDetail = GetAllProductByOrderID($_GET['id']);
                if (is_array($ListOrderDetail) && count($ListOrderDetail) > 0) {
                    foreach ($ListOrderDetail as $OrderDetail) {
                        RemoveOrderDetail($OrderDetail['chi_tiet_don_hang_id']);
                    }
                }
                RemoveOrder($_GET['id'], $ListOrderDetail);
                $_SESSION['success_message'] = 'Xóa đơn hàng thành công!';
                echo 'success';
                exit();
            } else {
                echo 'error';
                exit();
            }
            break;
        case 'dashboard':
            $so_luong_nguoi_dung = StatisticsOnTheNumberOfUsers();
            $so_luong_binh_luan = StatisticsOfTheTotalNumberOfComments();
            $so_luong_don_hang = OrderQuantityStatistics();
            $tong_doanh_thu = TotalRevenueStatistics();

            $DataChartCategory = StatisticsOnTheNumberOfProductsInTheCategory();
            $san_pham_nhieu_luot_xem = ProductStatisticsWithTheMostViews();
            $san_pham_mua_nhieu = MostPurchasedProductStatistics();
            include "../../View/Admin/Layout/Home.php";
            break;
        default:
            include "../../View/Site/404.php";
            break;
    }
} else {
    echo '<script> window.location.href = "' . $ROOT_URL . 'View/Admin/index.php?act=dashboard"; </script>';
}
