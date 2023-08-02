<div class="box-slider w-full shadow-2xl rounded-xl">
    <div class="slider group">
        <?php
        if (isset($ListSlides) && is_array($ListSlides)) {
            foreach ($ListSlides as $Slides) {
                extract($Slides);
                $hinhPath = $IMG_PATH . "Slides/" . $img;
        ?>
                <div class="slider-item">
                    <a href="index.php?act=product_detail&product_id=<?= $san_pham_id ?>">
                        <img class="w-full rounded-xl" src="<?= $hinhPath ?>">
                    </a>
                </div>
        <?php
            }
        }
        ?>

    </div>
</div>
</div>



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

<script>
    $(document).ready(function() {
        $(".slider").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            draggable: true,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: true,
            prevArrow: `<button type='button' class='slick-prev-news slick-arrow 
              absolute top-[40%] left-3 translate-y-1/2 border-none w-[50px] h-[50px] 
              justify-center items-center rounded-full 
              z-10 opacity-0 hidden transition-all duration-300 ease-linear 
              bg-white xl:group-hover:opacity-100 hover:bg-gradient-to-r hover:from-[#0f4670] hover:to-[#4ba3e7] hover:text-white' style="display: flex;">
              <ion-icon name="chevron-back-outline" class="text-2xl"></ion-icon></button>`,
            nextArrow: `<button type='button' class='slick-next-news slick-arrow
              absolute top-[40%] right-3 translate-y-1/2 border-none w-[50px] h-[50px] 
              justify-center items-center rounded-full 
              z-10 opacity-0 hidden transition-all duration-300 ease-linear 
              bg-white xl:group-hover:opacity-100 hover:bg-gradient-to-r hover:from-[#0f4670] hover:to-[#4ba3e7] hover:text-white' style="display: flex;">
              <ion-icon name="chevron-forward-outline" class="text-2xl"></ion-icon></button>`,
            dots: true,
            responsive: [{
                breakpoint: 1025,
                settings: {
                    arrow: false,
                },
            }, ],
        });
    });
</script>