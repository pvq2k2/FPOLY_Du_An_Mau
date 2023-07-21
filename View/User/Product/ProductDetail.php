<main>
    <h1>Chi tiết sản phẩm</h1>
    <?php
    extract($Product);
    $hinh = $IMG_PATH . "Product/" . $hinh;
    echo ' <div>
            <img src="' . $hinh . '" width="200">
            <form action="index.php?act=add_to_cart" method="post" id="addToCartForm">
            <p>' . $ten_san_pham . '</p>
            <span>' . FormatPrice($gia) . '</span>
            <div class="form_group">
                <label for="">Số lượng</label>
                <button class="btn" name="increaseBtn" id="increaseBtn">+</button>
                <input type="number" name="so_luong" id="quantityInput" min="1" value="1">
                <button class="btn" name="decreaseBtn" id="decreaseBtn">-</button>
            </div>
            <div class="form_group">
                <input type="hidden" name="san_pham_id" value="' . $san_pham_id . '">
                <input id="addToCartBtn" type="submit" name="btn_add_to_cart" value="Thêm vào giỏ hàng">
            </div>
        </form>
            </div>';
    echo $mo_ta;
    ?>


    <div class="formComment" style="position: relative; overflow: hidden;">
        <?php
        if (!isset($_SESSION['user'])) {
        ?>
            <div class="overlay" style="position: absolute; width: 100%; height: 100%; text-align: center; line-height: 50%; background-color: #ccc; color: #000; border-radius: 10px;">Vui lòng đăng nhập để bình luận</div>
        <?php } ?>
        <form action="">
            <textarea name="" id="" cols="30" rows="10" style="width: 100%; border-radius: 10px;"></textarea>
        </form>
    </div>

    <?php

    ?>
    <iframe src="view/user/product/CommentProduct.php?san_pham_id=<?= $san_pham_id ?>" frameborder="0"></iframe>
    <h2>Sản phẩm cùng loại</h2>
    <?php
    foreach ($ListSimilarProduct as $SimilarProduct) {
        extract($SimilarProduct);
        $hinh = $IMG_PATH . "Product/" . $hinh;
        echo ' <div>
            <img src="' . $hinh . '" width="200">
            <p>' . $ten_san_pham . '</p>
            <span>' . FormatPrice($gia) . '</span>
            </div>';
        echo $mo_ta;

        echo "Sản phẩm cùng loại";
    }
    ?>
</main>

<?php
// Kiểm tra xem có thông báo thành công hay không
if (isset($_SESSION['success_message'])) {
    echo '<script>toastr.success("' . $_SESSION['success_message'] . '")</script>';

    // Xóa thông báo thành công sau khi hiển thị
    unset($_SESSION['success_message']);
}
?>

<?php
// Kiểm tra xem có thông báo thành công hay không
if (isset($_SESSION['error_message'])) {
    echo '<script>toastr.error("' . $_SESSION['error_message'] . '")</script>';

    // Xóa thông báo thành công sau khi hiển thị
    unset($_SESSION['error_message']);
}
?>

<script>
    $(document).ready(function() {
        const quantitySpan = $('#quantity');
        const quantityInput = $('#quantityInput');
        const increaseBtn = $('#increaseBtn');
        const decreaseBtn = $('#decreaseBtn');

        let quantity = 1;

        quantityInput.on('input', function() {
            quantity = parseInt(quantityInput.val());
            quantitySpan.text(quantity);
        });

        increaseBtn.click(function(e) {
            e.preventDefault();
            quantity++;
            quantitySpan.text(quantity);
            quantityInput.val(quantity);
        });

        decreaseBtn.click(function(e) {
            e.preventDefault();
            if (quantity > 1) {
                quantity--;
                quantitySpan.text(quantity);
                quantityInput.val(quantity);
            } else {
                toastr.warning('Số lượng không được nhỏ hơn 1 !');
            }
        });
    });
</script>