<script>
    document.title = "Văn Quyết Mobile - Tìm kiếm <?= $KeyWord ?>";
</script>

<h1 class="text-2xl font-semibold text-center my-10"> Kết quả tìm kiếm "<?= $KeyWord ?>" </h1>

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
                    <img src="<?= $hinhPath ?>" class="h-full w-full object-cover object-center group-hover:opacity-75 transition-all duration-200 ease-linear">
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