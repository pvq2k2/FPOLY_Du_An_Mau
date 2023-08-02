<?php
if (is_array($User)) {
    extract($User);
    $hinhPath = "../../Upload/User/" . $hinh;
    if (!is_file($hinhPath)) $hinhPath = "../../Img/no_image.jpg";
}
?>
<script>
    document.title = "VQMA - Cập nhật tài khoản";
</script>

<section class="my-8 ml-2 md:flex md:items-center md:justify-between">
    <div class="breadcumrb">
        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
            <li class="leading-normal text-sm">
                <ion-icon name="home-outline"></ion-icon>
            </li>
            <li class="hover:underline hover:text-blue-500 transition duration-150 ease-out hover:ease-in text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page"><a href="index.php?act=list_user">Tài khoản</a></li>
            <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">Cập nhật tài khoản</li>
        </ol>
        <h3 class="mb-0 font-bold capitalize text-2xl leading-10">Cập nhật tài khoản</h3>
    </div>
</section>


<form id="updateUser" action="index.php?act=update_user" method="post" enctype="multipart/form-data" class="mx-auto p-10 bg-white shadow-xl rounded-xl">

    <div class="form-group mb-5">
        <label for="tai_khoan_id" class="block text-base font-medium leading-6 text-gray-900 mb-3">ID tài khoản</label>
        <input id="tai_khoan_id" name="tai_khoan_id" disabled type="text" value="<?= $tai_khoan_id ?>" placeholder="Tự tăng" class="block w-full outline-none indent-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
    </div>

    <div class="form-group mb-5">
        <label for="ho_va_ten" class="block text-base font-medium leading-6 text-gray-900 mb-3">Họ và tên</label>
        <input id="ho_va_ten" name="ho_va_ten" type="text" value="<?= $ho_va_ten ?>" placeholder="Nhập họ và tên...." class="block w-full outline-none indent-3 rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
        <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
    </div>

    <div class="flex justify-between items-center">
        <div class="box-item w-10/12">
            <div class="flex justify-between gap-x-10">
                <div class="form-group mb-5 w-6/12">
                    <label for="email" class="block text-base font-medium leading-6 text-gray-900 mb-3">Email</label>
                    <input id="email" name="email" type="text" value="<?= $email ?>" placeholder="Nhập email...." class="block w-full outline-none indent-3 rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
                    <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
                </div>
                <div class="form-group mb-5 w-6/12">
                    <label for="so_dien_thoai" class="block text-base font-medium leading-6 text-gray-900 mb-3">Số điện thoại</label>
                    <input id="so_dien_thoai" name="so_dien_thoai" type="text" value="<?= $so_dien_thoai ?>" placeholder="Nhập số điện thoại...." class="block w-full outline-none indent-3 rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
                    <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
                </div>
            </div>

            <div class="form-group mb-5">
                <label for="hinh" class="block text-base font-medium leading-6 text-gray-900 mb-3">Hình</label>
                <input id="hinh" name="hinh" value="<?= $hinh ?>" type="file" class="block w-full outline-none indent-3 rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
                <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
            </div>
        </div>

        <div class="img-preview">
            <span class="block text-base font-medium leading-6 text-gray-900 mb-3">Ảnh hiện tại</span>
            <img src="<?= $hinhPath ?>" id="img-preview" class="w-40">
        </div>
    </div>

    <div class="form-group mb-5">
        <label for="mat_khau" class="block text-base font-medium leading-6 text-gray-900 mb-3">Mật khẩu</label>
        <input id="mat_khau" name="mat_khau" type="password" value="<?= $mat_khau ?>" placeholder="Nhập mật khẩu...." class="block w-full outline-none indent-3 rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
        <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
    </div>

    <div class="mt-2 flex items-center gap-x-20 gap-y-8 mb-5">
        <div class="form-group">
            <label class="block text-base font-medium leading-6 text-gray-900 mb-3">Giới tính</label>
            <div class="flex gap-x-10">
                <div class="flex items-center gap-x-3">
                    <input id="gioi_tinh_nam" name="gioi_tinh" type="radio" value="1" <?php echo $gioi_tinh == 1 ? 'checked' : '' ?> checked class="accent-blue-500 h-5 w-5 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    <label for="gioi_tinh_nam" class="block text-base font-medium leading-6 text-gray-900">Nam</label>
                </div>
                <div class="flex items-center gap-x-3">
                    <input id="gioi_tinh_nu" name="gioi_tinh" type="radio" value="2" <?php echo $gioi_tinh == 2 ? 'checked' : '' ?> class="accent-blue-500 h-5 w-5 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    <label for="gioi_tinh_nu" class="block text-base font-medium leading-6 text-gray-900">Nữ</label>
                </div>
            </div>
            <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
        </div>

        <div class="form-group w-11/12">
            <label for="vai_tro" class="block text-base font-medium leading-6 text-gray-900 mb-3">Vai trò</label>
            <select name="vai_tro" id="vai_tro" class="appearance-none outline-none block w-full rounded-md py-1.5 px-5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
                <option value="" hidden>Chọn vai trò</option>
                <option value="0" <?php echo $vai_tro == 0 ? 'selected' : '' ?>>User</option>
                <option value="1" <?php echo $vai_tro == 1 ? 'selected' : '' ?>>Admin</option>
            </select>
            <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
        </div>
    </div>

    <div class="form-group mb-5">
        <label for="dia_chi" class="block text-base font-medium leading-6 text-gray-900 mb-3">Địa chỉ</label>
        <input id="dia_chi" name="dia_chi" type="text" value="<?= $dia_chi ?>" placeholder="Nhập địa chị...." class="block w-full outline-none indent-3 rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
        <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
    </div>

    <div class="form-group flex items-center gap-x-6">
        <input type="hidden" name="tai_khoan_id" value="<?= $tai_khoan_id ?>">
        <input type="submit" name="btn_update_user" value="Cập nhật" class="shadow-xl rounded-md bg-indigo-500 px-5 py-2 text-base font-semibold text-white hover:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition duration-150 ease-out hover:ease-in">
        <a href="index.php?act=list_user" class="border px-5 py-2 shadow-xl rounded-md text-base font-semibold leading-6 text-gray-900 hover:border-indigo-500 transition duration-150 ease-out hover:ease-in">Trở lại</a>
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
            return this.optional(element) || /\.(jpg|jpeg|png|gif|webp)$/i.test(value);
        }, "Vui lòng chọn tệp ảnh có phần mở rộng là jpg, jpeg, png, gif hoặc webp.");

        $.validator.addMethod("regexEmail", function(value, element) {
            var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            return this.optional(element) || emailRegex.test(value);
        }, "Địa chỉ email không hợp lệ !");

        $.validator.addMethod("regexPhoneNumber", function(value, element) {
            var phoneNumberRegex = /^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/;
            return this.optional(element) || phoneNumberRegex.test(value);
        }, "Số điện thoại không hợp lệ !");

        $.validator.addMethod("regexPassword", function(value, element) {
            var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,30}$/;
            return this.optional(element) || passwordRegex.test(value);
        }, "Mật khẩu phải chứa ít nhất 8 ký tự, bao gồm chữ cái viết hoa, viết thường, chữ số và ký tự đặc biệt !");

        $("#updateUser").validate({
            rules: {
                ho_va_ten: {
                    required: true,
                },
                email: {
                    required: true,
                    regexEmail: true
                },
                hinh: {
                    imageExtension: true
                },
                so_dien_thoai: {
                    required: true,
                    number: true,
                    digits: true,
                    regexPhoneNumber: true
                },
                mat_khau: {
                    required: true,
                    regexPassword: true
                },
                dia_chi: {
                    required: true
                },
                vai_tro: {
                    required: true,
                },
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
                    number: "Vui lòng nhập vào là số!",
                    digits: "Vui lòng nhập số nguyên dương!"
                },
                hinh: {
                    required: "Vui lòng chọn hình !",
                },
                mat_khau: {
                    required: "Vui lòng nhập mật khẩu !",
                },
                dia_chi: {
                    required: "Vui lòng nhập địa chỉ !",
                },
                vai_tro: {
                    required: "Vui lòng chọn vai trò !",
                },
            },
            errorPlacement: function(error, element) {
                error.appendTo(element.closest(".form-group").find(".error-message"));
            },
            highlight: function(element) {
                $(element).closest(".form-group").find("#ho_va_ten").addClass(" border border-red-500");
                $(element).closest(".form-group").find("#email").addClass(" border border-red-500");
                $(element).closest(".form-group").find("#so_dien_thoai").addClass(" border border-red-500");
                $(element).closest(".form-group").find("#hinh").addClass(" border border-red-500");
                $(element).closest(".form-group").find("#mat_khau").addClass(" border border-red-500");
                $(element).closest(".form-group").find("#vai_tro").addClass(" border border-red-500");
            },
            unhighlight: function(element) {
                $(element).closest(".form-group").find("#ho_va_ten").removeClass(" border border-red-500");
                $(element).closest(".form-group").find("#email").removeClass(" border border-red-500");
                $(element).closest(".form-group").find("#so_dien_thoai").removeClass(" border border-red-500");
                $(element).closest(".form-group").find("#hinh").removeClass(" border border-red-500");
                $(element).closest(".form-group").find("#mat_khau").removeClass(" border border-red-500");
                $(element).closest(".form-group").find("#vai_tro").removeClass(" border border-red-500");
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
        const ExistingHinhValue = <?= json_encode($hinh) ?>;
        ImgPreviewElement.attr('src', ExistingHinhValue ? `../../Upload/User/${ExistingHinhValue}` : '../../Img/no_image.jpg');

        InputFileElement.change(function() {
            const file = this.files[0];
            if (file) {
                const extension = file.name.split('.').pop().toLowerCase();
                if (['jpg', 'jpeg', 'png', 'gif', "webp"].includes(extension)) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        ImgPreviewElement.attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                } else {
                    ImgPreviewElement.attr('src', '../../Img/no_image.jpg');
                }
            } else {
                ImgPreviewElement.attr('src', ExistingHinhValue ? `../../Upload/User/${ExistingHinhValue}` : '../../Img/no_image.jpg');
            }
        });

    });
</script>