<script>
    document.title = "Văn Quyết Mobile - Đăng nhập";
</script>
<section class="xl:mx-auto mt-10 shadow-inner rounded-lg mx-3">
    <div class="content grid grid-cols-1 xl:grid-cols-2 lg:grid-cols-2 shadow-lg rounded-lg overflow-hidden">
        <div class="hidden xl:flex lg:flex bg-gradient-to-r from-[#0f4670] to-[#4ba3e7] justify-center">
            <img class="p-5 w-8/12 
            xl:px-0 xl:py-20 xl:w-6/12
            lg:p-20 lg:w-11/12" src="https://res.cloudinary.com/assignmentjs/image/upload/v1644399101/img/login-bg_yyrdj7.png" alt="">
        </div>
        <div>
            <div class="min-h-full flex items-center justify-center p-12 px-4 sm:px-6 lg:px-8">
                <div class="max-w-md w-full space-y-8">
                    <div>
                        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900 uppercase">Đăng nhập</h2>
                    </div>
                    <form class="mt-8 space-y-6" id="login" action="index.php?act=login" method="post">
                        <input type="hidden" name="remember" value="true">
                        <div class="rounded-md shadow-sm -space-y-px">
                            <div class="form-group mb-4">
                                <label for="email" class="py-2">Email</label>
                                <input id="email" name="email" type="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 mt-1 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md ease-in-out duration-300 hover:border-[#0f4670] focus:outline-none focus:ring-[#0f4670] focus:border-[#0f4670] focus:z-10 sm:text-sm" placeholder="Email">
                                <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="mat_khau" class="py-2">Mật khẩu</label>
                                <input id="mat_khau" name="mat_khau" type="password" required class="appearance-none rounded-none relative block w-full px-3 py-2 mt-1 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md ease-in-out duration-300 hover:border-[#0f4670] focus:outline-none focus:ring-[#0f4670] focus:border-[#0f4670] focus:z-10 sm:text-sm" placeholder="Mật khẩu">
                                <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 accent-[#0f4670] ease-in-out duration-300 focus:ring-[#0f4670] border-gray-300 rounded">
                                <label for="remember-me" class="ml-2 block text-sm text-gray-900"> Nhớ mật khẩu </label>
                            </div>

                            <div class="text-sm">
                                <a href="index.php?act=forgot_password" class="font-medium text-[#4ba3e7] ease-in-out duration-300 hover:text-[#0f4670]"> Quên mật khẩu? </a>
                            </div>
                        </div>

                        <div>
                            <input type="submit" name="btn_login" value="Đăng nhập" class="group w-full relative flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-[#4ba3e7] hover:bg-[#0f4670] ease-in-out duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        </div>
                        <p class="mt-3 text-center text-sm text-gray-600">
                            Bạn chưa có tài khoản?
                            <a href="index.php?act=register" class="font-medium ease-in-out duration-300 text-[#4ba3e7] hover:text-[#0f4670]"> Đăng ký </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
if (isset($_SESSION['error_message'])) {
    echo '<script>toastr.error("' . $_SESSION['error_message'] . '")</script>';
    unset($_SESSION['error_message']);
}
?>

<script>
    $(document).ready(function() {
        $.validator.addMethod("regexEmail", function(value, element) {
            var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            return emailRegex.test(value) || this.optional(element);
        }, "Địa chỉ email không hợp lệ !");

        $.validator.addMethod("regexPassword", function(value, element) {
            var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,30}$/;
            return this.optional(element) || passwordRegex.test(value);
        }, "Mật khẩu phải chứa ít nhất 8 ký tự, bao gồm chữ cái viết hoa, viết thường, chữ số và ký tự đặc biệt !");
        $("#login").validate({
            rules: {
                email: {
                    required: true,
                    regexEmail: true
                },
                mat_khau: {
                    required: true,
                    regexPassword: true
                },
            },
            messages: {
                email: {
                    required: "Vui lòng nhập email !",
                },
                mat_khau: {
                    required: "Vui lòng nhập mật khẩu !",
                },
            },
            errorPlacement: function(error, element) {
                error.appendTo(element.closest(".form-group").find(".error-message"));
            },
            highlight: function(element) {
                $(element).closest(".form-group").find("#email").addClass(" border border-red-500");
                $(element).closest(".form-group").find("#mat_khau").addClass(" border border-red-500");
            },
            unhighlight: function(element) {
                $(element).closest(".form-group").find("#email").removeClass(" border border-red-500");
                $(element).closest(".form-group").find("#mat_khau").removeClass(" border border-red-500");
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