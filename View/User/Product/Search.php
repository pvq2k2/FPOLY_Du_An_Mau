<main>
    <div class="Tìm kiếm">
        <?php
        echo '<h1>
            Kết quả tìm kiếm "' . $KeyWord . '"
            </h1>';
        ?>

        <?php
        foreach ($ListProduct as $Product) {
            extract($Product);
            $hinh = $IMG_PATH . "Product/" . $hinh;
            echo ' <div>
            <img src="' . $hinh . '" width="200">
            <p>' . $ten_san_pham . '</p>
            <span>' . $gia . '</span>
            </div>';
        }
        ?>
    </div>
</main>