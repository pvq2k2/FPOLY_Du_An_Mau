<script>
    document.title = "Văn Quyết Mobile - Giỏ hàng";
</script>

<section class="my-8 ml-2 md:flex md:items-center md:justify-between">
    <div class="breadcumrb">
        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
            <li class="hover:underline hover:text-blue-500 transition duration-150 ease-out hover:ease-in text-sm capitalize leading-normal text-slate-700" aria-current="page">
                <a href="index.php">
                    <ion-icon name="home-outline"></ion-icon>
                    Trang chủ
                </a>
            </li>
            <li class="text-sm pl-2 capitalize leading-normal text-[#4ba3e7] before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">Giỏ hàng</li>
        </ol>
        <h3 class="mb-0 font-bold capitalize text-2xl leading-10">Giỏ hàng</h3>
    </div>
</section>

<?php
if (isset($_SESSION['user'])) {
    if (count($ListProductInCart) > 0) {

?>
        <section class="w-full mx-auto">
            <div class="flex flex-col shadow-xl rounded-lg">
                <div class="-my-2 overflow-x-auto">
                    <div class="inline-block min-w-full py-2 align-middle">
                        <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-800">
                                    <tr>
                                        <th class="px-4 py-3.5 text-sm font-normal rtl:text-right text-gray-500 dark:text-gray-400">
                                            Tên sản phẩm
                                        </th>
                                        <th class="px-4 py-3.5 text-sm font-normal rtl:text-right text-gray-500 dark:text-gray-400">
                                            Hình
                                        </th>
                                        <th class="px-4 py-3.5 text-sm font-normal rtl:text-right text-gray-500 dark:text-gray-400">
                                            Giá
                                        </th>
                                        <th class="px-4 py-3.5 text-sm font-normal rtl:text-right text-gray-500 dark:text-gray-400">
                                            Số lượng
                                        </th>
                                        <th class="px-4 py-3.5 text-sm text-left font-normal rtl:text-right text-gray-500 dark:text-gray-400">
                                            Hành động
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                    <?php
                                    $total_amount = 0;
                                    foreach ($ListProductInCart as $Cart) {
                                        extract($Cart);
                                        $total_amount += $gia * $so_luong;
                                        $hinh = $IMG_PATH . "Product/" . $hinh;
                                    ?>
                                        <tr>
                                            <td class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap text-center">
                                                <span><?= $ten_san_pham ?></span>
                                            </td>
                                            <td class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap">
                                                <img src="<?= $hinh ?>" class="w-16 mx-auto">
                                            </td>
                                            <td class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap text-center">
                                                <span><?= FormatNumber($gia) ?>đ</span>
                                            </td>
                                            <td class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap text-center">
                                                <form id="submitForm" action="index.php?act=cart" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="gio_hang_id" value="<?= $gio_hang_id ?>">
                                                    <input type="hidden" name="san_pham_id" value="<?= $san_pham_id ?>">

                                                    <div class="flex items-center justify-center">
                                                        <button name="decreaseBtn" id="decreaseBtn" class="btn down-quantity bg-white cursor-pointer flex items-center justify-center outline-none border w-8 h-8 text-[rgba(0,0,0,.8)]">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                                                            </svg>
                                                        </button>
                                                        <input type="number" name="so_luong" id="quantityInput" min="1" value="<?= $so_luong ?>" class="border w-14 h-8 text-base font-normal box-border text-center cursor-text outline-none">
                                                        <button name="increaseBtn" id="increaseBtn" class="btn up-quantity bg-white cursor-pointer flex items-center justify-center outline-none border w-8 h-8 text-[rgba(0,0,0,.8)]">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </form>
                                            </td>
                                            <td class="px-4 py-4 text-sm whitespace-nowrap">
                                                <button onclick="RemoveProduct()" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-red-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-red-600 dark:hover:bg-blue-500 dark:bg-blue-600 shadow-xl">
                                                    <ion-icon name="trash-outline" class="text-xl"></ion-icon>
                                                    <span>Xóa</span>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td colspan="4" class="py-2 pr-3 text-right border-r border-inherit"> Tổng tiền: <span class="font-semibold"><?= FormatNumber($total_amount) ?>đ</span></td>
                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                            <a href="index.php?act=bill" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 rounded-lg shrink-0 sm:w-auto gap-x-2 bg-gradient-to-r from-[#4ba3e7] to-[#0f4670] hover:bg-gradient-to-r hover:from-[#0f4670] hover:to-[#4ba3e7] dark:hover:bg-blue-500 dark:bg-blue-600 shadow-xl">
                                                <span>Mua hàng</span>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php
    } else {
    ?>
        <div class="flex flex-col items-center">
            <img class="w-4/12" src="Img/add-to-cart.png">
            <h1 class="text-xl font-semibold text-center">Hiện chưa có sản phẩm nào trong giỏ hàng</h1>
        </div>

    <?php
    }
} else {
    ?>
    <h1 class="text-xl font-semibold text-center">Hiện chưa có sản phẩm nào trong giỏ hàng</h1>
<?php
}
?>

<?php
if (isset($_SESSION['success_message'])) {
    echo '<script>toastr.success("' . $_SESSION['success_message'] . '")</script>';
    unset($_SESSION['success_message']);
}
?>

<?php
if (isset($_SESSION['error_message'])) {
    echo '<script>toastr.error("' . $_SESSION['error_message'] . '")</script>';
    unset($_SESSION['error_message']);
}
?>

<script>
    function RemoveProduct() {
        new swal({
            title: 'Bạn có chắc chắn muốn xoá?',
            text: 'Hành động này sẽ không thể hoàn tác!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Xoá',
            cancelButtonText: 'Hủy'
        }).then((willDelete) => {
            if (willDelete.value) {
                $.ajax({
                    url: 'index.php?act=remove_cart&id=<?php echo $gio_hang_id; ?>',
                    type: 'GET',
                    success: function(response) {
                        if (response.includes("success")) {
                            location.reload();
                        } else {
                            // toastr.error('Xóa bình luận thất bại!');
                        }
                    },
                    error: function() {
                        toastr.error('Lỗi kết nối!');
                    },
                });

            } else {
                toastr.error('Xóa sản phẩm thất bại!');
            }
        });
    }
</script>