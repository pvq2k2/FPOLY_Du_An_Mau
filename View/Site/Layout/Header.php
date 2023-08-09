<?php
session_start();
include_once "Global.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="Img/logo.png">
    <link rel="apple-touch-icon" sizes="180x180" href="Img/logo.png">
    <link rel="icon" type="image/png" sizes="192x192" href="Img/logo.png">
    <meta name="msapplication-TileImage" content="Img/logo.png">
    <meta name="msapplication-TileColor" content="#RRGGBB">

    <title>Văn Quyết Mobile</title>

    <!-- Đường dẫn tới các tệp tin CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.16/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Đường dẫn tới các tệp tin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.16/dist/sweetalert2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css">
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="m-0 bg-[#f4f4f4] text-slate-500">
    <div class="header-top bg-[#0f4670]">
        <div class="container mx-auto">
            <ul class="flex justify-end gap-x-10 text-white">
                <li class="py-2 group block relative transition duration-300 ease-out hover:ease-in">
                    <a href="index.php?act=introduce" class="group-hover:text-[#74bcec] transition duration-200 ease-in-out">Giới thiệu</a>
                    <div class="absolute left-0 bottom-0 w-full h-[2px] bg-[#74bcec] scale-x-0 transition duration-300 ease-in-out group-hover:scale-x-100"></div>
                </li>
                <li class="py-2 group block relative transition duration-300 ease-out hover:ease-in">
                    <a href="index.php?act=contact" class="group-hover:text-[#74bcec] transition duration-200 ease-in-out">Liên hệ</a>
                    <div class="absolute left-0 bottom-0 w-full h-[2px] bg-[#74bcec] scale-x-0 transition duration-300 ease-in-out group-hover:scale-x-100"></div>
                </li>
                <li class="py-2 group block relative transition duration-300 ease-out hover:ease-in">
                    <a href="index.php?act=feedback" class="group-hover:text-[#74bcec] transition duration-200 ease-in-out">Góp ý</a>
                    <div class="absolute left-0 bottom-0 w-full h-[2px] bg-[#74bcec] scale-x-0 transition duration-300 ease-in-out group-hover:scale-x-100"></div>
                </li>
                <li class="py-2 group block relative transition duration-300 ease-out hover:ease-in">
                    <a href="index.php?act=qa" class="group-hover:text-[#74bcec] transition duration-200 ease-in-out">Hỏi đáp</a>
                    <div class="absolute left-0 bottom-0 w-full h-[2px] bg-[#74bcec] scale-x-0 transition duration-300 ease-in-out group-hover:scale-x-100"></div>
                </li>
            </ul>
        </div>
    </div>

    <div class="header-main py-3 sticky top-0 backdrop-saturate-[200%] backdrop-blur-[30px] transition-all duration-300 ease-in-out z-50">
        <div class="container mx-auto flex justify-between items-center">
            <div class="logo w-64">
                <a href="<?= $ROOT_URL ?>index.php">
                    <img src="Img/logo_horizontal.png" alt="">
                </a>
            </div>
            <div class="search">
                <form action="index.php?act=search" class="formSearch" method="post">
                    <div class="relative flex items-center mt-4 md:mt-0">
                        <label for="btn_search" class="shadow-xl absolute cursor-pointer right-[10px] top-[-10px] w-[40px] h-[40px] rounded-2xl flex justify-center items-center bg-gradient-to-r from-[#4ba3e7] to-[#0f4670] hover:bg-gradient-to-r hover:from-[#0f4670] hover:to-[#4ba3e7]">
                            <input id="btn_search" type="submit" name="search" value="Tìm kiếm" hidden>
                            <ion-icon name="search-outline" class="text-white m-auto text-xl"></ion-icon>
                        </label>
                        <input type="text" name="keyWord" placeholder="Hôm nay bạn cần tìm gì ?" class="shadow-xl block w-[700px] py-1.5 pl-5 pr-14 text-gray-700 bg-white border border-gray-200 rounded-3xl placeholder-gray-400/70 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">
                    </div>
                </form>
            </div>
            <div class="box-icon flex items-center gap-x-10">
                <div id="toggleModalUser" class="user relative group">
                    <?php
                    if (isset($_SESSION['user'])) {
                        extract($_SESSION['user']);
                        $hinhPath = "Upload/User/" . $hinh;
                        if (!is_file($hinhPath)) {
                            if ($gioi_tinh == 1) {
                                $hinhPath = "Img/nam.jpg";
                            } else {
                                $hinhPath = "Img/nu.jpg";
                            }
                        }
                    ?>
                        <img src="<?= $hinhPath ?>" class="w-10 h-10 rounded-full shadow-xl border border-current">
                    <?php } else { ?>
                        <ion-icon name="person-outline" class="text-3xl cursor-pointer group-hover:text-[#74bcec] transition-all duration-300 ease-linear"></ion-icon>
                    <?php } ?>

                    <div id="boxList" class="absolute top-16 bg-white shadow-xl z-20 p-3 rounded-lg ease-linear duration-300 w-60 xl:left-[-100px] lg:right-[-96px]  group-hover:visible
                                    before:absolute before:-top-2 xl:before:left-[106px] before:lg:left-[120px]
                                    before:w-5 before:h-5 before:bg-white before:rounded before:rotate-45 before:z-10 
                                    hidden backdrop-saturate-[200%] backdrop-blur-[30px] bg-[hsla(0,0%,100%,0.8)]">
                        <div class="user_box">
                            <ul>
                                <div>
                                    <?php if (isset($_SESSION['user'])) {
                                        extract($_SESSION['user']);
                                    ?>
                                        <div class="items-center pb-3 w-full">
                                            <div class="ml-4">
                                                <div class="text-sm text-gray-500">
                                                    Xin chào !
                                                </div>
                                                <div>
                                                    <span class="user-name text-base font-medium text-gray-900"><?= $_SESSION['user']['ho_va_ten'] ?></span>
                                                </div>
                                            </div>
                                        </div>


                                        <a href="<?php echo $vai_tro == 1 ? "View/Admin/index.php?act=dashboard" : "View/User/index.php?act=dashboard" ?>" class="rounded-lg hover:bg-gradient-to-r hover:from-[#0f4670] hover:to-[#4ba3e7] hover:shadow-xl transition duration-150 ease-out hover:ease-in inline-block w-full p-3 text-black font-semibold cursor-pointer hover:text-white">Trang quản trị</a>
                                        <a href="<?= $ROOT_URL ?>View/User/index.php?act=my_order" class="rounded-lg hover:bg-gradient-to-r hover:from-[#0f4670] hover:to-[#4ba3e7] hover:shadow-xl transition duration-150 ease-out hover:ease-in inline-block w-full p-3 text-black font-semibold cursor-pointer hover:text-white">Đơn hàng của tôi</a>
                                        <a href="index.php?act=logout" class="rounded-lg hover:bg-gradient-to-r hover:from-[#0f4670] hover:to-[#4ba3e7] hover:shadow-xl transition duration-150 ease-out hover:ease-in inline-block w-full p-3 text-black font-semibold cursor-pointer hover:text-white">Đăng xuất</a>
                                    <?php } else { ?>
                                        <a href="index.php?act=login" class="mt-1 rounded-lg hover:bg-gradient-to-r hover:from-[#0f4670] hover:to-[#4ba3e7] hover:shadow-xl transition duration-150 ease-out hover:ease-in inline-block w-full p-3 text-black font-semibold cursor-pointer hover:text-white">
                                            Đăng nhập
                                        </a>
                                        <a href="index.php?act=register" class="rounded-lg hover:bg-gradient-to-r hover:from-[#0f4670] hover:to-[#4ba3e7] hover:shadow-xl transition duration-150 ease-out hover:ease-in inline-block w-full p-3 text-black font-semibold cursor-pointer hover:text-white">
                                            Đăng ký
                                        </a>
                                    <?php } ?>
                                </div>
                            </ul>
                        </div>
                    </div>

                </div>
                <a href="index.php?act=cart" class="group flex items-center">
                    <ion-icon name="cart-outline" class="text-3xl group-hover:text-[#74bcec] transition-all duration-300 ease-linear"></ion-icon>
                    <label class="flex justify-end justify-items-end items-center">
                        <?php
                        if (isset($_SESSION['quantity_cart']) && is_array($_SESSION['quantity_cart'])) {
                        ?>
                            <ion-icon name="caret-back-outline" class="relative text-xl left-[7px] text-blue-500"></ion-icon>
                            <span id="cart-total" class="text-center bg-blue-500 px-2 text-white rounded-md">
                                <?php if ($_SESSION['quantity_cart']['tong_so_luong'] == null) {
                                    echo "0";
                                } else if ($_SESSION['quantity_cart']['tong_so_luong'] > 10) {
                                    echo "10+";
                                } else {
                                    echo $_SESSION['quantity_cart']['tong_so_luong'];
                                } ?>
                            </span>
                        <?php
                        }
                        ?>

                    </label>
                </a>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#toggleModalUser").on("click", function() {
                $("#boxList").toggleClass("hidden");
            });
            $(window).scroll(function() {
                if ($(this).scrollTop()) {
                    $('.header-main').addClass(' bg-[hsla(0,0%,100%,0.8)] shadow-xl');
                } else {
                    $('.header-main').removeClass(' bg-[hsla(0,0%,100%,0.8)] shadow-xl');
                }
            });
        });
    </script>

    <main class="mt-5">
        <div class="container mx-auto">