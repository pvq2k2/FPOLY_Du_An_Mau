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

<div class="category py-10">
    <?php
    foreach ($ListCategory as $Category) {
        extract($Category);
        $LinkCategory = "index.php?act=product&category_id=" . $danh_muc_id;
        $hinhPath = $IMG_PATH . "Category/" . $hinh;
    ?>
        <div class="w-[120px] h-[50px] bg-white mx-5 overflow-hidden flex justify-center items-center rounded shadow-xl border border-inherit">
            <a href="<?= $LinkCategory ?>" title="<?= $ten_danh_muc ?>">
                <img src="<?= $hinhPath ?>" alt="<?= $ten_danh_muc ?>" class="max-w-[120px] max-h-[70px] my-[-10px] mx-auto">
            </a>
        </div>
    <?php } ?>
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


<style>
    .slick-dots {
        bottom: -50px;
    }

    .category .slick-list.draggable {
        padding: 20px 0;
    }

    .category .slick-prev.slick-arrow {
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }
</style>

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

        $('.category').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1000,
            arrows: true,
            prevArrow: `<button type='button' class='slick-prev-news slick-arrow 
              absolute top-16 -left-11 border-none w-[40px] h-[40px] 
              justify-center items-center rounded-full 
              z-10 transition-all duration-300 ease-linear 
              bg-white xl:group-hover:opacity-100 hover:bg-gradient-to-r hover:from-[#0f4670] hover:to-[#4ba3e7] hover:text-white' style="display: flex;">
              <ion-icon name="chevron-back-outline" class="text-2xl"></ion-icon></button>`,
            nextArrow: `<button type='button' class='slick-next-news slick-arrow
              absolute top-16 -right-12 border-none w-[40px] h-[40px] 
              justify-center items-center rounded-full 
              z-10 transition-all duration-300 ease-linear 
              bg-white xl:group-hover:opacity-100 hover:bg-gradient-to-r hover:from-[#0f4670] hover:to-[#4ba3e7] hover:text-white' style="display: flex;">
              <ion-icon name="chevron-forward-outline" class="text-2xl"></ion-icon></button>`,
        });
    });
</script>