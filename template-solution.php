<?php 
 
 /** Template Name: Solution */
 $lang=get_bloginfo("language");
 $page_default = "";
 if($post->post_parent):
    $post_parent =  $post->post_parent;
 else:
    $post_parent = $post->ID;
 endif;
 $parent_title = get_the_title( $post_parent);
 $short_text = get_field('short_text' ,  $post_parent);

$page_name = get_field("page_name");

if(!$page_name):
    $page_name =  get_field("page_name" , $post->post_parent);
endif;
 ?>
 

<?php get_header(); ?>

<?php get_template_part("templates/tip-and-solution/".$page_name) ?>

 
<?php get_footer(); ?>
