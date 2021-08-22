<?php 
do_action("save_current_url");
do_action("check_user_add_info");

$parent_title = get_the_title($post->post_parent);
$title = get_the_content();
if($parent_title) {
    $title = $parent_title;
}
$lang=get_bloginfo("language");  

$photos = acf_photo_gallery("banners" , get_the_ID());
$title_static = [
    "en" => [
        "title" =>  " - Nippon Paint The Coatings Expert",
        "link" => get_site_url() . "/edit-account"

    ],
    "th" => [
        "title" => " - นิปปอนเพนต์ ผู้ชี่ยวชาญทุกงานสี" ,
        "link" => get_site_url() . "/edit-account"
    ],
    
][$lang];

$search  =  get_site_url() . "/search/";

// if(!is_user_logged_in()):
//     setcookie("latest_page" , get_permalink());
// endif;
?>
<!doctype html>
 
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <title><?php echo get_the_title() . $title_static['title']; ?></title>
    <link 
        rel="icon" 
        href="<?php bloginfo("template_directory");  ?>/assets/images/favicon.svg" 
        type="image/svg+xml"
    />

</head>
<body>
<?php  get_template_part("headers/message_contact"); ?>

<header id="home_header"  > 
    <div class="bk-header"></div>
    


    <div class="container">
            <a href="<?php echo get_site_url() ?>">
                    <img alt="logo" src="<?php bloginfo("template_directory");  ?>/assets/images/logo.svg"  class="image-logo-desktop" />
            </a>
           <div class="header-top-slide">
               <div class="header-top-right">
                        <div id="login-top" class="login">
                        <a class="contact-button" href="/contact-us/">ติดต่อเรา <?php 
                        
 
                        
                        ?></a>


                            <h5>
                                <a href="<?php echo $search ?>">
                                    <i class="fas fa-search"></i>
                                </a>    
                            </h5>
                            <!-- <div class="th_en"> -->
                                <!-- <h5>TH|</h5>
                                <h5>EN</h5> -->
                            <?php 
                            // wp_nav_menu(
                            //     [
                            //         "theme_location" => 'language'
                            //     ]
                            // )
                            
                            ?>
                                <!-- </div>    -->
                                <div class="user-div">
                               <a href="<?php echo $title_static["link"] ?>">
                               <h5><i class="bi bi-person-fill"></i> บัญชีของฉัน</h5>
                               </a>
                            </div>     
                        </div>
               </div>
                <div class="header-top">
                        <?php 
                            wp_nav_menu(
                                [
                                    "theme_location" => 'top-menu'
                                ]
                            )
                        
                        ?>
                        
                        <div id="login-right" class="login">
                        <a class="contact-button" href="/contact-us/">ติดต่อเรา</a>

                            <h5>
                                <a href="/search/">
                                    <i class="fas fa-search"></i>
                                </a>    
                            </h5>
                            <!-- <div class="th_en"> -->
                                <!-- <h5>TH|</h5>
                                <h5>EN</h5> -->
                            <?php 
                            // wp_nav_menu(
                            //     [
                            //         "theme_location" => 'language'
                            //     ]
                            // )
                            
                            ?>
                                <!-- </div>    -->
                            <div class="user-div">
                                <h5><i class="fas fa-user"></i></h5>
                            </div>    
                        </div>
                </div>
                
           </div>
            
    </div>

    <div class="show-menus-mobile">
        <i class="fas fa-bars"></i>
    </div>
 
</header>


<?php 
 get_template_part("headers/header-mobile");

?>
 