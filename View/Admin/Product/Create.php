<script>
    document.title = "VQMA - Thêm mới sản phẩm";
</script>

<section class="my-8 ml-2 md:flex md:items-center md:justify-between">
    <div class="breadcumrb">
        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
            <li class="leading-normal text-sm">
                <ion-icon name="home-outline"></ion-icon>
            </li>
            <li class="hover:underline hover:text-blue-500 transition duration-150 ease-out hover:ease-in text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page"><a href="index.php?act=list_product">Sản phẩm</a></li>
            <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">Thêm sản phẩm</li>
        </ol>
        <h3 class="mb-0 font-bold capitalize text-2xl leading-10">Thêm sản phẩm</h3>
    </div>
</section>


<form id="addProduct" action="index.php?act=add_product" method="post" enctype="multipart/form-data" class="mx-auto p-10 bg-white shadow-xl rounded-xl">

    <div class="form-group mb-5">
        <label for="san_pham_id" class="block text-base font-medium leading-6 text-gray-900 mb-3">ID sản phẩm</label>
        <input id="san_pham_id" name="san_pham_id" disabled type="text" placeholder="Tự tăng" class="block w-full outline-none indent-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
    </div>

    <div class="form-group mb-5">
        <label for="ten_san_pham" class="block text-base font-medium leading-6 text-gray-900 mb-3">Tên sản phẩm</label>
        <input id="ten_san_pham" name="ten_san_pham" type="text" placeholder="Nhập tên sản phẩm...." class="block w-full outline-none indent-3 rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
        <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
    </div>

    <div class="flex justify-between items-center">
        <div class="box-item w-10/12">
            <div class="form-group mb-5">
                <label for="gia" class="block text-base font-medium leading-6 text-gray-900 mb-3">Giá</label>
                <input id="gia" name="gia" type="text" placeholder="Nhập giá...." class="block w-full outline-none indent-3 rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
                <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
            </div>
            <div class="form-group mb-5">
                <label for="hinh" class="block text-base font-medium leading-6 text-gray-900 mb-3">Hình</label>
                <input id="hinh" name="hinh" type="file" class="block w-full outline-none indent-3 rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
                <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
            </div>
        </div>

        <div class="img-preview">
            <span class="block text-base font-medium leading-6 text-gray-900 mb-3">Ảnh hiện tại</span>
            <img src="../../Img/no_image.jpg" id="img-preview" class="w-40">
        </div>
    </div>

    <div class="mt-2 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 mb-5">
        <div class="form-group sm:col-span-3">
            <label for="ngay_nhap" class="block text-base font-medium leading-6 text-gray-900 mb-3">Ngày nhập</label>
            <input type="date" name="ngay_nhap" id="ngay_nhap" pattern="\d{4}/\d{2}/\d{2}" required class="outline-none block w-full rounded-md py-1.5 px-5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
            <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
        </div>

        <div class="form-group sm:col-span-3">
            <label for="danh_muc_id" class="block text-base font-medium leading-6 text-gray-900 mb-3">Danh mục</label>
            <select name="danh_muc_id" id="danh_muc_id" class="appearance-none outline-none block w-full rounded-md py-1.5 px-5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
                <option value="" hidden>Chọn danh mục</option>
                <?php
                foreach ($ListCategory as $Category) {
                    extract($Category);
                ?>
                    <option value="<?= $danh_muc_id ?>"><?= $ten_danh_muc ?></option>
                <?php } ?>
            </select>
            <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
        </div>
    </div>

    <div class="form-group mb-5">
        <label for="mo_ta" class="block text-base font-medium leading-6 text-gray-900 mb-3">Mô tả</label>
        <textarea placeholder="Nhập mô tả..." id="mo_ta" name="mo_ta" rows="3" class="outline-none indent-3 block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6"></textarea>
        <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
    </div>

    <div class="form-group flex items-center gap-x-6">
        <input type="submit" name="btn_add_product" value="Thêm mới" class="shadow-xl rounded-md bg-indigo-500 px-5 py-2 text-base font-semibold text-white hover:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition duration-150 ease-out hover:ease-in">
        <a href="index.php?act=list_product" class="border px-5 py-2 shadow-xl rounded-md text-base font-semibold leading-6 text-gray-900 hover:border-indigo-500 transition duration-150 ease-out hover:ease-in">Trở lại</a>
    </div>
</form>

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
        $.validator.addMethod("imageExtension", function(value, element) {
            return this.optional(element) || /\.(jpg|jpeg|png|gif)$/i.test(value);
        }, "Vui lòng chọn tệp ảnh có phần mở rộng là jpg, jpeg, png hoặc gif.");

        $("#addProduct").validate({
            rules: {
                ten_san_pham: {
                    required: true,
                },
                gia: {
                    required: true,
                },
                hinh: {
                    required: true,
                    imageExtension: true
                },
                ngay_nhap: {
                    required: true,
                },
                danh_muc_id: {
                    required: true,
                },
                mo_ta: {
                    required: true,
                },
            },
            messages: {
                ten_san_pham: {
                    required: "Vui lòng nhập tên sản phẩm !",
                },
                gia: {
                    required: "Vui lòng nhập giá !",
                },
                hinh: {
                    required: "Vui lòng chọn hình !",
                },
                ngay_nhap: {
                    required: "Vui lòng chọn ngày nhập !",
                },
                danh_muc_id: {
                    required: "Vui lòng chọn danh mục !",
                },
                mo_ta: {
                    required: "Vui lòng nhập nội dung !",
                },
            },
            errorPlacement: function(error, element) {
                error.appendTo(element.closest(".form-group").find(".error-message"));
            },
            highlight: function(element) {
                $(element).closest(".form-group").find("#ten_san_pham").addClass(" border border-red-500");
                $(element).closest(".form-group").find("#gia").addClass(" border border-red-500");
                $(element).closest(".form-group").find("#hinh").addClass(" border border-red-500");
                $(element).closest(".form-group").find("#ngay_nhap").addClass(" border border-red-500");
                $(element).closest(".form-group").find("#danh_muc_id").addClass(" border border-red-500");
                $(element).closest(".form-group").find("#mo_ta").addClass(" border border-red-500");
            },
            unhighlight: function(element) {
                $(element).closest(".form-group").find("#ten_san_pham").removeClass(" border border-red-500");
                $(element).closest(".form-group").find("#gia").removeClass(" border border-red-500");
                $(element).closest(".form-group").find("#hinh").removeClass(" border border-red-500");
                $(element).closest(".form-group").find("#ngay_nhap").removeClass(" border border-red-500");
                $(element).closest(".form-group").find("#danh_muc_id").removeClass(" border border-red-500");
                $(element).closest(".form-group").find("#mo_ta").removeClass(" border border-red-500");
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

        const ImgPreviewElement = $('#img-preview');
        const InputFileElement = $('#hinh');

        InputFileElement.change(function() {
            const file = this.files[0];
            if (file) {
                const extension = file.name.split('.').pop().toLowerCase();
                if (['jpg', 'jpeg', 'png', 'gif'].includes(extension)) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        ImgPreviewElement.attr('src', e.target.result);
                    };

                    reader.readAsDataURL(file);
                } else {
                    // Nếu người dùng chọn tệp không phải là ảnh, reset input và hiển thị ảnh mặc định
                    ImgPreviewElement.attr('src', '../../Img/no_image.jpg');
                }
            } else {
                // Nếu không có tệp được chọn, hiển thị ảnh mặc định
                ImgPreviewElement.attr('src', '../../Img/no_image.jpg');
            }
        });
    });
</script>