<?php 
get_header() ;

get_template_part("other/loading");
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');    
 $next_post_id = NULL;
    $next_post = get_next_post();
    if($next_post):

    $next_post_id = $next_post->ID;
endif;
 
    $prev_post = get_previous_post();
    $prev_post_id = NULL;
    if($prev_post):
    $prev_post_id = $prev_post->ID;
    endif;
    $photos = acf_photo_gallery("gallery_blog" , get_the_ID());

?>


<div class="get-idea-content">
   <div class="container">
    <div class="row">
        <div class="col-12 col-md-8 full-image" >
            <div class="swiper-container swiper-single-get-idea">
                <div class="swiper-wrapper">
                    <?php foreach($photos as $photo): 
                        $full_image_url= $photo['full_image_url']; 
                        
                        ?>
                        <div class="swiper-slide">
                         <img src="<?php  echo $full_image_url ?>" alt="<?php  echo get_the_title() ?>">

                        </div>
                    <?php endforeach; ?>
             
                </div>
            </div>
            <div class="pagination-single-get-idea">
                <div class="swiper-pagination"></div>

            </div>

        </div>
        <div class="col-12 col-md-4 content-get-idea" >

        <div class="header-get-content">
                <div class="ui small breadcrumb">
                    <a href="<?php echo get_site_url() ?>/get-idea" class="section">หน้าแรก</a>
                    <i class="right chevron icon divider"></i>
                 
                    <div class="active section"><?php  echo get_the_title() ?></div>
            </div>
            <?php do_action("favorites_blog_h2" , [
                    "title" => get_the_title(),
                    "postId" => get_the_ID(),
                    "typeFav" => "get_idea",
                        
                ]) ?>
        </div>
        <!-- <div class="content-get-idea"> -->
        <?php the_content() ?>
        <?php
             do_action("share-button" , [
                  "title" => get_the_title(),
                  "link" => get_permalink(),
                  "sub_title" => "Share",
             ]);
        ?>
        <div class="footer-content">
            <div class="footer-content-prev-and-next">

                <?php if($prev_post_id ): ?>
                    <a  href="<?php echo get_permalink( $prev_post_id ) ?>"  class="prevButton"> <i class="bi bi-chevron-compact-left"></i> บทความก่อนหน้า</a>

                <?php else: ?>
                    <a   class="prevButton disabled"> <i class="bi bi-chevron-compact-left "></i> บทความก่อนหน้า</a>

                <?php endif; ?>


                <?php if($next_post_id ): ?>
                    <a href="<?php echo get_permalink( $next_post_id ) ?>" class="nextButton">บทความถัดไป  <i class="bi bi-chevron-compact-right"></i></a>
                <?php else: ?>
                    <a  class="nextButton disabled">บทความถัดไป   <i class="bi bi-chevron-compact-right"></i>
                <?php endif; ?>
            </div>
            <div class="footer-content-arrow">

            </div>
        </div>

        </div>
    </div>
   </div>

   
</div>



<?php  get_footer() ?>