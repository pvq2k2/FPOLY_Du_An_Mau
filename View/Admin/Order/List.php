<div class="title">
    <h1>Danh Sách Đơn Hàng</h1>
</div>
<form action="index.php?act=list_order" method="post">
    <input type="text" name="keyWord" placeholder="Nhập tên người đặt...">
    <select name="trang_thai">
        <option value="0" selected>Tất cả</option>
        <option value="1">Chờ xác nhận</option>
        <option value="2">Đang xử lý</option>
        <option value="3">Đang giao hàng</option>
        <option value="4">Thành công</option>
    </select>
    <input type="date" name="ngay_bat_dau">
    <input type="date" name="ngay_ket_thuc">
    <input type="submit" name="btn_filler_order" value="Lọc">
</form>
<div class="box-table">
    <table>
        <tr>
            <th></th>
            <th>ID Đơn hàng</th>
            <th>Tên Khách Hàng</th>
            <th>Ngày đặt</th>
            <th>Giá</th>
            <th>Trạng thái</th>
            <th></th>
        </tr>
        <?php
        foreach ($ListOrder as $Order) {
            extract($Order);
            $URLGetUpdateOrder = "index.php?act=get_update_order&id=" . $don_hang_id;
            $URLRemoveOrder = "index.php?act=remove_order&id=" . $don_hang_id;
            $URLOrderDetail = "index.php?act=order_detail&id=" . $don_hang_id;
            echo /*html*/ '<tr>
                <td><input type="checkbox" name="" id=""></td>
                <td>' . $don_hang_id . '</td>
                <td>' . $ho_va_ten . '</td>
                <td>' . $ngay_dat . '</td>
                <td>' . FormatPrice($tong_tien) . '</td>
                <td>' . FormatOrderStatus($trang_thai) . '</td>
                <td>
                    <a href="' . $URLOrderDetail . '"><input type="button" value="Chi tiết"></a>
                    <a href="' . $URLGetUpdateOrder . '"><input type="button" value="Sửa"></a>
                    <button onclick="deleteOrder()">Xóa</button>
                </td>
            </tr>';
        }
        ?>

    </table>
</div>

<script>
    function deleteOrder() {
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
                    url: '<?php echo $URLRemoveOrder; ?>', // Đường dẫn tới file xử lý xóa bình luận trên máy chủ
                    type: 'GET',
                    success: function(response) {
                        console.log(response);
                        if (response.includes("success")) {
                            toastr.success('Xóa đơn hàng thành công!');
                            // Tải lại trang hoặc làm cập nhật danh sách bình luận
                            setTimeout(() => {
                                location.reload();
                            }, 1000);

                        } else {
                            toastr.error('Xóa đơn hàng thất bại!');
                        }
                    },
                    error: function() {
                        toastr.error('Lỗi kết nối!');
                    },
                });

            } else {
                toastr.error('Xóa đơn hàng thất bại!');
            }
        });
    }
</script>