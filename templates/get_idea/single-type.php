
<?php 


$favorite = getFavoritesData("get_idea");

$type_page = get_field("type_of_page");


$getTermsThisPage = get_terms("get_idea_cate" , array('hide_empty' => false , "slug"=> $type_page));

$termUserType = $args["termUserType"];

$paged = 1;

 
$tax_query = [
    [
        'taxonomy' => 'get_idea_cate',
        'field' => 'slug',
        'terms' =>    [$type_page],
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
    "tax_query" => $tax_query,
    'post_status'   => 'publish',
    "posts_per_page" => 9,
    "paged" => get_query_var("paged"),
//    'suppress_filters' => false,
    'orderby' => 'date',
    'order' => 'DESC',	 
    // 'fields' => ''

];
if(isset($_GET["order_by"])):
    $order_by = $_GET['order_by'];
    if($order_by == "most_view"):
      $argc["orderby"] = "post_views";
  endif;
  endif;


$query = new WP_Query($argc);
   
?>


<div  class="container single-type">
<div class="row">
    <div class="col-12 col-md-4">
        <h3 class="ui header"><?php echo get_field("sub_title") ?></h3>
    </div>
    <div class="col-12 col-md-8">
    <?php 
    
    
    do_action("select_get_idea" , [
            "termUserType" => $termUserType
            ]) 
            
            
            ?>
    </div>
</div>


<div class="row mt-5">
    <?php $index = 0; if( $query->have_posts()): while($query->have_posts()): $query->the_post(); 
        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');    
        $checkF  = FALSE;
       
        if(isset($favorite["datas"][get_the_ID()])):
            $checkF = TRUE;
        endif;
    ?>
    <div class="col-12 col-md-6 col-lg-4 ">
        <?php 
        

        

        ?>
        <div class="card-get-idea-control-width-page">
        <?php    

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
            "nameClass" => "card-get-idea-".$index,
                
        ]); 

      

        ?>
        </div>
   
    </div>  

    <?php
    
    ;endwhile;endif ;  wp_reset_query();?>
   
   <?php 
   if($query->found_posts == 0):
   
   do_action("empty_page" , ["count" => 0 ]);
   endif;
   ?>
     <!-- <nav aria-label="...">
  <ul class="pagination">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i class="bi bi-chevron-compact-left"></i></a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item active" aria-current="page">
      <a class="page-link" href="#">2</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#"><i class="bi bi-chevron-compact-right"></i></a>
    </li>
  </ul>
</nav> -->
<div class="pagination">
    <?php 
        echo paginate_links( array(
 
            'format' => '?paged=%#%',
            'current' => max( 1,  get_query_var("paged")  ),
            'total' => $query->max_num_pages,
           'prev_next'    => true,
            'prev_text'    => sprintf( '<i></i> %1$s', __( '<', 'text-domain' ) ),
            'next_text'    => sprintf( '%1$s <i></i>', __( '>', 'text-domain' ) ),
        ) );

        wp_reset_postdata();  

    ?>
</div>
</div>


</div>