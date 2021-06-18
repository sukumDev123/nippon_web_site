
<?php 
    $featured_img_url = get_the_post_thumbnail_url( get_the_ID(),'full');


    $postId =   get_top_ancestor_id();
    $thisPostId = $post->ID;
    $argc = ['post_type'=> "page" , 'post_parent' => $postId];
    $query = new WP_Query($argc);
    $index = 1;
    $shade_class = "page-".$post->ID;
?>  
<div class="page-bk-shade <?php echo $shade_class; ?>">
    <img alt="logo" src="<?php echo $featured_img_url ; ?>"  class="image-logo-bk" />
    <div class="image-logo-bk"> </div>
    <div class="page-detail">
        <div class="page-title-list">
            <?php  
                 $classNameOut = "" ; 
            if($query->have_posts()): while($query->have_posts()): $query->the_post(); ?>
            <?php 
                 $className = "" ; 
                if($thisPostId == get_the_ID()) {
                    $className = "active";
                    if($index == 2) {
                        $className = "active order2";
                    } 
                    if($index == 1) {
                       
                        $className="active order2";
                    } 
                }  else {
                    if($index == 1) {
                        $className = "order1 ";
                        $classNameOut = "order3 null-content ";
                    }
                    if($index == 2) {
                        $className = "order3";
                        $classNameOut = "order1 null-content";

                    } 
                    
                }
                $index += 1;
            ?>
                <a href="<?php echo get_permalink() ?>" class="<?php echo   $className;?>" > 
                <h1><?php echo get_the_title() ?> </h1>
            </a>
            <?php endwhile;endif; ?>

            <h1 class="<?php echo  $classNameOut ?>"></h1>
        </div>
        </div>
    </div>
</div>

<?php 
    wp_reset_query();

?>