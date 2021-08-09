<?php


get_header();
$featured_img_url = get_the_post_thumbnail_url( get_the_ID(),'full'); 

?>

<div class="container single-page"  >
      <div class="ui large breadcrumb">
      <a class="section">เคล็ดลับและการแก้ไขปัญหาสี</a>
      <i class="right chevron icon divider"></i>
      <a href="<?php echo get_site_url() ?>/tips-and-solutions/problems-and-solutions/"  class="section">Problems and Solutions</a>
      <i class="right chevron icon divider"></i>
      <div class="active section">ปัญหาคราบเกลือบนฟิล์มสี (Efflorescence)</div>
      </div>
      <div class="header-title-and-save-favorites">
            <h1><?php echo get_the_title() ?></h1> 

            <div class="favorites-button">
                  <?php get_template_part("components/icon" , null , ["icon" => "save_favorites_black"]) ?>
                  <?php // get_template_part("components/icon" , null , ["icon" => "saved_favorites"]) ?>
            </div>
      </div>

      <img class='thumbnail-image' src="<?php echo $featured_img_url ?>" alt="<?php echo get_the_title() ?>">

      <?php the_content() ?>
 

</div>
<?php get_footer() ?>