<?php
$images = $args['images'];
$nameSwiperClass = $args["swiper-class"];
$bigClassDiv = $args["big-class-div"];
?>

<div class="container-modal-swiper <?php echo $bigClassDiv ?>">
    <h3 onclick="closeModal('.<?php echo $bigClassDiv ?>')" class="cancel-modal">
    <i class="bi bi-x-lg"></i>
    </h3>
   <div class="contain-center">
    <div class="contain-swiper">
       <div class="swiper-container <?php  echo $nameSwiperClass ?>">
        <div class="swiper-wrapper">
                <?php foreach($images as $image): ?>    
                <div class="swiper-slide">
                    <img class="image-in-swiper" src="<?php echo $image['full_image_url'] ?>" alt="<?php echo $nameSwiperClass ?>">
                </div>
                <?php endforeach; ?>
            </div>
         
       </div>
       <div class="swiper-pagination <?php  echo $nameSwiperClass ?>-pagination"></div>
            <div class="swiper-button-prev <?php  echo $nameSwiperClass ?>-prev"></div>
            <div class="swiper-button-next <?php  echo $nameSwiperClass ?>-next"></div>
    </div>
   </div>
</div>