<!-- <?php ?> -->
<?php 


$lang=get_bloginfo("language");  
$solution_id = 0 ;
$text_static_solution = [
    "en" => [
        "title" => "เคล็ดลับซ่อมแซมปัญหาสีบ้าน จากนิปปอนเพนต์",
        "detail" => "“ทุกปัญหาบ้าน นิปปอนเพนต์ช่วยได้” <br/>
        เมื่อรู้สาเหตุของปัญหาสีที่เกิดขึ้น มีแนวทางการแก้ไขที่ถูกขั้นตอน และเลือกใช้ผลิตภัณฑ์ที่ตอบโจทย์ บ้านของคุณก็จะสวยใหม่อยู่เสมอ"


    ],
    "th" => [
        "title" => "เคล็ดลับซ่อมแซมปัญหาสีบ้าน จากนิปปอนเพนต์",
        "detail" => "“ทุกปัญหาบ้าน นิปปอนเพนต์ช่วยได้” <br/>
        เมื่อรู้สาเหตุของปัญหาสีที่เกิดขึ้น มีแนวทางการแก้ไขที่ถูกขั้นตอน และเลือกใช้ผลิตภัณฑ์ที่ตอบโจทย์ บ้านของคุณก็จะสวยใหม่อยู่เสมอ"
       
        

    ]
][$lang];



?>
 



<div id="solution-list-home-page">
    <h1><?php echo $text_static_solution['title'] ?></h1>
     <p><?php echo $text_static_solution['detail'] ?> </p>
    <div class="header">
        <?php 
                    $show_detail = get_field("solution_show_data");
                    $page_solution = get_field("page_solution");
                    $postShowId = 0;
                    $index = 0;
                    // $solutions = [];
                    // if(isset($_GET['solution'])) {
                    //     $postShowId  = intval($_GET['solution']);
                    // }
                    $argc_solution_page = [
                        "post_type" => "page",
                        "post_parent" => 83,
                        'order'             => 'ASC',
                        'orderby'           => 'order',
                    ];
                    $query_solution_page = new WP_Query($argc_solution_page);
                    if($query_solution_page->have_posts()):
                    while ($query_solution_page->have_posts()):
                        $query_solution_page->the_post();
                        if($index == 0 &&  $postShowId == 0):
                            $postShowId = get_the_ID();
                        endif;
                        $index = $index + 1;
                        $id = get_the_ID();
                        $featured_img_url = get_the_post_thumbnail_url( $id,'full');
                        $className = "";
                        if($postShowId == $id) {
                            $className = "active";
                            $solutions = get_field("post" , $id);
                            // print_r($solutions);
                        }
                        $href =  "";
                        if($show_detail):
                            $href = get_permalink($id);
                        endif;
                        ?>
                        <div class="solution-card <?php echo  $className ?>">
                            <a  onclick="loadSolutionFromPage(<?php echo $id ?>)">
                                <img src="<?php  echo $featured_img_url; ?>" />
                                <h2 class="text-center">
                                    <?php echo get_the_title(get_the_ID()); ?>
                                </h2>
                            </a>
                        </div>
                    
                    <?php 
                    endwhile;
                endif;
                wp_reset_postdata();
            ?>
    </div>
    <div class="border-solution"></div>
 
    <div class="solution-div" ></div>
       
</div>
<div id='info-solution'>
        <div class="container">
               <div class="content">
                <h1 id="problem_title" class="text-center"> </h1>
      
                <h3 id="problem_sub_title" class="sub_title text-center"> </h3>
                <section id="problem_cause">
                     
                </section>
                <section id="problem_result">
              
                </section>
               </div>
               <div class="before-after">
                   <img id="before_image_problem" src="" alt="">
                   <img  id="after_image_problem"  src="" alt="">
               </div>
               <h1 class="ee">วิธีการแก้ไข</h1>
               <div class="fixed">
                   <div class="step1">
       
                       <div class="image">       <img id="step1_image" src="" alt=""> </div>

                       <h1 id="step1_title"></h1>
                       <section id="step1_detail">
                       
                       </section>
        
                   </div>
                   <div class="step2">
                   <div class="image"> <img id="step2_image" src="" alt=""> </div>

                        <h1 id="step2_title"></h1>
                       <section id="step2_detail">
                       

                        </section>
                   </div>
                   <div class="step3">
                   <div class="image">  <img id="step3_image" src="" alt="">  </div>

                        <h1 id="step3_title"></h1>
                        <section id="step3_detail">
                 

                        </section>
                   </div>
               </div>
        <!-- <p> </p> -->
        <?php ?>
        </div>


        <div class="mt-10rem"></div>
        <?php 
        // set_query_var( 'id', "test");

            get_template_part("other/products");
        
        ?>
    </div>
   

  
</div>
 