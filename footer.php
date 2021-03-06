<?php wp_footer(); ?>
<?php
       $tb =  get_bloginfo("template_directory");
       $fb = $tb . "/assets/images/fb.svg";
       $line = $tb . "/assets/images/line.svg";
       $yb = $tb . "/assets/images/yb.svg";
       $ig = $tb . "/assets/images/ig.svg";
       $tw = $tb . "/assets/images/tw.svg";
       $in = $tb . "/assets/images/in.svg";


?>
<footer>
    <div  >
 
        <div >
            <?php 
            
            
            $argc_footer = [
                "post_type"  => "info" , 
                'posts_per_page' => 1 ,  
                "meta_query" => [
                    [
                    "key" => "slug",
                    "value"  => "footer",
                    "compare" => "LIKE"
                    ]
                ] 
               
            ];
            $query_footer = new WP_Query($argc_footer);
            if($query_footer->have_posts()): while($query_footer->have_posts()) : $query_footer->the_post(); 
            ?>
            <div>
                <h1><?php echo get_field("title") ?></h1>
                <h5><?php echo get_field("description") ?></h5>
            </div> 

            <?php    endwhile;  endif;  wp_reset_query(); ?>
            <form method="get" class="footer-input">
                <input type="text" name="email"  placeholder="Email" />
                <i class="fas fa-long-arrow-alt-right"></i>
            </form>
        </div>

        
    </div>
    <div class="footer-content">
        <div>
            <?php echo loadAddress() ?>
         
            <div class="phone">
                <h1>PHONE </h1>
                <h5><a href="tel:024625299">TEL 0 246 25299  </a></h5>
                <h5><a href="tel:024632863">FAX 0 2463 2863 </a></h5>
            </div>
        </div>
        <div  class="footer-menu-desktop">
            <?php 
            
            wp_nav_menu(
                [
                    "theme_location" => 'menu-footer'
                ]
            )
            
            ?>
        </div>
        <div>
           
        <h1 class="footer-title">Careline Service</h1>

            <h1 class="font-service">
                <a href="tel:024631899">02 463 1899</a>
            </h1>
            <!-- <h1 class='mt-4 footer-title'>
            ??????????????????????????????????????????????????????
            </h1>
            <div class="social-div">
                <img src="<?php echo $fb; ?>" alt="">
                <img src="<?php echo $line; ?>" alt="">
                <img src="<?php echo $yb; ?>" alt="">
                <img src="<?php echo $ig ; ?>" alt="">
                <img src="<?php echo $tw; ?>" alt="">
                <img src="<?php echo $in; ?>" alt="">
 
            </div> -->
        </div>
        <!-- <div></div>
        <div></div>
        <div></div> -->

        <div class="footer-menu-mobile">
            <?php 
            
            wp_nav_menu(
                [
                    "theme_location" => 'menu-footer'
                ]
            )
            
            ?>
        </div>
    </div>
    <div class="border-bottom"></div>
        <h5 class="text-center ps-2 pe-2">2021 - ?? Nippon Paint Decorative Coatings (Thailand) Co.,Ltd. All rights reserved.</h5>
</footer>
</body>
</html>
