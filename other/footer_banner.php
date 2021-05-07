<div id="footer_banner" class="container">
            <div class="swiper-container footer_banner">
                <div class="swiper-wrapper">
                <?php
                    $footer_banners = acf_photo_gallery("footer_banner" , get_the_ID());
                    if($footer_banners):
                        foreach($footer_banners as $footer_banner):
                            $footerImage = $footer_banner['full_image_url'];
                            ?>
                            <div class="swiper-slide">
                                <img src="<?php echo $footerImage ?>" alt="">
                            </div>
                            <?php
                        endforeach;
                    endif;
                ?>
                </div>
                <div class="swiper-pagination"></div>

            </div>
        
        </div>