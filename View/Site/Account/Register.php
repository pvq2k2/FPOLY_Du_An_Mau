<script>
    document.title = "Văn Quyết Mobile - Đăng ký";
</script>
<section class="xl:mx-auto mt-10 shadow-inner rounded-lg mx-3">
    <div class="content grid grid-cols-1 xl:grid-cols-2 lg:grid-cols-2 shadow-lg rounded-lg overflow-hidden">
        <div class="hidden xl:flex lg:flex bg-gradient-to-r from-[#0f4670] to-[#4ba3e7] justify-center">
            <img class="p-5 w-8/12
            xl:px-[40px] xl:py-[90px] xl:h-[650px] xl:max-w-[500px] xl:my-auto
            lg:p-20 lg:w-11/12" src="https://res.cloudinary.com/assignmentjs/image/upload/v1644399101/img/login-bg_yyrdj7.png" alt="">
        </div>
        <div>
            <div class="min-h-full flex items-center justify-center p-12 px-4 sm:px-6 lg:px-8">
                <div class="max-w-md w-full space-y-8">
                    <div>
                        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900 uppercase">Đăng ký</h2>
                    </div>
                    <form class="mt-8 space-y-6" id="register" action="index.php?act=register" method="post">

                        <div class="form-group mb-4">
                            <label for="ho_va_ten" class="py-2">Họ và tên</label>
                            <input id="ho_va_ten" name="ho_va_ten" type="text" required class="appearance-none rounded-lg relative block w-full px-3 py-2 mt-1 border border-gray-300 placeholder-gray-500 text-gray-900 ease-in-out duration-300 hover:border-[#0f4670] focus:outline-none focus:ring-[#0f4670] focus:border-[#0f4670] focus:z-10 sm:text-sm" placeholder="Họ và tên">
                            <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="email" class="py-2">Email</label>
                            <input id="email" name="email" type="email" required class="appearance-none rounded-lg relative block w-full px-3 py-2 mt-1 border border-gray-300 placeholder-gray-500 text-gray-900 ease-in-out duration-300 hover:border-[#0f4670] focus:outline-none focus:ring-[#0f4670] focus:border-[#0f4670] focus:z-10 sm:text-sm" placeholder="Email">
                            <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="mat_khau" class="py-2">Mật khẩu</label>
                            <input id="mat_khau" name="mat_khau" type="password" required class="appearance-none rounded-lg relative block w-full px-3 py-2 mt-1 border border-gray-300 placeholder-gray-500 text-gray-900 ease-in-out duration-300 hover:border-[#0f4670] focus:outline-none focus:ring-[#0f4670] focus:border-[#0f4670] focus:z-10 sm:text-sm" placeholder="Mật khẩu">
                            <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="nhap_lai_mat_khau" class="py-2">Nhập lại mật khẩu</label>
                            <input id="nhap_lai_mat_khau" name="nhap_lai_mat_khau" type="password" required class="appearance-none rounded-lg relative block w-full px-3 py-2 mt-1 border border-gray-300 placeholder-gray-500 text-gray-900 ease-in-out duration-300 hover:border-[#0f4670] focus:outline-none focus:ring-[#0f4670] focus:border-[#0f4670] focus:z-10 sm:text-sm" placeholder="Nhập lại mật khẩu">
                            <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="so_dien_thoai" class="py-2">Số điện thoại</label>
                            <input id="so_dien_thoai" name="so_dien_thoai" type="text" required class="appearance-none rounded-lg relative block w-full px-3 py-2 mt-1 border border-gray-300 placeholder-gray-500 text-gray-900 ease-in-out duration-300 hover:border-[#0f4670] focus:outline-none focus:ring-[#0f4670] focus:border-[#0f4670] focus:z-10 sm:text-sm" placeholder="Số điện thoại">
                            <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
                        </div>

                        <div class="form-group">
                            <label for="gioi_tinh" class="py-2 inline-block">Giới tính</label>
                            <div class="flex gap-x-10">
                                <div class="flex items-center gap-x-3">
                                    <input id="gioi_tinh_nam" name="gioi_tinh" type="radio" value="1" checked class="accent-blue-500 h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                    <label for="gioi_tinh_nam" class="block leading-6 text-gray-900">Nam</label>
                                </div>
                                <div class="flex items-center gap-x-3">
                                    <input id="gioi_tinh_nu" name="gioi_tinh" type="radio" value="2" class="accent-blue-500 h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                    <label for="gioi_tinh_nu" class="block leading-6 text-gray-900">Nữ</label>
                                </div>
                            </div>
                            <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
                        </div>

                        <div id="selectCity" class="form-group">
                            <label for="city" class="py-2">Thành phố</label>
                            <select id="city" name="city" class="appearance-none rounded-lg relative block w-full px-3 py-2 mt-1 border border-gray-300 placeholder-gray-500 text-gray-900 ease-in-out duration-300 hover:border-[#0f4670] focus:outline-none focus:ring-[#0f4670] focus:border-[#0f4670] focus:z-10 sm:text-sm">
                            </select>
                            <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
                        </div>

                        <div id="selectDistrict" class="form-group">
                            <label for="district" class="py-2">Quận, huyện, thị xã</label>
                            <select id="district" name="district" class="appearance-none rounded-lg relative block w-full px-3 py-2 mt-1 border border-gray-300 placeholder-gray-500 text-gray-900 ease-in-out duration-300 hover:border-[#0f4670] focus:outline-none focus:ring-[#0f4670] focus:border-[#0f4670] focus:z-10 sm:text-sm">
                            </select>
                            <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
                        </div>

                        <div id="selectWard" class="form-group mb-5 hidden">
                            <label for="ward" class="py-2">Phường, xã</label>
                            <select id="ward" name="ward" class="appearance-none rounded-lg relative block w-full px-3 py-2 mt-1 border border-gray-300 placeholder-gray-500 text-gray-900 ease-in-out duration-300 hover:border-[#0f4670] focus:outline-none focus:ring-[#0f4670] focus:border-[#0f4670] focus:z-10 sm:text-sm">
                            </select>
                            <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
                        </div>

                        <div id="inputAddress" class="form-group mb-5 hidden">
                            <label for="address" class="block text-base font-medium leading-6 text-gray-900 mb-3">Địa chỉ chi tiết</label>
                            <input id="address" name="address" type="text" placeholder="Nhập địa chỉ chi tiết...." class="block w-full outline-none indent-3 rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
                            <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
                        </div>
                        <span id="result" class="mb-5 inline-block"></span>
                        <input type="text" id="dia_chi" name="dia_chi" hidden>

                        <div>
                            <input type="submit" name="btn_register" value="Đăng ký" class="group w-full relative flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-[#4ba3e7] hover:bg-[#0f4670] ease-in-out duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        </div>
                        <p class="mt-3 text-center text-sm text-gray-600">
                            Bạn đã có tài khoản?
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

<?php
if (isset($_SESSION['success_message'])) {
    echo '<script>toastr.success("' . $_SESSION['success_message'] . '")</script>';
    unset($_SESSION['success_message']);
}
?>

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

        $.validator.addMethod("regexPassword", function(value, element) {
            var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,30}$/;
            return this.optional(element) || passwordRegex.test(value);
        }, "Mật khẩu phải chứa ít nhất 8 ký tự, bao gồm chữ cái viết hoa, viết thường, chữ số và ký tự đặc biệt !");

        $("#register").validate({
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
                    number: true,
                    digits: true,
                    regexPhoneNumber: true
                },
                mat_khau: {
                    required: true,
                    regexPassword: true
                },
                nhap_lai_mat_khau: {
                    required: true,
                    regexPassword: true,
                    equalTo: "#mat_khau",
                },
                city: {
                    required: true,
                },
                district: {
                    required: true,
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
                    number: "Vui lòng nhập số !",
                    digits: "Vui lòng nhập số nguyên dương !"
                },
                mat_khau: {
                    required: "Vui lòng nhập mật khẩu !",
                },
                nhap_lai_mat_khau: {
                    required: "Vui lòng nhập mật khẩu !",
                    equalTo: "Mật khẩu không trùng khớp !",
                },
                city: {
                    required: "Vui lòng chọn thành phố !",
                },
                district: {
                    required: "Vui lòng chọn quận, huyện, thị xã !",
                },
            },
            errorPlacement: function(error, element) {
                error.appendTo(element.closest(".form-group").find(".error-message"));
            },
            highlight: function(element) {
                $(element).closest(".form-group").find("#ho_va_ten").addClass(" border border-red-500");
                $(element).closest(".form-group").find("#email").addClass(" border border-red-500");
                $(element).closest(".form-group").find("#so_dien_thoai").addClass(" border border-red-500");
                $(element).closest(".form-group").find("#mat_khau").addClass(" border border-red-500");
                $(element).closest(".form-group").find("#nhap_lai_mat_khau").addClass(" border border-red-500");
                $(element).closest(".form-group").find("#city").addClass(" border border-red-500");
                $(element).closest(".form-group").find("#district").addClass(" border border-red-500");
                $(element).closest(".form-group").find("#ward").addClass(" border border-red-500");
                $(element).closest(".form-group").find("#address").addClass(" border border-red-500");
            },
            unhighlight: function(element) {
                $(element).closest(".form-group").find("#ho_va_ten").removeClass(" border border-red-500");
                $(element).closest(".form-group").find("#email").removeClass(" border border-red-500");
                $(element).closest(".form-group").find("#so_dien_thoai").removeClass(" border border-red-500");
                $(element).closest(".form-group").find("#mat_khau").removeClass(" border border-red-500");
                $(element).closest(".form-group").find("#nhap_lai_mat_khau").removeClass(" border border-red-500");
                $(element).closest(".form-group").find("#city").removeClass(" border border-red-500");
                $(element).closest(".form-group").find("#district").removeClass(" border border-red-500");
                $(element).closest(".form-group").find("#ward").removeClass(" border border-red-500");
                $(element).closest(".form-group").find("#address").removeClass(" border border-red-500");
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
                if (['jpg', 'jpeg', 'png', 'gif', "webp"].includes(extension)) {
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





        const host = "https://provinces.open-api.vn/api/";
        let hasWard = false; // Biến để kiểm tra xem có phường/xã hay không
        const resultElement = document.querySelector("#result");
        const diaChiInput = $("#dia_chi");
        let defaultString = "Địa chỉ hiện tại của bạn là: ";


        // Gọi API để lấy danh sách thành phố
        var callAPI = (api) => {
            return axios.get(api)
                .then((response) => {
                    renderData(response.data, "city");
                });
        }

        // Gọi API để lấy danh sách quận/huyện dựa trên ID thành phố đã chọn
        var callApiDistrict = (api) => {
            return axios.get(api)
                .then((response) => {
                    renderData(response.data.districts, "district");
                });
        }

        // Gọi API để lấy danh sách phường/xã dựa trên ID quận/huyện đã chọn
        var callApiWard = (api) => {
            return axios.get(api)
                .then((response) => {
                    hasWard = response.data.wards && response.data.wards.length > 0;
                    renderData(response.data.wards, "ward");

                    // Hiển thị select phường/xã dựa trên giá trị của biến hasWard
                    const wardSelect = document.querySelector("#selectWard");
                    wardSelect.style.display = hasWard ? "block" : "none";

                    if (hasWard) {
                        $("#ward").rules("add", {
                            required: true,
                            messages: {
                                required: "Vui lòng chọn phường/xã !",
                            },
                        });
                        $("#address").rules("add", {
                            required: true,
                            messages: {
                                required: "Vui lòng nhập địa chỉ chi tiết !",
                            },
                        });
                    } else {
                        document.querySelector("#inputAddress").style.display = "none";
                        $("#ward").rules("remove", "required");
                        $("#address").rules("remove", "required");
                    }
                });
        }

        // Cập nhật select box khi nhận dữ liệu từ API
        var renderData = (array, select) => {
            let row = ' <option hidden value="">Chọn</option>';
            array.forEach(element => {
                row += `<option data-id="${element.code}" value="${element.name}">${element.name}</option>`
            });
            document.querySelector("#" + select).innerHTML = row;
        }

        // Sự kiện khi chọn một thành phố
        $("#city").change(() => {
            // Gọi API để lấy danh sách quận/huyện dựa trên ID thành phố đã chọn
            callApiDistrict(host + "p/" + $("#city").find(':selected').data('id') + "?depth=2");
        });

        // Sự kiện khi chọn một quận/huyện
        $("#district").change(() => {
            // Gọi API để lấy danh sách phường/xã dựa trên ID quận/huyện đã chọn
            callApiWard(host + "d/" + $("#district").find(':selected').data('id') + "?depth=2");
            // Gọi hàm printResult() để cập nhật kết quả hiển thị
            printResult();

        });

        // Sự kiện khi chọn một phường/xã
        $("#ward").change(() => {
            // Hiển thị input nhập địa chỉ chi tiết khi đã chọn phường/xã
            if (hasWard) {
                document.querySelector("#inputAddress").style.display = "block";
            } else {
                document.querySelector("#inputAddress").style.display = "none";
            }
            // Gọi hàm printResult() để cập nhật kết quả hiển thị
            printResult();
        });

        // Hàm hiển thị kết quả
        var printResult = () => {
            if ($("#district").find(':selected').data('id') != "" && $("#city").find(':selected').data('id') != "" &&
                $("#ward").find(':selected').data('id') != "") {
                const cityElement = $("#city").val();
                const districtElement = $("#district").val();
                if (hasWard) {
                    const wardElement = $("#ward").val();
                    const addressElement = document.querySelector("#address");
                    address.addEventListener("change", function(e) {
                        let addressString = e.target.value + ", " + wardElement + ", " + districtElement + ", " + cityElement;
                        resultElement.textContent = defaultString + addressString;
                        addressString.replace(/\s+/g, ' ').trim();
                        diaChiInput.val(addressString);
                    });
                } else {
                    let addressString = districtElement + ", " + cityElement;
                    resultElement.textContent = defaultString + addressString;
                    addressString.replace(/\s+/g, ' ').trim();
                    diaChiInput.val(addressString);
                }
            }
        }

        // Gọi API để lấy danh sách thành phố khi tải trang
        callAPI(host + "?depth=1");
    });
</script>