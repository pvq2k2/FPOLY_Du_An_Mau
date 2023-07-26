<script>
    document.title = "VQMA - Cập nhật danh mục";
</script>

<?php
if (is_array($Category)) {
    extract($Category);
}
?>

<section class="my-8 ml-2 md:flex md:items-center md:justify-between">
    <div class="breadcumrb">
        <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
            <li class="leading-normal text-sm">
                <ion-icon name="home-outline"></ion-icon>
            </li>
            <li class="hover:underline hover:text-blue-500 transition duration-150 ease-out hover:ease-in text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page"><a href="index.php?act=list_category">Danh mục</a></li>
            <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">Cập nhật danh mục</li>
        </ol>
        <h3 class="mb-0 font-bold capitalize text-2xl leading-10">Cập nhật danh mục</h3>
    </div>
</section>


<form id="updateCategory" action="index.php?act=update_category" method="post" class="mx-auto p-10 bg-white shadow-xl rounded-xl">

    <div class="form-group mb-5">
        <label for="danh_muc_id" class="block text-base font-medium leading-6 text-gray-900 mb-3">ID danh mục</label>
        <input id="danh_muc_id" name="danh_muc_id" disabled type="text" value="<?= $danh_muc_id ?>" placeholder="Tự tăng" class="block w-full outline-none indent-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
    </div>

    <div class="form-group mb-5">
        <label for="ten_danh_muc" class="block text-base font-medium leading-6 text-gray-900 mb-3">Tên danh mục</label>
        <input id="ten_danh_muc" name="ten_danh_muc" type="text" value="<?= $ten_danh_muc ?>" placeholder="Nhập tên danh mục...." class="block w-full outline-none indent-3 rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-base sm:leading-6">
        <div class="error-message text-red-500 text-sm ml-1 mt-1"></div>
    </div>

    <div class="form-group flex items-center gap-x-6">
        <input type="hidden" name="danh_muc_id" value="<?= $danh_muc_id ?>">
        <input type="submit" name="btn_update_category" value="Cập nhật" class="shadow-xl rounded-md bg-indigo-500 px-5 py-2 text-base font-semibold text-white hover:bg-indigo-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition duration-150 ease-out hover:ease-in">
        <a href="index.php?act=list_category" class="border px-5 py-2 shadow-xl rounded-md text-base font-semibold leading-6 text-gray-900 hover:border-indigo-500 transition duration-150 ease-out hover:ease-in">Trở lại</a>
    </div>
</form>

<?php
if (isset($_SESSION['success_message'])) {
    echo '<script>toastr.success("' . $_SESSION['success_message'] . '")</script>';
    unset($_SESSION['success_message']);
}
?>

<script>
    $(document).ready(function() {
        $("#updateCategory").validate({
            rules: {
                ten_danh_muc: {
                    required: true,
                },
            },
            messages: {
                ten_danh_muc: {
                    required: "Vui lòng nhập tên danh mục !",
                },
            },
            errorPlacement: function(error, element) {
                error.appendTo(element.closest(".form-group").find(".error-message"));
            },
            highlight: function(element) {
                $(element).closest(".form-group").find("#ten_danh_muc").addClass(" border border-red-500");
            },
            unhighlight: function(element) {
                $(element).closest(".form-group").find("#ten_danh_muc").removeClass(" border border-red-500");
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