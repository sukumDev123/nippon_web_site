<?php 
add_post_type_support( 'page', 'excerpt' );
define ('SITE_ROOT', realpath(dirname(__FILE__)));
require_once( ABSPATH . 'wp-admin/includes/file.php' );
function load_stylesheets() {
     
  
    wp_register_style("stylesheet" , get_template_directory_uri() . '/style.css' , '' , 1 , 'all');
    wp_enqueue_style("stylesheet");
    wp_register_style("swiper" ,'https://unpkg.com/swiper@5.3.8/css/swiper.min.css' , '' , 1 , 'all');
    wp_enqueue_style("swiper");
    wp_register_style("custom" , get_template_directory_uri() . '/assets/css/main.css' , '' , 1 , 'all');
    wp_enqueue_style("custom");
    wp_register_style("bootstrap" , 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css' , '' , 1 , 'all');
    wp_enqueue_style("bootstrap");
 
    // // 
    wp_register_style("semantic" , get_template_directory_uri() . '/assets/semantic/semantic.min.css'  );
    wp_enqueue_style("semantic");

    // wp_register_style("fontawesome" , get_template_directory_uri() . '/assets/fontawesome/css/all.min.css' , '' , 1 , 'all');
    // wp_enqueue_style("fontawesome");


   
}

add_action('wp_enqueue_scripts' , "load_stylesheets");

function load_js() {
    wp_register_script("custom" ,  get_template_directory_uri() . '/app.js' , 'jquery' , 1 , true);
    wp_enqueue_script("custom");

    wp_register_script("jquery" , 'https://code.jquery.com/jquery-3.1.1.min.js' , 'jquery' , 1 , true);
    wp_enqueue_script("jquery");
    wp_register_script("swiper" , 'https://unpkg.com/swiper@5.3.8/js/swiper.min.js' , 'jquery' , 1 , true);
    wp_enqueue_script("swiper");
    wp_register_script("bootstrap" , 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js' , 'jquery' , 1 , true);
    wp_enqueue_script("bootstrap");
    wp_register_script("semantic" , get_template_directory_uri() . '/assets/semantic/semantic.min.js' , '' , 1 , 'all');
    wp_enqueue_script("semantic");
    // wp_register_script("se" , get_template_directory_uri() . '/assets/semantic/se.js' , '' , 1 , 'all');
    // wp_enqueue_script("se");
    wp_register_script("fontawesome" , get_template_directory_uri() . '/assets/fontawesome/js/all.min.js' , '' , 1 , 'all');
    wp_enqueue_script("fontawesome");
    wp_register_script("form" ,  get_template_directory_uri() . '/src/form.js' , '' , 1 , true);
    wp_enqueue_script("form");
    wp_register_script("capcha" , "https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explici" , '' , 1 , true);
    wp_enqueue_script("capcha");
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
	register_post_type("Careers" , [
	'public' => true ,
	"labels" => ['name' => "Careers"   , "singular_name" => "Career"],
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
        ]);
   
}
add_action("init" , "intiNews");
function initTypeUser() {
 
        register_post_type("type_user" , [
        'public' => true ,
        'labels' => array('name' => 'User Types' , 'singular_name' => 'User TYpe'),
        'hierarchical' => true,
        'has_archive' => true,
 
        
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
 
 
function initProject() {
 
      
     
        register_post_type("project" , [
            'public' => true ,
            'labels' => array('name' => 'Projects' , 'singular_name' => 'Project'),
            'hierarchical' => true ,
            'has_archive'  => true,
            'show_in_rest' => true ,
            'taxonomies'   => array(  'tags' , 'project_cate'   ),
            // 'supports'		=> array('title', 'editor', 'thumbnail'),
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
     
    if(isset($_FILES["upfile"]))
{

	$extension = pathinfo($_FILES["upfile"]['name'], PATHINFO_EXTENSION);

	$new_name = time() . '.' . $extension;

    $image=basename($_FILES['upfile']['name']);
    $image=str_replace(' ','|',$image);
    var_dump($image);
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

            return json_decode( json_encode(["id" => $id_file_post]));
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
      
    ) );
  } );
add_action( 'rest_api_init', function () {
    register_rest_route( 'api/v1', '/save_user_info/', array(
      'methods' => 'post',
      'callback' => 'save_users',
      
    ) );
  } );

  function save_career($request) {
    $data = $request->get_body();
    $toArray = json_decode($data);
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
        "post_type" => "careers",
        "post_status" => "publish"
    ];
   $create =   wp_insert_post($postArr);
 
    return json_decode(json_encode(["message" => "success" ,"LL" => $toArray , "f" =>  $create]));
  }
add_action( 'rest_api_init', function () {
    register_rest_route( 'api/v1', '/career/save/', array(
      'methods' => 'post',
      'callback' => 'save_career',
      
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
    get_template_part("templates/auth/signin" , null , [
        "user_login" => $user_login,
        "aria_describedby_error" => $aria_describedby_error
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
function register_user(
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
    $user = wp_insert_user( $userdata );

    if ( is_wp_error( $userdata ) ) {
        return json_decode(json_encode(["message" =>  $userdata ]));

    }  
 
    return json_decode(json_encode(["message" => "success" , "user" => json_encode($user) , "dd" => $toArray->$email]));

}
add_action( 'rest_api_init', function () {
    register_rest_route( 'api/v1', '/user/create', array(
      'methods' => 'post',
      'callback' => 'register_user',
      
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


function add_login_redirect() {
     if(!is_user_logged_in()):

        setcookie("latest_page" , get_permalink()  , time() * 300 , "/");
    endif;
    echo  get_permalink();


    $redi =  get_site_url();
    if(isset($_COOKIE["latest_page"])):
        $redi = $_COOKIE["latest_page"];
    endif;
    echo $redi; ;
    return $redi;
         
}

add_filter( 'login_redirect', "add_login_redirect");