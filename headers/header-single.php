<!doctype html>
 
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
    <title><?php the_title(); ?></title>
</head>
<body>

<header id="page"> 
 
    <div class="bk-header"></div>
    <div class="container">
    <a href="<?php echo get_site_url() ?>">
        <img alt="logo" src="<?php bloginfo("template_directory");  ?>/assets/images/logo.png"  class="image-logo-desktop" />
   </a>
    <?php 
        wp_nav_menu(
            [ 
                "theme_location" => 'top-menu'
            ]
        )
    ?>
        <div class="login">
        <a class="contact-button" href="/contact-us/">ติดต่อ</a>
        
        <h5>
                <a href="/menu-products/">
                    <i class="fas fa-search"></i>
                </a>    
            </h5>
             <!-- <div class="th_en"> -->
             <?php 
            //   wp_nav_menu(
            //     [
            //         "theme_location" => 'language'
            //     ]
            // )
             
             ?>
             <!-- </div>    -->
             <!-- <div class="user-div">
               <h5>
               <i class="fas fa-user"></i>
               </h5>
             </div>     -->
        </div>
    </div>
    <div class="show-menus-mobile">
        <i class="fas fa-bars"></i>
    </div>
 
</header>


<?php 
 get_template_part("headers/header-mobile");

?>