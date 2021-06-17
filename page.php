 
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


<div id="contact-us" class="container"> 
      <?php the_content() ?>
</div>

  
<!-- <h1>Tet </h1> -->

<?php 



get_footer();

?>
