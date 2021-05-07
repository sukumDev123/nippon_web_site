<!doctype html>
 
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
    <title><?php the_title(); ?></title>
</head>
<body>

<header id="page"> 
 
    <!-- <div class="bk-header"></div> -->
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