
<?php 

$featured_img_url = get_the_post_thumbnail_url( get_the_ID(),'full');


?>
<div class="page-bk">

<!-- <div class="page-bk-image"> -->
<img alt="logo" src="<?php echo $featured_img_url ; ?>"  class="image-logo-desktop" />
<div class="image-logo-bk"> </div>
<!-- </div> -->
<div class="page-detail">
        <h1><?php the_title(); ?></h1>
        <p>
            <?php the_content(); ?>
        </p>
        
     
    </div>
</div>


</div>