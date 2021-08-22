<?php 


 /** Template Name:  WhiteSpace */

 get_header();
?>

<div class="container whitespace">
    <?php get_template_part("templates/whitespace/" . get_field("page_name")) ?>
</div>

<?php get_footer() ?>