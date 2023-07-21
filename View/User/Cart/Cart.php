<?php
if (isset($_SESSION['user'])) {
    if (count($ListProductInCart) > 0) {
        echo '
    <table>
    <tr>
        <th>Tên sản phảm</th>
        <th>Hình</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Hành động</th>
    </tr>
    ';
        $total_amount = 0;
        foreach ($ListProductInCart as $Cart) {
            extract($Cart);
            $total_amount += $gia * $so_luong;
            $hinh = $IMG_PATH . "Product/" . $hinh;
            echo '<tr>
            <td>' . $ten_san_pham . '</td>
            <td><img src="' . $hinh . '" width="100"></td>
            <td>' . FormatPrice($gia) . 'đ</td>
            <td>
                <form id="submitForm" action="index.php?act=cart" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="gio_hang_id" value="' . $gio_hang_id . '">
                    <input type="hidden" name="san_pham_id" value="' . $san_pham_id . '">
                    <button class="btn" id="increaseBtn" name="increaseBtn" type="submit">+</button>
                    <input type="number" name="so_luong" id="quantityInput" min="1" value="' . $so_luong . '">
                    <button class="btn" id="decreaseBtn" name="decreaseBtn" type="submit">-</button>
                </form>
            </td>
            <td>
                <div onclick="RemoveProduct()">Xóa</div>
            </td>
        </tr>';
        }
        echo '</table>
    <h2>Tổng tiền: ' . FormatPrice($total_amount) . 'đ</h2>
    <a href="index.php?act=bill">Mua hàng</a>
    ';
    } else {
        echo '<h1>Không có sản phẩm nào</h1>';
    }
} else {
    echo '<h1>Không có sản phẩm nào</h1>';
}
?>

<?php
if (isset($_SESSION['error_message'])) {
    echo '<script>toastr.error("' . $_SESSION['error_message'] . '")</script>';
    unset($_SESSION['error_message']);
}
?>

<script>
    function RemoveProduct() {
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
                    url: 'index.php?act=remove_cart&id=<?php echo $gio_hang_id; ?>',
                    type: 'GET',
                    success: function(response) {
                        console.log(response);
                        if (response.includes("success")) {
                            toastr.success('Xóa sản phẩm thành công!');
                            setTimeout(() => {
                                location.reload();
                            }, 1000);

                        } else {
                            // toastr.error('Xóa bình luận thất bại!');
                        }
                    },
                    error: function() {
                        toastr.error('Lỗi kết nối!');
                    },
                });

            } else {
                toastr.error('Xóa sản phẩm thất bại!');
            }
        });
    }
</script>