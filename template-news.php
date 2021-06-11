
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
 

<?php get_template_part("pages/page-bk");  ?>

<div id="news" class="container">
 
 



    <h2>ข่าวสารและกิจกรรม</h2>

    <div class="news-div">
    <?php 
        
        
        $argc = ["post_type"  => "news" , 'posts_per_page' => $limit_page , "post__not_in" => array( $first_page ) ];
        $query = new WP_Query($argc);
        if($query->have_posts()): while($query->have_posts()) : $query->the_post(); 
        
    ?>
    <?php 
        
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
    <h5 class="see-more">
    <a href="<?php echo esc_url( add_query_arg( 'page', $limit_page + 1, get_permalink() ) ); ?>" >See more</a>
    </h5>
</div>

<?php get_footer(); ?>
