<main>
    <div class="san_pham_moi">
        <?php
        foreach ($ListNewProduct as $Product) {
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

    <div class="list_danh_muc">
        <?php
        foreach ($ListCategory as $Category) {
            extract($Category);
            $LinkCategory = "index.php?act=product&category_id=" . $danh_muc_id;
            echo '<a href="' . $LinkCategory . '" style="display: inline-block; margin: 20px;">' . $ten_danh_muc . '</a>';
        }
        ?>
    </div>

    <div class="san_pham_top_10">
        <?php
        foreach ($ListTop10Product as $Product) {
            extract($Product);
            $hinh = $IMG_PATH . "Product/" . $hinh;
            $LinkProduct = "index.php?act=product_detail&product_id=" . $san_pham_id;
            echo ' <a href="' . $LinkProduct . '">
                    <div>
                        <img src="' . $hinh . '" width="200">
                        <p>' . $ten_san_pham . '</p>
                        <span>' . $gia . '</span>
                    </div>
            </a>';
        }
        ?>

    </div>
</main>