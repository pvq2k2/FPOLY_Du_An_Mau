<script>
    document.title = "Văn Quyết Mobile - Thông tin tài khoản";
</script>

<section class="box_main my-5 ml-2">
    <div class="breadcumrb">

        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
            <li class="leading-normal text-sm">
                <ion-icon name="home-outline"></ion-icon>
            </li>
            <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">Thông tin tài khoản</li>
        </ol>
        <h3 class="mb-0 font-bold capitalize text-2xl leading-10">Thông tin tài khoản</h3>
    </div>
</section>
<div class="relative">
    <div class="bg bg-white shadow-2xl rounded-xl flex flex-col justify-center h-[190px] w-full">
        <div class="text pl-20">
            <h2 class="text-xl font-semibold mb-2 uppercase">CHÀO MỪNG QUAY TRỞ LẠI, <?= $_SESSION['user']['ho_va_ten'] ?></h2>
            <p><i>Kiểm tra và chỉnh sửa thông tin cá nhân của bạn tại đây</i></p>
        </div>
    </div>
    <div class="icon absolute bottom-[-2px] right-[100px]">
        <img src="https://hoanghamobile.com/Content/web/content-icon/icon-account-info.png">
    </div>
</div>
<?php if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) extract($_SESSION['user']); ?>
<div class="grid grid-cols-2 gap-x-10 mt-10 pb-4">
    <div class="col">
        <h3 class="text-xl font-semibold mb-5">Cập nhật tài khoản</h3>
        <form id="updateUser" action="index.php?act=update_information" method="post" enctype="multipart/form-data" class="mx-auto p-10 bg-white shadow-xl rounded-xl">

            <div class="form-group mb-5">
                <label for="ho_va_ten" class="block text-base font-medium leading-6 text-gray-900 mb-3">Họ và tên</label>
                <input id="ho_va_ten" name="ho_va_ten" type="text" value="<?= $ho_va_ten ?>" placeholder="Nhập họ và tên...." class="block w-full outline-none indent-3 rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
                <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
            </div>

            <div class="form-group mb-5">
                <label for="email" class="block text-base font-medium leading-6 text-gray-900 mb-3">Email</label>
                <input id="email" name="email" type="text" value="<?= $email ?>" placeholder="Nhập email...." class="block w-full outline-none indent-3 rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
                <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
            </div>

            <div class="flex justify-between items-center gap-x-5">
                <div class="box-item w-8/12">
                    <div class="form-group mb-5">
                        <label for="so_dien_thoai" class="block text-base font-medium leading-6 text-gray-900 mb-3">Số điện thoại</label>
                        <input id="so_dien_thoai" name="so_dien_thoai" type="text" value="<?= $so_dien_thoai ?>" placeholder="Nhập số điện thoại...." class="block w-full outline-none indent-3 rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
                        <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
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
            </div>

            <div class="form-group mb-5">
                <label for="dia_chi" class="block text-base font-medium leading-6 text-gray-900 mb-3">Địa chỉ</label>
                <textarea placeholder="Nhập địa chỉ" id="dia_chi" name="dia_chi" rows="3" class="outline-none block w-full rounded-md p-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6"><?= $dia_chi ?></textarea>
                <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
            </div>

            <div class="form-group flex items-center gap-x-6">
                <input type="hidden" name="tai_khoan_id" value="<?= $tai_khoan_id ?>">
                <input type="submit" name="btn_update_information" value="Cập nhật tài khoản" class="shadow-xl rounded-md bg-indigo-500 px-5 py-2 text-base font-semibold text-white hover:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition duration-150 ease-out hover:ease-in">
            </div>
        </form>
    </div>

    <div class="col">
        <h3 class="text-xl font-semibold mb-5">Đổi mật khẩu</h3>
        <form id="changePassword" action="index.php?act=update_information" method="post" class="mx-auto p-10 bg-white shadow-xl rounded-xl">

            <div class="form-group mb-5">
                <label for="odd_password" class="block text-base font-medium leading-6 text-gray-900 mb-3">Mật khẩu cũ</label>
                <input id="odd_password" name="odd_password" type="password" placeholder="Nhập mật khẩu cũ" class="block w-full outline-none indent-3 rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
                <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
            </div>

            <div class="form-group mb-5">
                <label for="new_password" class="block text-base font-medium leading-6 text-gray-900 mb-3">Mật khẩu mới</label>
                <input id="new_password" name="new_password" type="password" placeholder="Nhập mật khẩu mới" class="block w-full outline-none indent-3 rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
                <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
            </div>

            <div class="form-group mb-5">
                <label for="confirm_password" class="block text-base font-medium leading-6 text-gray-900 mb-3">Nhập lại mật khẩu</label>
                <input id="confirm_password" name="confirm_password" type="password" placeholder="Nhập lại mật khẩu mới" class="block w-full outline-none indent-3 rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
                <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
            </div>


            <div class="form-group flex items-center gap-x-6">
                <input type="hidden" name="tai_khoan_id" value="<?= $tai_khoan_id ?>">
                <input type="submit" name="btn_change_password" value="Đổi mật khẩu" class="shadow-xl rounded-md bg-indigo-500 px-5 py-2 text-base font-semibold text-white hover:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition duration-150 ease-out hover:ease-in">
            </div>
        </form>
    </div>
</div>


<?php
if (isset($_SESSION['error_message'])) {
    echo '<script>toastr.error("' . $_SESSION['error_message'] . '")</script>';
    unset($_SESSION['error_message']);
}
?>

<?php
if (isset($_SESSION['success_message'])) {
    echo '<script>toastr.success("' . $_SESSION['success_message'] . '")</script>';
    unset($_SESSION['success_message']);
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
                dia_chi: {
                    required: true
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
                dia_chi: {
                    required: "Vui lòng nhập địa chỉ !",
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
                $(element).closest(".form-group").find("#dia_chi").addClass(" border border-red-500");
            },
            unhighlight: function(element) {
                $(element).closest(".form-group").find("#ho_va_ten").removeClass(" border border-red-500");
                $(element).closest(".form-group").find("#email").removeClass(" border border-red-500");
                $(element).closest(".form-group").find("#so_dien_thoai").removeClass(" border border-red-500");
                $(element).closest(".form-group").find("#hinh").removeClass(" border border-red-500");
                $(element).closest(".form-group").find("#dia_chi").removeClass(" border border-red-500");
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

        $("#changePassword").validate({
            rules: {
                odd_password: {
                    required: true,
                    regexPassword: true
                },
                new_password: {
                    required: true,
                    regexPassword: true
                },
                confirm_password: {
                    required: true,
                    regexPassword: true,
                    equalTo: "#new_password",
                },
            },
            messages: {
                odd_password: {
                    required: "Vui lòng nhập mật khẩu cũ !",
                },
                new_password: {
                    required: "Vui lòng nhập mật khẩu mới !",
                },
                confirm_password: {
                    required: "Vui lòng nhập mật khẩu !",
                    equalTo: "Mật khẩu không trùng khớp !",
                },
            },
            errorPlacement: function(error, element) {
                error.appendTo(element.closest(".form-group").find(".error-message"));
            },
            highlight: function(element) {
                $(element).closest(".form-group").find("#odd_password").addClass(" border border-red-500");
                $(element).closest(".form-group").find("#new_password").addClass(" border border-red-500");
                $(element).closest(".form-group").find("#confirm_password").addClass(" border border-red-500");
            },
            unhighlight: function(element) {
                $(element).closest(".form-group").find("#odd_password").removeClass(" border border-red-500");
                $(element).closest(".form-group").find("#new_password").removeClass(" border border-red-500");
                $(element).closest(".form-group").find("#confirm_password").removeClass(" border border-red-500");
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