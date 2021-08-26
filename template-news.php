
<?php get_header(); get_template_part("other/loading"); ?>

<?php 
 
 /** Template Name: News */
$first_page = 0;
$limit_page = 9;
if(isset($_GET["paged_show"])) {
    $limit_page = $_GET["paged_show"];
}
// echo $limit_page;
$userId = FALSE;
if(get_current_user_id()):
    $userId = get_current_user_id();
endif;

$getFavs = getFavoritesData("problem-and-solution");  
$data_favorites = $getFavs["datas"];  
 ?>
 

 <?php get_template_part("pages/page-bk-2");  ?>


<div id="news" class="container">
  
    <?php if(get_field("news")): ?>
    <h2>ข่าวสารที่น่าสนใจ</h2>
    <div class="card-blogs-div ui stackable three column grid mt-3">
    <?php 
    $indexSuggesion = 0;
    $news = get_field("news");
           foreach($news as $new) : 
            $featured_img_url = get_the_post_thumbnail_url($new->ID,'full');
                
            $checkFav = FALSE;
            if(isset($data_favorites[$new->ID])):
                $checkFav = TRUE;

            endif;
            get_template_part("components/card-blog" , null , [
                "title" => get_the_title($new->ID),
                "detail" => get_field("short_text" , $new->ID),
                "image" =>  $featured_img_url,
                "user_id" => $userId,
                "id" => $new->ID,
                "favorite" =>  $checkFav,
                "index" => $indexSuggesion,
                "type_blog" => "problem-and-solution",
                "new" => FALSE,
            ]);
            $indexSuggesion++;
             endforeach;  
        ?> 
    </div>
    <div class="mt-5rem"></div>
    <?php  endif; ?>
    <h2>ข่าวสารและกิจกรรม</h2>

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
                "post_type"  => "news" , 
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

<?php get_footer(); ?>
