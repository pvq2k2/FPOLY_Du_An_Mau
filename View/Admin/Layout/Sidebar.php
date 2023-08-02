<?php
session_start();
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
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="https://cdn.tailwindcss.com"></script>
</head>
<?php
$act = $_GET['act'];
$isActiveCategory = $act == "list_category" || $act == "add_category" || $act == "get_update_category" || $act == "update_category" || $act == "remove_category";
$isActiveSlides = $act == "list_slides" || $act == "add_slides" || $act == "get_update_slides" || $act == "update_slides" || $act == "remove_slides";
$isActiveProduct = $act == "list_product" || $act == "add_product" || $act == "get_update_product" || $act == "update_product" || $act == "remove_product";
$isActiveUser = $act == "list_user" || $act == "add_user" || $act == "get_update_user" || $act == "update_user" || $act == "remove_user";
$isActiveComment = $act == "list_product_comment" || $act == "detail_product_comment" || $act == "get_update_comment" || $act == "update_comment" || $act == "remove_comment";
$isActiveOrder = $act == "list_order" || $act == "order_detail" || $act == "get_update_order" || $act == "update_order" || $act == "remove_order";
?>

<body class="m-0 bg-gray-50 text-slate-500 flex">
  <aside class="w-[300px] h-screen py-4 pl-4">
    <div class="fixed z-990 min-h-screen">
      <div class="h-19">
        <i class="absolute top-0 right-0 hidden p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden" sidenav-close></i>
        <a class="block px-8 py-6 m-0 text-base whitespace-nowrap text-slate-700" href="index.php?act=dashboard">
          <img src="../../Img/logo.png" class="inline h-full max-w-full transition-all duration-200 max-h-8" alt="main_logo" />
          <span class="bg-gradient-to-r from-[#4ba3e7] to-[#0f4670] text-transparent bg-clip-text ml-1 font-bold transition-all duration-200">Văn Quyết Mobile</span>
        </a>
      </div>
      <hr class="mx-4 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />


      <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
        <ul class="flex flex-col pl-0 mb-0">
          <li class="mt-0.5 w-full group">
            <a class="<?php echo ($act == "dashboard" ? "bg-white font-semibold shadow-lg rounded-lg text-slate-700 " : ""); ?>py-2 text-base mt-3 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="index.php?act=dashboard">
              <div class="<?php echo ($act == "dashboard" ? "bg-gradient-to-tl from-[#4ba3e7] to-[#0f4670] text-white " : "text-black "); ?>shadow-xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center">
                <ion-icon name="home-outline"></ion-icon>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Bảng điều khiển</span>
            </a>
          </li>

          <li class="mt-0.5 w-full group">
            <a class="<?php echo ($isActiveCategory ? "bg-white font-semibold shadow-lg rounded-lg text-slate-700 " : ""); ?>py-2 text-base mt-3 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="index.php?act=list_category">
              <div class="<?php echo ($isActiveCategory ? "bg-gradient-to-tl from-[#4ba3e7] to-[#0f4670] text-white " : "text-black "); ?>shadow-xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center">
                <ion-icon name="library-outline"></ion-icon>
                </svg>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Danh mục</span>
            </a>
          </li>


          <li class="mt-0.5 w-full group">
            <a class="<?php echo ($isActiveSlides ? "bg-white font-semibold shadow-lg rounded-lg text-slate-700 " : ""); ?>py-2 text-base mt-3 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="index.php?act=list_slides">
              <div class="<?php echo ($isActiveSlides ? "bg-gradient-to-tl from-[#4ba3e7] to-[#0f4670] text-white " : "text-black "); ?>shadow-xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center">
                <ion-icon name="images-outline"></ion-icon>
                </svg>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Ảnh trình chiếu</span>
            </a>
          </li>

          <li class="mt-0.5 w-full group">
            <a class="<?php echo ($isActiveProduct ? "bg-white font-semibold shadow-lg rounded-lg text-slate-700 " : ""); ?>py-2 text-base mt-3 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="index.php?act=list_product">
              <div class="<?php echo ($isActiveProduct ? "bg-gradient-to-tl from-[#4ba3e7] to-[#0f4670] text-white " : "text-black "); ?>shadow-xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center">
                <ion-icon name="phone-portrait-outline"></ion-icon>
                </svg>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Sản phẩm</span>
            </a>
          </li>

          <li class="mt-0.5 w-full group">
            <a class="<?php echo ($isActiveUser ? "bg-white font-semibold shadow-lg rounded-lg text-slate-700 " : ""); ?>py-2 text-base mt-3 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="index.php?act=list_user">
              <div class="<?php echo ($isActiveUser ? "bg-gradient-to-tl from-[#4ba3e7] to-[#0f4670] text-white " : "text-black "); ?>shadow-xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center">
                <ion-icon name="person-outline"></ion-icon>
                </svg>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Tài khoản</span>
            </a>
          </li>

          <li class="mt-0.5 w-full group">
            <a class="<?php echo ($isActiveComment ? "bg-white font-semibold shadow-lg rounded-lg text-slate-700 " : ""); ?>py-2 text-base mt-3 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="index.php?act=list_product_comment">
              <div class="<?php echo ($isActiveComment ? "bg-gradient-to-tl from-[#4ba3e7] to-[#0f4670] text-white " : "text-black "); ?>shadow-xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center">
                <ion-icon name="chatbubbles-outline"></ion-icon>
                </svg>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Bình luận</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class="<?php echo ($isActiveOrder ? "bg-white font-semibold shadow-lg rounded-lg text-slate-700 " : ""); ?>py-2 text-base my-3 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="index.php?act=list_order">
              <div class="<?php echo ($isActiveOrder ? "bg-gradient-to-tl from-[#4ba3e7] to-[#0f4670] text-white " : "text-black "); ?>shadow-xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center">
                <ion-icon name="cart-outline"></ion-icon>
                </svg>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Đơn hàng</span>
            </a>
          </li>

        </ul>
      </div>
    </div>

  </aside>