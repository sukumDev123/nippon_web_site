<?php 
add_post_type_support( 'page', 'excerpt' );
define ('SITE_ROOT', realpath(dirname(__FILE__)));
require_once( ABSPATH . 'wp-admin/includes/file.php' );
function load_stylesheets() {
     
  
    wp_register_style("stylesheet" , get_template_directory_uri() . '/style.css');
    wp_enqueue_style("stylesheet");
    wp_register_style("swiper" , get_template_directory_uri() . '/assets/swiper.min.css');
    wp_enqueue_style("swiper");
    wp_register_style("custom" , get_template_directory_uri() . '/assets/css/main.css');
    wp_enqueue_style("custom");
    wp_register_style("bootstrap" , get_template_directory_uri() . '/assets/bootstrap.bundle.min.css');
    wp_enqueue_style("bootstrap");
 
    wp_register_style("bootstrap-icon" , "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css");
    wp_enqueue_style("bootstrap-icon");
 
    // // <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    wp_register_style("semantic" , get_template_directory_uri() . '/assets/semantic/semantic.min.css'  );
    wp_enqueue_style("semantic");

 


   
}

add_action('wp_enqueue_scripts' , "load_stylesheets");

function load_js() {
    wp_register_script("custom" ,  get_template_directory_uri() . '/app.js' , 'jquery' , 1 , true);
    wp_enqueue_script("custom");
    wp_register_script("domain" ,  get_template_directory_uri() . '/domain.js' , 'jquery' , 1 , true);
    wp_enqueue_script("domain");
 
    wp_register_script("signin" ,  get_template_directory_uri() . '/src/signin.js' , 'jquery' , 1 , true);
    wp_enqueue_script("signin");
 
    wp_register_script("swiper" , get_template_directory_uri() . '/assets/swiper.min.js' , 'swiper' , 1 , true);
    wp_enqueue_script("swiper");
    wp_register_script("bootstrap" ,  get_template_directory_uri() . '/assets/bootstrap.bundle.min.js' , 'bootstrap' , 1 , true);
    wp_enqueue_script("bootstrap");
    // wp_register_script("semantic" , get_template_directory_uri() . '/assets/semantic/semantic.min.js' , '' , 1 , 'all');
    // wp_enqueue_script("semantic");
 
    wp_register_script("fontawesome" , get_template_directory_uri() . '/assets/fontawesome/js/all.min.js' , '' , 1 , 'all');
    wp_enqueue_script("fontawesome");
    wp_register_script("form" ,  get_template_directory_uri() . '/src/form.js' , '' , 1 , true);
    wp_enqueue_script("form");
    wp_register_script("recaptcha" , 'https://www.google.com/recaptcha/api.js' , '' , 1 , true);
    wp_enqueue_script("recaptcha");
  
    wp_register_script("compare_js" ,  get_template_directory_uri() . '/src/compare_product.js' , '' , 1 , true);
    wp_enqueue_script("compare_js");
  
    wp_register_script("media_js" ,  get_template_directory_uri() . '/src/media.js' , '' , 1 , true);
    wp_enqueue_script("media_js");
    wp_register_script("get_idea_js" ,  get_template_directory_uri() . '/src/get_idea.js' , '' , 1 , true);
    wp_enqueue_script("get_idea_js");
    wp_register_script("register" ,  get_template_directory_uri() . '/src/register.js' , '' , 1 , true);
    wp_enqueue_script("register");
  
}
add_action('wp_enqueue_scripts' , "load_js");

add_theme_support("menus");


register_nav_menus(
    ["top-menu" => "Top Menu" , "menu-footer" => "Menu Footer" , 'language'  => "Language" ,  "menu-top-mobile" => "Top Menu Mobile"]
);


add_action("init" , function() {
	register_post_type("Info" , [
	'public' => true ,
	"labels" => ['name' => "Infos"   , "singular_name" => "Info"],
	 
 
    'hierarchical' => true
 
	]);
});
add_action("init" , function() {
	register_post_type("product_banner" , [
	'public' => true ,
	"labels" => ['name' => "Product banners"   , "singular_name" => "Product banner"],
	 
 
    'hierarchical' => true
 
	]);
});

add_action("init" , function() {
	register_post_type("career_submit" , [
	'public' => true ,
	"labels" => ['name' => "CareersSubmit"   , "singular_name" => "CareerSubmit"],
    'hierarchical' => true
 
	]);
	register_post_type("careers_list" , [
	'public' => true ,
	"labels" => ['name' => "Careers List"   , "singular_name" => "Career List"],
   'hierarchical' => true,
    'has_archive'  => true,
    'supports'		=> array('title', 'editor', 'thumbnail' ),
    'show_in_rest' => true ,
    'rewrite' => array('slug' => 'career-show',),
	]);
});

add_action("init" , function() {
	register_post_type("FAQs" , [
        'public' => true ,
        "labels" => ['name' => "FAQs"   , "singular_name" => "FAQ"],
        'hierarchical' => true,
        "show_in_rest" => true
 
	]);

    register_taxonomy( 'FAQsCate', array('faqs'), array(
        'label'                 => 'FAQ Categories', 
        'singular_label'        => 'FAQ Category', 
        'rewrite'               => array( 'slug' => 'faqs_cate' ),
        'hierarchical'          => true,
        'show_ui'               => true,
		'show_admin_column'     => true,
        "show_in_rest" => true

        )
    );



});
 

add_action("init" , function() {
	register_post_type("problem_and_solution" , [
        'public' => true ,
        "labels" => ['name' => "ProblemAndSolutions"   , "singular_name" => "ProblemAndSolution"],
        // 'hierarchical' => true,
        "rewrite" => array("slug" => "problems-and-solution") ,
        'has_archive'  => true,
        'supports'		=> array('title', 'editor', 'thumbnail' ),
        'show_in_rest' => true ,
        'taxonomies'   => array(   'problem_and_solution_cate'  ),

 
	]);

    register_taxonomy( 'problem_and_solution_cate', 'problem_and_solution', array(
        'hierarchical' => true, 
        'label' => 'ProgramAndSolutionCategories', 
        "show_in_rest"=> true,
        'singular_label' => 'ProgramAndSolutionCategory', 
        'rewrite' => array( 'slug' => 'problem_and_solution_cate', 'with_front'=> true , 'hierarchical' => true  )
        )
    );
    //register_taxonomy_for_object_type("problem_and_solution_cate" , "problem_and_solution");
});
add_action("init" , function() {
	register_post_type("how_to_paint" , [
        'public' => true ,
        "labels" => ['name' => "HowToPaint"   , "singular_name" => "HowToPaint"],
        'hierarchical' => true,
        'show_in_rest' => true ,
        "rewrite" => array("slug" => "how-to-paint") ,
        'supports'		=> array('title', 'editor', 'thumbnail'),
 
	]);

    register_taxonomy( 'how_to_paint_cate', array('how_to_paint'), array(
        'hierarchical' => true, 
        'label' => 'HowToPaintCategories', 
        'singular_label' => 'HowToPaintCategory', 
        'rewrite' => array( 'slug' => 'how_to_paint_cate', 'with_front'=> false ),
        'show_in_rest' => true ,
        )
    );
});
add_action("init" , function() {
	register_post_type("faqs_form" , [
        'public' => true ,
        "labels" => ['name' => "FAQs Form"   , "singular_name" => "FAQs Form"],
        'hierarchical' => true
	]);
});
add_action("init" , function() {
	register_post_type("favorites_user" , [
        'public' => true ,
        "labels" => ['name' => "Favorites User"   , "singular_name" => "Favorite User"],
        'hierarchical' => true
	]);
});
add_action("init" , function() {
	register_post_type("user_custom_field" , [
        'public' => true ,
        "labels" => ['name' => "Users Custom Field"   , "singular_name" => "User Custom Field"],
        'hierarchical' => true
	]);
});

function intiNews() {
 
        register_post_type("news" , [
        'public' => true ,
        'labels' => array('name' => 'News' , 'singular_name' => 'New'),
        'hierarchical' => true ,
        'has_archive' => true,
        'show_in_rest' => true ,
        'taxonomies'          => array( 'category'  ),
        'supports'		=> array('title', 'editor', 'thumbnail'),

        ]);
   
}
add_action("init" , "intiNews");
function initTypeUser() {
 
        register_post_type("type_user" , [
        'public' => true ,
        'labels' => array('name' => 'User Types' , 'singular_name' => 'User TYpe'),
        'hierarchical' => true,
        'has_archive' => true,
        'show_in_rest' => true ,
 
        
        ]);
   
}
add_action("init" , "initTypeUser");
 

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
 

function get_idea_func() {
    register_post_type("get_idea" , [
        'public' => true ,
        'labels' => array('name' => 'Get Ideas' , 'singular_name' => 'Get Idea'),
        'hierarchical' => true ,
        'has_archive' => true,
        'show_in_rest' => true ,
        'supports'		=> array('title', 'editor', 'thumbnail' ),

        // 'taxonomies'          => array( 'category' , 'post_tag'  ),
        ]);


        register_taxonomy( 'get_idea_cate', array('get_idea'), array(
            'hierarchical' => true, 
            'label' => 'Get Idea Categories', 
            'singular_label' => 'Get Idea Category', 
            'show_in_rest' => true ,
            
            'hierarchical' => true,
	       
            'sort' => "order",
            "supports" => array('title', 'editor', 'thumbnail', 'author', 'excerpt', 'revisions', 'page-attributes'),
            'rewrite' => array( 'slug' => 'get_idea_cate', 'with_front'=> false )
            )
        );
        register_taxonomy( 'get_id_user_type', array('get_idea'), array(
            'hierarchical' => true, 
            'label' => 'Get Idea User Type', 
            'singular_label' => 'Get Idea User Type', 
            'show_in_rest' => true ,

            'rewrite' => array( 'slug' => 'get_id_user_type', 'with_front'=> false )
            )
        );
}
add_action("init" , "get_idea_func");
 
function initProject() {
 
      
     
        register_post_type("project" , [
            'public' => true ,
            'labels' => array('name' => 'Projects' , 'singular_name' => 'Project'),
            'hierarchical' => true ,
            'has_archive'  => true,
            'show_in_rest' => true ,
            'taxonomies'   => array(  'tags' , 'project_cate'   ),
            'supports'		=> array('title', 'editor', 'thumbnail'),
            // 'hierarchical' => false,
            "show_in_menu" => true,
            'show_in_nav_menus' => true,
            'supports' => array(
                'title',
                'editor',
          
                'thumbnail',
            ),
 
            ]);

            $labels = array(
                'name' => _x( 'Projects Cat', 'taxonomy general name' ),
                'singular_name' => _x( 'Project Cat', 'taxonomy singular name' ),
                'search_items' =>  __( 'Search Projects Cat' ),
                'all_items' => __( 'All Projects Cat' ),
                'parent_item' => __( 'Parent Project Cat' ),
                'parent_item_colon' => __( 'Parent Project Cat:' ),
                'edit_item' => __( 'Edit Project Cat' ), 
                'update_item' => __( 'Update Project Cat' ),
                'add_new_item' => __( 'Add New Project Cat' ),
                'new_item_name' => __( 'New Project Cat Name' ),
                'menu_name' => __( 'Projects Cat' ),
              ); 	
 

    
        register_taxonomy( 'project_cate', array('project'), array(
            'hierarchical' => true, 

            "labels" =>  $labels ,
            'singular_label' => 'ProjectCategory', 
            'rewrite' => array( 'slug' => 'project_cate', 'with_front'=> false ),
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'show_in_rest' => true ,

            )
        );
   
}
add_action("init" , "initProject");
 
 
function initSolutions() {
 
        register_post_type("solutions" , [
        'public' => true ,
        'labels' => array('name' => 'Solutions' , 'singular_name' => 'Solution'),
        'hierarchical' => true ,
        'has_archive' => true,
        'show_in_rest' => true ,
        "rest_base" => "solutions",
        'taxonomies'          => array( 'category' ),
        'supports' => ["thumbnail" , "title"]
        ]);


       

   
}
add_action("init" , "initSolutions");

add_filter( 'rest_solutions_query', function( $args ) {
    $args['meta_query'] = array(
        array(
            'key'   => 'page_parent',
            'value' => esc_sql( $_GET['page_parent'] ),
            "compare" => "="
        )
    );

    return $args;
} );

 
function initLocations() {
 
    register_post_type("location" , [
    'public' => true ,
    'labels' => array('name' => 'Locations' , 'singular_name' => 'Location'),
    'hierarchical' => true ,
    'has_archive' => true,
    'show_in_rest' => true ,
    "rest_base" => "locations",
    'taxonomies'          => array( 'category' ),
    'supports' => ["thumbnail" , "title"]
    ]);

}
add_action("init" , "initLocations");
 
 
function initUserInfo() {
 
    register_post_type("user_info" , [
    'public' => true ,
    'labels' => array('name' => 'Users Info' , 'singular_name' => 'User Info'),
    'hierarchical' => true ,
    'has_archive' => true,
    
    "rest_base" => "user_info",
 
  
    ]);

}
add_action("init" , "initUserInfo");
 
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

 function post_like() {
 
     if(isset($_GET['id']) && isset($_GET['type'])) {
        $id = intval($_GET['id']);
        $type = $_GET['type'];
        if($type == "liked") {
            $like_count = get_post_meta( $id, 'likes', true);
            if($like_count):
                $like_count = $like_count + 1;
            else:
                $like_count = 1;
            endif;
            $processed_like = update_post_meta($id, 'likes', $like_count);
            return json_encode(['message' => "Success"]);
        }
 
          
     }

 }

 add_action("get_likes" , "post_like");


 function post_share() {
     if(isset($_GET['id']) && isset($_GET['type'])) {
         $id = intval($_GET['id']);
         $type = $_GET['type'];
         if($type == "shared"):
            $like_count = get_post_meta( $id, 'shares', true);
            if($like_count) :
                $like_count = $like_count + 1;
            else:
                $like_count = 1;
            endif;
            $processed_like = update_post_meta($id, 'shares', $like_count);

        endif;
     }

 }

 add_action("share_function" , "post_share");

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
                    <a tel:"'.get_field("description" , get_the_ID()).'">'.get_field("description" , get_the_ID()).'</a>
                </h1>
            
            ';
            endwhile;  endif;  wp_reset_query();
            
            return $html;
}


add_action("action_address" , "loadService");
 
@ini_set( "upload_max_size" , "300M" );
@ini_set( "post_max_size", "300M");
@ini_set( "max_execution_time", "300" );
 
function get_color_shade( $data ) {
    // You can access parameters via direct array access on the object:
    $_id = $data['id'];
    $arg = ["post_type" => "shade" , "p" => intval($_id) , "posts_per_page" => 1];
    $query = new WP_Query($arg );
    $data = [];
    if($query->have_posts()):
        while($query->have_posts()):
            $query->the_post();
            $data["title"] = get_the_title();
            $data['colors'] = [];
            // if(get_field("family_color")):
            //     $color = [
            //         "title" => 
            //     ];
            //     array_push($data['colors'] ,json_decode(json_encode($color)))
            // endif;
            $family_colors = get_field("family_color");
            if( $family_colors):
                foreach($family_colors as $family_color):
                    $familyId = $family_color->ID;
                    $name =  get_field("name" ,  $familyId );
                    $color =  get_field("color" , $familyId );
                    $family_json = json_encode(["name" =>  $name , "color" => $color  , "ID" =>  $familyId] );
                    
                    array_push($data['colors'] , json_decode($family_json));
                endforeach;
            endif;
        endwhile;
    endif;
    
    return json_decode(json_encode($data));
  }

 
add_action( 'rest_api_init', function () {
    register_rest_route( 'api/v1', '/shade/(?P<id>[\\d]+)', array(
      'methods' => 'GET',
      'callback' => 'get_color_shade',
      'args' => array(
        'id' => array(
          'validate_callback' => function($param, $request, $key) {
            return is_numeric( $param);
          }
        ),
      ),
      'permission_callback' => '__return_true'
    ) );
  } );
 function save_users($request) {
    $data = $request->get_body();
    $toArray = json_decode($data);
    $info = [
        "fullname" =>  $toArray->fullname,
        "type" =>  $toArray->type,
        "contact" =>  $toArray->contact,
        "career" =>  $toArray->career,

    ];
    $postArr = [
        'post_title' => $toArray->email,
        "meta_input" => $info,
        "post_type" => "user_info",
        "post_status" => "publish"
    ];
    wp_insert_post($postArr);

    return json_decode(json_encode(["message" => "success"]));

 }

function upload_file($request) {
    $data = $request->get_body();
    $toArray = json_decode($data);
    if( $_FILES["upfile"]["size"] > 1000000) {
        return json_decode(json_encode(["message" => "MORE"]));
    }
    if(isset($_FILES["upfile"]))
{

    
	$extension = pathinfo($_FILES["upfile"]['name'], PATHINFO_EXTENSION);

	$new_name = time() . '.' . $extension;

    $image=basename($_FILES['upfile']['name']);
    $image=str_replace(' ','_',$image);
    
    $tmppath=SITE_ROOT.'/assets/uploads/'.$image;
    $data = move_uploaded_file($_FILES['upfile']['tmp_name'],$tmppath);
    $id_file_post = null;
            if($data)
            {
                $postArr = [
                    'post_title' => $image,
                    "post_type" => "attachment",
                    "post_status" => "publish",
                    "post_name" => $image,
                    "guid" => "https://staging.tanpong.me/wp-content/themes/nippontheme/assets/uploads/".$image
                ];
                $dd = wp_insert_post($postArr);
                $id_file_post = $dd;
            //  echo $dd;
            }
            else
            {
             echo "fail";
            }

            return json_decode( json_encode(["id" => $id_file_post , "size" => $_FILES["upfile"]["size"] ]));
}
//     if(isset($_FILES['sample_image']))
// {

// 	$extension = pathinfo($_FILES['sample_image']['name'], PATHINFO_EXTENSION);

// 	$new_name = time() . '.' . $extension;

// 	move_uploaded_file($_FILES['sample_image']['tmp_name'], 'images/' . $new_name);

// 	$data = array(
// 		'image_source'		=>	'images/' . $new_name
// 	);

// 	echo json_encode($data);

// }

}

add_action( 'rest_api_init', function () {
    register_rest_route( 'api/v1', '/upload_file/', array(
      'methods' => 'post',
      'callback' => 'upload_file',
      'permission_callback' => '__return_true'
    ) );
  } );
  
  
function product_cate_func($request) {
    $data = $request->get_body();
    $toArray = json_decode($data);
    $product_cat = $toArray->product_cat;
   $terms = get_terms('product_cat', array('hide_empty' => false, 'parent' => intval($product_cat) , "name" => "เกรด"  ));
 
   if(count($terms )== 0):
    return json_decode(json_encode(["product_term" =>   []   ]));
   endif;
    $terms_children = get_terms('product_cat', array('hide_empty' => false, 'parent' =>  $terms[0]->term_id  ));
 
    return json_decode(json_encode(["product_term" =>   $terms_children   ]));
    
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'api/v1', '/product_cate/', array(
      'methods' => 'post',
      'callback' => 'product_cate_func',
      'permission_callback' => '__return_true'
    ) );
  } );
  
function product_from_cate_name($request) {
    $data = $request->get_body();
    $toArray = json_decode($data);
    $cate_main = $toArray->cate_main;
    $sub_cate = $toArray->sub_cate;
    $products = [];
$tax_query = [
    
    [
        'taxonomy' => 'product_cat',
        'field' => 'term_id',
        'terms' =>    [$cate_main],
        'include_children' => true,
        'operator' => 'IN'
     ]
    ];
    if($sub_cate):
$tax_query[1]  = [
    'taxonomy' => 'product_cat',
    'field' => 'name',
    'terms' =>    [$sub_cate],
    'include_children' => true,
    'operator' => 'IN'
];
    endif;


    $query = new WP_Query([
        "post_type" => "product",
        "posts_per_page" => -1,
        'meta_key'	=> 'priority',
        'orderby'   => 'meta_value_num',
        'order'		=> 'ASC',
        "tax_query" => $tax_query
            ]);
            $index = 0;
            if($query->have_posts()):
                while($query->have_posts()):
                    $query->the_post();
                    $products[$index] =  [
                        "product_id" => get_the_ID(),
                        "name" => get_the_title()
                    ];
                    $index++;
                endwhile;
            endif;
    return json_decode(json_encode(["products" =>   $products   ]));
    
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'api/v1', '/find_product/', array(
      'methods' => 'post',
      'callback' => 'product_from_cate_name',
      'permission_callback' => '__return_true'
    ) );
  } );
  
function product_from_cate_name_grade($request) {
    $data = $request->get_body();
    $toArray = json_decode($data);
    $cate_main = $toArray->cate_main;
    $sub_cate = $toArray->cate_sub;
    $products = [];
$tax_query = [
    'relation' => 'AND',
    [
        'taxonomy' => 'product_cat',
        'field' => 'term_id',
        'terms' =>    [$cate_main],
        'include_children' => true,
        'operator' => 'IN'
    
    
    ],
    [
        'taxonomy' => 'product_cat',
        'field' => 'name',
        'terms' =>    $sub_cate,
        'include_children' => true,
        'operator' => 'IN'
     ]
    ];
    


    $query = new WP_Query([
        "post_type" => "product",
        "posts_per_page" => -1,
        'meta_key'	=> 'priority',
        'orderby'   => 'meta_value_num',
        'order'		=> 'ASC',
        "tax_query" => $tax_query
    ]);
 

            $index = 0;
            if($query->have_posts()):
                while($query->have_posts()):
                    $query->the_post();
                 
                    $products[$index] =  [
                        "product_id" => get_the_ID(),
                        "name" => get_the_title()
                    ];
                    $index++;
                endwhile;
            endif;
    return json_decode(json_encode(["products" =>   $products   ]));
    
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'api/v1', '/find_product_grade/', array(
      'methods' => 'post',
      'callback' => 'product_from_cate_name_grade',
      'permission_callback' => '__return_true'
    ) );
  } );


add_action( 'rest_api_init', function () {
    register_rest_route( 'api/v1', '/save_user_info/', array(
      'methods' => 'post',
      'callback' => 'save_users',
      'permission_callback' => '__return_true'
    ) );
  } );


  
  function removeBrTag($title) {
    return preg_replace('/(\s*<(\/?p|br)\s*\/?>\s*)+/u' , " " , $title);
 
}



  function save_faq($request) {
    $data = $request->get_body();
    $toArray = json_decode($data);
    $responseKey = $toArray->g_recaptcha_response;
    // $responseKey = $toArray[]
    $secret = "6LdjuzAcAAAAAD0QJsA4yAxHZKijR5pKy_qdRNp2";
    $remoteip=  $toArray->ip_user;
    $urlChaptcha = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$responseKey&remoteip=$remoteip";
    // var_dump($toArray);
    $response = file_get_contents($urlChaptcha);
    
    $responseToArray = json_decode($response);
    if($responseToArray->success):
            if( !$toArray->acceptValue) {
                return json_decode(json_encode(["message" => "accept_not_found"]));
            }
            $info = [
                "first_name" =>  $toArray->first_name,
                "last_name" =>  $toArray->last_name,
                "email" =>  $toArray->emailVal,
                "tel" =>  $toArray->tel ,
                "detail" =>  $toArray->detail ,
            ];
            $postArr = [
                'post_title' => $toArray->emailVal,
                "meta_input" => $info,
                "post_type" => "faqs_form",
                "post_status" => "publish"
            ];
            wp_insert_post($postArr);
            $phpmailer = send_email();
            $displayName = $toArray->first_name. " " . $toArray->last_name;
            $phpmailer->addAddress( "nutsuda.c@likemeasia.com", "Nutsuda Chomtee");
            $phpmailer->Subject = "มีรายการคำถามใหม่จาก คุณ ". $displayName;
            $logo = dirname(__FILE__) . '/assets/images/logo_png.png';
            $phpmailer->AddEmbeddedImage($logo, 'logo' ,  "logo.png" ); 
            $phpmailer->IsHTML(true); 
            $phpmailer->Body = EmailFAQ($displayName ,   $toArray->emailVal ,  $toArray->tel ,  $toArray->detail);
            $test = $phpmailer->Send();
            
            return json_decode(json_encode(["message" => "success"]));
    else:
        header("HTTP/1.1 500 Internal Server Error");
        return json_decode(json_encode(["message" => "FAILED"]));

    endif;

    // var_dump();
   
  }

add_action( 'rest_api_init', function () {
    register_rest_route( 'api/v1', '/save_faq/', array(
      'methods' => 'post',
      'callback' => 'save_faq',
      'permission_callback' => '__return_true'
    ) );
  } );
 
 
  function getIPAddress(){
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}


  function favorites_user_func($request) {
    $data = $request->get_body();
    $toArray = json_decode($data);
    $info = [
        "post_id" =>  $toArray->post_id,
        "type" =>  $toArray->type,
        "user_id" =>  $toArray->user_id,
        

    ];
    $postArr = [
        'post_title' =>$toArray->user_id,
        "meta_input" => $info,
        "post_type" => "favorites_user",
        "post_status" => "publish"
    ];
    $createNew = TRUE;
    $doing = "CREATED";
    $queryFav = new WP_Query([
        "post_type" => "favorites_user",
        "meta_query" => [
            [
            "key" => "user_id",
            "value"  => $toArray->user_id ,
            "compare" => "LIKE"
            ],
            [
            "key" => "post_id",
            "value"  => $toArray->post_id,
            "compare" => "LIKE"
            ]
        ] 
            ]);
 
    if($queryFav->have_posts()):
        while($queryFav->have_posts()):
            $queryFav->the_post();
            wp_delete_post(get_the_ID() , TRUE);
            $doing = "DELETED";
            $createNew = FALSE;

        endwhile;
    endif;
    wp_reset_query();


    if( $createNew == TRUE):
        $create =   wp_insert_post($postArr);
    endif;
    return json_decode(json_encode(["message" => "success" ,"doing" => $doing ]));
  }
add_action( 'rest_api_init', function () {
    register_rest_route( 'api/v1', '/favorites/', array(
      'methods' => 'post',
      'callback' => 'favorites_user_func',
      'permission_callback' => '__return_true'
    ) );
  } );

  function save_career($request) {
    $data = $request->get_body();
    $toArray = json_decode($data);

    $responseKey = $toArray->g_recaptcha_response;
    // $responseKey = $toArray[]
    $secret = "6LdjuzAcAAAAAD0QJsA4yAxHZKijR5pKy_qdRNp2";
    $remoteip=  $toArray->ip_user;
    $urlChaptcha = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$responseKey&remoteip=$remoteip";
    // var_dump($toArray);
    $response = file_get_contents($urlChaptcha);
    
    $checkStatus = json_decode($response);
 
    if(!$checkStatus->success) return json_decode(json_encode(["message" => "failed"]));

    $info = [
        "first_name" =>  $toArray->first_name,
        "last_name" =>  $toArray->last_name,
        "email" =>  $toArray->email,
        "tel" =>  $toArray->tel,
        "portfolio_link" =>  $toArray->portfolio_link,
        "resume_cv" =>  $toArray->resume_cv,
        "transcript" =>  $toArray->transcript,
        "cover_letter" =>  $toArray->cover_letter,
        "career_name" =>  $toArray-> career_name,

    ];
    $postArr = [
        'post_title' =>$toArray->email,
        "meta_input" => $info,
        "post_type" => "career_submit",
        "post_status" => "publish"
    ];
   $create =   wp_insert_post($postArr);
 
    return json_decode(json_encode(["message" => "success" ,"LL" => $toArray , "f" =>  $create]));
  }
add_action( 'rest_api_init', function () {
    register_rest_route( 'api/v1', '/career/save/', array(
      'methods' => 'post',
      'callback' => 'save_career',
      'permission_callback' => '__return_true'
    ));
  } );


  function get_solution_data($data) {
    $_id = $data['id'];
    $arg = ["post_type" => "page" , "p" => intval($_id) , "posts_per_page" => 1];
    $query = new WP_Query($arg );
    $data = [];
    if($query->have_posts()):
        while($query->have_posts()):
            $query->the_post();
            $data["title"] = get_the_title();
            $data['solutions'] = [];
            $data['products_suggestion'] =  [];
            if( get_field("post")) {
                $solutions = get_field("post");
            
               
                    foreach( $solutions as  $solution) {
                            $featured_img_url = get_the_post_thumbnail_url($solution->ID,'full');    
                            // get_the_title($solution->ID)
                            $solution_array   = [
                                "title" => get_the_title($solution->ID),
                                "image" => $featured_img_url,
                                "ID" => $solution->ID
                            ];
                            $solution = json_encode($solution_array);
                            array_push($data['solutions'] , json_decode($solution));
                  
                    }
                   
        
                // }
    
            }



            if(get_field("products")):
                $products = get_field("products");
                foreach(  $products as   $product) {
                        $featured_img_url = get_the_post_thumbnail_url($product->ID,'full');    
                        // get_the_title($product->ID)
                        $product_array   = [
                            "title" => get_the_title($product->ID),
                            "image" => $featured_img_url,
                            "ID" => $product->ID,
                            "link" => get_permalink($product->ID) ,
                            "excerpt" => get_the_excerpt($product->ID)
                        ];
                        $product = json_encode($product_array);
                        array_push($data['products_suggestion'] , json_decode($product));
            
                }
        endif;

          
        endwhile;
    endif;
    
    return json_decode(json_encode($data));
  }

  
add_action( 'rest_api_init', function () {
    register_rest_route( 'api/v1', '/solution/(?P<id>[\\d]+)', array(
      'methods' => 'GET',
      'callback' => 'get_solution_data',
      'args' => array(
        'id' => array(
          'validate_callback' => function($param, $request, $key) {
            return is_numeric( $param);
          }
        ),
      ),
      'permission_callback' => '__return_true'
    ) );
  } );


 


  
if ( ! function_exists( 'woocommerce_content_custom' ) ) {
    function woocommerce_content_custom() {
    
        if ( is_singular( 'product' ) ) :
    
            while ( have_posts() ) :
                the_post();
                get_template_part("woocom/content-single-product-custom");
            endwhile;
    
         else:
            get_template_part("woocom/content-product-custom");
        endif;
    }
}
 
 
function add_login_header() {
    if(is_user_logged_in()):
        $found_posts = checkUserIsAddedUserData();	
        if($found_posts  > 0 && !isset($_POST['signInSuccess'])):
            $link = get_site_url();
        echo <<<script
            <script>
                
                window.location.href = "$link";
            </script>

        script;
        endif;
    endif;
    get_template_part("other/loading");
    get_header();
}
function add_login_footer() {
    get_footer();

}
function add_login_form($params) {
    // get_footer();
    // echo "<h1>Test</h1>";
    $user_login  = $params["user_login"];
    $aria_describedby_error = $params["aria_describedby_error"];
    $errors = $params["errors"];
    get_template_part("templates/auth/signin" , null , [
        "user_login" => $user_login,
        "aria_describedby_error" => $aria_describedby_error,
        "errors" => $errors
    ]);
}
function add_register_form() {
    get_template_part("templates/auth/signup" );
}
function add_lostpassword_form() {
    get_template_part("templates/auth/lost_password" );

}
 
add_filter("login_form" , "add_login_form");
add_filter("login_header" , "add_login_header");
add_filter("login_footer" , "add_login_footer");
add_filter("register_form" , "add_register_form");
add_filter("lostpassword_form" , "add_lostpassword_form");
 

function reset_pass_url() {
    $siteURL = get_option('siteurl');
    return "{$siteURL}/wp-login.php?action=lostpassword";
}
add_filter( 'lostpassword_url', 'reset_pass_url', 11, 0 );





add_filter( 'woocommerce_account_menu_items', 'add_my_menu_items', 99, 1 );

function add_my_menu_items(   $endpoints ) {
    $endpoints = array(
    //  endpoint   => label
        'edit-account'    => get_option( 'woocommerce_myaccount_edit_account_endpoint', 'edit-account' ),

    );
 
	return   $endpoints;


   
}
 


function complete_registration(
    $request
) {
    $data = $request->get_body();
    $toArray = json_decode($data);
    $userdata = array(
        'user_login'    =>    $toArray->email,
        'user_email'    =>    $toArray->email,
        'user_pass'     =>    $toArray->password,
        // 'user_url'      =>   $website,
        'first_name'    =>    $toArray->first_name,
        'last_name'     =>    $toArray->last_name,
        // 'nickname'      =>   $nickname,
        // 'description'   =>   $bio,
        );
    // $user = wp_update_user( $userdata );
    $user = wp_insert_user( $userdata );

    if ( is_wp_error( $user_data ) ) {
        return json_decode(json_encode(["message" =>  $user_data ]));

    }  

    // echo "Register completed";
    return json_decode(json_encode(["message" => "success" , "user" => json_encode($user) , "dd" => $toArray->$email]));

}
function register_user($request) {
    $data = $request->get_body();
    $toArray = json_decode($data);
    $user = false;
    $email = $toArray->emailVal;
    $checkEmailExists = false;
    if(isset($toArray->userId)):
        $currentUser = get_user_by("ID",$toArray->userId); 
        $currentUserEmail = $currentUser->data->user_email;
        
        if($currentUserEmail)  {
    
            if($currentUserEmail != $toArray->emailVal) {
                $getUserByEmail = get_user_by("email", $toArray->emailVal);
                if($getUserByEmail) {
                    return json_decode(json_encode(["message" => "EMAIL_EXISTS"]));
                }   
            }
        }
        else {
            $getUserByEmail = get_user_by("email",$toArray->emailVal);
            if($getUserByEmail) {
                return json_decode(json_encode(["message" => "EMAIL_EXISTS"]));
            }   
        }
        
        $email =  $toArray->emailVal;
        $userdata = array(
            'ID'         => $currentUser->ID,
            'first_name'    =>    $toArray->name,
            'last_name'     =>    $toArray->lastname,
            "user_email" => $toArray->emailVal,
            );
        $user = wp_update_user( $userdata );
    else:
        $getUserByEmail = get_user_by("email",$toArray->emailVal);
        if($getUserByEmail) {
            return json_decode(json_encode(["message" => "EMAIL_EXISTS"]));
        }   
        $userdata = array(
            'user_login'    =>    $toArray->emailVal,
            'user_email'    =>    $toArray->emailVal,
            'user_pass'     =>    $toArray->pwd,
            'first_name'    =>    $toArray->name,
            'last_name'     =>    $toArray->lastname,
            );
        $user = wp_insert_user( $userdata );
        $email = $toArray->emailVal;
        $creds['user_login'] = $email;
        $creds['user_email'] = $email;
        $creds['user_password'] = $toArray->pwd;
        $creds['remember'] = true;
        $autologin_user = wp_signon( $creds, false );
    endif;
     
    if ( is_wp_error( $user ) ) {
        return json_decode(json_encode(["message" =>  $user ]));
    }   else {
        $phpmailer = send_email();
        $info = [
            "first_name" =>  $toArray->name,
            "last_name" =>  $toArray->lastname,
            "email" =>   $email,
            "birthday" =>  $toArray->birthday,
            "type_of_user" =>  $toArray->type_user,
            "user_id" =>   $user,
            "accept_email_send" =>  $toArray->accept_email,
            "accept_pdpa" =>  $toArray->accept_pdpa,
            "phone_number" =>  $toArray->phone_number,
            "other" =>  $toArray->other,
        ];
        $postArr = [
            'post_title' => $email,
            "meta_input" => $info,
            "post_type" => "user_custom_field",
            "post_status" => "publish"
        ];
       $create =   wp_insert_post($postArr);
       
    }
    $displayName = $toArray->name . " ". $toArray->lastname;
    registerSuccess($phpmailer, $email, $displayName  );
    return json_decode(json_encode(["message" => "OK" , "user" => json_encode($user) ]));
}
add_action( 'rest_api_init', function () {
    register_rest_route( 'api/v1', '/user/create', array(
      'methods' => 'post',
      'callback' => 'register_user',
      'permission_callback' => '__return_true'
    ) );
  } );
function update_user(
    $request
) {
    $data = $request->get_body();
    $toArray = json_decode($data);
    $userdata = array(
        "ID" => $toArray->userId,
        // 'user_login'    =>    $toArray->emailVal,
        'user_email'    =>    $toArray->emailVal,
        'first_name'    =>    $toArray->name,
        'last_name'     =>    $toArray->lastname,
        // 'nickname'      =>   $nickname,
        // 'description'   =>   $bio,
        );
    $user = wp_update_user( $userdata );

    // $toArray = json_decode($data);




    if ( is_wp_error( $user ) ) {
        return json_decode(json_encode(["message" => "error" , "detail" => $user ]));

    }   else {
        $findProfile = new WP_Query([

            "post_type" => "user_custom_field",
            "meta_query" => [
                [
                    "key" => "user_id",
                    "value"  => $toArray->userId,
                    "compare" => "LIKE"
                    ],
            ]
        ]);
        if($findProfile->found_posts):
            $info = [
                "first_name" =>  $toArray->name,
                "last_name" =>  $toArray->lastname,
                "email" =>  $toArray->emailVal,
                "birthday" =>  $toArray->birthday,
                "type_of_user" =>  $toArray->type_user,
                "user_id" =>   $toArray->userId,
             
                "phone_number" =>  $toArray->phone_number,
             
        
            ];
            $postArr = [
                "ID" => $toArray->postId,
                "meta_input" => $info,
                "post_type" => "user_custom_field",
                
            ];
     
           $update =   wp_update_post($postArr);

        else:
        $info = [
            "first_name" =>  $toArray->name,
            "last_name" =>  $toArray->lastname,
            "email" =>  $toArray->emailVal,
            "birthday" =>  $toArray->birthday,
            "type_of_user" =>  $toArray->type_user,
            "user_id" =>  $toArray->userId,
            "accept_email_send" =>  TRUE,
            "accept_pdpa" =>  TRUE,
            "phone_number" =>  $toArray->phone_number,
            "other" =>  "",
    
        ];
        $postArr = [
            'post_title' =>$toArray->emailVal,
            "meta_input" => $info,
            "post_type" => "user_custom_field",
            "post_status" => "publish"
        ];
        $create =   wp_insert_post($postArr);
       
        endif;
        
    }
 
    return json_decode(json_encode(["message" => "OK" , "user" => json_encode($user) , "dd" => $user]));

}
add_action( 'rest_api_init', function () {
    register_rest_route( 'api/v1', '/user/update', array(
      'methods' => 'post',
      'callback' => 'update_user',
      'permission_callback' => '__return_true'
    ) );
  } );


  function getErrors() {

    // if ( ! is_wp_error( $wp_error ) ) {
		$wp_error = new WP_Error();
	// }
    if ( $wp_error->has_errors() ) {
		$errors   = '';
		$messages = '';

		foreach ( $wp_error->get_error_codes() as $code ) {
			$severity = $wp_error->get_error_data( $code );
			foreach ( $wp_error->get_error_messages( $code ) as $error_message ) {
				if ( 'message' === $severity ) {
					$messages .= '	' . $error_message . "<br />\n";
				} else {
					// $errors .= '	' . $error_message . "<br />\n";
                    array_push($errors , ['message'=> $error_message ]);
				}
			}
		}

	 
        return $errors;
	}

    return [];


  }


function change_password($request) {
    $data = $request->get_body();
    $toArray = json_decode($data);
    $user = get_user_by( 'id',$toArray->userId );
    $checkPasswordOld = wp_check_password( $toArray->oldPassword , $user->data->user_pass , $user->ID ) ;
    if($checkPasswordOld) {
        wp_set_password($toArray->newPassword , $user->ID);
        return json_decode(json_encode(["message" => "OK"] ));
    } else {
        return json_decode(json_encode(["message" => "password_not_match_old"]));
    }
    
}
  add_action( 'rest_api_init', function () {
    register_rest_route( 'api/v1', '/user/change-password', array(
      'methods' => 'post',
      'callback' => 'change_password',
      'permission_callback' => '__return_true'
    ) );
  } );


function custom_registration_function() {
    if ( isset($_POST['submit'] ) ) {
        // registration_validation(
        // $_POST['username'],
        // $_POST['password'],
        // $_POST['email'],
        // $_POST['website'],
        // $_POST['fname'],
        // $_POST['lname'],
        // $_POST['nickname'],
        // $_POST['bio']
        // );
         
        // // sanitize user form input
        // global $username, $password, $email, $website, $first_name, $last_name, $nickname, $bio;
        // $username   =   sanitize_user( $_POST['username'] );
        // $password   =   esc_attr( $_POST['password'] );
        // $email      =   sanitize_email( $_POST['email'] );
        // $website    =   esc_url( $_POST['website'] );
        // $first_name =   sanitize_text_field( $_POST['fname'] );
        // $last_name  =   sanitize_text_field( $_POST['lname'] );
        // $nickname   =   sanitize_text_field( $_POST['nickname'] );
        // $bio        =   esc_textarea( $_POST['bio'] );
 
        // // call @function complete_registration to create the user
        // // only when no WP_error is found
        // complete_registration(
        // $username,
        // $password,
        // $email,
        // $website,
        // $first_name,
        // $last_name,
        // $nickname,
        // $bio
        // );
    }
 
    // registration_form(
    //     $username,
    //     $password,
    //     $email,
    //     $website,
    //     $first_name,
    //     $last_name,
    //     $nickname,
    //     $bio
    //     );
}

function checkUserInfo($userId = "") {
    if(!$userId) $userId  = get_current_user_id();
    $checkUserAndCookies = false;
    if(isset($_COOKIE["check_info_user"])):
        if($_COOKIE["check_info_user"] == $userId):
            $checkUserAndCookies = true;      
        endif;
    endif;
    if($checkUserAndCookies) {
        return [
            "user" => $userId,
            "success" => true,
            "save_cookies" => false,
        ];
    }
    $query = new WP_Query([
        'post_type' => "user_custom_field",
        "meta_query" => [
            [
                [
                    "key" => "user_id",
                    "value"  => $userId ,
                    "compare" => "LIKE"
                ],
            ]
        ]
    ]);
    $found_posts = $query->found_posts;
    if($found_posts) {
        return [
            "user" => $userId,
            "success" => true,
            "save_cookies" => true,
        ];
    };
    return [
        "user" => "",
        "success" => false,
        "save_cookies" => false,
    ];
}

function returnLatestUrl() {
    $redi =  get_site_url();
    if(isset($_COOKIE['url_latest'])):
        $redi = $_COOKIE['url_latest'];
    endif;
    return $redi;
}


function add_login_redirect( $redirect_to, $request, $user) {
    $redi =  get_site_url();
if(!empty($user->ID)):
    $found_posts = checkUserInfo($user->ID);
   
    if($found_posts["save_cookies"]):
        setcookie("check_info_user" , $user->ID , time() + 3600 , "/");
    endif; 
    if($found_posts["success"] == false):
            $redi = get_site_url()."/wp-login.php?action=register";  
            return $redi;        
    endif; 
    if(isset($_COOKIE['url_latest'])):
        $redi = $_COOKIE['url_latest'];
    endif;

    if(isset($_COOKIE['url_latest'])):
        $redi = $_COOKIE['url_latest'];
    endif; 

    return $redi;
endif;
return  $redi;
         
}

add_filter( 'login_redirect', "add_login_redirect" , 10, 3);






function getFavoritesData($type , $post_id = FALSE , $posts_per_page = FALSE ) {
    $data_favorites = [];

if(get_current_user_id()):
    $meta_query = [
        [
        "key" => "user_id",
        "value"  => get_current_user_id() ,
        "compare" => "LIKE"
        ],
        [
        "key" => "type",
        "value"  => $type,
        "compare" => "LIKE"
        ]
        ];
        if($post_id != FALSE):            
            $meta_query[count($meta_query)] = [
                "key" => "post_id",
                "value"  => $post_id,
                "compare" => "LIKE"
            ];
        endif;
      
    $arg = [
        "post_type" => "favorites_user",
        "meta_query" => $meta_query
      
    ];
    if($posts_per_page != FALSE):
        $arg["posts_per_page"] = $posts_per_page;
         
    endif;
    $queryFav = new WP_Query($arg);

    if($queryFav->have_posts()):
        while($queryFav->have_posts()):
            $queryFav->the_post();
            $id = get_the_ID();
            $probId = get_field("post_id" , $id);
            $data_favorites[$probId] = [
                "post_id" =>  $probId ,
            ];
        endwhile;
    endif;
    
    wp_reset_query();
    
endif;


$count = 0;
if(isset($queryFav->found_posts)):
    $count = $queryFav->found_posts;
endif;
 
return [
    "datas" => $data_favorites,
    "count" => $count
];
}

add_action('wp_enqueue_scripts', 'no_more_jquery');
 
function no_more_jquery(){
    wp_deregister_script('jquery');
   
    // wp_deregister_style('dashicons');
}
 
add_action( 'login_init', function() {
    wp_deregister_style( 'login' );
    wp_deregister_style( 'form' );
 
} );
function checkUserIsAddedUserData() {
    $query = new WP_Query([
        'post_type' => "user_custom_field",
        "meta_query" => [
            [
                [
                    "key" => "user_id",
                    "value"  => get_current_user_id() ,
                    "compare" => "LIKE"
                ],
            ]
        ]
    ]);
    $found_posts = $query->found_posts;
    return $found_posts;
}



function returnProduct($product_id) {
    $query = new WP_Query([
        "post_type" => 'product',
        "p" => $product_id ,
    ]);
    $select_cate = "";
    $selected1_id = "";
    $selected1_cate_id = "";
    $product = [];
    if($query->have_posts()):
        while($query->have_posts()):
            $query->the_post();
            $product_categories =   get_the_terms(get_the_ID() , "product_cat");
            $grade = "-";
            $grade_parent = "";
            $type_film_parent = "";
            $type_film = "-";
            $application_area_parent = "";
            $application_area = "-";
            $application_area_parent = "";
            $area = "-";
            $use_area_parent = "";
            $use_area = "-";
            $texture_parent  = "";
            $texture  = "-";
            $word_group_parent  = "";
            $word_group  = "-";
            $function_parent  = "";
            $function_group  = "-";
            $is_green_product = 0;
            $innovative_product  = 0;
            $is_suggestion = "";
            foreach($product_categories as $product_cat):
                if($product_cat->parent == 0):
                    $selected1_id = $product_cat->term_id;
                endif;
                if(trim($product_cat->name) == "เกรด"):
                    $grade_parent = $product_cat->term_id;
                    $select_cate = $product_cat->term_id;

                endif;
                if(trim($product_cat->name) == "ชนิดฟิล์มสี"):
                    $type_film_parent = $product_cat->term_id;
                endif;
                if(trim($product_cat->name) == "พื้นที่การทา"):
                    $application_area_parent = $product_cat->term_id;
                endif;
                if(trim($product_cat->name) == "พื้นที่ใช้งาน"):
                    $use_area_parent = $product_cat->term_id;
                    
                endif;
                if(trim($product_cat->name) == "พื้นผิว"):
                    $texture_parent = $product_cat->term_id;
                    
                endif;
                if(trim($product_cat->name) == "กลุ่มงาน"):
                    $word_group_parent = $product_cat->term_id;
                    
                endif;
                if(trim($product_cat->name) == "ฟังก์ชั่น"):
                    $function_parent = $product_cat->term_id;
                    
                endif;
                if(trim($product_cat->name) == "GEEN PRODUCT"):
                    $is_suggestion = $product_cat->term_id;
                    $is_green_product = 1;
                    
                endif;
                if(trim($product_cat->name) == "ผลิตภัณฑ์นวัตกรรม"):
                   
                    $innovative_product = 1;
                    
                endif;
            endforeach;
            foreach($product_categories as $pc):
                
                if( $grade_parent != ""):
                    if($pc->parent ==  $grade_parent):
                        $grade  = $pc->name;
                        $selected1_cate_id = $pc->term_id;
                    endif;
                endif;

                if($application_area_parent != ""):
                    if($pc->parent ==   $application_area_parent):
                        $application_area  = $pc->name;
                    
                    endif;
                endif;

                if($use_area_parent != ""):
                    if($pc->parent ==   $use_area_parent):
                        $use_area  = $pc->name;
                    
                    endif;
                endif;
                if($texture_parent):
                    if($pc->parent ==   $texture_parent):
                        $texture  = $pc->name;
                    
                    endif;
                endif;
                if($word_group_parent):
                    if($pc->parent ==    $word_group_parent):
                        $word_group   = $pc->name;
                    
                    endif;
                endif;
                if($function_parent):
                    if($pc->parent ==    $function_parent):
                        $function_group   = $pc->name;
                        
                    endif;
                endif;
                // if($pc->parent ==    $is_suggestion):  
                //     if(trim($pc->name) == "GREEN PRODUCT"):
                //         $is_green_product = TRUE;
                //     endif;
                //     if(trim($pc->name) == "สินค้านวัตกรรม"):
                //         $innovative_product  = TRUE;
                //     endif;
                // endif;
            endforeach;
            $title = "";
            $content = "-";
            $paint_brush = "-";
            $standard = "-";
            $persistence = "-";
            $solvent = "-";
            $special_look = "-";

            $image = get_bloginfo("template_directory")."/assets/images/_product_.jpg";
            if(get_the_title()) : $title = get_the_title() ; endif;
            if(get_the_content()) : $content = get_the_content() ; endif; 
            if(get_field("paint_brush" , get_the_ID())): $paint_brush = get_field("paint_brush" , get_the_ID());endif;
            if(get_field("standard" , get_the_ID())): $standard = get_field("standard" , get_the_ID()); endif; 
            if(get_field("persistence" , get_the_ID())): $persistence=get_field("persistence" , get_the_ID()); endif;
            if(get_field("solvent" , get_the_ID())): $solvent  = get_field("solvent" , get_the_ID());  endif;
            if(get_field("special_look " , get_the_ID())): $special_look  = get_field("special_look" , get_the_ID());  endif;
            if(get_the_post_thumbnail_url(get_the_ID() , "full")) : $image =get_the_post_thumbnail_url(get_the_ID() , "full") ; endif; 
            $product = [
                "id" => get_the_ID(),
                "title" => $title,
                "image" => $image,
                "grade" =>  $grade,
                "type_film" => $type_film,
                "feature" => $content,
                "paint_brush" => $paint_brush,
                "standard" => $standard,
                "persistence" => $persistence,
                "solvent" => $solvent,
                "application_area" => $application_area,
                "use_area" => $use_area,
                "texture" => $texture,
                "word_group" =>$word_group,
                "function_group" =>  $function_group,
                "is_green_product" => $is_green_product,
                "innovative_product" => $innovative_product,
                "special_look"=> $special_look

            ];
 

        endwhile  ;
    endif;
 
    wp_reset_query();

    return [
        "products" => $product,
        "select_id" =>  $selected1_id,
        "selected1_cate_id" => $selected1_cate_id,
        "select_cate" => $select_cate

    ];
}

function get_idea_card($args) {
    $AIndex = $args['index'];
    $index =$AIndex  + 0;
    $tax_query = [
        [
            'taxonomy' => 'get_idea_cate',
            'field' => 'term_id',
            'terms' =>    [$args["term"]],
            'include_children' => true,
            'operator' => 'IN'
        ]
    ] ;
    $user_type = "";
    if(isset($_GET["user_type"])):
      $user_type = $_GET['user_type'];
      $tax_query[1] =  [
        'taxonomy' => 'get_id_user_type',
        'field' => 'term_id',
        'terms' =>    [$user_type],
        'include_children' => true,
        'operator' => 'IN'
      ];
    endif;

    $argc = [
        "post_type" => "get_idea",
        "posts_per_page" => 9,
        "tax_query" => $tax_query,
        "orderby" => "date",
        "order" => "DESC"
    ];
    if(isset($_GET["order_by"])):
        $order_by = $_GET['order_by'];
        if($order_by == "most_view"):
          $argc["orderby"] = "post_views";
      endif;
      endif;

    $query = new WP_Query($argc);
    



        $favorite = getFavoritesData("get_idea");


        if($query->found_posts == 0):
        
           do_action("empty_page" , ["count" => $query->found_posts ]);
        
        
        
        endif;

    if( $query->have_posts()): while($query->have_posts()): $query->the_post(); 
        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');    
        $checkF  = FALSE;
        if(isset($favorite["datas"][get_the_ID()])):
            $checkF = TRUE;
        endif;

    echo "<div class='swiper-slide card-get-idea-control-width'>";
    
        get_template_part("templates/get_idea/card" , null , [
            "featured_img_url" =>  $featured_img_url,
            "title" => get_the_title( get_the_ID()) , 
            "short_text" => get_field("short_text"),
            "checked" => $checkF,
            "link" => get_permalink(),
            "user_id" => get_current_user_id(),
            "id" => get_the_ID() ,
            "favorite" =>     $checkF,
            "index" => $index++ ,
            "type_blog" => "get_idea" ,
            "nameClass" => "card-get-idea-".$AIndex,
                
        ]); 
    
    echo "</div>";

 

;endwhile;endif ;  wp_reset_query(); 

    
   
}


add_action ('get_idea_card', 'get_idea_card', 10, 1);



function create_empty_page($args) {
    $count = $args['count'];
   $className = "empty_data_page hide";
    if($count == 0):
        $className = "empty_data_page";
    endif;
    //if($count == 0):
        echo '  
            <div class="'. $className.'">
                <h1>
                    <i class="sticky note outline icon"></i>    
                </h1>
                <h3 class="ui header text-center">
                    Empty Data 
                </h3>
            </div>
        ';
  //  endif;
}

add_action ('empty_page', 'create_empty_page', 10, 1);



function relationPost($args) {

   $related_query = new WP_Query(array(
        'post_type' => $args['post_type'] ,// 'problem_and_solution',
        'category__in' => $args['category__in'] , // wp_get_post_categories(get_the_ID()),
        'post__not_in' => $args["post__not_in"] , // array(get_the_ID()),
        'posts_per_page' => 9,
        'orderby' => 'date',
        'order' => 'ASC' 
  ));
  $data_favorites = $args["data_favorites"];
  $index = 0;
  
  if($related_query->found_posts == 0):
    echo "";
  else:
   echo ' <div class="swiper-blog-div">
    <h1 class="primary-text text-center ui header">บทความเพิ่มเติม</h1>
    <div class="swiper-container swiper-blog">
          <div class="swiper-wrapper">';
                            while( $related_query->have_posts()):
                                  $related_query->the_post();
                                  $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                                  $userId = FALSE;
                                  if(get_current_user_id()):
                                  $userId = get_current_user_id();
                                  endif;
                                  $checkFav = FALSE;
                                  if(isset($data_favorites[get_the_ID()])):
                                  $checkFav = TRUE;
                                  endif;
                                  $args_part = [
                                    "title" => get_the_title(),
                                    "detail" => get_field("short_text"),
                                    "image" => $featured_img_url,
                                    "user_id" => $userId,
                                    "id" => get_the_ID(),
                                    "favorite" =>  $checkFav,
                                    "index" => $index,
                                    "type_blog" => "problem-and-solution",
                                  ];
                                  if(isset($args["fav_false"])):
                                    $args_part["fav_false"] = true;
                                  endif;
                                echo  '<div class="swiper-slide card-get-idea-control-width">';
                                        
                                              get_template_part("components/card-blog" , null , $args_part);
                                              $index += 1;
                                echo '</div>';
                                  
                            endwhile;
                            wp_reset_query();

    echo '                      
                </div>
            </div>
        <div class="pagination-blog">
                <div class="swiper-pagination"></div>
        </div>
        </div>';
    endif;
}

add_action ('relation_post', 'relationPost', 10, 1);



function addFavoritesForBlog2($args) {
 $typeFav = $args['typeFav']; // problem-and-solution

    $getFavs = getFavoritesData( $typeFav);  
    $data_favorites = $getFavs["datas"]; 
    $icon1 = "save_favorites_black";
    $icon2 = 'saved_favorites hide';
    if(isset($data_favorites[$args['postId']])):
      $icon1 = "save_favorites_black hide";
      $icon2 = "saved_favorites";
endif;
    
    $title= $args["title"];
    $postId= $args["postId"];
    $userId = NULL;
    if(get_current_user_id()):
      $userId = get_current_user_id();
      endif;
    echo '
    <div class="header-title-and-save-favorites-2">
    <h1>'.$title.'</h1>';
    if($userId):
        echo '<div onclick="saveFavoritesOnePost('.$userId.' , '.$postId.' , '.  "'" . $typeFav .  "'" .', '."'save_favorites_black'".' , '."'saved_favorites'".' )" class="favorites-button"> ';
        get_template_part("components/icon" , null , ["icon" => "save_favorites_black" , "class" => $icon1]) ;
        get_template_part("components/icon" , null , ["icon" => "saved_favorites" , "class" => $icon2] ) ;
        echo '</div>';
      endif; 
    echo '</div>';
}


add_action("favorites_blog_h2" , "addFavoritesForBlog2" , 10 , 1);


function addFavoritesForBlog($args) {
 $typeFav = $args['typeFav']; // problem-and-solution

    $getFavs = getFavoritesData( $typeFav);  
    $data_favorites = $getFavs["datas"]; 
    $icon1 = "save_favorites_black";
    $icon2 = 'saved_favorites hide';
    if(isset($data_favorites[$args['postId']])):
      $icon1 = "save_favorites_black hide";
      $icon2 = "saved_favorites";
endif;
    
    $title= $args["title"];
    $postId= $args["postId"];
    $userId = NULL;
    if(get_current_user_id()):
      $userId = get_current_user_id();
      endif;
    echo '
    <div class="header-title-and-save-favorites">
    <h1>'.$title.'</h1>';
    if($userId && !isset($args["fav_false"])):
        echo '<div onclick="saveFavoritesOnePost('.$userId.' , '.$postId.' , '.  "'" . $typeFav .  "'" .', '."'save_favorites_black'".' , '."'saved_favorites'".' )" class="favorites-button"> ';
        get_template_part("components/icon" , null , ["icon" => "save_favorites_black" , "class" => $icon1]) ;
        get_template_part("components/icon" , null , ["icon" => "saved_favorites" , "class" => $icon2] ) ;
        echo '</div>';
      endif; 
    echo '</div>';
}


add_action("favorites_blog" , "addFavoritesForBlog" , 10 , 1);


function functionMakeFav($args) {
   if(isset($args['user_id'])) :  
        if($args["user_id"] != FALSE):
            $userId = $args["user_id"];
            $postId = $args["id"];
            $favorite = $args["favorite"];
            $checkF = $favorite;
            $index = $args["index"];
            $type_blog = $args["type_blog"];
            $nameClass = $args["nameClass"];
            $makeFav1 ="";
            $makeFav2 ="";
            if($checkF === TRUE): $makeFav1 =  "hide"; else : $makeFav1 =  "show";  endif;
            if($checkF === TRUE): $makeFav2=  "show"; else : $makeFav2  = "hide";  endif; 
            echo '<div onclick="saveFavorites('.$userId.'  , '.$postId.' , '."'".$type_blog."'".' , '."'".$nameClass."'".'  )" class="card-blog-save-favorites '.$nameClass.'">
                <img 
                class="favorites-button '.$makeFav1.'"
                    src="'. get_bloginfo("template_directory").'/assets/images/save-favorties-blog.svg" 
                    alt="" />
                <img 
                class="favorites-button-active '.$makeFav2.'"
                    src="'. get_bloginfo("template_directory").'/assets/images/saved_favorites.svg" 
                    alt="" />
            </div>';
       
        endif;
    endif;
 
}

add_action("make_favorites_blogs" , "functionMakeFav" , 10 , 1);





function addSelectGetIdea($args) {
    $termUserType = $args["termUserType"];
    $url = get_permalink();
    $url_default = get_permalink();
    $chekedFirst = 0;
    $chekedTwo = 0;
   
      if(isset($_GET["slide"]) && isset($_GET["scroll"])):
        $url .=  "?slide=".$_GET['slide']."&scroll=".$_GET['scroll'];
        $chekedFirst = 1;

    else:
        if(isset($_GET["slide"])):
            $url .= "?slide=".$_GET['slide'];
        $chekedFirst = 1;
        endif;
        if(isset($_GET['scroll'])):
            $url .= "?scroll=".$_GET['scroll'];
            $chekedFirst = 1;
    
        endif;
      endif;

 

    $user_type = "";
    if(isset($_GET["user_type"])):
      $user_type = $_GET['user_type'];
    endif;
    if(isset($_GET["order_by"])):
      $orderby = $_GET['order_by'];
    endif;

    // $url .= "";
  echo '  <div class="select-group-user">
  <div class="row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">ประเภทกลุ่ม</label>
      <select  onchange="selectCateGetIdeaChanged('. "'" . $url. "'".' , '.$chekedFirst.', '."'" . $url_default. "'".' )" id="select_get_idea_all" class="menu" >
      <option value="">ทั้งหมด</option>';
     foreach($termUserType as $TUT):
        $selected = "";
        if($TUT->term_id == $user_type):
            $selected = "selected";
        endif;
        echo '<option '.$selected.'  value="'.$TUT->term_id.'">'. $TUT->name.'</option>';
    endforeach; 

    if(isset($_GET['user_type'])):
        // $url .= "?scroll=".$_GET['scroll'];
        // $chekedFirst = 1;
        if($chekedFirst == 1):
        $url .= "&user_type=".$_GET['user_type'];
        else :
            $url .= "?user_type=".$_GET['user_type'];

        endif;
        $chekedTwo  = 1;
    endif;

    $most_view = "";
    $date = "selected";
    if($orderby == "most_view" ):
        $most_view = "selected";
        $date = "";
    endif;
    echo '</select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">เรียงตาม</label>
      <select id="orderby_get_idea"  onchange="selectMostViewOrDateOrder('. "'" . $url. "'".' , '.$chekedFirst.', '."'" . $url_default. "'".'  , '.$chekedTwo.')" class="menu" >
          <option '.$date.' value="date">ล่าสุด</option>
          <option '.$most_view.' value="most_view">ความนิยมสูงสุด</option>
      </select>
    </div>
  </div>
 
</div>';

}
add_action("select_get_idea" , "addSelectGetIdea" , 10 , 1);









function EmailBodyRegister($name) {
 
   $body  = <<<text
       <!DOCTYPE html><html lang="en"> <head> <meta charset="UTF-8" /> <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <meta name="viewport" content="width=device-width, initial-scale=1.0" /> <title>Document</title> <link rel="preconnect" href="https://fonts.googleapis.com" /> <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin /> <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;500;800&display=swap" rel="stylesheet" /> <style> .content-text ul { text-align: left; padding: 0px 0px 0px 20px; } .content-text ul li {list-style: decimal; } .primary { color: red } .image-content { overflow: hidden; border-radius: 20px; height: auto; margin: 20px 0; max-height: 300px; } .image-content img { width: 100%; object-fit: cover; border-radius: 20px; } .btn { padding: 10px 30px; width: 100%; border-radius: 4px; max-width: 300px; margin-top: 30px; background-color:#03428E ; color:white; border:0px; font-weight: 300; font-family: 'Kanit', sans-serif; } .text-primary { color:#03428E ; font-weight: 500; } .text-center { align-items: center; } </style> </head> <body> <div style=" background-color: #f7f7f7; padding: 3em 0; margin: 0px; /* position: absolute; */ top: 0; bottom: 0; left: 0; width: 100%; font-family: 'Kanit', sans-serif; font-weight: 300; height: fit-content; display: flex; align-items: center; justify-content: center; " > <div style=" background: white; border: 1px solid rgba(0, 0, 0, 0.1); width: 100%; height: 100%; max-width: 600px; margin: 20px auto; border-radius: 5px; padding-bottom: 30px; " > <div style="background-color: #03428e; width: 100%; height: 20px"></div> <div style="padding: 20px 50px 0px; color: #03428e; margin-bottom: 0"> <div style=" border-bottom: 1px solid rgba(0, 0, 0, 0.1); width: 100%; padding-bottom: 20px; " > <div style="width: 128px"> <img src="cid:logo" alt="Nippon Image" style="width: 100%" /> </div> </div> </div> <div style="padding: 20px 50px; text-align: center"> <!-- CONTENT --> <div class="image-content"><img src="cid:image" alt="image"> </div> <div class="content-text"> <h1 class="text-primary text-center">ยินดีต้อนรับ คุณ $name </h1> <ul> ตอนนี้คุณเป็นส่วนหนึ่งของ นิปปอนเพนต์ และคุณยังได้รับสิทธิพิเศษอีกมากมายดังนี้ <li> ได้รับสิทธิ์ในการดาวน์โหลดโปรแกรมจากเมนู Colour Library </li> <li> สามารถเลือกเก็บผลิตภัณฑ์ และเนื้อหาที่น่าสนใจไว้ดูภายหลังได้ </li> <li> รับคูปองส่วนลดพิเศษในการเลือกซื้อผลิตภัณฑ์จากนิปปอนเพนต์</li> </ul> </div> <a href="https://staging.tanpong.me"> <button class="btn btn-primary">เข้าสู่เว็บไซต์</button> </a> </div> </div> </div> </div> </body></html>
    text; 
    return $body;
}

function EmailFAQ($name , $email , $phone , $question) {
    $body = <<<text
       <!DOCTYPE html><html lang="en"> <head> <meta charset="UTF-8" /> <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <meta name="viewport" content="width=device-width, initial-scale=1.0" /> <title>Document</title> <link rel="preconnect" href="https://fonts.googleapis.com" /> <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin /> <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;500;800&display=swap" rel="stylesheet" /> <style> .content-text ul { text-align: left; padding: 0px 0px 0px 20px; } .content-text ul li {list-style: decimal; } .primary { color: red } .image-content { overflow: hidden; border-radius: 20px; height: 200px; margin: 20px 0; } .image-content img { width: 100%; object-fit: cover; border-radius: 20px; } .text-normal { text-align: left; font-weight: 400; /* width: 200px; */ font-size: 1em; font-weight: 300; margin-top: 0px; } .text-normal label { font-weight: 500; } </style> </head> <body > <div style=" background-color: #f7f7f7; padding: 3em 0; margin: 0px; /* position: absolute; */ top: 0; bottom: 0; left: 0; width: 100%; font-family: 'Kanit', sans-serif; font-weight: 300; height: fit-content; display: flex; align-items: center; justify-content: center; " > <div style=" background: white; border: 1px solid rgba(0, 0, 0, 0.1); width: 100%; height: fit-content; max-width: 600px; margin: 20px auto; border-radius: 5px; padding-bottom: 30px; " > <div style="background-color: #03428e; width: 100%; height: 20px"></div> <div style="padding: 20px 50px 0px; color: #03428e; margin-bottom: 0"> <div style=" border-bottom: 1px solid rgba(0, 0, 0, 0.1); width: 100%; padding-bottom: 20px; " > <div style="width: 128px"> <img src="cid:logo" alt="Nippon Image" style="width: 100%" /> </div> </div> </div> <div style="padding: 20px 50px; text-align: center"> <!-- CONTENT --> <div class="content-text"> <h3 class="text-normal" > เรียนทีม Customer Support </h3> <h3 class="text-normal" ><label>คุณ:</label> $name</h3> <h3 class="text-normal" ><label>อีเมล:</label> $email</h3> <h3 class="text-normal" ><label>เบอร์โทร:</label> $phone</h3> <h3 class="text-normal" ><label>คำถาม:</label> $question </h3> </div> </div> </div> </div> </div> </body></html>
    text;
return $body;
}


function send_email() {
    
  
    // require '/wp/vendor/autoload.php';
    global $phpmailer;
 
    try {
       
    
         
        $phpmailer->isSMTP();
        $phpmailer->CharSet = "utf-8";
        // $phpmailer->Host       = 'smtp-relay.sendinblue.com';
        // $phpmailer->Port       = '587';
        $phpmailer->Host       = '203.151.41.6';
        $phpmailer->Port       = '25';
        // $phpmailer->SMTPSecure = 'tls';
        // $phpmailer->SMTPAuth   = false;
        $phpmailer->SMTPDebug  = 1;
        // $phpmailer->Username   = ''; 
        // $phpmailer->Password = ''; 
        // // // $phpmailer->From       = 'sukhum.n@likemeasia.com';
        // // // $phpmailer->FromName   = 'Sukhum';
        $phpmailer->setFrom('nipponpaintnoreply@nipponpaint.co.th', 'Nippon Paint No Reply');
        // $phpmailer->Subject = "test email wordpress";
        // $phpmailer->Body = EmailBody();
        // $test = $phpmailer->Send();
        // $mail->IsHTML(true); 
        // $test = 1;
        // print_r( EmailBody());
        // var_dump($phpmailer
        // return json_decode(json_encode(["test" =>  $logo ] ));
        return $phpmailer;
    }catch (Exception $e) {
        // // echo 'Caught exception: ',  $e->getMessage(), "\n";
        // var_dump($e);
  
        return  json_decode(json_encode(["error" => $e->getMessage(),] ));
    }
    // remove_filter( 'wp_mail_content_type','set_my_mail_content_type' )
    // remove_action( 'phpmailer_init', 'send_smtp_email' );

}

function registerSuccess( $phpmailer , $email , $name) {
    $phpmailer->addAddress($email, $name);
    $phpmailer->Subject = "ยินดีต้อนรับ! ตอนนี้คุณได้เป็นสมาชิกของนิปปอนเพนต์ พร้อมรับสิทธิพิเศษอีกมากมาย";
    $logo = dirname(__FILE__) . '/assets/images/logo_png.png';
    $bk = dirname(__FILE__) . '/assets/images/image-email-register.jpg';
    $phpmailer->AddEmbeddedImage($logo, 'logo' ,  "logo.png" ); 
    $phpmailer->AddEmbeddedImage($bk, 'image' ,  "image-email-register.png" ); 
    $phpmailer->IsHTML(true); 
    $phpmailer->Body = EmailBodyRegister($name);
    $test = $phpmailer->Send();
}

function send_email_resgister($request) {
    $phpmailer = send_email();
    $phpmailer->addAddress("sukhum.n@likemeasia.com",  "Sukuhm Nilpech");
    $phpmailer->Subject = "Test email Nippon";
    $phpmailer->IsHTML(true); 
    $phpmailer->Body = <<<text
        <div>Test</div>
    text; 
    $test = $phpmailer->Send();
    $SERVER_AR = $_SERVER['SERVER_ADDR'];
return json_decode(json_encode(["test" => "2323" , "SERVER" => $SERVER_AR]));
    
    // registerSuccess( $phpmailer , "sukhum.n@likemeasia.com" ,  "Sukuhm Nilpech");
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'api/v1', '/email/', array(
      'methods' => 'get',
      'callback' => 'send_email_resgister',
      'permission_callback' => '__return_true'
    ) );
  } );


  function EmailBodyResetPassword($name , $link) {
    $body  = <<<text
       <!DOCTYPE html><html lang="en"> <head> <meta charset="UTF-8" /> <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <meta name="viewport" content="width=device-width, initial-scale=1.0" /> <title>Document</title> <link rel="preconnect" href="https://fonts.googleapis.com" /> <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin /> <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;500;800&display=swap" rel="stylesheet" /> <style> .content-text ul { text-align: left; padding: 0px 0px 0px 20px; } .content-text ul li {list-style: decimal; } .primary { color: red } .image-content { overflow: hidden; border-radius: 20px; height: 200px; margin: 20px 0; } .image-content img { width: 100%; object-fit: cover; border-radius: 20px; } .btn { padding: 10px 30px; width: 100%; border-radius: 4px; max-width: 300px; margin-top: 30px; background-color:#03428E ; color:white;border:0px; font-weight: 300; font-family: 'Kanit', sans-serif; } .text-primary { color:#03428E ; font-weight: 500; } .text-center { align-items: center; } </style> </head> <body > <div style=" background-color: #f7f7f7; padding: 3em 0; margin: 0px; /* position: absolute; */ top: 0; bottom: 0; left: 0; width: 100%; font-family: 'Kanit', sans-serif; font-weight: 300; height: fit-content; display: flex; align-items: center; justify-content: center; " > <div style=" background: white; border: 1px solid rgba(0, 0, 0, 0.1); width: 100%; height: fit-content; max-width: 600px; margin: 20px auto; border-radius: 5px; padding-bottom: 30px; " > <div style="background-color: #03428e; width: 100%; height: 20px"></div> <div style="padding: 20px 50px 0px; color: #03428e; margin-bottom: 0"> <div style=" border-bottom: 1px solid rgba(0, 0, 0, 0.1); width: 100%; padding-bottom: 20px; " > <div style="width: 128px"> <img src="cid:logo" alt="Nippon Image" style="width: 100%" /> </div> </div> </div> <div style="padding: 20px 50px; text-align: center"> <!-- CONTENT --> <div class="content-text"> <h1 class="text-primary text-center">ยินดีต้อนรับ คุณ $name </h1> <p style="text-align: left;"> เราได้รับแจ้งการลืมรหัสผ่านของคุณ หากคุณต้องการรีเซ็ตรหัสผ่านใหม่ สามารถกดปุ่มด้านล่างเพื่อรีเซ็ตได้ทันที </p> </div> <a href="$link"> <button class="btn btn-primary">รีเซ็ตรหัสผ่าน</button> </a> </div> </div> </div> </div> </body></html>
    text; 

    return $body;

  }



  function send_email_lost_password($request){ 
    $data = $request->get_body();
    $toArray = json_decode($data);
    if(!isset($toArray->emailVal)):
        status_header(400);
        return json_decode(json_encode(["message" => "email_empty"]));
    endif;
    $user = get_user_by( 'email',$toArray->emailVal );
    $token = get_password_reset_key($user  );
    $phpmailer = send_email();
    $phpmailer->addAddress($toArray->emailVal,   $user->data->display_name);
    $phpmailer->Subject = "นิปปินเพนต์ เข้าสู่ระบบ - รีเซตรหัสผ่าน";
    $logo = dirname(__FILE__) . '/assets/images/logo_png.png';
    $phpmailer->AddEmbeddedImage($logo, 'logo' ,  "logo.png" ); 
    $phpmailer->IsHTML(true); 
    $link = get_site_url()  . "/reset-password?token=". $token . "&user_login=".$user->data->user_login;
    $phpmailer->Body = EmailBodyResetPassword($user->data->display_name , $link);
    $phpmailer->Send();
    return json_decode(json_encode(["link" =>   $link  , "message" => "OK"]));

  }



  add_action( 'rest_api_init', function () {
    register_rest_route( 'api/v1', '/lost_password/', array(
      'methods' => 'post',
      'callback' => 'send_email_lost_password',
      'permission_callback' => '__return_true'
    ) );
  } );
 
 function func_reset_password($request) {
    $data = $request->get_body();
    $toArray = json_decode($data);
    $user = get_user_by( 'login',$toArray->emailVal );
    reset_password($user , $toArray->password);
    return json_decode(json_encode([
        "message" => "OK"
    ]));
 }
  add_action( 'rest_api_init', function () {
    register_rest_route( 'api/v1', '/reset_password/', array(
      'methods' => 'post',
      'callback' => 'func_reset_password',
      'permission_callback' => '__return_true'
    ) );
  } );
 
 


  function saveCurrent() {
    global $wp;

    // $checkWpLoginPageg = in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
//     if(! $checkWpLoginPageg) {
//  if(!is_user_logged_in()):
//         wp_safe_redirect( wp_login_url() );
//     endif;

//     }
   

    $current_url = home_url(add_query_arg(array(), $wp->request));
    $match = "";
    $checkWpLoginPageg = in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
    $terms =  get_the_terms( get_the_ID(), "category" );
    $checkPrivacyPolicy = false;

    if(get_post_type() == "post"):
        foreach($terms as $term):
            if(preg_match("/privacy-policy/", $term->slug)):                
                $checkPrivacyPolicy  = true;
            endif;
        endforeach;
    endif;
    if(!$checkWpLoginPageg && !$checkPrivacyPolicy):
        setcookie('url_latest',$current_url , time()+3600 , "/");

    endif;

    // echo "saveCurrent : checkPrivacyPolicy " . $checkPrivacyPolicy;

  }


  add_action("save_current_url" , "saveCurrent");
  function checkUserAddedInfoSuccess() {
    global $wp;
    $current_url = home_url(add_query_arg(array(), $wp->request));
    $checkWpLoginPageg = in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
    
    if(!$checkWpLoginPageg):
        if(is_user_logged_in()):
            $checkUserInfo = checkUserInfo();
            if($checkUserInfo["save_cookies"]):
                setcookie("check_info_user" , get_current_user_id() , time() + 3600 , "/");
            endif; 
            if($checkUserInfo['success']):
                echo "";
            else:
                wp_logout();
            endif;
            // $userId = get_current_user_id();
            // if(isset($_COOKIE["check_info_user"])):
            //     if($userId == $_COOKIE['check_info_user']):
            //         echo "";
            //     endif;
            // else:
               
            //     $query = new WP_Query([
            //         'post_type' => "user_custom_field",
            //         "meta_query" => [
            //             [
            //                 [
            //                     "key" => "user_id",
            //                     "value"  => get_current_user_id() ,
            //                     "compare" => "LIKE"
            //                 ],
            //             ]
            //         ]
            //     ]);
            //     $found_posts = $query->found_posts;
            //     if($found_posts == 0):
            //         wp_logout();
            //     else:
                    
            //         setcookie("check_info_user" , get_current_user_id() , time() + 3600 , "/");
            //     endif;
            // endif;
            
        endif;
     
   endif;
  }


  add_action("check_user_add_info" , "checkUserAddedInfoSuccess");


  function registerHeader($args) {
    $link = $args['link'];
    $site = get_site_url();
    $addInfoSuccess = "";
    $checkUserInfo = checkUserInfo();
   
    if($checkUserInfo['success']):
        $addInfoSuccess = $checkUserInfo['user'];
    endif;
    if(is_user_logged_in() &&  $addInfoSuccess):

        echo   <<<text
            <div class="user-div">
                <a href="$link">
                <h5><i class="bi bi-person-fill"></i> บัญชีของฉัน</h5>
                </a>
            </div>   
        text;

    else:
        echo <<<text
            <div class="header-login-register row">
                <div class="col-6">
                    <a href='$site/wp-login.php?action=register'>
                        <button>ลงทะเบียน</button>
                    </a>
                </div>
                <div class="col-6 login-link">
                    <a  href='$site/wp-login.php'>
                        <button>
                        <i class="bi bi-person-fill"></i> 
                        เข้าสู่ระบบ</button>
                    </a>
                </div>
            </div>
        text;
    endif;
  }
  add_action("header-user-nav" , "registerHeader" , 10, 1);                 


  function registerHeaderMobile($args) {
    $link = $args['link'];
    $site = get_site_url();
    $addInfoSuccess = "";
    $checkUserInfo = checkUserInfo();
   
    if($checkUserInfo['success']):
        $addInfoSuccess = $checkUserInfo['user'];
    endif;
    if(is_user_logged_in() &&  $addInfoSuccess):

        echo   <<<text
            <div class="user-div-mobile">
                <a href="$link">
                <h5><i class="bi bi-person-fill"></i> </h5> บัญชีของฉัน
                </a>
            </div>   
        text;

    else:
        echo <<<text
            <div class="header-login-register-mobile">
                <div  class="header-login-first" >
                    <a href='$site/wp-login.php?action=register'>
                    <h5><i class="bi bi-person-fill"></i> </h5> ลงทะเบียนw
                    </a>
                </div>
                <div class="header-login-two" >
                    <a  href='$site/wp-login.php'>
                        เข้าสู่ระบบ
                    </a>
                </div>
            </div>
        text;
    endif;
  }
  add_action("header-user-nav-mobile" , "registerHeaderMobile" , 10, 1);   

  function shareButton($args) {
    $tb =  get_bloginfo("template_directory");
    $fb = $tb . "/assets/images/FB-black.svg";
    $line = $tb . "/assets/images/Line-black.svg";
    $tw = $tb . "/assets/images/Twitter-black.svg";
    $in = $tb . "/assets/images/Linkin-black.svg";
    $pt = $tb . "/assets/images/print_t_b.svg";
    $cp = $tb . "/assets/images/copy.svg";
    $per_link = $args["link"];
    $title =  $args["title"];
    $sub_title =  $args["sub_title"];
    $linkFb = "https://www.facebook.com/sharer/sharer.php?u=$per_link";
    $linkLine = "https://social-plugins.line.me/lineit/share?url=$per_link";
    $linkTW = "https://twitter.com/intent/tweet?text=$title&url=$per_link";
    $linkIN = "https://www.linkedin.com/shareArticle?mini=true&url=$per_link&title=$title";
    echo <<<txt
        <div class="share-box">
            <h4 class="text-center">$sub_title</h4>
            <div class="social-div">
                <a target="_blank"  href="$linkFb"><img src="$fb" alt=""></a>
                <a target="_blank"  href="$linkLine"><img src="$line" alt=""></a>
                <a target="_blank"  href="$linkTW"><img src="$tw" alt=""></a>
                <a target="_blank"  href="$linkIN"><img src="$in" alt=""></a>
                <a target="_blank" class="copyLink" onclick="copyThisLink('$per_link')"><img src="$cp" alt=""></a>
            </div>
        </div>
    txt;

  }

  add_action("share-button" , "shareButton" , 10, 1);                 



  // test_clickup



function check_user_exists($request) {

    $parameters = json_decode($request->get_body());
    $user =  get_user_by("email" ,  $parameters->emailVal);
    if($user) {
        return json_decode(json_encode(["message" => "user_exists" ]));
    }
        return json_decode(json_encode(["message" => "OK" ]));
}


  add_action( 'rest_api_init', function () {
    register_rest_route( 'api/v1', '/user/check_user_exists/', array(
      'methods' => 'POST',
      'callback' => 'check_user_exists',
      
      'permission_callback' => '__return_true'
    ) );
  } );




  function getPrivacyPolicyPage() {
    $lang=get_bloginfo("language");  
    $argc = [
        "lang" => $lang,
        "post_type" => "post",
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field'    => 'slug',
                'terms'    => 'privacy-policy-'. strtolower($lang),
            ),
        ),
        'posts_per_page' => -1,
        "post_status" => "published"
    ];
    $query_post_href = new WP_Query($argc);

    $href = "";
    if($query_post_href->have_posts()){
        while($query_post_href->have_posts()) {
            $query_post_href->the_post();
            $href = get_permalink();
        }
    }
    wp_reset_query();
    return $href;
  }


  function check_new_vs_update($post_id){
    $myPost        = get_post($post_id);
    $post_created  = new DateTime( $myPost->post_date_gmt );
 
    $diff = $pos_created->diff(new DateTime());
    // $diff          = $created->diff( $modified );
 
    $checkNewPost = 0;
    if( $diff->d <= 3 && $diff->m == 0 && $diff->y == 0 ){
        // New post
    $checkNewPost = 1;
    }else{
        // Updated post
    }
    return  $checkNewPost;
}
// add_action('check_new_vs_update', 'check_new_vs_update' , 10 , 1 );





add_action("init" , function() {
	register_post_type("media_news" , [
	'public' => true ,
	"labels" => ['name' => "Medias & News"   , "singular_name" => "Media & New"],
    'hierarchical' => true,
    "show_in_rest" => true,
    'supports'		=> array('title', 'editor', 'thumbnail' ),
     
 
	]);
  
    
    register_taxonomy( 'media_cat', 'media_news', array(
        'hierarchical' => true, 
        'label' => 'Meia Category', 
        "show_in_rest"=> true,
        'singular_label' => 'Meia Categories', 
         
        )
    );
});