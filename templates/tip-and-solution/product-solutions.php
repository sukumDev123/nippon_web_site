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
 
$lang=get_bloginfo("language");  
 
$text_static_solution = [
    "en" => [
        "title" => "เคล็ดลับซ่อมแซมปัญหาสีบ้าน จากนิปปอนเพนต์",
        "detail" => "“ทุกปัญหาสีบ้าน นิปปอนเพนต์ช่วยได้” <br/>
        เมื่อรู้สาเหตุของปัญหาสีที่เกิดขึ้น มีแนวทางการแก้ไขที่ถูกขั้นตอน และเลือกใช้ผลิตภัณฑ์ที่ตอบโจทย์ บ้านของคุณก็จะสวยใหม่อยู่เสมอ"


    ],
    "th" => [
        "title" => "เคล็ดลับซ่อมแซมปัญหาสีบ้าน จากนิปปอนเพนต์",
        "detail" => "“ทุกปัญหาสีบ้าน นิปปอนเพนต์ช่วยได้” <br/>
        เมื่อรู้สาเหตุของปัญหาสีที่เกิดขึ้น มีแนวทางการแก้ไขที่ถูกขั้นตอน และเลือกใช้ผลิตภัณฑ์ที่ตอบโจทย์ บ้านของคุณก็จะสวยใหม่อยู่เสมอ"
       
        

    ]
][$lang];



 ?>
<?php 
get_template_part("other/loading");
  
  $detail = [];
  $solution = get_the_ID();
  if( isset($_GET['solutions'])) {
    $argc = [
        "post_type"  => "solutions" ,
        "p" => intval( $_GET['solutions']),
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
    wp_reset_query();

}
  
  ?>


<?php 

$featured_img_url = get_the_post_thumbnail_url($postId,'full');


?>
<div class="page-bk">

<!-- <div class="page-bk-image"> -->
<img alt="logo" src="<?php echo $featured_img_url ; ?>"  class="image-logo-bk" />
<div class="image-logo-bk"> </div>
<!-- </div> -->
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
        <a class="active"  href="<?php echo get_site_url() ?>/tips-and-solutions/product-solutions/">  Product Solutions </a>
        <a href="<?php echo get_site_url() ?>/tips-and-solutions/problems-and-solutions/"> Problems and Solutions</a>
        <a  href="<?php echo get_site_url() ?>/tips-and-solutions/how-to-paint/">  How-to-Paintc</a>
        
       
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
            How-to-Paint

                </a>
            </li>
            
            
        </ul>

</div>
<div id="solution-pages" >
    <div class="margin-page"></div>
    <div class="content">
            <h1><?php echo get_the_title() ?></h1>
            <p><?php echo get_field("short_text") ?> </p>
        </div>


    <div class="container">



<?php 
 
if(isset($_GET['scroll'])):
    echo '<script> setTimeout(() => {
        document.querySelector("#solutions").scrollIntoView({behavior: "smooth" , block: "center"})
    } , 1000)</script>';
endif;

?>

<?php 
$post_parent = 0;
if(get_field("page_name"  ,  get_the_ID()) ):
    $post_parent =  get_the_ID();
else: 
    $post_parent =  $post->post_parent;

endif;
$args = [
    "post_type" => 'page',
    'post_status' => 'publish',
    'post_parent' => $post_parent ,
    "orderby" => "order",
    'order' => 'ASC' 
    
];
 
$solutions = [];
$query = new WP_Query($args);
$solution_id = 0;
while ($query->have_posts()) {
    $query->the_post();
    $id = get_the_ID();
    $featured_img_url = get_the_post_thumbnail_url( $id,'full');
    $className = "";
  
    if($thisPostId == $id) {
        $className = "active";
        $solution_id = $id;
        if( get_field("post")) {
            $solutions = get_field("post");

        }
    }
    ?>
    <div class="solution-card <?php echo  $className ?>">
    <a  style="color:#637381;  text-decoration: none;" href="<?php the_permalink(); ?>/?scroll=true">
    <img src="<?php  echo $featured_img_url; ?>" />
    <h2 class="text-center"><?php the_title(); ?></h2>
    </a>
    </div>
   
    <?php
    // the_excerpt();
}
wp_reset_query();
 
?>
    </div>
    <div class="border-solution"></div>
</div>

 

<div id="solutions" >
  
    <div class="solution-div">
    <?php 
 

        if(count( $solutions) > 0)  {
            foreach( $solutions as  $solution) {
                    
                    $featured_img_url = get_the_post_thumbnail_url($solution->ID,'full'); 
                    $className ="";
                    $ids= [];
                    if( $detail["id"] == $solution->ID) {
                        $className = "card-active";
                    }
                    ?>
                    <!-- <a  > -->
                    <div id="solution<?php echo $solution->ID ?>" onclick="solutionChange(<?php echo $solution->ID ?> , false)"  class="<?php echo $className   ?>">
                        <img src="<?php echo $featured_img_url  ?>" alt="image" />  
                           
                           <h3>
                           <?php echo get_the_title($solution->ID) ?>
                           </h3>
                         
                        </div>
                    <!-- </a> -->
                        
                    <?php
                // }
          
            }

        }

        wp_reset_query();

 
        // $size_data += 1;
    ?>
  </div> 





    
</div>
 
<?php if(!empty($detail)) : ?>

<div id='info-solution'>
        <div class="container">
               <div class="content">
                <h1 id="problem_title"><?php echo $detail['problem']['title'] ;  ?></h1>
                <!-- <?php echo $detail['problem']['detail'] ;  ?> -->
                <h3 id="problem_sub_title" class="sub_title"><?php echo $detail['problem']['sub_title'] ?></h3>
                <section id="problem_cause">
                    <?php echo $detail['problem']['cause'] ;  ?>
                </section>
                <section id="problem_result">
                    <?php echo $detail['problem']['result'] ;  ?>
                </section>
               </div>
               <div class="before-after">
                   <img id="before_image_problem" src="<?php echo $detail["problem"]["before_image"]["url"]  ?>" alt="">
                   <img  id="after_image_problem"  src="<?php echo $detail["problem"]["after_image"]["url"] ?>" alt="">
               </div>
               <h1 class="ee">วิธีการแก้ไข</h1>
               <div class="fixed">
                   <div class="step1">
       
                       <div class="image">       <img id="step1_image" src="<?php echo $detail["fixed"]["step1"]["image"]["url"] ?>" alt=""> </div>

                       <h1 id="step1_title"><?php echo $detail['fixed']['step1']['title'] ;  ?></h1>
                       <section id="step1_detail">
                        <?php echo $detail['fixed']['step1']['detail'] ;  ?>
                       </section>
        
                   </div>
                   <div class="step2">
                   <div class="image"> <img id="step2_image" src="<?php echo $detail["fixed"]["step2"]["image"]["url"] ?>" alt=""> </div>

                        <h1 id="step2_title"><?php echo $detail['fixed']['step2']['title'] ;  ?></h1>
                       <section id="step2_detail">
                         <?php echo $detail['fixed']['step2']['detail'] ;  ?>

                        </section>
                   </div>
                   <div class="step3">
                   <div class="image">  <img id="step3_image" src="<?php echo $detail["fixed"]["step3"]["image"]["url"] ?>" alt="">  </div>

                        <h1 id="step3_title"><?php echo $detail['fixed']['step3']['title'] ;  ?></h1>
                        <section id="step3_detail">
                        <?php echo $detail['fixed']['step3']['detail'] ;  ?>

                        </section>
                   </div>
               </div>
        <!-- <p> </p> -->
        <?php ?>
        </div>


        <div class="mt-10rem"></div>
        <?php 
            get_template_part("other/products"  );
        
        ?>
    </div>
   

  
<div>
<?php endif; ?>


<div class="mt-10rem"></div>
 
<?php 
 get_template_part("pages/page-services");
?>

<!-- 
<div class="mt-10rem"></div> -->



<div class="margin-page"></div>

</div>