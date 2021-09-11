
<?php 
 
$lang=get_bloginfo("language");  
$text_static = [
    "en" => [
        "location" => "Location",
        "contact" => "Contact",
        "signin" => "Sign in",
        "link" => get_site_url() . "/edit-account"

      
    ],
    "th" => [
        "location" => "ค้นหาร้านค้า",
        "contact" => "ติดต่อเรา",
        "signin" => "เข้าสู่ระบบ",
        "link" => get_site_url() . "/edit-account"


    ]
][$lang];



?>
<header id="header_mobiles">
        <div class="header-icon">
            <div >
                <div class="d-flex align-items-center justify-content-between">
                <!-- <img  alt="logo" src="<?php bloginfo("template_directory");  ?>/assets/images/logo.png"  class="image-logo" />
             -->
             <a href="<?php echo get_site_url() ?>">
                    <img alt="logo" src="<?php bloginfo("template_directory");  ?>/assets/images/logo.svg"  class="image-logo-mobile" />
            </a>
                <i id="header_mobile_close" class="fas fa-times"></i>
            </div>
            </div>
        </div>
        <?php do_action("header-user-nav-mobile"  , [
                                   "link" => $text_static['link']
                               ]) ?>
        <?php 
                
                wp_nav_menu([
                    "theme_location" => "menu-top-mobile"
                ])

            ?>

        <a href="<?php echo get_site_url().'/search-shop/'  ?>" class="btn   d-flex align-items-center justify-content-center" >
            
            <i class="fas me-2 fa-map-marker-alt"></i>
            <?php echo $text_static['location'] ?>
          
        </a>
        <a class="btn" href="<?php echo get_site_url().'/contact-us/' ?>">
    
        <?php echo $text_static['contact'] ?>
        </a>

        <div  class="login_menu ">
            <div class="container d-flex align-items-center justify-content-between">
                
            </div>
        </div>
        <div class="search-header-mobile">
        <form   method="get" action="search" class="search-filter-menu">
            <i class="fas fa-search"></i>
            <input type="text" name="search"   placeholder="Search..." />
        </form>
 
        </div>
</header>