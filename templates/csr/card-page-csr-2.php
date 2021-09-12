

<?php 

$images = $args["images"];
 
?>

<div class="card-page">
            <div class="row">
            <div class="col-12 col-lg-6">
                    <img class="image-card-page image-card-window" src="<?php echo $args["image"] ?>" alt="Image">
                </div>
                <div class="col-12 col-lg-6">
                    <h2 class="top-title"><?php echo $args["top-title"] ?></h2>
                    <h1 class="title"><?php echo $args["title"] ?></h1>
                    <img class="image-card-page image-card-page-mobile" src="<?php echo $args["image"] ?>" alt="Image">
                    <p class="detail"><?php echo $args["detail"] ?></p>
                    <a class="btn-link-csr" href="<?php echo $args["btn-link-csr"] ?>">
                        <button><?php echo $args["btn-title-csr"] ?></button>
                    </a>
                </div>
               
            </div>
            <div class="wrapper-swp-csr">
            <div class="swiper-container card-images-list <?php echo $args["swiper-container"] ?> ">
                <div class="swiper-wrapper">
                    <?php $index = 0;foreach($images  as $image): ?>
                    <div onclick="showModal('<?php echo $args['modal'] ?>' , <?php echo  $index++ ?>)" class="swiper-slide image-slide-csr">
                        <img src="<?php echo $image["full_image_url"] ?>" alt="Image Csr">
                    </div>
                    <?php endforeach; ?>
                </div>
              
            </div>
            <div class="swiper-pagination <?php echo $args["swiper-pagination"] ?>"></div>
            <div class="swiper-button-prev <?php echo $args["swiper-container"] ?>-prev"></div>
            <div class="swiper-button-next <?php echo $args["swiper-container"] ?>-next"></div>
            </div>
            
        </div>