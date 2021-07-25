<?php 
 
 get_template_part("headers/header-home");
 get_template_part("other/loading");
?>
<section id="home-content">
    <!-- <div class="container"> -->
    <?php  get_template_part("other/button-home"); ?>
        <?php
            $card =  get_field("card");
        
        ?>
        <div class="card">
           
            <div class="card-content">
                <span class="title-detail"><?php echo $card["title_detail"] ?></span>
                <h1 class="title-1"><?php echo $card['title_1'] ?></h1>
                <div class="border-line"></div>
                <h3  class="title-2"><?php echo $card['title_2'] ?></h3>
                <p>
                    <?php echo $card["detail"] ?>
                </p>
            </div>
            <div class="card-image">
                    <img src="<?php echo $card['image']["url"] ?>" />
            </div>
        </div>
    <!-- </div> -->
    <div class="mt-10rem"></div>
    <?php  get_template_part("other/products-2"); ?>
    <div class="mt-10rem"></div>

    <?php  get_template_part("other/inspire-suggestion"); ?>
    <div class="mt-5rem"></div>

    <?php  get_template_part("other/solution-home-page"); ?>
    <div class="mt-10rem"></div>

    <?php  get_template_part("other/shade-home"); ?>
    <div class="mt-10rem"></div>

    <?php  get_template_part("other/footer_banner"); ?>
 

</section>

<?php get_footer(); ?>