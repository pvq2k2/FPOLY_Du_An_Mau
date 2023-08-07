<?php
session_start();
include_once "../../Global.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="../../Img/logo.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../../Img/logo.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../../Img/logo.png">
    <meta name="msapplication-TileImage" content="../../Img/logo.png">
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

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<?php
$act = $_GET['act'];
$isActiveIn = $act == "list_category" || $act == "add_category" || $act == "get_update_category" || $act == "update_category" || $act == "remove_category";
?>

<body class="m-0 bg-gray-50 text-slate-500 h-full flex basis-full gap-x-16">
    <aside class="w-[300px] h-screen">
        <div class="max-w-62 z-990 fixed inset-y-0 my-4 ml-4 block w-[16.5%] flex-wrap items-center justify-between overflow-y-auto rounded-2xl border-0 bg-white p-0 antialiased transition-transform duration-200 xl:left-0 xl:translate-x-0 ps xl:bg-white shadow-xl">
            <div class="h-19">
                <i class="absolute top-0 right-0 hidden p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden" sidenav-close></i>
                <a class="block px-8 py-6 m-0 text-base whitespace-nowrap text-slate-700" href="<?= $ROOT_URL ?>index.php">
                    <img src="../../Img/logo.png" class="inline h-full max-w-full transition-all duration-200 max-h-8" alt="main_logo" />
                    <span class="bg-gradient-to-r from-[#4ba3e7] to-[#0f4670] text-transparent bg-clip-text ml-1 font-bold transition-all duration-200">Văn Quyết Mobile</span>
                </a>
            </div>

            <div class="flex">
                <?php if (isset($_SESSION['user'])) {
                    extract($_SESSION['user']);
                    $hinhPath = "../../Upload/User/" . $hinh;
                    if (!is_file($hinhPath)) {
                        if ($gioi_tinh == 1) {
                            $hinhPath = "../../Img/nam.jpg";
                        } else {
                            $hinhPath = "../../Img/nu.jpg";
                        }
                    }
                ?>
                    <div class="flex justify-center items-center pb-3 w-full">
                        <img src="<?= $hinhPath ?>" class="w-10 h-10 rounded-full shadow-xl border border-current">
                        <div class="ml-4">
                            <div class="text-xs text-gray-500">
                                Xin chào !
                            </div>
                            <div>
                                <span class="user-name text-sm font-medium text-gray-900"><?= $_SESSION['user']['ho_va_ten'] ?></span>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <hr class="mx-4 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />


            <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
                <ul class="flex flex-col pl-0 mb-0">
                    <li class="mt-0.5 w-full group">
                        <a class="<?php echo ($act == "dashboard" ? "text-black " : "text-slate-400 "); ?>group-hover:text-black font-semibold py-2 text-base mt-3 mx-3 flex items-center gap-x-2 whitespace-nowrap px-4" href="index.php?act=dashboard">
                            <div class="<?php echo ($act == "dashboard" ? "bg-gradient-to-tl from-[#4ba3e7] to-[#0f4670] text-white " : "text-black "); ?>group-hover:bg-gradient-to-tl group-hover:from-[#4ba3e7] group-hover:to-[#0f4670] group-hover:text-white shadow-xl flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center bg-gray-100">
                                <ion-icon name="home-outline"></ion-icon>
                            </div>
                            <span class="ml-1 opacity-100 pointer-events-none">Bảng điều khiển</span>
                        </a>
                    </li>

                    <li class="mt-0.5 w-full group">
                        <a class="<?php echo ($act == "update_information" ? "text-black " : "text-slate-400 "); ?>group-hover:text-black font-semibold py-2 text-base mt-3 mx-3 flex items-center gap-x-2 whitespace-nowrap px-4" href="index.php?act=update_information">
                            <div class="<?php echo ($act == "update_information" ? "bg-gradient-to-tl from-[#4ba3e7] to-[#0f4670] text-white " : "text-black "); ?>group-hover:bg-gradient-to-tl group-hover:from-[#4ba3e7] group-hover:to-[#0f4670] group-hover:text-white shadow-xl flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center bg-gray-100">
                                <ion-icon name="person-outline"></ion-icon>
                            </div>
                            <span class="ml-1 opacity-100 pointer-events-none">Thông tin tài khoản</span>
                        </a>
                    </li>

                    <li class="mt-0.5 w-full group">
                        <a class="<?php echo ($isActiveCategory ? "text-slate-700 " : "text-slate-400 "); ?>group-hover:text-black font-semibold py-2 text-base mt-3 mx-3 flex items-center gap-x-2 whitespace-nowrap px-4" href="index.php?act=dashboard">
                            <div class="<?php echo ($isActiveCategory ? "bg-gradient-to-tl from-[#4ba3e7] to-[#0f4670] text-white " : "text-black "); ?>group-hover:bg-gradient-to-tl group-hover:from-[#4ba3e7] group-hover:to-[#0f4670] group-hover:text-white shadow-xl flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center bg-gray-100">
                                <ion-icon name="bag-handle-outline"></ion-icon>
                            </div>
                            <span class="ml-1 opacity-100 pointer-events-none">Đơn hàng của bạn</span>
                        </a>
                    </li>

                    <li class="mt-0.5 w-full group">
                        <a class="<?php echo ($isActiveCategory ? "text-slate-700 " : "text-slate-400 "); ?>group-hover:text-black font-semibold py-2 text-base mt-3 mx-3 flex items-center gap-x-2 whitespace-nowrap px-4" href="index.php?act=dashboard">
                            <div class="<?php echo ($isActiveCategory ? "bg-gradient-to-tl from-[#4ba3e7] to-[#0f4670] text-white " : "text-black "); ?>group-hover:bg-gradient-to-tl group-hover:from-[#4ba3e7] group-hover:to-[#0f4670] group-hover:text-white shadow-xl flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center bg-gray-100">
                                <ion-icon name="log-out-outline"></ion-icon>
                            </div>
                            <span class="ml-1 opacity-100 pointer-events-none">Đăng xuất</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </aside>
    <main class="xl:ml-68 mt-4 relative h-full w-full max-h-screen rounded-xl mr-8">