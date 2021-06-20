<div class="project-suggestion" >
<h1 >ไอเดียโปรเจกต์แนะนำ</h1>
 
       <div >
        
       <?php 
 
            $argc = [
                "post_type"  => "project"  ,
                // "post__not_in" => get_the_ID()  , 
                "posts_per_page" => 3
            ];
            $query_data = new WP_Query($argc);
            if($query_data->have_posts()): while($query_data->have_posts()) : $query_data->the_post(); 
            
        ?>
        <?php 
        
                // $modal_header    = get_field('text_example' , get_the_ID());
                $modal_header    =  get_field("short_text" , get_the_ID()); 
                $photos = acf_photo_gallery("photos" , get_the_ID());
              
                $first_page =  get_the_ID();
                $_image = false;
     
                if($photos):
                    foreach($photos as $image):
                        $full_image_url= $image['full_image_url']; 
                        $thumbnail_image_url=  acf_photo_gallery_resize_image($full_image_url, 403, 271);
                        $_image =  $thumbnail_image_url;
                        break;
                    endforeach;
                endif;
        ?>
            <div>
            <a href="<?php  echo  get_permalink(); ?>">

            <?php 
            if($_image) {
                ?>
                <img src="<?php echo $_image; ?>" alt ="image" />
                <?php 
            }
            
            
            ?>
            <div class="content">
                <div>
                <h1>
                        <?php the_title(); ?>
                    <!-- </a> -->
                </h1>
               <?php echo  $modal_header;  ?> 
                </div>
                <div  class="d-flex  justify-content-between">
                  <div class="d-flex  align-items-center">
                    <h5 class="me-4">
                            <i class="fas fa-eye"></i>
                            <?php echo   pvc_get_post_views(get_the_ID()) ?>
                        </h5>
                        <h5>
                            <i  class="fas fa-share"></i>
                        <?php if( get_post_meta( get_the_ID(), 'shares', true)):  echo get_post_meta( get_the_ID(), 'shares', true); else: echo 0;  endif; ?>
                        </h5>
                  </div>
                  <i style="cursor:pointer" id="heart<?php echo get_the_ID() ?>" onclick="onLikeClicked(<?php echo get_the_ID() ?>)" class="far fa-heart"></i>
                </div>
            
            </div>
        </a>
            </div>
        
            <?php endwhile;  endif;  wp_reset_query();
        ?>    
       </div>
    </div>