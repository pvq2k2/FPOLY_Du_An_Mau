<script>
    document.title = "Văn Quyết Mobile - Đơn hàng của tôi";
</script>

<section class="box_main my-5 ml-2">
    <div class="breadcumrb">

        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
            <li class="leading-normal text-sm">
                <ion-icon name="home-outline"></ion-icon>
            </li>
            <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">Đơn hàng của tôi</li>
        </ol>
        <h3 class="mb-0 font-bold capitalize text-2xl leading-10">Đơn hàng của tôi</h3>
    </div>
</section>
<div class="relative">
    <div class="bg bg-white shadow-2xl rounded-xl flex flex-col justify-center h-[190px] w-full">
        <div class="text pl-20">
            <h2 class="text-xl font-semibold mb-2 uppercase">CHÀO MỪNG QUAY TRỞ LẠI, <?= $_SESSION['user']['ho_va_ten'] ?></h2>
            <p><i>Kiểm tra thông tin đơn hàng của bạn tại đây</i></p>
        </div>
    </div>
    <div class="icon absolute bottom-[-2px] right-[100px]">
        <img src="../../Img/icon-account-order.png">
    </div>
</div>


<div class="col mt-10">
    <h3 class="text-xl font-semibold mb-5">Đơn hàng đã đặt</h3>
    <div class="box-bg-white rounded-md shadow-xl bg-white">
        <div class="flex flex-col shadow-xl rounded-lg">
            <div class="-my-2 overflow-x-auto">
                <div class="inline-block min-w-full py-2 align-middle">
                    <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th class="px-4 py-3.5 text-sm font-normal rtl:text-right text-gray-500 dark:text-gray-400">
                                        Mã đơn hàng
                                    </th>

                                    <th class="px-4 py-3.5 text-sm font-normal rtl:text-right text-gray-500 dark:text-gray-400">
                                        Ngày đặt
                                    </th>

                                    <th class="px-4 py-3.5 text-sm font-normal rtl:text-right text-gray-500 dark:text-gray-400">
                                        Tổng tiền
                                    </th>

                                    <th class="px-4 py-3.5 text-sm font-normal rtl:text-right text-gray-500 dark:text-gray-400">
                                        Trạng thái
                                    </th>

                                    <th class="px-4 py-3.5 text-sm font-normal text-left text-gray-500 dark:text-gray-400">
                                        Hành động
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                <?php
                                if (is_array($ListOrder) && count($ListOrder) > 0) {
                                    foreach ($ListOrder as $Order) {
                                        extract($Order);
                                        $URLOrderDetail = "index.php?act=order_detail&id=" . $don_hang_id;
                                ?>
                                        <tr>
                                            <td class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap text-center">
                                                <span><?= $don_hang_id ?></span>
                                            </td>
                                            <td class="px-4 py-4 text-base text-gray-500 dark:text-gray-300 whitespace-nowrap text-center">
                                                <span><?= $ngay_dat ?></span>
                                            </td>
                                            <td class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap text-center">
                                                <span><?= FormatNumber($tong_tien) ?>đ</span>
                                            </td>
                                            <td class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap text-center">
                                                <span><?= FormatOrderStatus($trang_thai) ?></span>
                                            </td>
                                            <td class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap text-center">
                                                <a href="<?= $URLOrderDetail ?>">
                                                    <button class="flex items-center justify-center w-1/2 px-5 py-2 tracking-wide text-white transition-colors duration-200 bg-blue-500  rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600 shadow-xl">
                                                        <ion-icon name="information-circle-outline" class="text-xl self-center"></ion-icon>
                                                        <span>Chi tiết</span>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php }
                                } else { ?>
                                    <tr>
                                        <td colspan="5">
                                            <div class="flex flex-col justify-center items-center py-16">
                                                <ion-icon name="server-outline" class="text-5xl"></ion-icon>
                                                <h2 class="text-xl">Không có dữ liệu</h2>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="flex items-center justify-between my-6">
        <a href="#" class="flex items-center px-5 py-2 shadow-xl text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
            <ion-icon name="return-down-back-outline" class="text-xl rtl:-scale-x-100"></ion-icon>
            <span>
                Quay lại
            </span>
        </a>

        <div class="items-center hidden md:flex gap-x-3">
            <a href="#" class="px-2 py-1 text-sm text-blue-500 rounded-md dark:bg-gray-800 bg-blue-100/60">1</a>
            <a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">2</a>
            <a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">3</a>
            <a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">...</a>
            <a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">12</a>
            <a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">13</a>
            <a href="#" class="px-2 py-1 text-sm text-gray-500 rounded-md dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">14</a>
        </div>

        <a href="#" class="flex items-center px-5 py-2 shadow-xl text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
            <span>
                Tiếp theo
            </span>
            <ion-icon name="return-down-forward-outline" class="text-xl rtl:-scale-x-100"></ion-icon>
        </a>
    </div>
</div>