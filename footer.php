<?php wp_footer(); ?>
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
                <h5><a>TEL 0 246 25299  </a></h5>
                <h5><a>FAX 0 2463 2863 </a></h5>
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
            <?php echo loadService() ?>
            <h1 class='mt-4 footer-title'>
            ติดตามเราได้ที่นี่
            </h1>
            <div class="social-div">
            <i class="fab fa-facebook"></i>
            <i class="fab fa-twitter-square"></i>
            <i class="fab fa-instagram-square"></i>
            <i class="fab fa-youtube"></i>
            <i class="fab fa-line"></i>
            <i class="fab fa-linkedin"></i>
            </div>
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
        <h5 class="text-center">2021 - © Nippon Paint Decorative Coatings (Thailand) Co.,Ltd. All rights reserved.</h5>
</footer>
</body>
</html>
