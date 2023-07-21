<main>
    <div class="san_pham">
        <?php
        echo '<h1>
            ' . $NameCategory . '
            </h1>';
        ?>

        <?php
        foreach ($ListProduct as $Product) {
            extract($Product);
            $hinh = $IMG_PATH . "Product/" . $hinh;
            echo ' <div>
            <img src="' . $hinh . '" width="200">
            <p>' . $ten_san_pham . '</p>
            <span>' . FormatPrice($gia) . '</span>
            </div>';
        }
        ?>
    </div>
</main>