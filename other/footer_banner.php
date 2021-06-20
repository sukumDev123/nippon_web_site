<?php 

$lang=get_bloginfo("language");  

$text_static  = [
    "en" => [
        "title" =>  "ผลิตภัณฑ์แนะนำ",
    ],
    "th" => [
        "title" => "ผลิตภัณฑ์แนะนำ"
    ]
][$lang];

?>

<div id="footer_banner" >
    <h1 class="footer_banner_title"><?php echo $text_static["title"]; ?></h1>
            <div class="swiper-container footer_banner">
                <div class="swiper-wrapper">
                <?php
                    $footer_banners = acf_photo_gallery("footer_banner" , get_the_ID());
                    if($footer_banners):
                        foreach($footer_banners as $footer_banner):
                            $footerImage = $footer_banner['full_image_url'];
                            ?>
                            <div class="swiper-slide">
                                <img src="<?php echo $footerImage ?>" alt="">
                            </div>
                            <?php
                        endforeach;
                    endif;
                ?>
                </div>
                <div class="swiper-pagination"></div>

            </div>
        
        </div>
