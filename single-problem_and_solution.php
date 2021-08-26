<?php

get_template_part("other/loading");
get_header();
$featured_img_url = get_the_post_thumbnail_url( get_the_ID(),'full'); 
$getFavs = getFavoritesData("problem-and-solution" , get_the_ID());
$data_favorites =  $getFavs["datas"];
?>

<div class="container single-page"  >
      
      <div class="ui large breadcrumb">
      <a class="section">เคล็ดลับและการแก้ไขปัญหาสี</a>
      <i class="right chevron icon divider"></i>
      <a href="<?php echo get_site_url() ?>/tips-and-solutions/problems-and-solutions/"  class="section">Problems and Solutions</a>
      <i class="right chevron icon divider"></i>
      <div class="active section"><?php echo get_the_title() ?></div>
      </div>
     <?php do_action("favorites_blog" , [
           "title" => get_the_title(),
           "postId" => get_the_ID(),
           "typeFav" => "problem-and-solution",
            
     ]) ?>

      <img class='thumbnail-image' src="<?php echo $featured_img_url ?>" alt="<?php echo get_the_title() ?>">

      <?php the_content() ?>
 
      <?php 
            do_action("relation_post" , [
                  "post_type" => 'problem_and_solution',
                  "category__in" => wp_get_post_categories(get_the_ID()),
                  "post__not_in" => array(get_the_ID()),
                  "data_favorites" => $data_favorites
            ]);
      ?>
   
</div>
<?php get_footer() ?>