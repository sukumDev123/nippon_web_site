<?php

get_template_part("other/loading");
get_header();
$featured_img_url = get_the_post_thumbnail_url( get_the_ID(),'full'); 
$getFavs = getFavoritesData("problem-and-solution" );
$data_favorites =  $getFavs["datas"];
$icon1 = "save_favorites_black";
$icon2 = 'saved_favorites hide';
$lang=get_bloginfo("language");  
$words = [
      "th" => [
            "title" => "เคล็ดลับและการแก้ไขปัญหาสี",
            "title_2" => "เคล็ดลับการทำงานสี"

      ],
      "en" => [
            "title" => "",
            "title_2" => ""
      ]
][$lang];
if(isset($data_favorites[get_the_ID()])):
      $icon1 = "save_favorites_black hide";
      $icon2 = "saved_favorites";
endif;
$userId = "";
if(get_current_user_id()):
      $userId = get_current_user_id();
      endif;
?>

<div class="container single-page"  >
      <div class="ui large breadcrumb">
      <a class="section"><?php echo $words['title'] ?></a>
      <i class="right chevron icon divider"></i>
      <a href="<?php echo get_site_url() ?>/tips-and-solutions/how-to-paint/" class="section"><?php echo $words['title_2'] ?></a>
      <i class="right chevron icon divider"></i>
      <div class="active section"><?php  echo get_the_title() ?></div>
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


      <?php the_content() ?>
 
      <?php
             do_action("share-button" , [
                  "title" => get_the_title(),
                  "link" => get_permalink(),
                  "sub_title" => "Share",
             ]);
      ?>
      <?php 
            do_action("relation_post" , [
                  "post_type" => 'how_to_paint',
                  "category__in" => wp_get_post_categories(get_the_ID()),
                  "post__not_in" => array(get_the_ID()),
                  "data_favorites" => $data_favorites
            ]);
      ?>
</div>
<?php get_footer() ?>