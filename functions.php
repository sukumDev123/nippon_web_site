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
	"label" => "Info",
	 
	'show_in_rest' => true ,
 
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

        // register_taxonomy( 'project', array('project'), array(
        //     'hierarchical' => true, 
        //     'label' => 'Projects', 
        //     'singular_label' => 'Project', 
        //     'rewrite' => array( 'slug' => 'project', 'with_front'=> false )
        //     )
        // );
   
        // register_taxonomy( 'product', array('project'), array(
        //     'hierarchical' => true, 
        //     'label' => 'Products', 
        //     'singular_label' => 'Product', 
        //     'rewrite' => array( 'slug' => 'product', 'with_front'=> false )
        //     )
        // );

        // register_taxonomy( 'grade', array('product'), array(
        //     'hierarchical' => true, 
        //     'label' => 'Grades', 
        //     'singular_label' => 'Grade', 
        //     'rewrite' => array( 'slug' => 'grade', 'with_front'=> false )
        //     )
        // );
        // register_taxonomy( 'function', array('product'), array(
        //     'hierarchical' => true, 
        //     'label' => 'Functions', 
        //     'singular_label' => 'Function', 
        //     'rewrite' => array( 'slug' => 'product', 'with_front'=> false )
        //     )
        // );
   
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

 
// function create_topics_nonhierarchical_taxonomy() {
 
// // Labels part for the GUI
 
//   $labels = array(
//     'name' => 'Tags'
//     'singular_name' => 'Tag'
//   ); 
 
// // Now register the non-hierarchical taxonomy like tag
 
//   register_taxonomy('tag', 'project',array(
//     'hierarchical' => false,
//     'labels' => $labels,
    
    
//     'rewrite' => array( 'slug' => 'tag' ),
//   ));
// }

// add_action( 'init', 'create_topics_nonhierarchical_taxonomy' );
function get_top_ancestor_id(){
    global $post;
    if($post->post_parent) {
        $ancestors = array_reverse(get_post_ancestors($post->ID));
        return $ancestors[0];
    }
    return $post->ID;
}