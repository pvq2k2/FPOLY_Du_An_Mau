<script>
    document.title = "Văn Quyết Mobile - Thanh toán";
</script>

<section class="my-8 ml-2 md:flex md:items-center md:justify-between">
    <div class="breadcumrb">
        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
            <li class="hover:underline hover:text-blue-500 transition duration-150 ease-out hover:ease-in text-sm capitalize leading-normal text-slate-700" aria-current="page">
                <a href="index.php">
                    <ion-icon name="home-outline"></ion-icon>
                    Trang chủ
                </a>
            </li>
            <li class="hover:underline hover:text-blue-500 transition duration-150 ease-out pl-2 hover:ease-in text-sm capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">
                <a href="index.php?act=cart">
                    Giỏ hàng
                </a>
            </li>
            <li class="text-sm pl-2 capitalize leading-normal text-[#4ba3e7] before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">Thanh toán</li>
        </ol>
    </div>
</section>

<form id="formCheckOut" action="index.php?act=check_out" method="post">
    <div class="grid grid-cols-2 gap-x-20">
        <div>
            <h2 class="text-xl font-bold mb-5">Thông tin giỏ hàng</h2>
            <?php
            if (isset($_SESSION['user'])) {
                if (count($ListProductInCart) > 0) {

            ?>
                    <section class="w-full mx-auto">
                        <div class="flex flex-col shadow-xl rounded-lg">
                            <div class="-my-2 overflow-x-auto">
                                <div class="inline-block min-w-full py-2 align-middle">
                                    <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                            <thead class="bg-gray-50 dark:bg-gray-800">
                                                <tr>
                                                    <th class="px-4 py-3.5 text-sm font-normal rtl:text-right text-gray-500 dark:text-gray-400">
                                                        Tên sản phẩm
                                                    </th>
                                                    <th class="px-4 py-3.5 text-sm font-normal rtl:text-right text-gray-500 dark:text-gray-400">
                                                        Hình
                                                    </th>
                                                    <th class="px-4 py-3.5 text-sm font-normal rtl:text-right text-gray-500 dark:text-gray-400">
                                                        Giá
                                                    </th>
                                                    <th class="px-4 py-3.5 text-sm font-normal rtl:text-right text-gray-500 dark:text-gray-400">
                                                        Số lượng
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                                <?php
                                                $total_amount = 0;
                                                foreach ($ListProductInCart as $Cart) {
                                                    extract($Cart);
                                                    $total_amount += $gia * $so_luong;
                                                    $hinh = $IMG_PATH . "Product/" . $hinh;
                                                ?>
                                                    <tr>
                                                        <td class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap text-center">
                                                            <span><?= $ten_san_pham ?></span>
                                                        </td>
                                                        <td class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap">
                                                            <img src="<?= $hinh ?>" class="w-16 mx-auto">
                                                        </td>
                                                        <td class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap text-center">
                                                            <span><?= FormatNumber($gia) ?>đ</span>
                                                        </td>
                                                        <td class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap text-center">
                                                            <?= $so_luong ?>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <input type="hidden" name="tong_tien" value="<?= $total_amount ?>">
                                                <input type="hidden" name="tai_khoan_id" value="<?= $tai_khoan_id ?>">
                                                <tr>
                                                    <td>
                                                        <h2 class="pl-5 py-3 text-lg">Tổng tiền: <span class="font-bold"><?= FormatNumber($total_amount) ?>đ</span></h2>
                                                    </td>
                                                </tr>

                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
            <?php
                }
            }
            ?>

        </div>
        <div class="form-box">
            <h2 class="text-xl font-bold mb-5">Thông tin đặt hàng</h2>
            <div>
                <div class="min-h-full">
                    <div class="max-w-md w-full">
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
                            <label for="so_dien_thoai" class="py-2">Số điện thoại</label>
                            <input id="so_dien_thoai" name="so_dien_thoai" type="text" required class="appearance-none rounded-lg relative block w-full px-3 py-2 mt-1 border border-gray-300 placeholder-gray-500 text-gray-900 ease-in-out duration-300 hover:border-[#0f4670] focus:outline-none focus:ring-[#0f4670] focus:border-[#0f4670] focus:z-10 sm:text-sm" placeholder="Số điện thoại">
                            <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
                        </div>

                        <div id="selectCity" class="form-group mb-4">
                            <label for="city" class="py-2">Thành phố</label>
                            <select id="city" name="city" class="appearance-none rounded-lg relative block w-full px-3 py-2 mt-1 border border-gray-300 placeholder-gray-500 text-gray-900 ease-in-out duration-300 hover:border-[#0f4670] focus:outline-none focus:ring-[#0f4670] focus:border-[#0f4670] focus:z-10 sm:text-sm">
                            </select>
                            <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
                        </div>

                        <div id="selectDistrict" class="form-group mb-4">
                            <label for="district" class="py-2">Quận, huyện, thị xã</label>
                            <select id="district" name="district" class="appearance-none rounded-lg relative block w-full px-3 py-2 mt-1 border border-gray-300 placeholder-gray-500 text-gray-900 ease-in-out duration-300 hover:border-[#0f4670] focus:outline-none focus:ring-[#0f4670] focus:border-[#0f4670] focus:z-10 sm:text-sm">
                            </select>
                            <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
                        </div>

                        <div id="selectWard" class="form-group mb-4 hidden">
                            <label for="ward" class="py-2">Phường, xã</label>
                            <select id="ward" name="ward" class="appearance-none rounded-lg relative block w-full px-3 py-2 mt-1 border border-gray-300 placeholder-gray-500 text-gray-900 ease-in-out duration-300 hover:border-[#0f4670] focus:outline-none focus:ring-[#0f4670] focus:border-[#0f4670] focus:z-10 sm:text-sm">
                            </select>
                            <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
                        </div>

                        <div id="inputAddress" class="form-group mb-4 hidden">
                            <label for="address" class="block mb-3">Địa chỉ chi tiết</label>
                            <input id="address" name="address" type="text" placeholder="Nhập địa chỉ chi tiết...." class="block w-full outline-none indent-3 rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
                            <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
                        </div>
                        <input class="mb-4" type="text" id="dia_chi" name="dia_chi" hidden>

                        <div class="form-box">
                            <div class="form-group mb-2 flex items-center gap-x-2">
                                <input class="accent-blue-500 h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" id="thanh_toan_khi_nhan_hang" type="radio" value="1" name="phuong_thuc_thanh_toan" checked>
                                <label for="thanh_toan_khi_nhan_hang">Thanh toán khi nhận hàng</label>
                            </div>
                            <div class="form-group mb-4 flex items-center gap-x-2">
                                <input class="accent-blue-500 h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" id="thanh_thoan_qua_ngan_hang" type="radio" value="2" name="phuong_thuc_thanh_toan">
                                <label for="thanh_thoan_qua_ngan_hang">Thanh toán qua ngân hàng</label>
                            </div>
                        </div>

                        <div class="form-group flex items-center justify-center">
                            <input type="submit" value="Đặt hàng" name="btn_check_out" class="flex items-center justify-center w-1/2 mt-3 px-40 py-3 tracking-wide text-white transition-colors duration-200 rounded-lg shrink-0 sm:w-auto gap-x-2 bg-gradient-to-r from-[#4ba3e7] to-[#0f4670] hover:bg-gradient-to-r hover:from-[#0f4670] hover:to-[#4ba3e7] dark:hover:bg-blue-500 dark:bg-blue-600 shadow-xl">
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

        $("#formCheckOut").validate({
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
                $(element).closest(".form-group").find("#city").addClass(" border border-red-500");
                $(element).closest(".form-group").find("#district").addClass(" border border-red-500");
                $(element).closest(".form-group").find("#ward").addClass(" border border-red-500");
                $(element).closest(".form-group").find("#address").addClass(" border border-red-500");
            },
            unhighlight: function(element) {
                $(element).closest(".form-group").find("#ho_va_ten").removeClass(" border border-red-500");
                $(element).closest(".form-group").find("#email").removeClass(" border border-red-500");
                $(element).closest(".form-group").find("#so_dien_thoai").removeClass(" border border-red-500");
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

        const host = "https://provinces.open-api.vn/api/";
        let hasWard = false; // Biến để kiểm tra xem có phường/xã hay không
        const diaChiInput = $("#dia_chi");


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
                        addressString.replace(/\s+/g, ' ').trim();
                        diaChiInput.val(addressString);
                    });
                } else {
                    let addressString = districtElement + ", " + cityElement;
                    addressString.replace(/\s+/g, ' ').trim();
                    diaChiInput.val(addressString);
                }
            }
        }

        // Gọi API để lấy danh sách thành phố khi tải trang
        callAPI(host + "?depth=1");
    });
</script>