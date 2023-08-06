<script>
    document.title = "Văn Quyết Mobile - Danh mục <?= $NameCategory ?>";
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
            <li class="text-sm pl-2 capitalize leading-normal text-[#4ba3e7] before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page"><?= $NameCategory ?></li>
        </ol>
        <h3 class="mb-0 font-bold capitalize text-2xl leading-10"><?= $NameCategory ?></h3>
    </div>
</section>

<?php
if (is_array($ListProduct) && count($ListProduct) > 0) {
?>
    <div class="grid grid-cols-5 gap-x-5 gap-y-10 mt-5">
        <?php
        foreach ($ListProduct as $Product) {
            extract($Product);
            $hinhPath = $IMG_PATH . "Product/" . $hinh;
        ?>
            <a href="index.php?act=product_detail&product_id=<?= $san_pham_id ?>" class="group bg-white p-5 rounded-xl shadow-xl">
                <div class="aspect-h-1 aspect-w-1 w-full h-60 overflow-hidden rounded-lg group-hover:bg-gray-200 xl:aspect-h-8 xl:aspect-w-7 transition-all duration-200 ease-linear">
                    <img src="https://cdn.hoanghamobile.com/i/productlist/ts/Uploads/2023/07/18/iphone11.png" class="h-full w-full object-cover object-center group-hover:opacity-75 transition-all duration-200 ease-linear">
                </div>
                <h3 class="mt-4 text-sm text-gray-700"><?= $ten_san_pham ?></h3>
                <p class="mt-1 text-lg font-medium text-gray-900"><?= FormatNumber($gia) ?>₫</p>
            </a>
        <?php } ?>
    </div>

    <div class="flex items-center justify-center gap-x-5 mt-6">
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
<?php } else { ?>
    <div class="flex flex-col justify-center items-center py-20">
        <ion-icon name="server-outline" class="text-5xl"></ion-icon>
        <h2 class="text-xl">Không có sản phẩm nào</h2>
    </div>
<?php } ?>