 
 <?php 

get_header();


$slug = get_post_field( 'post_name');
$post_type = get_post_field( 'post_type');
//  echo $post_type;

?>
<!-- <div id="banner-page"> -->

<?php 

if( $post->post_name != "my-account"): 
get_template_part("other/page-bk");

?>

<div id="contact-us" class="container"> 
      <?php the_content() ?>
</div>

<?php 
else:

      // the_content();
 get_template_part("templates/my-account/home");

endif;

get_footer();

?>
