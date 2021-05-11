<?php 
 
 /** Template Name: Solution */

 ?>


<?php get_header(); ?>


<?php 
$first_page = 0;
$size_data = 0;
$limit_page = 9;
$detail = [];
if(isset($_GET["page"])) {
    $limit_page = $_GET["page"];
}
$parent_title = get_the_title($post->post_parent);
$postId =   get_top_ancestor_id();
$thisPostId = $post->ID;
$posts = get_field("post");
 
// echo $limit_page;
 ?>

<?php 
  
  $detail = [];
  if(isset($_GET['solution'] )) {
    $argc = [
        "post_type"  => "solutions" ,
        "p" => intval($_GET['solution']),
        "posts_per_page" => 1 
     ];
    //  "meta_compare" => "=" , "meta_value" => $_GET['solution'] ,  
    $query = new WP_Query($argc);

    if($query->have_posts())  {
        while($query->have_posts()) {
            $query->the_post(); 

            $detail = [
                "id" => get_the_ID(),
                "fixed" =>  get_field("fixed"),
                "problem" =>  get_field("problem"),
            ];
        }
    }
    wp_reset_query();

} else {
    $argc2 = ["post_type"  => "solutions" , "posts_per_page" => 1   ];
    $query1 = new WP_Query($argc2);

    if($query1->have_posts())  {
        while($query1->have_posts()) {
            $query1->the_post(); 
            $detail = [
                "id" => get_the_ID(),
                "fixed" =>  get_field("fixed"),
                "problem" =>  get_field("problem"),
            ];
        }
    }
}
  
  ?>



<?php get_template_part("pages/page-bk");  ?>
<div class="menus-solution">
<div class="container">
    <a href="">
    Product Solutions
    </a>
    <a href="">
    Problems and Solutions
    </a>
    <a href="">
    How-to-Paint
    </a>
    <a href="">
    Professional Painting
    </a>
    <a href="">
    Total Coating Solutions
    </a>
    <a href="">
    FAQ
    </a>
</div>
    
</div>

<div id="solution-pages" class="container">

<?php 

$args = [
    "post_type" => 'page',
    'post_status' => 'publish',
    'post_parent' => $postId,
    "orderby" => "order",
    'order' => 'ASC' 
    
];
// $thisPostId
$query = new WP_Query($args);
while ($query->have_posts()) {
    $query->the_post();
    $id = get_the_ID();
    $featured_img_url = get_the_post_thumbnail_url( $id,'full');
    $className = "";
  
    if($thisPostId == $id) {
        $className = "active";
    }
    ?>
    <div class="solution-card <?php echo  $className ?>">
    <img src="<?php  echo $featured_img_url; ?>" />
    <h2 class="text-center"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    </div>
   
    <?php
    // the_excerpt();
}
wp_reset_query();

?>
 
</div>


 

<div id="solutions" class="container">
    <div class="solution-div">
    <?php 
 
        if($posts )  {
            foreach($posts  as $post) {
                    $featured_img_url = get_the_post_thumbnail_url( $post->ID,'full'); 
                    $className ="";
                    $ids= [];
                    if( $detail["id"] ==  $post->ID) {
                        $className = "card-active";
                    }
                    ?>
                    <a href="<?php get_permalink( $post->ID) ?>?solution=<?php echo  $post->ID  ?>">
                    <div class="<?php echo $className   ?>">
                        <img src="<?php echo $featured_img_url  ?>" alt="image" />  
                           
                            <?php echo get_the_title( $post->ID) ?>
                        <div class="bbb"></div>
                          
                        </div>
                    </a>
                        
                    <?php
                // }
          
            }

        }
        wp_reset_query();
        // $size_data += 1;
    ?>
  </div>





    
</div>
 
<?php if(count($detail) > 0) : ?>

<div id='info-solution'>
        <div class="container">
               <div class="content">
                <h1><?php echo $detail['problem']['title'] ;  ?></h1>
                <!-- <?php echo $detail['problem']['detail'] ;  ?> -->
                <h3 class="sub_title"><?php echo $detail['problem']['sub_title'] ?></h3>
                <?php echo $detail['problem']['cause'] ;  ?>
                <?php echo $detail['problem']['result'] ;  ?>
               </div>
               <div class="before-after">
                   <img src="<?php echo $detail["problem"]["before_image"]["url"]  ?>" alt="">
                   <img src="<?php echo $detail["problem"]["after_image"]["url"] ?>" alt="">
               </div>
               <h1 class="ee">วิธีการแก้ไข</h1>
               <div class="fixed">
                   <div class="step1">
       
                       <div class="image">       <img src="<?php echo $detail["fixed"]["step1"]["image"]["url"] ?>" alt=""> </div>

                       <h1><?php echo $detail['fixed']['step1']['title'] ;  ?></h1>
                       <?php echo $detail['fixed']['step1']['detail'] ;  ?>
        
                   </div>
                   <div class="step2">
                   <div class="image"> <img src="<?php echo $detail["fixed"]["step2"]["image"]["url"] ?>" alt=""> </div>

                        <h1><?php echo $detail['fixed']['step2']['title'] ;  ?></h1>
                       <?php echo $detail['fixed']['step2']['detail'] ;  ?>
                   </div>
                   <div class="step3">
                   <div class="image">  <img src="<?php echo $detail["fixed"]["step3"]["image"]["url"] ?>" alt="">  </div>

                        <h1><?php echo $detail['fixed']['step3']['title'] ;  ?></h1>
                        <?php echo $detail['fixed']['step3']['detail'] ;  ?>
                   </div>
               </div>
        <!-- <p> </p> -->
        <?php ?>
        </div>


        <div class="mt-10rem"></div>
        <?php 
            get_template_part("other/products");
        
        ?>
    </div>
   

  
<div>
<?php endif; ?>


 
<?php 
 get_template_part("pages/page-services");
?>






</div>
 
<?php get_footer(); ?>
