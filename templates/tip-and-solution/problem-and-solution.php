 














<?php 
 
 
$detail = [];
 
$parent_title = get_the_title($post->post_parent);
$postId =   get_top_ancestor_id();
$thisPostId = $post->ID;
$lang=get_bloginfo("language");  
 
 ?>
<?php 
$page = 9;
if(isset($_GET['paged_show'])):
    $page = intval($_GET['paged_show']);

endif;
get_template_part("other/loading");
$featured_img_url = get_the_post_thumbnail_url($postId,'full');
?>
<div class="page-bk"> 
    <img alt="logo" src="<?php echo $featured_img_url ; ?>"  class="image-logo-bk" />
    <div class="image-logo-bk"> </div>
    <div class="page-detail">
        <h1><?php echo get_the_title($postId ); ?></h1>
        <p>
            <?php echo get_field("short_text" , $postId); ?>
        </p>
    </div>
</div>


</div>



<div class="menus-solution">
    <div class="container">
        <a href="<?php echo get_site_url() ?>/tips-and-solutions/product-solutions/">  Product Solutions </a>
        <a  class="active" href="<?php echo get_site_url() ?>/tips-and-solutions/problems-and-solutions/"> Problems and Solutions</a>
        <a  href="<?php echo get_site_url() ?>/tips-and-solutions/how-to-paint/">  How to Paint</a>
        
       
    </div>
    
        <button 
            id="solution-page-button" 
            type="button" 
            class="btn  dropdown-toggle" 
            data-bs-toggle="dropdown" 
            aria-expanded="false"
        >
        Product Solutions
        </button>
        <ul class="dropdown-menu" aria-labelledby="solution-page-button">
            <li  class="dropdown-item"  >
            <a href="<?php echo get_site_url() ?>/tips-and-solutions/product-solutions/">
                Product Solutions
                </a>
            </li>
            <a href="<?php echo get_site_url() ?>/tips-and-solutions/problems-and-solutions/">
            Problems and Solutions
                </a>
            </li>
            <li  class="dropdown-item"  >
            <a href="<?php echo get_site_url() ?>/tips-and-solutions/how-to-paint/">
            How to Paint

                </a>
            </li>
            
            
        </ul>

</div>

<!-- <div class="container"></div> -->
<div id="solution-pages" >
        <div class="margin-page"></div>
        <div class="content">
            <h1  class="ui header"><?php echo get_the_title() ?>
                <div class="sub header">
                <?php echo get_field("short_text") ?>
                </div>
            </h1>
        </div>
</div>
<?php 
 
if(isset($_GET['scroll'])):
    echo '<script> setTimeout(() => {
        document.querySelector("#solutions").scrollIntoView({behavior: "smooth" , block: "center"})
    } , 1000)</script>';
endif;

?>


<?php 
 
$getFavs = getFavoritesData("problem-and-solution");  
$data_favorites = $getFavs["datas"];  
$problem_and_solution_cate = get_terms('problem_and_solution_cate', array('hide_empty' => false, 'parent' => 0));
 
?>
<div class="mt-4"></div>
 
 <?php



 
if(isset($_GET['cate'])):
    echo '<script> setTimeout(() => {
        document.querySelector(".menus-solution").scrollIntoView({behavior: "smooth" , block: "start"})
    } , 1000)</script>';
endif;
$cate = "";
if(isset($_GET["cate"])):
    $cate  = $_GET["cate"];
endif;
 
 get_template_part("components/select-custom" , null , [
     "input_id" => "cate_id",
    "label" => "ปัญหาทั้งหมด",
     "categories" => $problem_and_solution_cate,
     "value" => $cate,
     "url_redirect" => get_permalink()
 ]);
 
 
 ?>
 
 <div class="container tip-and-solution-container">
     
     <div class="card-blogs-div ui stackable three column grid">
            <?php 
         
            $args = [
                "post_type" => 'problem_and_solution',
                'post_status' => 'publish',
                "posts_per_page" =>  $page,
                "orderby" => "order",
                'order' => 'ASC' 
                
            ];
            if($cate != ""):
                $cate  = $cate;
                $args["tax_query"]  = [
                    [
                    'taxonomy' => 'problem_and_solution_cate',
                    'field' => 'term_id',
                    'terms' =>  $cate,
                    'include_children' => true,
                    'operator' => 'IN'
                 ]
                ];
               
            endif;
            
            $solutions = [];
            $query = new WP_Query($args);
            $count = $query->found_posts;
            
            $solution_id = 0;
            $index = 0;
            while ($query->have_posts()) {
            $query->the_post();
            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
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
                "image" => $featured_img_url,
                "user_id" => $userId,
                "id" => get_the_ID(),
                "favorite" =>  $checkFav,
                "index" => $index,
                "type_blog" => "problem-and-solution",
            ]);
            $index += 1;
            }
            wp_reset_query();
            
            ?>
     </div>
   
     <?php if($count > $page):   ?>
        <div class="see_more">
            <a  href="<?php $page = $page +  6;  echo  get_permalink(get_the_ID())."?paged_show=".$page ?>">ดูเพิ่มเติม</a>
        </div>
        <?php endif; ?>
        <?php do_action("empty_page" , ["count" => $count ]) ?>
 </div>
<div class="mt-10rem"></div>
 
<div class="container"><div class="border-page"></div></div>
 

<div class="mt-10rem"></div>
 
<?php 
 get_template_part("pages/page-services");
?>

<!-- 
<div class="mt-10rem"></div> -->



<div class="margin-page"></div>

</div>