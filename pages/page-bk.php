<?php

$featured_img_url = get_the_post_thumbnail_url( get_the_ID(),'full');
if(!$featured_img_url) {
    $featured_img_url  =  get_bloginfo("template_directory").'/assets/images/bk-page.jpg';
}

?>

<div class="page-bk">

    <!-- <div class="page-bk-image"> -->
    <img alt="logo" src="<?php echo  $featured_img_url ?>"  class="image-logo-desktop" />
    <div class="image-logo-bk"> </div>
    <!-- </div> -->
    <div class="page-detail">
            <h1><?php echo get_the_title()  ?></h1>
            <?php echo get_field("short_text");  ?> 
        
    </div>
</div>
