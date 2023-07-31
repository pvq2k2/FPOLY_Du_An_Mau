<script>
    document.title = "VQMA - Cập nhật bình luận";
</script>

<?php
if (is_array($Comment)) {
    extract($Comment);
    $URLDetailComment = "index.php?act=detail_product_comment&id=" . $san_pham_id;
}
?>
<section class="my-8 ml-2 md:flex md:items-center md:justify-between">
    <div class="breadcumrb">
        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
            <li class="leading-normal text-sm">
                <ion-icon name="home-outline"></ion-icon>
            </li>
            <li class="hover:underline hover:text-blue-500 transition duration-150 ease-out hover:ease-in text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page"><a href="index.php?act=list_product_comment">Sản phẩm có bình luận</a></li>
            <li class="hover:underline hover:text-blue-500 transition duration-150 ease-out hover:ease-in text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page"><a href="<?= $URLDetailComment ?>"><?= $Product["ten_san_pham"] ?></a></li>
            <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">Cập nhật bình luận</li>
        </ol>
        <h3 class="mb-0 font-bold capitalize text-2xl leading-10">Cập nhật bình luận</h3>
    </div>
</section>


<form id="updateComment" action="index.php?act=update_comment" method="post" class="mx-auto p-10 bg-white shadow-xl rounded-xl">
    <div class="form-group mb-5">
        <label for="binh_luan_id" class="block text-base font-medium leading-6 text-gray-900 mb-3">ID bình luận</label>
        <input id="binh_luan_id" name="binh_luan_id" disabled type="text" value="<?= $binh_luan_id ?>" placeholder="Tự tăng" class="block w-full outline-none indent-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
    </div>

    <div class="form-group mb-5">
        <label for="tai_khoan_id" class="block text-base font-medium leading-6 text-gray-900 mb-3">ID tài khoản</label>
        <input id="tai_khoan_id" name="tai_khoan_id" disabled type="text" value="<?= $tai_khoan_id ?>" placeholder="Tự tăng" class="block w-full outline-none indent-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
    </div>

    <div class="form-group mb-5">
        <label for="san_pham_id" class="block text-base font-medium leading-6 text-gray-900 mb-3">ID sản phẩm</label>
        <input id="san_pham_id" name="san_pham_id" disabled type="text" value="<?= $san_pham_id ?>" placeholder="Tự tăng" class="block w-full outline-none indent-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
    </div>

    <div class="form-group mb-5">
        <label for="noi_dung" class="block text-base font-medium leading-6 text-gray-900 mb-3">Nội dung</label>
        <textarea placeholder="Nhập nội dung..." id="noi_dung" name="noi_dung" rows="3" class="outline-none indent-3 block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6"><?= $noi_dung ?></textarea>
        <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
    </div>

    <div class="form-group flex items-center gap-x-6">
        <input type="hidden" name="binh_luan_id" value="<?= $binh_luan_id ?>">
        <input type="hidden" name="san_pham_id" value="<?= $san_pham_id ?>">
        <input type="submit" name="btn_update_comment" value="Cập nhật" class="shadow-xl rounded-md bg-indigo-500 px-5 py-2 text-base font-semibold text-white hover:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition duration-150 ease-out hover:ease-in">
        <a href="<?= $URLDetailComment ?>" class="border px-5 py-2 shadow-xl rounded-md text-base font-semibold leading-6 text-gray-900 hover:border-indigo-500 transition duration-150 ease-out hover:ease-in">Trở lại</a>
    </div>
</form>

<script>
    $(document).ready(function() {
        $("#updateComment").validate({
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