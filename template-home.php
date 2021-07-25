<?php 
 /** Template Name: Home */
//  global $post; 
$fileName = get_field("file_name");
?>
<?php  if($fileName) :?>
<?php get_template_part("templates/home/".$fileName); ?> 
<?php 
else: 
    ?>
    <h5>404 Home Page</h5>
    <?php
endif;
?>