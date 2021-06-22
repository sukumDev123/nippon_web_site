 
<div id="services" class="container">
    <h2>รวมทุกการบริการจากนิปปอนเพนต์</h2>
    <?php 
    $argc = ["post_type" => "page" , "post_parent" => 143];
    $loop = new WP_Query( $argc );
 
    ?>
    <div class="services-card">

    <?php 
    if ( $loop->have_posts() ) {
        while ( $loop->have_posts() ) : $loop->the_post();
                $featured_img_url = get_the_post_thumbnail_url( get_the_ID(),'full');
                $link = "";
                if(get_the_ID() == 184):
                    $link = "https://smartpainter.nipponpaintdecor.com/";
                endif;
                if(get_the_ID() == 181):
                    // $link = "https://web.facebook.com/NipponPaintDecor/posts/3967456120036278?_rdc=3&_rdr";
                    $link = "https://staging.tanpong.me/services/nippon-paint-rewards/";

                endif;
            ?>
                    <div class="service-card">
                      <div >
                      <!-- <a> -->
                            <div class="bk"></div>
                            <img src="<?php echo $featured_img_url ?>" alt="image" class="service-image"  />
                            <h2><?php echo get_the_title() ?></h2>
                           
                            <?php 
                            

                            if(get_the_ID() == 181):
                               ?>
                                    <a target="_blank" class="link-image"  href="https://bit.ly/NP-Rewards-website">
                                        <img src="<?php bloginfo("template_directory");  ?>/assets/images/LineImage.png" alt="">
                                    </a>
                               <?php 
                            endif;

                            ?>
                          
                            <a target="_blank" class="readmore"  href="<?php echo $link ?>">Read More</a>
                             
                        <!-- </a> -->
                      </div>
                    </div>

            <?php 
        endwhile;
    } else {
        echo __( 'No products found' );
    }

    wp_reset_query();

    ?>
    </div>
</div>
