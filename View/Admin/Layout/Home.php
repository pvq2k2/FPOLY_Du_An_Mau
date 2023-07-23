<script>
    document.title = "VQMA - Bảng điều khiển";
</script>

<div class="box_main mt-8 ml-2">
    <div class="breadcumrb">

        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
            <li class="leading-normal text-sm">
                <ion-icon name="home-outline"></ion-icon>
            </li>
            <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">Bảng điều khiển</li>
        </ol>
        <h3 class="mb-0 font-bold capitalize text-2xl leading-10">Bảng điều khiển</h3>
    </div>
</div>


<div class="w-full pr-6 py-6 mx-auto">

    <div class="flex flex-wrap -mx-3">

        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans font-semibold leading-normal text-sm">Số lượng người dùng</p>
                                <h5 class="mb-0 font-bold">
                                    <?= FormatNumber($so_luong_nguoi_dung[0]['so_luong_nguoi_dung']) ?>
                                    <!-- <span class="leading-normal text-sm font-weight-bolder">Người</span> -->
                                </h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-blue-500 to-orange-500">
                                <ion-icon name="person-outline" class="leading-none text-2xl relative top-3 text-white"></ion-icon>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans font-semibold leading-normal text-sm">Số lượng bình luận</p>
                                <h5 class="mb-0 font-bold">
                                    <?= FormatNumber($so_luong_binh_luan[0]['so_luong_binh_luan']) ?>
                                    <!-- <span class="leading-normal text-sm font-weight-bolder">Người</span> -->
                                </h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-blue-500 to-orange-500">
                                <ion-icon name="chatbubbles-outline" class="leading-none text-2xl relative top-3 text-white"></ion-icon>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans font-semibold leading-normal text-sm">Số lượng đơn hàng</p>
                                <h5 class="mb-0 font-bold">
                                    <?= FormatNumber($so_luong_don_hang[0]['so_luong_don_hang']) ?>
                                    <!-- <span class="leading-normal text-sm font-weight-bolder">Người</span> -->
                                </h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-blue-500 to-orange-500">
                                <ion-icon name="cart-outline" class="leading-none text-2xl relative top-3 text-white"></ion-icon>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans font-semibold leading-normal text-sm">Doanh thu</p>
                                <h5 class="mb-0 font-bold">
                                    <?= FormatNumber($tong_doanh_thu[0]['tong_doanh_thu']) ?>
                                    <span class="leading-normal text-sm font-weight-bolder">VND</span>
                                </h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-blue-500 to-orange-500">
                                <ion-icon name="cash-outline" class="leading-none text-2xl relative top-3 text-white"></ion-icon>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>


    <div class="flex flex-wrap mt-6 -mx-3">

        <div class="flex flex-col gap-y-3 w-[499px]">
            <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:flex-none">
                <div class="border-black shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                    <div class="p-5 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6>Sản phẩm có số lượng xem nhiều nhất</h6>
                    </div>
                    <div class="flex-auto p-4">

                        <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Sản phẩm</th>
                                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Số lượt xem</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="p-2 align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                        <div class="flex px-2 py-1">
                                            <div>
                                                <img src="../../Upload/Product/<?= $san_pham_nhieu_luot_xem[0]['hinh'] ?>" class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-soft-in-out h-9 w-9 rounded-xl" alt="user6">
                                            </div>
                                            <div class="flex flex-col justify-center">
                                                <h6 class="mb-0 text-sm leading-normal"><?= $san_pham_nhieu_luot_xem[0]['ten_san_pham'] ?></h6>
                                                <p class="mb-0 text-xs leading-tight text-slate-400"><?= FormatNumber($san_pham_nhieu_luot_xem[0]['gia']) ?> VND</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs font-semibold leading-tight"><?= $san_pham_nhieu_luot_xem[0]['so_luot_xem'] ?></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:flex-none">
                <div class="border-black shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                    <div class="p-5 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <h6>Sản phẩm được mua nhiều nhất</h6>
                    </div>
                    <div class="flex-auto p-4">

                        <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Sản phẩm</th>
                                    <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Số lượt mua</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="p-2 align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                        <div class="flex px-2 py-1">
                                            <div>
                                                <img src="../../Upload/Product/<?= $san_pham_mua_nhieu[0]['hinh'] ?>" class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-soft-in-out h-9 w-9 rounded-xl" alt="user6">
                                            </div>
                                            <div class="flex flex-col justify-center">
                                                <h6 class="mb-0 text-sm leading-normal"><?= $san_pham_mua_nhieu[0]['ten_san_pham'] ?></h6>
                                                <p class="mb-0 text-xs leading-tight text-slate-400"><?= FormatNumber($san_pham_mua_nhieu[0]['gia']) ?> VND</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-b-0 whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 text-xs font-semibold leading-tight"><?= $san_pham_mua_nhieu[0]['so_luot_mua'] ?></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <div class="w-full max-w-full px-3 mt-0 lg:w-7/12 lg:flex-none">
            <div class="border-black shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                <div class="border-black mb-0 rounded-t-2xl border-b-0 border-solid bg-white p-6 pb-0">
                    <h6>Thống kê số lượng sản phẩm trong danh mục</h6>
                </div>
                <div class="flex-auto p-4">
                    <div>
                        <canvas id="category_chart" height="375" width="797" style="display: block; box-sizing: border-box; height: 300px; width: 638.2px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        const CategoryChart = $('#category_chart');
        new Chart(CategoryChart, {
            type: 'bar',
            data: {
                labels: [<?php
                            $length = count($DataChartCategory);
                            for ($i = 0; $i < $length; $i++) {
                                if ($i == $length - 1) {
                                    echo '"' . $DataChartCategory[$i]['ten_danh_muc'] . '"';
                                } else {
                                    echo '"' . $DataChartCategory[$i]['ten_danh_muc'] . '", ';
                                }
                            }
                            ?>],
                datasets: [{
                    label: 'Số lượng',
                    data: [<?php
                            $length = count($DataChartCategory);
                            for ($i = 0; $i < $length; $i++) {
                                if ($i == $length - 1) {
                                    echo $DataChartCategory[$i]['so_luong_san_pham'];
                                } else {
                                    echo $DataChartCategory[$i]['so_luong_san_pham'] . ', ';
                                }
                            }
                            ?>],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });


    });
</script>