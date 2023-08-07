<script>
    document.title = "Văn Quyết Mobile - Bảng điều khiển";
</script>

<section class="box_main my-5 ml-2">
    <div class="breadcumrb">

        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
            <li class="leading-normal text-sm">
                <ion-icon name="home-outline"></ion-icon>
            </li>
            <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">Bảng điều khiển</li>
        </ol>
        <h3 class="mb-0 font-bold capitalize text-2xl leading-10">Bảng điều khiển</h3>
    </div>
</section>
<div class="relative">
    <div class="bg bg-white shadow-2xl rounded-xl flex flex-col justify-center h-[190px] w-full">
        <div class="text pl-20">
            <h2 class="text-xl font-semibold mb-2 uppercase">CHÀO MỪNG QUAY TRỞ LẠI, <?= $_SESSION['user']['ho_va_ten'] ?></h2>
            <p><i>Tổng quát các hoạt động của bạn tại đây</i></p>
        </div>
    </div>
    <div class="icon absolute bottom-[-2px] right-[100px]">
        <img src="https://hoanghamobile.com/Content/web/content-icon/icon-account-home.png">
    </div>
</div>

<div class="grid grid-cols-2 gap-x-10 mt-10">
    <div class="col">
        <h3 class="text-xl font-semibold mb-5">Thông tin cá nhân</h3>

        <div class="relative p-5 rounded-md shadow-xl bg-white">
            <div class="account-info flex flex-col gap-y-5">
                <div class="tools absolute top-3 right-3 text-2xl">
                    <a href="index.php?act=update_information" class="hover:text-[#4ba3e7] transition-all duration-100 ease-linear"><ion-icon name="create-outline"></ion-icon></a>
                </div>
                <p><strong>Họ tên:</strong> <i><?= $_SESSION['user']['ho_va_ten'] ?></i></p>
                <p><strong>Giới tính:</strong> <i><?= FormatGender($_SESSION['user']['gioi_tinh']) ?></i></p>
                <p><strong>Email:</strong> <i><?= $_SESSION['user']['email'] ?></i></p>
                <p><strong>Số điện thoại:</strong> <i><?= $_SESSION['user']['so_dien_thoai'] ?></i></p>
                <p><strong>Địa chỉ:</strong> <i><?= $_SESSION['user']['dia_chi'] ?></i></p>

            </div>
        </div>
    </div>

    <div class="col">
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
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                    <?php
                                    if (is_array($ListOrder) && count($ListOrder) > 0) {
                                        foreach ($ListOrder as $Order) {
                                            extract($Order);
                                    ?>
                                            <tr>
                                                <td class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap text-center">
                                                    <span><?= $don_hang_id ?></span>
                                                </td>
                                                <td class="px-4 py-4 text-base text-gray-500 dark:text-gray-300 whitespace-nowrap text-center">
                                                    <span><?= $ngay_dat ?></span>
                                                </td>
                                                <td class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap">
                                                    <span><?= FormatNumber($tong_tien) ?>đ</span>
                                                </td>
                                                <td class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap">
                                                    <span><?= FormatOrderStatus($trang_thai) ?></span>
                                                </td>
                                            </tr>
                                        <?php }
                                    } else { ?>
                                        <tr>
                                            <td colspan="4">
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
    </div>
</div>