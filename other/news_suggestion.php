<div class="project-suggestion" >
<h1 >ข่าวสาร และกิจกรรมแนะนำ</h1>
 

       <div >
        
       <?php 
 
            $argc = [
                "post_type"  => "news"  ,
                // "post__not_in" => get_the_ID()  , 
                "posts_per_page" => 3
            ];
            $query_data = new WP_Query($argc);
            if($query_data->have_posts()): while($query_data->have_posts()) : $query_data->the_post(); 
            
        ?>
        <?php 
        
                $modal_header    =  get_field("short_text" , get_the_ID()); 
                $photos = acf_photo_gallery("photos" , get_the_ID());
              
                $first_page =  get_the_ID();
                $_image = false;
     
                if($photos):
                    foreach($photos as $image):
                        $full_image_url= $image['full_image_url']; 
                       
                        $_image =  $full_image_url;
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
                <h1>
                        <?php the_title(); ?>
                    </h1>
                    <p><?php echo  $modal_header;  ?></p> 
                    <h5> <i class="far fa-calendar-alt"></i> <?php echo " ".get_the_date("d/M/Y" , get_the_ID()); ?></h5>
                </div>
            </a>
            </div>
        
            <?php endwhile;  endif;  wp_reset_query();
        ?>    
       </div>
    </div>