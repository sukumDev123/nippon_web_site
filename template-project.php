<?php   /** Template Name: Project */ ?>
<?php get_header(); ?>
<?php 
$first_page = 0;
$size_data = 0;
$limit_page = 9;
$liked = [];
$lang=get_bloginfo("language");  

$text_static = [
    "en" => [
        "filter" => "",
        "search" => "Search"
    ],
    "th" => [
        "filter" => "",
        "search" => "ค้นหา"
    ]
][$lang];
if(isset($_GET["limit"])) {
    $limit_page = $_GET["limit"];
}
$product_value = "";
$project_value = "";
if(isset($_GET['filter_product'])):
    $filter_product = $_GET['filter_product'];
    if($filter_product):
        $product_arc = [
            "post_type" => "product" , 
            'p' , intval($filter_product) , 
            'posts_per_page' => 1  
        ];
        $query_product = new WP_Query($product_arc);
        if($query_product->have_posts()):
            while($query_product->have_posts()):
                $query_product->the_post();
                $product_value = get_the_title(intval($filter_product));
       

            endwhile;
        endif;
    endif;
    wp_reset_query();
endif;
if(isset($_GET['type'])):
    $filter_type = $_GET['type'];
    if($filter_type):
        $project_value =   get_term_by('term_id',  intval( $filter_type), 'project_cate');
    endif;
endif;
?>
<?php get_template_part("pages/page-bk");  ?>
<div class="page-filter">
<?php $primary_categories = get_terms('project_cate', array('hide_empty' => false)); ?>
    <div>
        <!-- <div> -->
            <form action="<?php get_permalink() ?>" method="GET">
                <h5><?php echo $text_static['filter']  ?></h5>

                <div id="categories_project_filter" class="selected-filter">
                    <div  class="bk-filter-select"></div>
                    <div class="filter_div">
                    <div class="select-input">
                        <input 
                            type="text" 
                            id="show_cate" 
                            value="<?php if($project_value): echo $project_value->name; else: echo 'Select Categories'; endif; ?>" 
                            readonly 
                        />
                        <input 
                            type="hidden" 
                            name="type" 
                        />
                        <i class="fas fa-chevron-down cgi"></i>
                    </div>
                    <ul>
                    <?php foreach ($primary_categories as $primary_category) :$post_cats = get_the_category();     
                    ?>
                            <li 
                                onclick="select_project_name('<?php  echo $primary_category->name  ?>' , '<?php echo $primary_category->term_id ?>')"><?php echo  $primary_category->name ?></li>
                    <?php 
                        endforeach;
                    ?>
                       
                    </ul>
                   </div>
                </div> 


               

                <div id="product_filter" class="selected-filter">
                <div class="filter_div">
                   
                    <div class="select-input">
                     <input type="text" id="show_product" placeholder="Select product" value="<?php if( $product_value): echo  $product_value; else: echo "Select Product"; endif; ?>"  readonly>
                        <input type="hidden" name="filter_product"  >
                        <i class="fas fa-chevron-down pfi"></i>
                   </div>
                    <ul>
                        <?php 
                            
                            $argc = ["post_type" => "product" , "posts_per_page"  => -1 ];
                            $query = new WP_Query($argc);
                            $i = 0;
                            if($query->have_posts()):
                                while($query->have_posts()):
                                    $query->the_post();
                                
                        ?>
                            <li onclick="select_product_id('<?php echo get_the_title() ?>' ,'<?php echo get_the_ID(); ?>')"><?php echo get_the_title() ?></li>   
                        <?php
                            endwhile;
                            endif;
                            wp_reset_query();
                        ?>
                    </ul>

                </div>
                </div>

           
            <button type="submit" class="btn-search"><?php echo $text_static["search"] ?></button>
        </form>
    
        <!-- </div> -->
    </div>
</div>


<div id="news" class="container">

 
 
    <div class="news-div">
    <?php 
        $filter_product  = '';
        $meta_query = [];
        $argc = [
            "post_type"  => "project" , 
            'posts_per_page' => $limit_page  , 
            
        ];   
        if(isset($_GET["filter_product"])) :
            if($_GET['filter_product']) :
                $filter_product = $_GET['filter_product'];
                $product_relation = [
                    "key" => "products",
                    "value"  => '"'. $filter_product .'"',
                    'compare' => "LIKE"
                ];
                
                array_push($meta_query ,  $product_relation);
            endif;   
        endif;
     
        if(isset($_GET['type'])) :
            if($_GET['type']):
              
                $argc["tax_query"]  =  [
                    [
                        'taxonomy' => 'project_cate',
                        'field' => 'term_id',
                        'terms' =>  [intval($_GET["type"])],
                        'include_children'  => true,
                        'operator' => 'IN' 
                    ]
                ];  
            endif;
        endif;
        if(count($meta_query) ) :
            $argc["meta_query"] = $meta_query;
        endif;
        $query = new WP_Query($argc);
    ?>
    <?php 
    if($query->have_posts()): while($query->have_posts()) : $query->the_post(); 
        $size_data += 1;
        $modal_header    = get_field('text_example');
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
            <a href="<?php  echo get_permalink(); ?>">
          
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
            </a>
            </div>
        
            <?php endwhile; else: endif;  wp_reset_query();
        ?>    
    </div>
    <?php 
    if($size_data >= 9) {
        ?>

        <h5 class="see-more">
            <?php $limit_p = $limit_page + 3; ?>
            <a href="<?php echo  get_permalink() . "?limit=" .  $limit_p ?>" >See more</a>
        </h5>
        <?php 
    }
    ?>
    
</div>
 
<script>
    function onLikeClicked(id) {
        fetch("<?php  echo get_permalink(); ?>" + "?id=" + id + "&type=" + "liked").catch(error => console.log({error}));
        document.querySelector("#heart"+ id).className = "fas fa-heart";
    }
</script>
 
<?php get_footer(); ?>
