<section class="box-slider w-full shadow-2xl rounded-xl">
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
</section>

<section class="category py-10">
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
</section>


<section class="new_product mb-4">
    <div class="title mt-5 inline-block h-8 overflow-hidden bg-[#4ba3e7] rounded after:content-[''] after:ml-10 after:border-t-[40px] after:border-t-[#0f4670] after:border-l-[40px] after:border-[#4ba3e7]">
        <h4 class="text-white text-center pr-16 pl-9 ml-16 bg-[#0f4670] text-white uppercase">Sản phẩm mới</h4>
    </div>

    <div class="grid grid-cols-5 gap-x-5 gap-y-10 mt-5">
        <?php
        foreach ($ListNewProduct as $Product) {
            extract($Product);
            $hinhPath = $IMG_PATH . "Product/" . $hinh;
        ?>
            <a href="index.php?act=product_detail&product_id=<?= $san_pham_id ?>" class="group bg-white p-5 rounded-xl shadow-xl">
                <div class="aspect-h-1 aspect-w-1 w-full h-60 overflow-hidden rounded-lg group-hover:bg-gray-200 xl:aspect-h-8 xl:aspect-w-7 transition-all duration-200 ease-linear">
                    <img src="<?= $hinhPath ?>" class="h-full w-full object-cover object-center group-hover:opacity-75 transition-all duration-200 ease-linear">
                </div>
                <h3 class="mt-4 text-sm text-gray-700"><?= $ten_san_pham ?></h3>
                <p class="mt-1 text-lg font-medium text-gray-900"><?= FormatNumber($gia) ?>₫</p>
            </a>
        <?php } ?>
    </div>
</section>


<section class="top_10_product mt-10 mb-4">
    <div class="title mt-5 inline-block h-8 overflow-hidden bg-[#4ba3e7] rounded after:content-[''] after:ml-10 after:border-t-[40px] after:border-t-[#0f4670] after:border-l-[40px] after:border-[#4ba3e7]">
        <h4 class="text-white text-center pr-16 pl-9 ml-16 bg-[#0f4670] text-white uppercase">Top 10 Sản phẩm</h4>
    </div>

    <div class="grid grid-cols-5 gap-x-5 gap-y-10 mt-5">
        <?php
        foreach ($ListTop10Product as $Product) {
            extract($Product);
            $hinhPath = $IMG_PATH . "Product/" . $hinh;
        ?>
            <a href="index.php?act=product_detail&product_id=<?= $san_pham_id ?>" class="group bg-white p-5 rounded-xl shadow-xl">
                <div class="aspect-h-1 aspect-w-1 w-full h-60 overflow-hidden rounded-lg group-hover:bg-gray-200 xl:aspect-h-8 xl:aspect-w-7 transition-all duration-200 ease-linear">
                    <img src="<?= $hinhPath ?>" class="h-full w-full object-cover object-center group-hover:opacity-75 transition-all duration-200 ease-linear">
                </div>
                <h3 class="mt-4 text-sm text-gray-700"><?= $ten_san_pham ?></h3>
                <p class="mt-1 text-lg font-medium text-gray-900"><?= FormatNumber($gia) ?>₫</p>
            </a>
        <?php } ?>
    </div>
</section>

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

<?php
if (isset($_SESSION['success_message'])) {
    echo '<script>toastr.success("' . $_SESSION['success_message'] . '")</script>';
    unset($_SESSION['success_message']);
}
?>

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