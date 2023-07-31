<script>
    document.title = "VQMA - Cập nhật đơn hàng";
</script>

<?php
if (is_array($Order)) {
    extract($Order);
}
?>

<section class="my-8 ml-2 md:flex md:items-center md:justify-between">
    <div class="breadcumrb">
        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
            <li class="leading-normal text-sm">
                <ion-icon name="home-outline"></ion-icon>
            </li>
            <li class="hover:underline hover:text-blue-500 transition duration-150 ease-out hover:ease-in text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page"><a href="index.php?act=list_order">Đơn hàng</a></li>
            <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">Cập nhật đơn hàng</li>
        </ol>
        <h3 class="mb-0 font-bold capitalize text-2xl leading-10">Cập nhật đơn hàng</h3>
    </div>
</section>


<form id="updateOrder" action="index.php?act=update_order" method="post" class="mx-auto p-10 bg-white shadow-xl rounded-xl">

    <div class="form-group mb-5">
        <label for="ho_va_ten" class="block text-base font-medium leading-6 text-gray-900 mb-3">Người đặt hàng</label>
        <input id="ho_va_ten" name="ho_va_ten" type="text" value="<?= $ho_va_ten ?>" placeholder="Nhập tên người đặt hàng...." class="block w-full outline-none indent-3 rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
        <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
    </div>

    <div class="form-group mb-5">
        <label for="email" class="block text-base font-medium leading-6 text-gray-900 mb-3">Email</label>
        <input id="email" name="email" type="text" value="<?= $email ?>" placeholder="Nhập email...." class="block w-full outline-none indent-3 rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
        <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
    </div>

    <div class="form-group mb-5">
        <label for="so_dien_thoai" class="block text-base font-medium leading-6 text-gray-900 mb-3">Số điện thoại</label>
        <input id="so_dien_thoai" name="so_dien_thoai" type="text" value="<?= $so_dien_thoai ?>" placeholder="Nhập số điện thoại...." class="block w-full outline-none indent-3 rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
        <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
    </div>

    <div class="form-group mb-5">
        <label for="dia_chi" class="block text-base font-medium leading-6 text-gray-900 mb-3">Địa chỉ</label>
        <input id="dia_chi" name="dia_chi" type="text" value="<?= $dia_chi ?>" placeholder="Nhập địa chỉ...." class="block w-full outline-none indent-3 rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
        <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
    </div>

    <div class="form-group mb-5">
        <label for="trang_thai" class="block text-base font-medium leading-6 text-gray-900 mb-3">Trạng thái</label>
        <select name="trang_thai" id="trang_thai" class="appearance-none outline-none block w-full rounded-md py-1.5 px-5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
            <option value="" hidden>Chọn trạng thái</option>
            <option value="1" <?php echo $trang_thai == 1 ? 'selected' : '' ?>>Chờ xác nhận</option>
            <option value="2" <?php echo $trang_thai == 2 ? 'selected' : '' ?>>Đang xử lý</option>
            <option value="3" <?php echo $trang_thai == 3 ? 'selected' : '' ?>>Đang giao hàng</option>
            <option value="4" <?php echo $trang_thai == 4 ? 'selected' : '' ?>>Thành công</option>
        </select>
        <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
    </div>

    <div class="form-group flex items-center gap-x-6">
        <input type="hidden" name="don_hang_id" value="<?= $don_hang_id ?>">
        <input type="submit" name="btn_update_order" value="Cập nhật" class="shadow-xl rounded-md bg-indigo-500 px-5 py-2 text-base font-semibold text-white hover:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition duration-150 ease-out hover:ease-in">
        <a href="index.php?act=list_order" class="border px-5 py-2 shadow-xl rounded-md text-base font-semibold leading-6 text-gray-900 hover:border-indigo-500 transition duration-150 ease-out hover:ease-in">Trở lại</a>
    </div>
</form>

<script>
    $(document).ready(function() {
        $.validator.addMethod("regexEmail", function(value, element) {
            var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            return this.optional(element) || emailRegex.test(value);
        }, "Địa chỉ email không hợp lệ !");

        $.validator.addMethod("regexPhoneNumber", function(value, element) {
            var phoneNumberRegex = /^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/;
            return this.optional(element) || phoneNumberRegex.test(value);
        }, "Số điện thoại không hợp lệ !");

        $("#updateOrder").validate({
            rules: {
                ho_va_ten: {
                    required: true,
                },
                email: {
                    required: true,
                    regexEmail: true
                },
                so_dien_thoai: {
                    required: true,
                    regexPhoneNumber: true
                },
                dia_chi: {
                    required: true
                },
                trang_thai: {
                    required: true
                }
            },
            messages: {
                ho_va_ten: {
                    required: "Vui lòng nhập họ và tên !",
                },
                email: {
                    required: "Vui lòng nhập email !",
                },
                so_dien_thoai: {
                    required: "Vui lòng nhập số điện thoại !",
                },
                dia_chi: {
                    required: "Vui lòng nhập địa chỉ !",
                },
                trang_thai: {
                    required: "Vui lòng chọn trạng thái !",
                }
            },
            errorPlacement: function(error, element) {
                error.appendTo(element.closest(".form-group").find(".error-message"));
            },
            highlight: function(element) {
                $(element).closest(".form-group").find("#ho_va_ten").addClass(" border border-red-500");
                $(element).closest(".form-group").find("#email").addClass(" border border-red-500");
                $(element).closest(".form-group").find("#so_dien_thoai").addClass(" border border-red-500");
                $(element).closest(".form-group").find("#dia_chi").addClass(" border border-red-500");
                $(element).closest(".form-group").find("#trang_thai").addClass(" border border-red-500");
            },
            unhighlight: function(element) {
                $(element).closest(".form-group").find("#ho_va_ten").removeClass(" border border-red-500");
                $(element).closest(".form-group").find("#email").removeClass(" border border-red-500");
                $(element).closest(".form-group").find("#so_dien_thoai").removeClass(" border border-red-500");
                $(element).closest(".form-group").find("#dia_chi").removeClass(" border border-red-500");
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
    });
</script>