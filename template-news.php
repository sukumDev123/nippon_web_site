
<?php get_header(); ?>
<?php 
 
 /** Template Name: News */
$first_page = 0;
$limit_page = 9;
if(isset($_GET["page"])) {
    $limit_page = $_GET["page"];
}
// echo $limit_page;

 ?>
 

 <?php get_template_part("pages/page-bk-2");  ?>


<div id="news" class="container">
 
 


    <?php if(get_field("news")): ?>
    <h2>ข่าวสารที่น่าสนใจ</h2>
    <div class="news-div-overflow mt-3">
    <?php 
    $news = get_field("news");
           foreach($news as $new) : 
        $modal_header    = get_field('text_example' , $new->ID);
        $photos = acf_photo_gallery("photos" , $new->ID);
        // echo $photos[0]['url'];
 
        $_image = false ;
        // echo $photos[0]["thumbnail_image_url"]; 
        foreach($photos as $image):
            $full_image_url= $image['full_image_url']; 
            
       
            $_image =  $full_image_url;
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
                    <a  href="<?php  echo get_permalink( $new->ID); ?>">
                        <?php the_title($new->ID); ?>
                    </a>
                </h1>
                <p><?php echo  $modal_header;  ?></p> 
                <h5> <i class="far fa-calendar-alt"></i> <?php  echo " ".get_the_date("d/M/Y" , $new->ID); ?></h5>
            
            
            </div>
            </div>
        
            <?php endforeach;  
        ?> 
    </div>
    <div class="mt-5rem"></div>
    <?php  endif; ?>
    <h2>ข่าวสารและกิจกรรม</h2>

    <div class="news-div  mt-3">
    <?php 
        
        
        $argc = ["post_type"  => "news" , 'posts_per_page' => $limit_page , "post__not_in" => array( $first_page ) ];
        $query = new WP_Query($argc);
       
        $count = $query->found_posts;
    ?>
    <?php 
         if($query->have_posts()): while($query->have_posts()) : $query->the_post(); 
        $modal_header    = get_field('text_example');
        $photos = acf_photo_gallery("photos" , get_the_ID());
        // echo $photos[0]['url'];
 
        $_image = false ;
        // echo $photos[0]["thumbnail_image_url"]; 
        foreach($photos as $image):
            $full_image_url= $image['full_image_url']; 
            
       
            $_image =  $full_image_url;
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
                    <a  href="<?php  echo get_permalink( ); ?>">
                        <?php the_title(); ?>
                    </a>
                </h1>
                <p><?php echo  $modal_header;  ?></p> 
                <h5> <i class="far fa-calendar-alt"></i> <?php  echo " ".get_the_date("d/M/Y" , get_the_ID()); ?></h5>
            
            
            </div>
            </div>
        
            <?php endwhile; else: endif;  wp_reset_query();
        ?>    
    </div>
    <?php if($count > $limit_page ): ?>
    <h5 class="see-more">
    <a href="<?php echo esc_url( add_query_arg( 'page', $limit_page + 1, get_permalink() ) ); ?>" >See more</a>
    </h5>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
