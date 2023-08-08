<script>
    document.title = "Văn Quyết Mobile - Cảm ơn";
</script>
<?php
if (isset($Order) && (is_array($Order))) {
    extract($Order);
}
?>
<h1 class="text-center text-3xl mb-10 mt-5 font-bold">Cảm ơn quý khách đã đặt hàng</h1>
<div class="grid grid-cols-2 gap-x-20">
    <div class="form-box">
        <h2 class="text-xl font-bold mb-3">Thông tin đơn hàng</h2>
        <div>
            <div class="min-h-full">
                <div class="max-w-md w-full">
                    <div class="info_order flex flex-col gap-x-2">
                        <span>Đơn hàng ID: <span class="font-semibold"><?= $Order['don_hang_id'] ?></span></span>
                        <span>Ngày đặt: <span class="font-semibold"><?= $Order['ngay_dat'] ?></span></span>
                        <span>Tổng tiền: <span class="font-semibold"><?= FormatNumber($tong_tien) ?>đ</span></span>
                        <span>Phương thức thanh toán: <span class="font-semibold"><?= FormatPaymentMethods($phuong_thuc_thanh_toan) ?></span></span>
                    </div>
                    <div class="info_user flex flex-col">
                        <h2 class="text-xl font-bold my-3">Thông tin người đặt</h2>
                        <span>Họ và tên: <span class="font-semibold"><?= $Order['ho_va_ten'] ?></span></span>
                        <span>Số điện thoại: <span class="font-semibold"><?= $Order['so_dien_thoai'] ?></span></span>
                        <span>Địa chỉ: <span class="font-semibold"><?= $Order['dia_chi'] ?></span></span>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div>
        <h2 class="text-xl font-bold mb-5">Thông tin giỏ hàng</h2>
        <?php
        if (isset($_SESSION['user'])) {
            if (count($ListOrderDetail) > 0) {

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
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                            <?php
                                            foreach ($ListOrderDetail as $Product) {
                                                extract($Product);
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
                                                        <?= $so_luong ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
        <?php
            }
        }
        ?>

    </div>
</div>

<div class="flex gap-x-10 justify-center items-center my-10">
    <a href="index.php" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 rounded-lg shrink-0 sm:w-auto gap-x-2 bg-gradient-to-r from-[#4ba3e7] to-[#0f4670] hover:bg-gradient-to-r hover:from-[#0f4670] hover:to-[#4ba3e7] dark:hover:bg-blue-500 dark:bg-blue-600 shadow-xl">
        <span>Trang chủ</span>
    </a>

    <a href="<?= $ROOT_URL ?>View/User/index.php?act=my_order" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 rounded-lg shrink-0 sm:w-auto gap-x-2 bg-gradient-to-r from-[#4ba3e7] to-[#0f4670] hover:bg-gradient-to-r hover:from-[#0f4670] hover:to-[#4ba3e7] dark:hover:bg-blue-500 dark:bg-blue-600 shadow-xl">
        <span>Đơn hàng của tôi</span>
    </a>
</div>