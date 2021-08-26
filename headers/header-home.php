<?php 

get_header();
 
$parent_title = get_the_title($post->post_parent);
$title = get_the_content();
if($parent_title) {
    $title = $parent_title;
}
if(get_field("title_banner")):

    $title = get_field("title_banner");
endif;
 
$photos = acf_photo_gallery("banners" , get_the_ID());
?>

<div id="home-banner">
    <div class="banner-home">
        <!-- img -->
        <div class="banner-home-bk-image">
        <div class="swiper-container home-banner-swiper">
            <div class="swiper-wrapper">
                <?php
                    if(count($photos) > 0):
                        foreach($photos as $photo):
                            $full_image_url= $photo['full_image_url']; 
                            ?>
                                <div class='swiper-slide'>
                                    <img src="<?php echo $full_image_url ?>" alt="">
                                </div>
                            <?php 
                        endforeach;
                    endif;
                ?>
            </div>
            <div class="swiper-pagination banner-pagination"></div>
            
        </div>
        </div>
        
        <div class="banner-home-bk">            
        </div>
        <div class="banner-home-content">
          <div>
            <h1><?php echo $title; ?></h1>
            <h2><?php echo get_field("short_text") ?></h2>
          </div>
        </div>
    </div>
    
</div>
 
