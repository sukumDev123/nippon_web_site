<?php wp_footer(); ?>
<?php
    $lang=get_bloginfo("language");  

    $tb =  get_bloginfo("template_directory");
    // $fb = $tb . "/assets/images/fb.svg";
    // $line = $tb . "/assets/images/line.svg";
    // $yb = $tb . "/assets/images/yb.svg";
    // $ig = $tb . "/assets/images/ig.svg";
    // $tw = $tb . "/assets/images/tw.svg";
    // $in = $tb . "/assets/images/in.svg";

    $fb = $tb . "/assets/images/FB.svg";
    $line = $tb . "/assets/images/Line.svg";
    $yb = $tb . "/assets/images/Youtube.svg";
    $ig = $tb . "/assets/images/IG.svg";
    $tw = $tb . "/assets/images/Twitter.svg";
    $in = $tb . "/assets/images/Linkin.svg";
    $pt = $tb . "/assets/images/print_t.svg";

    $linkFb = "https://www.facebook.com/NipponPaintDecor";
    $linkLine = "https://lin.ee/lVj5H8r";
    $linkYB = "https://www.youtube.com/NipponPaintDecorative";
    $linkIG = "https://www.instagram.com/nipponpaint_th";
    $linkTW = "https://twitter.com/NipponPaintTH";
    $linkIN = "https://www.linkedin.com/company/nipponpaintdecorative";
    $linkPT = "https://pinterest.com/nipponpaint_th";
   
    $text_static = [
        "en" => [
            "address_title" => "ที่อยู่",
            "phone" => "เบอร์โทรศัพท์",
            "address_detail" => "
                บริษัท นิปปอนเพนต์ เดคโคเรทีฟ โคทติ้ง <br />
                (ประเทศไทย) จำกัด<br />
                101 ม. 3 ซ.สุขสวัสดิ์ 76 ถนนสุขสวัสดิ์<br /> 
                บางจาก พระประแดง สมุทรปราการ 10130<br />
            "
        ],
        "th" =>  [
            "address_title" => "ที่อยู่",
            "phone" => "เบอร์โทรศัพท์",
            "address_detail" => "
                บริษัท นิปปอนเพนต์ เดคโคเรทีฟ โคทติ้ง <br />
                (ประเทศไทย) จำกัด<br />
                101 ม. 3 ซ.สุขสวัสดิ์ 76 ถนนสุขสวัสดิ์<br /> 
                บางจาก พระประแดง สมุทรปราการ 10130<br />
            "
        ]
    ][$lang];
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
                <!-- <i class="fas fa-long-arrow-alt-right"></i> -->
                <img src="<?php echo get_bloginfo("template_directory") ?>/assets/images/arrow-left-yellow.svg" alt="">

            </form>
        </div>

        
    </div>
  

    <div class="footer-content">
        <div>
           <img src="<?php echo  get_bloginfo("template_directory");  ?>/assets/images/logo_footer.png" alt="logo_footer.png" />
           <h1>นิปปอนเพนต์ ผู้เชี่ยวชาญทุกงานสี</h1>
           <h1 class="footer-title">Careline</h1>
           <h1 class="font-service">
               <a href="tel:024631899">02 463 1899</a>
           </h1>
           <h1 class=' footer-title'>
           ติดตามเราได้ที่นี่
           </h1>
           <div class="social-div">
               <a target="_blank"  href="<?php echo $linkFb; ?>"><img src="<?php echo $fb; ?>" alt=""></a>
               <a target="_blank"  href="<?php echo  $linkLine; ?>"><img src="<?php echo $line; ?>" alt=""></a>
               <a target="_blank"  href="<?php echo  $linkYB ; ?>"><img src="<?php echo $yb; ?>" alt=""></a>
               <a target="_blank"  href="<?php echo $linkIG; ?>"><img src="<?php echo $ig ;?>" alt=""></a>
               <a target="_blank"  href="<?php echo $linkTW ; ?>"><img src="<?php echo $tw; ?>" alt=""></a>
               <a target="_blank"  href="<?php echo $linkIN; ?>"><img src="<?php echo $in; ?>" alt=""></a>
               <a target="_blank"  href="<?php echo $linkPT; ?>"><img src="<?php echo $pt; ?>" alt=""></a>

                 

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
            <div class="address">
                <h1><?php echo $text_static["address_title"] ?></h1>
                <p>
                <?php echo $text_static["address_detail"] ?>
                </p>    
            </div>
         
            <div class="phone">
                <h1><?php echo  $text_static['phone'] ?> </h1>
                <h5><a href="tel:024625299">TEL 0 246 25299  </a></h5>
                <h5><a href="tel:024632863">FAX 0 2463 2863 </a></h5>
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
    <div class="border-bottom-footer"></div>
        <h5 class="copywrite text-center ps-2 pe-2">2021 - © Nippon Paint Decorative Coatings (Thailand) Co.,Ltd. All rights reserved.</h5>



        <div class="arrow-up-to-top">
        <img src="<?php echo  get_bloginfo("template_directory");  ?>/assets/images/arrow-g.svg" alt="arrow-g.svg" />

    </div>
</footer>
</body>
</html>
