<script>
    document.title = "Văn Quyết Mobile - Chi tiết đơn hàng";
</script>

<section class="box_main my-5 ml-2">
    <div class="breadcumrb">

        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
            <li class="leading-normal text-sm">
                <ion-icon name="home-outline"></ion-icon>
            </li>
            <li class="hover:underline hover:text-blue-500 transition duration-150 ease-out hover:ease-in text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page"><a href="index.php?act=my_order">Đơn hàng của tôi</a></li>
            <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">Chi tiết đơn hàng</li>
        </ol>
        <h3 class="mb-0 font-bold capitalize text-2xl leading-10">Chi tiết đơn hàng</h3>
    </div>
</section>
<div class="relative">
    <div class="bg bg-white shadow-2xl rounded-xl flex flex-col justify-center h-[190px] w-full">
        <div class="text pl-20">
            <h2 class="text-xl font-semibold mb-2 uppercase">CHÀO MỪNG QUAY TRỞ LẠI, <?= $_SESSION['user']['ho_va_ten'] ?></h2>
            <p><i>Kiểm tra chi tiết đơn hàng của bạn tại đây</i></p>
        </div>
    </div>
    <div class="icon absolute bottom-[-2px] right-[100px]">
        <img src="../../Img/icon-account-checking boxes-cuate-phone.png">
    </div>
</div>

<a href="index.php?act=my_order" class="mt-10 mb-5 flex items-center text-lg hover:text-blue-500 hover:underline gap-x-1 transition-all duration-200 ease-linear">
    <ion-icon name="chevron-back-outline"></ion-icon>
    Quay lại
</a>


<section class="flex gap-x-5">
    <div class="flex flex-col shadow-xl h-fit rounded-lg w-7/12">
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
                                    Giá
                                </th>
                                <th class="px-4 py-3.5 text-sm font-normal rtl:text-right text-gray-500 dark:text-gray-400">
                                    Tổng tiền
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
                                    <td class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap text-center">
                                        <span><?= FormatNumber($gia * $so_luong) ?>đ</span>
                                    </td>
                                </tr>
                            <?php } ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="infoOrder h-fit flex flex-col gap-y-3 bg-white rounded-xl shadow-xl ml-5 p-5">
        <div class="title text-2xl font-semibold">Thông tin đơn hàng</div>
        <div>Đơn hàng ID: <span class="font-semibold"><?= $Order['don_hang_id'] ?></span></div>
        <div>Ngày đặt: <span class="font-semibold"><?= $Order['ngay_dat'] ?></span></div>
        <div>Địa chỉ: <span class="font-semibold"><?= $Order['dia_chi'] ?></span></div>
        <div>Phương thức thanh toán: <span class="font-semibold"><?= FormatPaymentMethods($Order['phuong_thuc_thanh_toan']) ?></span></div>
        <div class="text-xl pt-2 font-semibold">Tổng tiền: <span class="font-semibold"><?= FormatNumber($Order['tong_tien']) ?>đ</span></div>
    </div>
</section>