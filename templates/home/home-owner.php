<?php 

//  wp_logout();
 get_template_part("headers/header-home");
 get_template_part("other/loading");
?>
<section id="home-content">
    <!-- <div class="container"> -->
    <?php  get_template_part("other/button-home"); ?>
        <?php
            $card =  get_field("card");
            if($card):
        ?>
        <div class="card">
            
            <div class="card-content">
               <div class="content">
               <span class="title-detail"><?php echo $card["title_detail"] ?></span>
                <h1 class="title-1"><?php echo $card['title_1'] ?></h1>
                <div class="border-line"></div>
                <h3  class="title-2"><?php echo $card['title_2'] ?></h3>
                <p>
                    <?php echo $card["detail"] ?>
                </p>
               </div>
            </div>
            <div class="card-image">
                <!-- <div class="card-image-bk"></div> -->
                    <img src="<?php echo $card['image']["url"] ?>" />
            </div>
           
        </div>
        <?php
            endif;
        ?>
    <!-- </div> -->

    <div class="mt-10rem"></div>
    <?php   get_template_part("other/idea-suggestion"); ?>
    <div class="mt-10rem"></div>
    <?php   get_template_part("other/products-2"); ?>
 <div class="mt-10rem"></div>
    <?php   get_template_part("other/shade-home"); ?>
 <div class="mt-10rem"></div>


 <?php   get_template_part("other/inspire-suggestion"); ?>
 <div class="mt-10rem"></div>

   
 <?php  get_template_part("other/group_find_location_footer_banner"); ?>

      
  
</section>

<?php get_footer(); ?>