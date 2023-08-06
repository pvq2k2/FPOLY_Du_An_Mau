<script>
    document.title = "Văn Quyết Mobile - <?= $Product['ten_san_pham'] ?>";
</script>

<?php
if (is_array($Product)) {
    extract($Product);
    $hinhPath = "Upload/Product/" . $hinh;
    if (!is_file($hinhPath)) $hinhPath = "Img/no_image.jpg";
}
?>

<section class="my-8 ml-2 md:flex md:items-center md:justify-between">
    <div class="breadcumrb">
        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
            <li class="hover:underline hover:text-blue-500 transition duration-150 ease-out hover:ease-in text-sm capitalize leading-normal text-slate-700" aria-current="page">
                <a href="index.php">
                    <ion-icon name="home-outline"></ion-icon>
                    Trang chủ
                </a>
            </li>
            <li class="hover:underline hover:text-blue-500 transition duration-150 ease-out pl-2 hover:ease-in text-sm capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">
                <a href="index.php?act=product&category_id=<?= $Category['danh_muc_id'] ?>">
                    <?= $Category['ten_danh_muc'] ?>
                </a>
            </li>
            <li class="text-sm pl-2 capitalize leading-normal text-[#4ba3e7] before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page"><?= $Product['ten_san_pham'] ?></li>
        </ol>
    </div>
</section>

<section>
    <div class="flex gap-x-10">
        <div class="img max-w-[550px] max-h-[500px] rounded-xl overflow-hidden shadow-xl">
            <img src="<?= $hinhPath ?>" class="mx-auto">
        </div>
        <div class="info w-6/12">
            <form action="index.php?act=add_to_cart" method="post" id="addToCartForm">

                <h2 class="font-bold text-2xl mb-3"><?= $ten_san_pham ?></h2>
                <span class="font-semibold text-xl text-red-400 mb-2 inline-block"><?= FormatNumber($gia) ?>đ</span>
                <div class="form_group">
                    <label for="quantityInput">Số lượng</label>
                    <div class="flex mt-2 mb-5">
                        <button name="decreaseBtn" id="decreaseBtn" class="btn down-quantity bg-white cursor-pointer flex items-center justify-center outline-none border w-8 h-8 text-[rgba(0,0,0,.8)]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                            </svg>
                        </button>
                        <input type="number" name="so_luong" id="quantityInput" min="1" value="1" class="border w-14 h-8 text-base font-normal box-border text-center cursor-text outline-none">
                        <button name="increaseBtn" id="increaseBtn" class="btn up-quantity bg-white cursor-pointer flex items-center justify-center outline-none border w-8 h-8 text-[rgba(0,0,0,.8)]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="form_group">
                    <input type="hidden" name="san_pham_id" value="<?= $san_pham_id ?>">
                    <input id="addToCartBtn" type="submit" name="btn_add_to_cart" value="Thêm vào giỏ hàng" class="shadow-xl rounded-md bg-[#4ba3e7] px-5 py-2 text-base font-semibold text-white hover:bg-[#0f4670] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition duration-150 ease-out hover:ease-in">
                </div>
            </form>
        </div>
    </div>


    <div class="title mt-12 inline-block h-8 overflow-hidden bg-[#4ba3e7] rounded after:content-[''] after:ml-10 after:border-t-[40px] after:border-t-[#0f4670] after:border-l-[40px] after:border-[#4ba3e7]">
        <h4 class="text-white text-center pr-16 pl-9 ml-16 bg-[#0f4670] text-white uppercase">Mô tả</h4>
    </div>

    <p><?= $mo_ta ?></p>



    <div class="boxComment mt-10 px-8 py-5 bg-white shadow-xl rounded-xl">
        <div class="title_boxComment">
            <h3 class="font-bold text-xl ">Bình luận về <?= $ten_san_pham ?></h3>
        </div>

        <div class="formComment">
            <form id="commentForm" action="index.php?act=product_detail&product_id=<?= $san_pham_id ?>" method="post" class="relative">
                <?php
                if (!isset($_SESSION['user'])) {
                ?>
                    <div class="overlay absolute top-0 left-0 right-0 bottom-0 bg-white flex flex-col justify-center items-center"><span class="font-bold">Vui lòng đăng nhập để bình luận</span></div>
                <?php } ?>
                <div class="form-group my-5">
                    <textarea placeholder="Nhập nội dung" id="noi_dung" name="noi_dung" rows="3" class="outline-none indent-3 block w-full h-32 rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-base sm:leading-6"></textarea>
                    <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
                </div>
                <input type="hidden" name="tai_khoan_id" value="<?= $_SESSION['user']['tai_khoan_id'] ?>">
                <input type="hidden" name="san_pham_id" value="<?= $san_pham_id ?>">
                <div class="form-group flex items-center justify-end">
                    <input type="submit" name="btn_add_comment" value="Gửi bình luận" class="rounded-2xl bg-gradient-to-r from-[#4ba3e7] to-[#0f4670] hover:bg-gradient-to-r hover:from-[#0f4670] hover:to-[#4ba3e7] transition-all duration-300 ease-in-out px-20 py-2 text-base font-semibold text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 transition duration-150 ease-out hover:ease-in">
                </div>
            </form>

            <iframe src="View/Site/Product/CommentProduct.php?san_pham_id=<?= $san_pham_id ?>" frameborder="0" class="w-full h-[200px] mt-2"></iframe>
        </div>
    </div>

    <div class="my-5">
        <div class="title mt-5 inline-block h-8 overflow-hidden bg-[#4ba3e7] rounded after:content-[''] after:ml-10 after:border-t-[40px] after:border-t-[#0f4670] after:border-l-[40px] after:border-[#4ba3e7]">
            <h4 class="text-white text-center pr-16 pl-9 ml-16 bg-[#0f4670] text-white uppercase">Sản phẩm cùng loại</h4>
        </div>

        <div class="grid grid-cols-5 gap-x-5 gap-y-10 mt-5">
            <?php
            foreach ($ListSimilarProduct as $SimilarProduct) {
                extract($SimilarProduct);
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
    $(document).ready(function() {
        const quantitySpan = $('#quantity');
        const quantityInput = $('#quantityInput');
        const increaseBtn = $('#increaseBtn');
        const decreaseBtn = $('#decreaseBtn');

        let quantity = 1;

        quantityInput.on('input', function() {
            quantity = parseInt(quantityInput.val());
            quantitySpan.text(quantity);
        });

        increaseBtn.click(function(e) {
            e.preventDefault();
            quantity++;
            quantitySpan.text(quantity);
            quantityInput.val(quantity);
        });

        decreaseBtn.click(function(e) {
            e.preventDefault();
            if (quantity > 1) {
                quantity--;
                quantitySpan.text(quantity);
                quantityInput.val(quantity);
            } else {
                toastr.warning('Số lượng không được nhỏ hơn 1 !');
            }
        });


        $("#commentForm").validate({
            rules: {
                noi_dung: {
                    required: true,
                },
            },
            messages: {
                noi_dung: {
                    required: "Vui lòng nhập nội dung !",
                },
            },
            errorPlacement: function(error, element) {
                error.appendTo(element.closest(".form-group").find(".error-message"));
            },
            highlight: function(element) {
                $(element).closest(".form-group").find("#noi_dung").addClass(" border border-red-500");
            },
            unhighlight: function(element) {
                $(element).closest(".form-group").find("#noi_dung").removeClass(" border border-red-500");
            },
            submitHandler: function(form) {
                if (this.checkForm()) {
                    form.submit();
                } else {
                    $(form).find(":input.error:first").focus();
                }
                return false;
            }
        });
    });
</script>