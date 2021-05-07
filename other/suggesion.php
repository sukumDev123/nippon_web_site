<div class="project-suggestion" >
<h1>ไอเดียโปรเจกต์แนะนำ</h1>
       <div>
        
       <?php 
    //    , "
            $argc = ["post_type"  => "project" ,  "post__not_in" => get_the_ID()  , "posts_per_page" => 3, "meta_key" => "is_suggestion" , "meta_compare" => "=" , "meta_value" => 1 ];
            $query = new WP_Query($argc);
            if($query->have_posts()): while($query->have_posts()) : $query->the_post(); 
            
        ?>
        <?php 
        
        $modal_header    = get_field('text_example');
        $photos = acf_photo_gallery("photos" , get_the_ID());
        // echo $photos[0]['url'];
        $first_page =  get_the_ID();
        $_image = false;
        // echo $photos[0]["thumbnail_image_url"]; 
        foreach($photos as $image):
            $full_image_url= $image['full_image_url']; 
            $thumbnail_image_url=  acf_photo_gallery_resize_image($full_image_url, 403, 271);
            $_image =  $thumbnail_image_url;
            break;
        endforeach;
        ?>
            <div>
            <?php 
            if($_image) {
                ?>
                <img src="<?php echo $_image; ?>" alt ="image" />
                <?php 
            }
            else {

            }
            
            ?>
            <div class="content">
                <h1>
                    <a href="<?php  echo  get_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h1>
                <p><?php echo  $modal_header;  ?></p> 
                <h5> <i class="far fa-calendar-alt"></i> <?php " ".the_date("d/M/Y"); ?></h5>
            
            
            </div>
            </div>
        
            <?php endwhile; else: endif;  wp_reset_query();
        ?>    
       </div>
    </div>