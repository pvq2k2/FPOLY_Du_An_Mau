<script>
    document.title = "Văn Quyết Mobile - Quên mật khẩu";
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
                        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900 uppercase">Quên mật khẩu</h2>
                    </div>
                    <form class="mt-8 space-y-6" id="forgot_password" action="index.php?act=forgot_password" method="post">
                        <div class="rounded-md shadow-sm -space-y-px">
                            <div class="form-group mb-4">
                                <label for="email" class="py-2">Email</label>
                                <input id="email" name="email" type="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 mt-1 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md ease-in-out duration-300 hover:border-[#0f4670] focus:outline-none focus:ring-[#0f4670] focus:border-[#0f4670] focus:z-10 sm:text-sm" placeholder="Email">
                                <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
                            </div>
                        </div>


                        <span><?php if (isset($msg) && ($msg != "")) echo  $msg; ?></span>

                        <div>
                            <input type="submit" name="btn_forgot_password" value="Quên mật khẩu" class="group w-full relative flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-[#4ba3e7] hover:bg-[#0f4670] ease-in-out duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        </div>
                        <p class="mt-3 text-center text-sm text-gray-600">
                            Bạn chưa có tài khoản?
                            <a href="index.php?act=register" class="font-medium ease-in-out duration-300 text-[#4ba3e7] hover:text-[#0f4670]"> Đăng ký </a>
                        </p>
                        <p class="mt-3 text-center text-sm text-gray-600">
                            Bạn đã nhớ mật khẩu?
                            <a href="index.php?act=login" class="font-medium ease-in-out duration-300 text-[#4ba3e7] hover:text-[#0f4670]"> Đăng nhập </a>
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

        $("#forgot_password").validate({
            rules: {
                email: {
                    required: true,
                    regexEmail: true
                },
            },
            messages: {
                email: {
                    required: "Vui lòng nhập email !",
                },
            },
            errorPlacement: function(error, element) {
                error.appendTo(element.closest(".form-group").find(".error-message"));
            },
            highlight: function(element) {
                $(element).closest(".form-group").find("#email").addClass(" border border-red-500");
            },
            unhighlight: function(element) {
                $(element).closest(".form-group").find("#email").removeClass(" border border-red-500");
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