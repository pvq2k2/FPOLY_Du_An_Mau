<?php
if (is_array($Comment)) {
    extract($Comment);
    $URLDetailComment = "index.php?act=detail_product_comment&id=" . $san_pham_id;
}
?>
<div class="title">
    <h1>Cập Nhật Bình Luận</h1>
</div>

<form id="UpdateForm" action="index.php?act=update_comment" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="">Mã bình luận</label>
        <input type="text" name="binh_luan_id" disabled placeholder="Tự tăng" value="<?php if (isset($binh_luan_id) && ($binh_luan_id > 0)) echo $binh_luan_id; ?>">
    </div>
    <div class="form-group">
        <label for="">Mã tài khoản</label>
        <input type="text" name="tai_khoan_id" disabled placeholder="Tự tăng" value="<?php if (isset($tai_khoan_id) && ($tai_khoan_id > 0)) echo $tai_khoan_id; ?>">
    </div>
    <div class="form-group">
        <label for="">Mã sản phẩm</label>
        <input type="text" name="san_pham_id" disabled placeholder="Tự tăng" value="<?php if (isset($san_pham_id) && ($san_pham_id > 0)) echo $san_pham_id; ?>">
    </div>

    <div class="form-group">
        <label for="">Nội dung</label>
        <textarea name="noi_dung" cols="30" rows="10" placeholder="Nhập nôi dung..."><?php if (isset($noi_dung) && ($noi_dung != "")) echo $noi_dung; ?></textarea>
        <div class="error-message"></div>
    </div>

    <div class="form-group">
        <input type="hidden" name="binh_luan_id" value="<?php if (isset($binh_luan_id) && ($binh_luan_id > 0)) echo $binh_luan_id; ?>">
        <input type="submit" name="btn_update_comment" value="Cập nhật">
        <input type="reset" name="btn_reset" value="Nhập lại">
        <a href="index.php?act=detail_product_comment&id=<?= $san_pham_id ?>"><input type="button" value="Danh Sách"></a>
    </div>
    <?php
    if (isset($msg) && ($msg != "")) echo $msg;
    ?>
</form>

<script>
    $(document).ready(function() {
        $("#UpdateForm").validate({
            rules: {
                noi_dung: {
                    required: true,
                },
            },
            messages: {
                noi_dung: {
                    required: "Vui lòng nhập nội dung",
                },
            },
            errorPlacement: function(error, element) {
                error.appendTo(element.closest(".form-group").find(".error-message"));
            },
            highlight: function(element) {
                $(element).closest(".form-group").addClass("has-error");
            },
            unhighlight: function(element) {
                $(element).closest(".form-group").removeClass("has-error");
            },
            submitHandler: function(form) {
                if (this.checkForm()) {
                    // Dữ liệu hợp lệ, có thể gửi form đi
                    // Ví dụ: gửi form bằng AJAX
                    $.ajax({
                        url: 'index.php?act=update_comment',
                        type: 'POST',
                        data: $(form).serialize(),
                        success: function(response) {
                            if (response.includes("success")) {
                                toastr.success('Cập nhật bình luận thành công!');
                                // Tải lại trang hoặc làm cập nhật danh sách bình luận
                                setTimeout(() => {
                                    window.location.href = "<?php echo $URLDetailComment; ?>";
                                }, 1000);
                            } else {
                                toastr.error('Xóa bình luận thất bại!');
                            }
                        },
                        error: function() {
                            toastr.error('Lỗi kết nối');
                        }
                    });
                } else {
                    $(form).find(":input.error:first").focus();
                }
                return false;
            }
        });
    });
</script>