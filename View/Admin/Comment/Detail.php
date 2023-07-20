<div class="breadcrumb">
    <a href="index.php?act=list_product_comment">Sản phẩm có bình luận</a>
    >
    <span><?php echo $Product["ten_san_pham"] ?></span>
</div>

<div class="title">
    <h1>Danh Sách Bình Luận</h1>
</div>
<?php
$URLDetailComment = "index.php?act=detail_product_comment&id=" . $Product["san_pham_id"];
?>
<form action="<?= $URLDetailComment ?>" method="post">
    <input type="text" name="keyWord" placeholder="Nhập nội dung...">
    <input type="submit" name="btn_filler_comment" value="Lọc">
</form>
<div class="box-table">
    <table>
        <tr>
            <th></th>
            <th>ID bình luận</th>
            <th>Nội dung</th>
            <th>Tài khoản ID</th>
            <th>Sản phẩm ID</th>
            <th>Ngày bình luận</th>
            <th></th>
        </tr>
        <?php
        if (is_array($ListComment) && count($ListComment) > 0) {
            foreach ($ListComment as $Comment) {
                extract($Comment);
                $URLGetUpdateComment = "index.php?act=get_update_comment&id=" . $binh_luan_id;
                $URLRemoveComment = "index.php?act=remove_comment&id=" . $binh_luan_id;
                echo /*html*/ '<tr>
                    <td><input type="checkbox" name="" id=""></td>
                    <td>' . $binh_luan_id . '</td>
                    <td>' . $noi_dung . '</td>
                    <td>' . $tai_khoan_id . '</td>
                    <td>' . $san_pham_id . '</td>
                    <td>' . $ngay_binh_luan . '</td>
                    <td>
                    <a href="' . $URLGetUpdateComment . '"><input type="button" value="Sửa"></a>
                    <button onclick="deleteComment()">Xóa</button>
                    </td>
                </tr>';
            }
        } else {
            echo '<tr>
            <td colspan="7" style="text-align: center;"><h1>Không có bình luận nào</h1></td>
        </tr>';
        }

        ?>

    </table>
    <div class="box-btn">
        <input type="button" value="Chọn tất cả">
        <input type="button" value="Chọn tất cả">
        <input type="button" value="Xóa các mục đã chọn">
        <a href="index.php?act=add_product"><input type="button" value="Thêm mới"></a>
    </div>

    <script>
        function deleteComment() {
            new swal({
                title: 'Bạn có chắc chắn muốn xoá?',
                text: 'Hành động này sẽ không thể hoàn tác!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Xoá',
                cancelButtonText: 'Hủy'
            }).then((willDelete) => {
                if (willDelete.value) {
                    $.ajax({
                        url: '<?php echo $URLRemoveComment; ?>', // Đường dẫn tới file xử lý xóa bình luận trên máy chủ
                        type: 'GET',
                        success: function(response) {
                            console.log(response);
                            if (response.includes("success")) {
                                toastr.success('Xóa bình luận thành công!');
                                // Tải lại trang hoặc làm cập nhật danh sách bình luận
                                setTimeout(() => {
                                    location.reload();
                                }, 1000);

                            } else {
                                toastr.error('Xóa bình luận thất bại!');
                            }
                        },
                        error: function() {
                            toastr.error('Lỗi kết nối!');
                        },
                    });

                } else {
                    toastr.error('Xóa bình luận thất bại!');
                }
            });
        }
    </script>
</div>