<?php

get_template_part("other/loading");
get_header();
$featured_img_url = get_the_post_thumbnail_url( get_the_ID(),'full'); 

$getFavs = getFavoritesData("get_idea" );
$data_favorites =  $getFavs["datas"];

?>

<div class="container single-page"  >
      
      <div class="ui large breadcrumb">
      <a href="<?php echo get_site_url() ?>/project-reference/"  class="section">โครงการที่ใช้สีนิปปอนเพนต์</a>
      <i class="right chevron icon divider"></i>
      <div class="active section"><?php echo get_the_title() ?></div>
      </div>
      <?php do_action("favorites_blog" , [
           "title" => get_the_title(),
           "postId" => get_the_ID(),
           "typeFav" => "get_idea",
            
     ]) ?>
</div>
<div class="thumbnail-image">
<img   src="<?php echo $featured_img_url ?>" alt="<?php echo get_the_title() ?>">

</div>
<div class="container single-page-content">

      <?php the_content() ; ?>
  
      <?php
             do_action("share-button" , [
                  "title" => get_the_title(),
                  "link" => get_permalink(),
                  "sub_title" => "Share",
             ]);
      ?>
           
      <?php  do_action("relation_post" , [
                  "post_type" => 'project',
                  "category__in" => wp_get_post_categories(get_the_ID()),
                  "post__not_in" => array(get_the_ID()),
                  "data_favorites" => $data_favorites
            ]);
      ?>
   
</div>
<?php get_footer() ?>