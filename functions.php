<?php 
add_post_type_support( 'page', 'excerpt' );

function load_stylesheets() {
    
    wp_register_style("stylesheet" , get_template_directory_uri() . '/style.css' , '' , 1 , 'all');
    wp_enqueue_style("stylesheet");
    wp_register_style("swiper" ,'https://unpkg.com/swiper@5.3.8/css/swiper.min.css' , '' , 1 , 'all');
    wp_enqueue_style("swiper");
    wp_register_style("custom" , get_template_directory_uri() . '/assets/css/main.css' , '' , 1 , 'all');
    wp_enqueue_style("custom");
    wp_register_style("bootstrap" , 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css' , '' , 1 , 'all');
    wp_enqueue_style("bootstrap");
}

add_action('wp_enqueue_scripts' , "load_stylesheets");

function load_js() {
    wp_register_script("custom" ,  get_template_directory_uri() . '/app.js' , 'jquery' , 1 , true);
    wp_enqueue_script("custom");
    wp_register_script("swiper" , 'https://unpkg.com/swiper@5.3.8/js/swiper.min.js' , 'jquery' , 1 , true);
    wp_enqueue_script("swiper");
    wp_register_script("bootstrap" , 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js' , 'jquery' , 1 , true);
    wp_enqueue_script("bootstrap");
}
add_action('wp_enqueue_scripts' , "load_js");

add_theme_support("menus");


register_nav_menus(
    ["top-menu" => "Top Menu" , "menu-footer" => "Menu Footer"]
);


add_action("init" , function() {
	register_post_type("Info" , [
	'public' => true ,
	"labels" => ['name' => "Infos"   , "singular_name" => "Info"],
	 
 
    'hierarchical' => true
 
	]);
});
function intiNews() {
 
        register_post_type("news" , [
        'public' => true ,
        'labels' => array('name' => 'News' , 'singular_name' => 'New'),
        'hierarchical' => true ,
        'has_archive' => true,
        // 'show_in_rest' => true ,
        'taxonomies'          => array( 'category'  ),
        ]);
   
}
add_action("init" , "intiNews");

function shadeAndFamilyColor() {
    register_post_type("shade" , [
        'public' => true ,
        'labels' => array('name' => 'Shades' , 'singular_name' => 'Shade'),
        'hierarchical' => true ,
        'has_archive' => true,
        // 'show_in_rest' => true ,
        // 'taxonomies'          => array( 'category' , 'post_tag'  ),
        ]);
    register_post_type("family_color" , [
        'public' => true ,
        'labels' => array('name' => 'FamilyColors' , 'singular_name' => 'FamilyColor'),
        'hierarchical' => true ,
        'has_archive' => true,
        // 'show_in_rest' => true ,
        // 'taxonomies'          => array( 'category' , 'post_tag'  ),
        ]);

        register_taxonomy( 'shade_cate', array('shade'), array(
            'hierarchical' => true, 
            'label' => 'ShadeCategories', 
            'singular_label' => 'ShadeCategory', 
            'rewrite' => array( 'slug' => 'shade_cate', 'with_front'=> false )
            )
        );
        register_taxonomy( 'family_cate', array('family_color'), array(
            'hierarchical' => true, 
            'label' => 'FamilyCategories', 
            'singular_label' => 'FamilyCategory', 
            'rewrite' => array( 'slug' => 'family_cate', 'with_front'=> false )
            )
        );
}

add_action("init" , "shadeAndFamilyColor");
 
 
function initProject() {
 
        register_post_type("project" , [
        'public' => true ,
        'labels' => array('name' => 'Projects' , 'singular_name' => 'Project'),
        'hierarchical' => true ,
        'has_archive'  => true,
        // 'show_in_rest' => true ,
        'taxonomies'   => array( 'category' , 'tags' ),
     
        ]);
 
   
}
add_action("init" , "initProject");
 
 
function initSolutions() {
 
        register_post_type("solutions" , [
        'public' => true ,
        'labels' => array('name' => 'Solutions' , 'singular_name' => 'Solution'),
        'hierarchical' => true ,
        'has_archive' => true,
        // 'show_in_rest' => true ,
        'taxonomies'          => array( 'category' ),
        'supports' => ["thumbnail" , "title"]
        ]);
   
}
add_action("init" , "initSolutions");
 
function initHeaders() {
 
        register_post_type("header" , [
        'public' => true ,
        'labels' => array('name' => 'Headers' , 'singular_name' => 'Header'),
        'hierarchical' => true ,
        'has_archive' => true,
        // 'show_in_rest' => true ,
        'taxonomies'          => array( 'category' ),
        'supports' => ["thumbnail" , "title"]
        ]);
   
}
add_action("init" , "initSolutions");
 
 
function wpse319485_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'wpse319485_add_woocommerce_support' );

function reg_tag() {
    register_taxonomy_for_object_type('post_tag', 'project');
    register_taxonomy_for_object_type('post_tag', 'news');
}
add_action('init', 'reg_tag');

 
 
function get_top_ancestor_id(){
    global $post;
    if($post->post_parent) {
        $ancestors = array_reverse(get_post_ancestors($post->ID));
        return $ancestors[0];
    }
    return $post->ID;
}

 


function loadAddress() {
    $html = "";
    $argc = ["post_type"  => "info" , 'posts_per_page' => 1 ,  "meta_query" => [[
        "key" => "slug",
        "value"  => 'address',
        'compare' => "LIKE"
    ]] ];
    $query = new WP_Query($argc);
    if($query->have_posts()): while($query->have_posts()) : $query->the_post(); 
    $html = '
    <div class="address">
        <h1>'.get_the_title().' </h1>
        <p>
            '.get_field("description" , get_the_ID()).'
        </p>
    </div>
    ';
    endwhile;  endif;  wp_reset_query();

    return  $html;
}


add_action("action_address" , "loadAddress");

function loadService() {
  
            
            $html = "";
            $argc = ["post_type"  => "info" , 'posts_per_page' => 1 ,  "meta_query" => [[
                "key" => "slug",
                "value"  => 'careline-service',
                'compare' => "LIKE"
            ]] ];
            $query = new WP_Query($argc);
            if($query->have_posts()): while($query->have_posts()) : $query->the_post(); 
            $html = '
            
                <h1 class="footer-title">'.get_the_title().' </h1>
                <h1 class="font-service">
                    '.get_field("description" , get_the_ID()).'
                </h1>
            
            ';
            endwhile;  endif;  wp_reset_query();
            
            return $html;
}


add_action("action_address" , "loadService");