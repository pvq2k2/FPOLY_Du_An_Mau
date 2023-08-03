<script>
    document.title = "VQMA - Danh sách sản phẩm";
</script>

<section class="mt-8 mb-2 ml-2 md:flex md:items-center md:justify-between">
    <div class="breadcumrb">
        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
            <li class="leading-normal text-sm">
                <ion-icon name="home-outline"></ion-icon>
            </li>
            <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">Sản phẩm</li>
        </ol>
        <h3 class="mb-0 font-bold capitalize text-2xl leading-10">Danh sách sản phẩm</h3>
    </div>
</section>


<section class="w-full mx-auto">
    <div class="my-6 md:flex md:items-end md:justify-between">
        <div class="flex flex-col">
            <span class="font-semibold pb-1">Lọc</span>
            <form action="index.php?act=list_product" method="post" class="flex">
                <div class="relative flex items-center mt-4 md:mt-0">
                    <span class="absolute">
                        <ion-icon name="search-outline" class="text-gray-400 mx-4 font-base"></ion-icon>
                    </span>
                    <input type="text" name="keyWord" placeholder="Tên sản phẩm" class="shadow-sm block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">
                </div>
                <div class="flex items-center relative">
                    <select name="danh_muc_id" class="appearance-none shadow-sm pl-3 block w-60 mx-3 py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg placeholder-gray-400/70 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">
                        <option value="0" selected>Tất cả</option>
                        <?php
                        foreach ($ListCategory as $Category) {
                            extract($Category);
                        ?>
                            <option value="<?= $danh_muc_id ?>"><?= $ten_danh_muc ?></option>
                        <?php } ?>

                    </select>
                    <ion-icon name="chevron-collapse-outline" class="absolute text-gray-700 right-6 text-xl"></ion-icon>
                </div>

                <input type="submit" name="btn_filler_product" value="Lọc" class="shadow-xl rounded-md bg-blue-500 px-5 py-2 text-base font-semibold text-white hover:bg-blue-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition duration-150 ease-out hover:ease-in">
            </form>
        </div>


        <a href="index.php?act=add_product">
            <button class="flex items-center justify-center w-1/2 px-5 py-2 text-base tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600 shadow-xl">
                <ion-icon name="add-circle-outline" class="text-2xl"></ion-icon>

                <span>Thêm sản phẩm</span>
            </button>
        </a>
    </div>
    <div class="flex flex-col shadow-xl rounded-lg">
        <div class="-my-2 overflow-x-auto">
            <div class="inline-block min-w-full py-2 align-middle">
                <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <th class="px-4 py-3.5 text-sm font-normal rtl:text-right text-gray-500 dark:text-gray-400">
                                    ID
                                </th>
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
                                    Lượt xem
                                </th>
                                <th class="px-4 py-3.5 text-sm font-normal rtl:text-right text-gray-500 dark:text-gray-400">
                                    Hành động
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                            <?php
                            if (is_array($ListProduct) && count($ListProduct) > 0) {
                                foreach ($ListProduct as $Product) {
                                    extract($Product);
                                    $URLGetUpdateProduct = "index.php?act=get_update_product&id=" . $san_pham_id;
                                    $URLRemoveProduct = "index.php?act=remove_product&id=" . $san_pham_id;
                                    $hinhPath = "../../Upload/Product/" . $hinh;
                                    if (!is_file($hinhPath)) {
                                        $hinhPath = "No Photo";
                                    }
                            ?>
                                    <tr>
                                        <td class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap text-center">
                                            <span><?= $san_pham_id ?></span>
                                        </td>
                                        <td class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap text-center">
                                            <span><?= $ten_san_pham ?></span>
                                        </td>
                                        <td class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap">
                                            <img src="<?= $hinhPath ?>" class="w-16 mx-auto">
                                        </td>
                                        <td class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap text-center">
                                            <span><?= FormatNumber($gia) ?>đ</span>
                                        </td>
                                        <td class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap text-center">
                                            <span><?= $so_luot_xem ?></span>
                                        </td>
                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                            <div class="flex items-center justify-center gap-x-6">
                                                <a href="<?= $URLGetUpdateProduct ?>">
                                                    <button class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-yellow-500  rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-yellow-600 dark:hover:bg-blue-500 dark:bg-blue-600 shadow-xl">
                                                        <ion-icon name="pencil-outline" class="text-xl"></ion-icon>

                                                        <span>Sửa</span>
                                                    </button>
                                                </a>

                                                <button onclick="deleteProduct()" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-red-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-red-600 dark:hover:bg-blue-500 dark:bg-blue-600 shadow-xl">
                                                    <ion-icon name="trash-outline" class="text-xl"></ion-icon>

                                                    <span>Xóa</span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="6">
                                        <div class="flex flex-col justify-center items-center py-20">
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
</section>

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
    function deleteProduct() {
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
                    url: '<?php echo $URLRemoveProduct; ?>',
                    type: 'GET',
                    success: function(response) {
                        if (response.includes("success")) {
                            location.reload();
                        } else if (response.includes("Cannot delete or update a parent row: a foreign key constraint fails")) {
                            toastr.error('Không thể xóa vì có ràng buộc dữ liệu!');
                        } else if (response.includes("error")) {
                            toastr.error('Xóa thất bại!');
                        }
                    },
                    error: function() {
                        toastr.error('Lỗi kết nối!');
                    },
                });
            } else {
                toastr.error('Xóa sản phẩm thất bại !');
            }
        });
    }
</script>