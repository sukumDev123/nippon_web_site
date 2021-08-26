<?php   /** Template Name: Project */ ?>
<?php get_header(); get_template_part("other/loading"); ?>
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
if(isset($_GET["paged_show"])) {
    $limit_page = $_GET["paged_show"];
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

$getFavs = getFavoritesData("problem-and-solution");  
$data_favorites = $getFavs["datas"];  
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
    <div class="card-blogs-div ui stackable three column grid">
        <?php 
            // $args = [
            //     "post_type" => 'how_to_paint',
            //     'post_status' => 'publish',
            //     "posts_per_page" =>  $page,
            //     "orderby" => "order",
            //     'order' => 'ASC' 
            // ];
            // if($cate != ""):
            //     $cate  = $cate;
            //     $args["tax_query"]  = [
            //         [
            //         'taxonomy' => 'problem_and_solution_cate',
            //         'field' => 'name',
            //         'terms' =>   $cate,
            //         'include_children' => true,
            //         'operator' => 'IN'
            //      ]
            //     ];
               
            // endif;
            // $solutions = [];
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
            $count = $query->found_posts;   
            $solution_id = 0;
            $index = 0;
            while ($query->have_posts()) {
            $query->the_post();
         
    
            $featured_img_url = get_the_post_thumbnail_url( get_the_ID(),'full');

                $userId = FALSE;
                if(get_current_user_id()):
                    $userId = get_current_user_id();
                endif;
                $checkFav = FALSE;
                if(isset($data_favorites[get_the_ID()])):
                    $checkFav = TRUE;

                endif;
                
            get_template_part("components/card-blog" , null , [
                "title" => get_the_title(),
                "detail" => get_field("short_text"),
                "image" =>  $featured_img_url,
                "user_id" => $userId,
                "id" => get_the_ID(),
                "favorite" =>  $checkFav,
                "index" => $index,
                "type_blog" => "problem-and-solution",
                "new" => FALSE,
            ]);
            $index += 1;
            }
            wp_reset_query();
            
            ?>
     </div>
   
     <?php if($count >  $limit_page):   ?>
        <div class="see_more">
            <a  href="<?php $limit_page = $limit_page +  6;  echo  get_permalink(get_the_ID())."?paged_show=".$limit_page ?>">ดูเพิ่มเติม</a>
        </div>
        <?php endif; ?>

        <?php do_action("empty_page" , ["count" => $count ]) ?>

     
 </div>
</div>
 
 
<script>
<?php 
        if(isset($_GET["filter_product"]) || isset($_GET["type"])) :
?>
setTimeout(() => {
    document.querySelector(".page-filter").scrollIntoView({behavior: "smooth" , block: "start"})
} , 100);
<?php

        endif;

?>
    function onLikeClicked(id) {
        fetch("<?php  echo get_permalink(); ?>" + "?id=" + id + "&type=" + "liked").catch(error => console.log({error}));
        document.querySelector("#heart"+ id).className = "fas fa-heart";
    }
</script>
 
<?php get_footer(); ?>
