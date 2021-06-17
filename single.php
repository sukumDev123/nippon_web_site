 
 <?php 

get_header();


$slug = get_post_field( 'post_name');
$post_type = get_post_field( 'post_type');
//  echo $post_type;

?>
<!-- <div id="banner-page"> -->

<?php 
get_template_part("other/page-bk");

?>

 
      <?php the_content() ?>
 

  
<!-- <h1>Tet </h1> -->

<?php 



get_footer();

?>
