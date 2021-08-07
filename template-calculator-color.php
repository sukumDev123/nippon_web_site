<?php 


 /** Template Name: Calculate Color */
 get_header();
 global $post;
 $post_parent = null;
 
 if($post->post_parent):
    $post_parent =  $post->post_parent;
 else:
    $post_parent = $post->ID;
 endif;
 $parent_title = get_the_title( $post_parent);
 $short_text = get_field('short_text' ,  $post_parent);

 $page_name = get_field("page_name");
if(!$page_name) {
    $page_name = "cal-internal";
}



?>
<div class="container page-calculate">
    <div class="margin-page"></div>
<h2 class="ui header primary-text center aligned mb-3 mt-3">
    
<?php echo  $parent_title ?>

<div class="sub header">
    <?php echo $short_text ?>
</div>
</h2>
<div class="margin-page"></div>

    <div class="ui fluid two item  secondary pointing menu">
      
        <?php 
 
        
            $query = new WP_Query([
                "post_type" => "page",
                'post_parent' =>  $post_parent,
                'orderby' => 'order',
'order' => 'ASC'
            ]);
            if($query->have_posts()): while($query->have_posts()): $query->the_post(); ?>
            
            <a href="<?php echo get_permalink(get_the_ID() )?>" class="<?php if( $page_name  === get_field("page_name" , get_the_ID())): echo "active" ;endif; ?> item">
                    <?php echo get_the_Title() ?>
            </a>
        
            <?php endwhile;endif; wp_reset_query(); ?>
    </div>
    <?php get_template_part("templates/calculate-color/" . $page_name) ?>
</div>


 



 




<?php get_footer(); ?>