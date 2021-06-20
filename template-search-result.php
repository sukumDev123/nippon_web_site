<?php   /** Template Name: Search Result */ ?>
<?php 
get_header();
$featured_img_url = get_the_post_thumbnail_url( get_the_ID(),'full'); 
 
$lang=get_bloginfo("language");  
$product_search = "";
if(isset($_GET['product_search'])):
    $product_search = $_GET['product_search'];
endif;
$text_static = [
    "en" => [
        "product_title" => "Product",
        "product_link_title" => "More",
        "product_link" =>  get_site_url() . "/products/" .  $product_search,
        "project_title" => "บทความโครงการที่ใช้สีนิปปอนเพนต์",
        "project_link" =>  get_site_url() . "/project-reference/",
        "project_link_title" => "บทความเพิ่มเติม",
        "news_title" => "ข่าวสารและกิจกรรม",
        "news_link" =>  get_site_url() . "/news/",
        "news_link_title" => "บทความเพิ่มเติม"
        
    ],
    "th" => [
        "product_title" => "ผลิตภัณฑ์",
        "product_link_title" => "ค้นหาผลิตภัณฑ์เพิ่มเติม",
        "product_link" => get_site_url() . "/products/" . $product_search,
        "project_title" => "บทความโครงการที่ใช้สีนิปปอนเพนต์",
        "project_link" =>  get_site_url() . "/project-reference/",
        "project_link_title" => "บทความเพิ่มเติม",
        "news_title" => "ข่าวสารและกิจกรรม",
        "news_link" =>  get_site_url() . "/news/",
        "news_link_title" => "บทความเพิ่มเติม"
        

    ]
][$lang];
?>
<?php 

if(isset($_GET["product_search"])) :
    if($_GET['product_search']) :
        $product_search = $_GET['product_search'];
    endif;   
endif;



$argc_product = [
    "post_type"  => "product" , 
    'posts_per_page' => 4 ,
    "tax_query" => [
        [
            "taxonomy" => "product_cat",
            'field' => "name",
            "terms" => $product_search,
            
        ]
    ],
]; 




$query_products = new WP_Query($argc_product); 
$product_id = [];
$meta_query_project = [];
// print_r($query_products );

if($query_products->have_posts()): while($query_products->have_posts()) : $query_products->the_post();
    array_push($product_id  , get_the_ID());
   
endwhile ; endif; wp_reset_query();


  
if(count($product_id) ) :
    $product_query = [
        "relation" => "OR"
    ];
    // $argc_project["meta_query"] = $meta_query_project;
    foreach($product_id as $p_id):
        array_push( $product_query ,   [
                    "key" => "products",
                 "value"  => '"'. apply_filters( 'wpml_object_id', $p_id  , 'ID' ) .'"',
                 'compare' => "LIKE"
             ]);
    endforeach;
    $meta_query_project  = $product_query;
endif;
 

$argc_project = [
    "post_type"  => "project" , 
    'posts_per_page' => 3  , 
    "meta_query" => $meta_query_project
];  
$argc_new = [
    "post_type"  => "news" , 
    'posts_per_page' => 3  , 
    "meta_query" => $meta_query_project
];  
 
?>
 

<div class="page-bk-search">

    <!-- <div class="page-bk-image"> -->
    <img alt="logo" src="<?php echo $featured_img_url ?>"  class="image-logo-desktop" />
    <div class="image-logo-bk"> </div>
    <!-- </div> -->
    <div class="page-detail">
            <h1><?php the_title();  ?></h1>
        
    </div>
</div>



<div id="search-result">
    <div  id="products-1">
        <div class="container">
                <div class="title">
                        <h1><?php echo $text_static['product_title'] ?></h1>
                        <a href="<?php echo $text_static["product_link"] ?>"><?php echo $text_static['product_link_title'] ?>   </a>
                </div>
                <div class="products-card">
                <?php 
                    $query_products = new WP_Query($argc_product); 
                    if( $query_products->have_posts()):
                        while($query_products->have_posts()):
                            $query_products->the_post();
                            
                            $featured_img_url = get_the_post_thumbnail_url( get_the_ID(),'full');
                            $title = get_the_title(get_the_ID());
                            ?>
                            <div class="product-card">
                                    <a href="<?php echo get_permalink(get_the_ID()) ?>">
                                <img src="<?php echo $featured_img_url ?>" alt="image">
                                <h4>
                                        <span class="d-inline-block text-truncate" style="max-width: 240px;">
                                            <?php echo $title ?>
                                        </span> 
                                </h4>
                                <p><?php echo get_the_excerpt(get_the_ID()) ?></p>

                                    </a>


                        </div>
                            <?php 

                        endwhile;
                    endif; wp_reset_query();
            
                ?>
    
            </div>  
            </div>
    </div>




    
    <div id="news" class="container" >
        <div class="header-link">
            <h1 class="product_title"><?php echo $text_static['project_title'] ?></h1>
            <a href="<?php echo $text_static["project_link"] ?>"><?php echo $text_static['project_link_title'] ?>   </a>

        </div>
        <div class="news-div">  
        <?php 
        $size_data  = 0 ;
            $query_project = new WP_Query($argc_project ); 
            if($query_project->have_posts()): while($query_project->have_posts()) : $query_project->the_post(); 
                $size_data += 1;
                $modal_header    = get_field('text_example' ,  get_the_ID()) ;
                $photos = acf_photo_gallery("photos" , get_the_ID());
            
                $_image = false;
                // echo $photos[0]["thumbnail_image_url"]; 
                foreach($photos as $image):
                    $full_image_url= $image['full_image_url']; 
                    $thumbnail_image_url=  acf_photo_gallery_resize_image($full_image_url, 403, 271);
                    $_image =  $thumbnail_image_url;
                    break;
                endforeach;
            ?>
                <div>
                <?php 
                if($_image):
                    ?>
                    <img src="<?php echo $_image; ?>" alt ="image" />
                    <?php 
                endif;
                
                ?>
                    <div class="content">
                <div>
                        <h1>
                                <?php the_title(); ?>
                            <!-- </a> -->
                        </h1>
                        <?php echo get_field("short_text" , get_the_ID());  ?> 
                        </div>
                            <div  class="d-flex  justify-content-between button-love-share">
                            <div class="d-flex  align-items-center">
                                <h5 class="me-4">
                                        <i class="fas fa-eye"></i>
                                        <?php echo   pvc_get_post_views(get_the_ID()) ?>
                                    </h5>
                                    <h5>
                                        <i  class="fas fa-share"></i>
                                    <?php if( get_post_meta( get_the_ID(), 'shares', true)):  echo get_post_meta( get_the_ID(), 'shares', true); else: echo 0;  endif; ?>
                                    </h5>
                            </div>
                            <i style="cursor:pointer" id="heart<?php echo get_the_ID() ?>" onclick="onLikeClicked(<?php echo get_the_ID() ?>)" class="far fa-heart"></i>
                            </div>
                        
                        </div>
                </div>
            
                <?php endwhile; else: endif;  wp_reset_query();
            ?>

        </div>
    </div>




    <div id="news" class="container" >
    <div class="header-link">
            <h1 class="product_title"><?php echo $text_static['news_title'] ?></h1>
            <a href="<?php echo $text_static["news_link"] ?>"><?php echo $text_static['news_link_title'] ?>   </a>

        </div>
        <div class="news-div">
        <?php 
            $query_news = new WP_Query($argc_new ); 
            if($query_news->have_posts()): while($query_news->have_posts()) : $query_news->the_post(); 
                $size_data += 1;
                $modal_header    = get_field('text_example' ,  get_the_ID()) ;
                $photos = acf_photo_gallery("photos" , get_the_ID());
            
                $_image = false;
                // echo $photos[0]["thumbnail_image_url"]; 
                foreach($photos as $image):
                    $full_image_url= $image['full_image_url']; 
                    $thumbnail_image_url=  acf_photo_gallery_resize_image($full_image_url, 403, 271);
                    $_image =  $thumbnail_image_url;
                    break;
                endforeach;
            ?>
                <div>
                <?php 
                if($_image):
                    ?>
                    <img src="<?php echo $_image; ?>" alt ="image" />
                    <?php 
                endif;
                
                ?>
                <div class="content">
                    <h1>
                        <a href="<?php  echo get_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h1>
                    
                    <p><?php echo  $modal_header;  ?></p> 
                    <h5> <i class="far fa-calendar-alt"></i> <?php " ".the_date("d/M/Y"); ?></h5>
                
                
                </div>
                </div>
            
                <?php endwhile; else: endif;  wp_reset_query();
            ?>

        </div>
    </div>
</div>
<?php get_footer() ?>