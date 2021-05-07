 

 
<?php 
 get_template_part("headers/header-single");
// $post_id = get_the_ID();
get_template_part("other/loading");
 $size_images  = 0;
while ( have_posts() ) {
    
$postUrl = 'http' . ( isset( $_SERVER['HTTPS'] ) ? 's' : '' ) . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"; 
?>


<div id="single-news">
<?php 
    the_post();
    ?>
    <div class="container">
        <h1>
                <?php the_title();  ?>
        </h1>
       <div class="date-social">
            <h5 class="date">  <?php " ".the_date("d M Y"); ?></h5>

            <section class="sharing-box content-margin content-background clearfix">
                <div class="share-button-wrapper">
                    <a target="_blank" class="share-button share-twitter" href="https://twitter.com/intent/tweet?url=<?php echo $postUrl; ?>&text=<?php echo the_title(); ?>&via=<?php the_author_meta( 'twitter' ); ?>" title="Tweet this"><i class="fab fa-twitter"></i></a>
                    <a target="_blank" class="share-button share-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $postUrl; ?>" title="Share on Facebook"><i class="fab fa-facebook"></i></a>
                </div>
            </section>
       </div>



        <?php  
        
        $tags = get_the_tags();
        
        ?>
        <div class="tag-div">
        <i class="fas fa-tag"></i>
        <?php 
        
            if ($tags) {
        
                //foreach entry in array of tags, access the tag object
                foreach( $tags as $tag ) {
        
                //echo the name field from the tag object 
                echo "<strong class='tag'>" . $tag->name . "</strong>";
                }
            }
        
        
        ?>
        </div>
    </div>

    <div class="swiper-container new-swiper">
        <div class="swiper-wrapper">
        <?php 
            
            $photos = acf_photo_gallery("photos" , get_the_ID());
        
                foreach($photos as $image):
                    $full_image_url= $image['full_image_url']; 
            ?>
                <img class="banner-image swiper-slide" src="<?php echo $full_image_url ?>" alt="<?php $image['title'] ?>" />
            <?php 
                endforeach;
            ?>
        </div>
       
        <!-- <div class="swiper-pagination"></div> -->
    </div>


    <div class="container">
        <div class="content">
            <?php 
            echo  get_field("info_1");
            ?>

        </div>
        <div  class="content"> 
            <?php 
            echo  get_field("info_2");
            ?>

        </div>
    </div>

    <div class="swiper-container news-swiper">
        <div class="swiper-wrapper">
        <?php 
            
            $photos = acf_photo_gallery("photo_center_cards" , get_the_ID());
        
                foreach($photos as $image):
                    $full_image_url= $image['full_image_url']; 
                    $size_images += 1;

            ?>
            <div class="swiper-slide">
                <img class="banner-image " src="<?php echo $full_image_url ?>" alt="<?php $image['title'] ?>" />
                <?php  if($size_images > 1): ?>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
                    <?php endif; ?>
            </div>
            <?php 
                endforeach;
            ?>
        </div>
       
        <!-- <div class="swiper-pagination"></div> -->
        
    </div>


    <div></div>

   <div class="container" >
   <?php 
        get_template_part("other/suggesion");
    
    ?>
   </div>
    
<?php 
}

?>

</div>



<?php 
get_footer();

?>

 