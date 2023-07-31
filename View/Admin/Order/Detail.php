<script>
    document.title = "VQMA - Chi tiết đơn hàng";
</script>

<section class="my-8 ml-2 md:flex md:items-center md:justify-between">
    <div class="breadcumrb">
        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
            <li class="leading-normal text-sm">
                <ion-icon name="home-outline"></ion-icon>
            </li>
            <li class="hover:underline hover:text-blue-500 transition duration-150 ease-out hover:ease-in text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page"><a href="index.php?act=list_order">Đơn hàng</a></li>
            <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">Chi tiết đơn hàng</li>
        </ol>
        <h3 class="mb-0 font-bold capitalize text-2xl leading-10">Chi tiết đơn hàng</h3>
    </div>
</section>

<section class="flex gap-x-5">
    <div class="flex flex-col shadow-xl rounded-lg w-7/12">
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
                                    Số lượng
                                </th>
                                <th class="px-4 py-3.5 text-sm font-normal rtl:text-right text-gray-500 dark:text-gray-400">
                                    Tổng tiền sản phẩm
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                            <?php
                            foreach ($ListOrderDetail as $Product) {
                                extract($Product);
                                $hinh = "../../Upload/Product/" . $hinh;
                            ?>
                                <tr>
                                    <td class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap text-center">
                                        <span><?= $ten_san_pham ?></span>
                                    </td>
                                    <td class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap text-center">
                                        <img src="<?= $hinh ?>" class="w-16 mx-auto">
                                    </td>
                                    <td class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap text-center">
                                        <span><?= $so_luong ?></span>
                                    </td>
                                    <td class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap text-center">
                                        <span><?= FormatNumber($gia) ?>đ</span>
                                    </td>
                                </tr>
                            <?php } ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="infoOrder flex flex-col gap-y-3 bg-white rounded-xl shadow-xl ml-5 p-5">

        <div class="title text-2xl font-semibold">Thông tin đơn hàng</div>
        <div>Đơn hàng ID: <span class="font-semibold"><?= $Order['don_hang_id'] ?></span></div>
        <div>Ngày đặt: <span class="font-semibold"><?= $Order['ngay_dat'] ?></span></div>
        <div>Địa chỉ: <span class="font-semibold"><?= $Order['dia_chi'] ?></span></div>
        <div>Phương thức thanh toán: <span class="font-semibold"><?= FormatPaymentMethods($Order['phuong_thuc_thanh_toan']) ?></span></div>
        <div class="text-xl pt-2 font-semibold">Tổng tiền: <span class="font-semibold"><?= FormatNumber($Order['tong_tien']) ?>đ</span></div>
    </div>
</section>