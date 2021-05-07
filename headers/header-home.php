<?php 

$parent_title = get_the_title($post->post_parent);
$title = get_the_content();
if($parent_title) {
    $title = $parent_title;
}

$photos = acf_photo_gallery("banners" , get_the_ID());

?>
<!doctype html>
 
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
    <title><?php echo $title; ?></title>
</head>
<body>

<header id="home_header"  > 
    <div class="bk-header"></div>
    <div class="container">
    <img alt="logo" src="<?php bloginfo("template_directory");  ?>/assets/images/logo.png"  class="image-logo" />

    <?php 
        wp_nav_menu(
            [
                "theme_location" => 'top-menu'
            ]
        )
    ?>
        <div class="login">
             <h5><i class="fas fa-search"></i></h5>
             <div class="th_en">
                 <h5>TH|</h5>
                 <h5>EN</h5>
             </div>   
             <div class="user-div">
               <h5>
               <i class="fas fa-user"></i>
               </h5>
             </div>    
        </div>
    </div>


 
</header>

 
<div id="home-banner">
    <div class="banner-home">
        <!-- img -->
        <div class="banner-home-bk-image">
        <div class="swiper-container home-banner-swiper">
            <div class="swiper-wrapper">
                <?php
                    if(count($photos) > 0):
                        foreach($photos as $photo):
                            $full_image_url= $photo['full_image_url']; 
                            ?>
                                <div class='swiper-slide'>
                                    <img src="<?php echo $full_image_url ?>" alt="">
                                </div>
                            <?php 
                        endforeach;
                    endif;
                ?>
            </div>
            <div class="swiper-pagination banner-pagination"></div>
            
        </div>
        </div>
        
        <div class="banner-home-bk">            
        </div>
        <div class="banner-home-content">
          <div>
            <h1><?php echo $title; ?></h1>
            <h2>The coatings expert</h2>
          </div>
        </div>
    </div>
    <!-- <h1></h1>

    <div id="banner-button-and-bk">
        <div class="button">
            <button>เจ้าของบ้าน</button>
            <button>มืออาชีพ</button>
        </div>
    </div> -->
</div>
 
