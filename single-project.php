 

 
<?php 
 get_template_part("headers/header-single");
// $post_id = get_the_ID();
get_template_part("other/loading");
post_share();
while ( have_posts() ) {
    
$postUrl = 'http' . ( isset( $_SERVER['HTTPS'] ) ? 's' : '' ) . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"; 
?>
 
<div id="single-news">




    <div class="show-video-link">
        <?php if(get_field("video_info")): ?>
    <iframe width="560" height="315" src="<?php echo get_field("video_info")['video_link'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <?php endif; ?>
    </div>
<?php 
    the_post();
    ?>
    <div class="container">
            <div  class="arrow-back">
                <a href="/project-reference/">
                <img src="<?php echo  get_bloginfo("template_directory");  ?>/assets/images/arrow-g.svg" alt="arrow-g.svg" />

                </a>


        </div>

        <h1>
                <?php the_title();  ?>
        </h1>
       <div class="date-social">
            <h5 class="date">  <?php " ".the_date("d M Y"); ?></h5>

            <section class="sharing-box content-margin content-background clearfix">
                <div  class="share-button-wrapper">
                    <a  onclick="onSharedClicked(<?php echo get_the_ID() ?>)" target="_blank" class="share-button share-twitter" href="https://twitter.com/intent/tweet?url=<?php echo $postUrl; ?>&text=<?php echo the_title(); ?>&via=<?php the_author_meta( 'twitter' ); ?>" title="Tweet this"><i class="fab fa-twitter"></i></a>
                    <a  onclick="onSharedClicked(<?php echo get_the_ID() ?>)"   target="_blank" class="share-button share-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $postUrl; ?>" title="Share on Facebook"><i class="fab fa-facebook"></i></a>
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

    <div class="swiper-container swiper-project">
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
       
        <div class="swiper-pagination"></div>
    </div>


    <div class="container">
         <?php the_content() ?>
         
    </div>

   
    <div class="image-g">
        <?php 
            $photos = acf_photo_gallery("photo_center_cards" , get_the_ID());
                // echo count( $photos);
                if(count($photos) > 0):
        ?>
        <div class="swiper-container project-swiper1">
            <div class="swiper-wrapper">
            <?php 
                
            
                    foreach($photos as $image):
                        $full_image_url= $image['full_image_url']; 
                ?>
                <div class="swiper-slide">
                    <img class="banner-image " src="<?php echo $full_image_url ?>" alt="<?php $image['title'] ?>" />
                
                </div>
                <?php 
                    endforeach;
                ?>
            </div>
            <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
            <!-- <div class="swiper-pagination"></div> -->
            <!-- <div class="swiper-pagination"></div> -->
        
        </div>
        <?php 
            endif;
            $photos = acf_photo_gallery("photo_center_cards" , get_the_ID());
            if(count($photos) > 2):
        ?>
        <div class="swiper-container project-swiper2">
            <div class="swiper-wrapper">
            <?php 
                
                
            
                    foreach($photos as $image):
                        $full_image_url= $image['full_image_url']; 
                ?>
                <div class="swiper-slide">
                    <img class="banner-image " src="<?php echo $full_image_url ?>" alt="<?php $image['title'] ?>" />
                    <!-- <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div> -->
                </div>
                <?php 
                    endforeach;
                ?>
            </div>
            
        </div>
        <?php endif; ?>
    </div>

 

   <div class="container" >
   <?php 
        get_template_part("other/suggesion");
    
    ?>
   </div>
    
<?php 
}

?>

</div>

<script>
     function onSharedClicked(id) {
        fetch("<?php  echo get_permalink(); ?>" + "?id=" + id + "&type=shared").then(data => data.json()).catch(error => console.log({error}))
    }
</script>

<?php 
get_footer();

?>

 