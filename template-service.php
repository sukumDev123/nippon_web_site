<?php   /** Template Name: Services */ ?>
<?php get_header() ?>

<div class="page-bk">

    <!-- <div class="page-bk-image"> -->
    <img alt="logo" src="<?php bloginfo("template_directory");  ?>/assets/images/bk-page.jpg"  class="image-logo" />
    <div class="image-logo-bk"> </div>
    <!-- </div> -->
    <div class="page-detail">
            <h1><?php echo get_the_title()  ?></h1>
        
    </div>
</div>

<?php

get_template_part("pages/page-services");


?>
<?php get_footer() ?>