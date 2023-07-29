<script>
    document.title = "VQMA - Thêm mới tài khoản";
</script>

<section class="my-8 ml-2 md:flex md:items-center md:justify-between">
    <div class="breadcumrb">
        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
            <li class="leading-normal text-sm">
                <ion-icon name="home-outline"></ion-icon>
            </li>
            <li class="hover:underline hover:text-blue-500 transition duration-150 ease-out hover:ease-in text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page"><a href="index.php?act=list_user">Tài khoản</a></li>
            <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">Thêm tài khoản</li>
        </ol>
        <h3 class="mb-0 font-bold capitalize text-2xl leading-10">Thêm tài khoản</h3>
    </div>
</section>


<form id="addUser" action="index.php?act=add_user" method="post" enctype="multipart/form-data" class="mx-auto p-10 bg-white shadow-xl rounded-xl">

    <div class="form-group mb-5">
        <label for="tai_khoan_id" class="block text-base font-medium leading-6 text-gray-900 mb-3">ID tài khoản</label>
        <input id="tai_khoan_id" name="tai_khoan_id" disabled type="text" placeholder="Tự tăng" class="block w-full outline-none indent-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
    </div>

    <div class="form-group mb-5">
        <label for="ho_va_ten" class="block text-base font-medium leading-6 text-gray-900 mb-3">Họ và tên</label>
        <input id="ho_va_ten" name="ho_va_ten" type="text" placeholder="Nhập họ và tên...." class="block w-full outline-none indent-3 rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
        <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
    </div>

    <div class="flex justify-between items-center">
        <div class="box-item w-10/12">
            <div class="flex justify-between gap-x-10">
                <div class="form-group mb-5 w-6/12">
                    <label for="email" class="block text-base font-medium leading-6 text-gray-900 mb-3">Email</label>
                    <input id="email" name="email" type="text" placeholder="Nhập email...." class="block w-full outline-none indent-3 rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
                    <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
                </div>
                <div class="form-group mb-5 w-6/12">
                    <label for="so_dien_thoai" class="block text-base font-medium leading-6 text-gray-900 mb-3">Số điện thoại</label>
                    <input id="so_dien_thoai" name="so_dien_thoai" type="text" placeholder="Nhập số điện thoại...." class="block w-full outline-none indent-3 rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
                    <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
                </div>
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

    <div class="form-group mb-5">
        <label for="mat_khau" class="block text-base font-medium leading-6 text-gray-900 mb-3">Mật khẩu</label>
        <input id="mat_khau" name="mat_khau" type="password" placeholder="Nhập mật khẩu...." class="block w-full outline-none indent-3 rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
        <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
    </div>

    <div class="mt-2 flex items-center gap-x-20 gap-y-8 mb-5">
        <div class="form-group">
            <label class="block text-base font-medium leading-6 text-gray-900 mb-3">Giới tính</label>
            <div class="flex gap-x-10">
                <div class="flex items-center gap-x-3">
                    <input id="gioi_tinh_nam" name="gioi_tinh" type="radio" value="1" checked class="accent-blue-500 h-5 w-5 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    <label for="gioi_tinh_nam" class="block text-base font-medium leading-6 text-gray-900">Nam</label>
                </div>
                <div class="flex items-center gap-x-3">
                    <input id="gioi_tinh_nu" name="gioi_tinh" type="radio" value="2" class="accent-blue-500 h-5 w-5 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    <label for="gioi_tinh_nu" class="block text-base font-medium leading-6 text-gray-900">Nữ</label>
                </div>
            </div>
            <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
        </div>

        <div class="form-group w-11/12">
            <label for="vai_tro" class="block text-base font-medium leading-6 text-gray-900 mb-3">Vai trò</label>
            <select name="vai_tro" id="vai_tro" class="appearance-none outline-none block w-full rounded-md py-1.5 px-5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
                <option value="" hidden>Chọn vai trò</option>
                <option value="0">User</option>
                <option value="1">Admin</option>
            </select>
            <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
        </div>
    </div>

    <div class="flex gap-x-10 mb-5">
        <div id="selectCity" class="form-group w-4/12">
            <label for="city" class="block text-base font-medium leading-6 text-gray-900 mb-3">Thành phố</label>
            <select name="city" id="city" class="appearance-none outline-none block w-full rounded-md py-1.5 px-5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
            </select>
            <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
        </div>

        <div id="selectDistrict" class="form-group w-4/12">
            <label for="district" class="block text-base font-medium leading-6 text-gray-900 mb-3">Quận, huyện, thị xã</label>
            <select name="district" id="district" class="appearance-none outline-none block w-full rounded-md py-1.5 px-5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
            </select>
            <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
        </div>

        <div id="selectWard" class="form-group hidden w-4/12">
            <label for="ward" class="block text-base font-medium leading-6 text-gray-900 mb-3">Phường, xã</label>
            <select name="ward" id="ward" class="appearance-none outline-none block w-full rounded-md py-1.5 px-5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
            </select>
            <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
        </div>
    </div>
    <div id="inputAddress" class="form-group mb-5 hidden">
        <label for="address" class="block text-base font-medium leading-6 text-gray-900 mb-3">Địa chỉ chi tiết</label>
        <input id="address" name="address" type="text" placeholder="Nhập địa chỉ chi tiết...." class="block w-full outline-none indent-3 rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
        <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
    </div>
    <span id="result" class="mb-5 inline-block"></span>
    <input type="text" id="dia_chi" name="dia_chi" hidden>

    <div class="form-group flex items-center gap-x-6">
        <input type="submit" name="btn_add_user" value="Thêm mới" class="shadow-xl rounded-md bg-indigo-500 px-5 py-2 text-base font-semibold text-white hover:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition duration-150 ease-out hover:ease-in">
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
            return this.optional(element) || /\.(jpg|jpeg|png|gif)$/i.test(value);
        }, "Vui lòng chọn tệp ảnh có phần mở rộng là jpg, jpeg, png hoặc gif !");

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

        $("#addUser").validate({
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
                hinh: {
                    required: true,
                    imageExtension: true
                },
                mat_khau: {
                    required: true,
                    regexPassword: true
                },
                vai_tro: {
                    required: true,
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
                    required: "Vui lòng chọn số điện thoại !",
                },
                hinh: {
                    required: "Vui lòng chọn hình !",
                },
                mat_khau: {
                    required: "Vui lòng nhập mật khẩu !",
                },
                vai_tro: {
                    required: "Vui lòng chọn vai trò !",
                },
                city: {
                    required: "Vui lòng chọn thành phố !",
                },
                district: {
                    required: "Vui lòng chọn quận, huyện, thị xã !",
                },
                ward: {
                    required: "Vui lòng chọn phường, xã !",
                },
                address: {
                    required: "Vui lòng nhập địa chỉ chi tiết !",
                }
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
                $(element).closest(".form-group").find("#city").addClass(" border border-red-500");
                $(element).closest(".form-group").find("#district").addClass(" border border-red-500");
                $(element).closest(".form-group").find("#ward").addClass(" border border-red-500");
                $(element).closest(".form-group").find("#address").addClass(" border border-red-500");
            },
            unhighlight: function(element) {
                $(element).closest(".form-group").find("#ho_va_ten").removeClass(" border border-red-500");
                $(element).closest(".form-group").find("#email").removeClass(" border border-red-500");
                $(element).closest(".form-group").find("#so_dien_thoai").removeClass(" border border-red-500");
                $(element).closest(".form-group").find("#hinh").removeClass(" border border-red-500");
                $(element).closest(".form-group").find("#mat_khau").removeClass(" border border-red-500");
                $(element).closest(".form-group").find("#vai_tro").removeClass(" border border-red-500");
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

                    // Nếu không có phường/xã, đồng thời cũng ẩn input nhập địa chỉ chi tiết
                    if (!hasWard) {
                        document.querySelector("#inputAddress").style.display = "none";
                    }

                    updateProductForm.settings.rules.hinh = {
                        required: true,
                        imageExtension: true
                    };
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
                        diaChiInput.val(addressString);
                    });
                } else {
                    let addressString = districtElement + ", " + cityElement;
                    resultElement.textContent = defaultString + addressString;
                    diaChiInput.val(addressString);
                }
            }
        }

        // Gọi API để lấy danh sách thành phố khi tải trang
        callAPI(host + "?depth=1");
    });
</script>