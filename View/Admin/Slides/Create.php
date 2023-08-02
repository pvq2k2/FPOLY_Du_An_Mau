<script>
    document.title = "VQMA - Thêm mới ảnh trình chiếu";
</script>

<section class="my-8 ml-2 md:flex md:items-center md:justify-between">
    <div class="breadcumrb">
        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
            <li class="leading-normal text-sm">
                <ion-icon name="home-outline"></ion-icon>
            </li>
            <li class="hover:underline hover:text-blue-500 transition duration-150 ease-out hover:ease-in text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page"><a href="index.php?act=list_slides">Ảnh trình chiếu</a></li>
            <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">Thêm ảnh trình chiếu</li>
        </ol>
        <h3 class="mb-0 font-bold capitalize text-2xl leading-10">Thêm ảnh trình chiếu</h3>
    </div>
</section>


<form id="addSlides" action="index.php?act=add_slides" method="post" enctype="multipart/form-data" class="mx-auto p-10 bg-white shadow-xl rounded-xl">

    <div class="form-group mb-5">
        <label for="slides_id" class="block text-base font-medium leading-6 text-gray-900 mb-3">ID ảnh trình chiếu</label>
        <input id="slides_id" name="slides_id" disabled type="text" placeholder="Tự tăng" class="block w-full outline-none indent-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
    </div>

    <div class="form-group mb-5">
        <label for="san_pham_id" class="block text-base font-medium leading-6 text-gray-900 mb-3">Sản phẩm ID</label>
        <input id="san_pham_id" name="san_pham_id" type="text" placeholder="Nhập sản phẩm id...." class="block w-full outline-none indent-3 rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
        <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
    </div>

    <div class="form-group mb-5">
        <label for="img" class="block text-base font-medium leading-6 text-gray-900 mb-3">Hình</label>
        <input id="img" name="img" type="file" class="block w-full outline-none indent-3 rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
        <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
    </div>

    <div class="img-preview">
        <span class="block text-base font-medium leading-6 text-gray-900 mb-3">Ảnh hiện tại</span>
        <img src="../../Img/no_image.jpg" id="img-preview" class="w-60">
    </div>

    <div class="form-group my-5">
        <label for="trang_thai" class="block text-base font-medium leading-6 text-gray-900 mb-3">Trạng thái</label>
        <select id="trang_thai" name="trang_thai" class="appearance-none outline-none block w-full rounded-md py-1.5 px-5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
            <option value="" hidden>Chọn trạng thái</option>
            <option value="1">Hoạt động</option>
            <option value="2">Không hoạt động</option>
        </select>

        <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
    </div>

    <div class="form-group flex items-center gap-x-6">
        <input type="submit" name="btn_add_slides" value="Thêm mới" class="shadow-xl rounded-md bg-indigo-500 px-5 py-2 text-base font-semibold text-white hover:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition duration-150 ease-out hover:ease-in">
        <a href="index.php?act=list_slides" class="border px-5 py-2 shadow-xl rounded-md text-base font-semibold leading-6 text-gray-900 hover:border-indigo-500 transition duration-150 ease-out hover:ease-in">Trở lại</a>
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

        $("#addSlides").validate({
            rules: {
                san_pham_id: {
                    required: true,
                    number: true
                },
                img: {
                    required: true,
                    imageExtension: true
                },
                trang_thai: {
                    required: true,
                },
            },
            messages: {
                san_pham_id: {
                    required: "Vui lòng nhập sản phẩm ID !",
                },
                img: {
                    required: "Vui lòng chọn hình !",
                },
                trang_thai: {
                    required: "Vui lòng chọn trang thái !",
                },
            },
            errorPlacement: function(error, element) {
                error.appendTo(element.closest(".form-group").find(".error-message"));
            },
            highlight: function(element) {
                $(element).closest(".form-group").find("#san_pham_id").addClass(" border border-red-500");
                $(element).closest(".form-group").find("#img").addClass(" border border-red-500");
                $(element).closest(".form-group").find("#trang_thai").addClass(" border border-red-500");
            },
            unhighlight: function(element) {
                $(element).closest(".form-group").find("#san_pham_id").removeClass(" border border-red-500");
                $(element).closest(".form-group").find("#img").removeClass(" border border-red-500");
                $(element).closest(".form-group").find("#trang_thai").removeClass(" border border-red-500");
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
        const InputFileElement = $('#img');

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