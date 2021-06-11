
<?php 
 
$lang=get_bloginfo("language");  
$text_static = [
    "en" => [
        "location" => "Location",
        "contact" => "Contact",
        "signin" => "Sign in"
      
    ],
    "th" => [
        "location" => "ค้นหาร้านค้า",
        "contact" => "ติดต่อเรา",
        "signin" => "เข้าสู่ระบบ"

    ]
][$lang];



?>
<header id="header_mobiles">
        <div class="header-icon">
            <div >
                <div class="d-flex align-items-center justify-content-between">
                <img  alt="logo" src="<?php bloginfo("template_directory");  ?>/assets/images/logo.png"  class="image-logo" />
                <i id="header_mobile_close" class="fas fa-times"></i>
            </div>
            </div>
        </div>
        <div class="search-header-mobile">
        <form   method="get" class="search-filter-menu">
            <i class="fas fa-search"></i>
            <input type="text" name="search"   placeholder="Search..." />
        </form>
 
        </div>
        <?php 
                
                wp_nav_menu([
                    "theme_location" => "menu-top-mobile"
                ])

            ?>

        <a href="<?php echo get_site_url().'/ค้นหาร้านค้า/'  ?>" class="btn   d-flex align-items-center justify-content-center" >
            
            <i class="fas me-2 fa-map-marker-alt"></i>
            <?php echo $text_static['location'] ?>
          
        </a>
        <a class="btn" href="<?php echo get_site_url().'/contact-us/' ?>">
    
        <?php echo $text_static['contact'] ?>
        </a>

        <div  class="login_menu ">
            <div class="container d-flex align-items-center justify-content-between">
                <!-- <h5>
                    <i class="fas fa-user"></i>
                    <?php echo $text_static['signin'] ?>
                </h5>   -->
                    <div></div>
               
            </div>
                
        </div>
</header>