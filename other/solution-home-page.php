<div id="solution-list-home-page">
    <h1><?php echo get_field("solution_title") ?></h1>
     <?php echo get_field("solution_detail") ?> 
    <div class="header container">
        <?php 
                    $show_detail = get_field("solution_show_data");
                    $page_solution = get_field("page_solution");
                    $postShowId = 0;
                    $index = 0;
                    $solutions = [];
                    if(isset($_GET['solution'])) {
                        $postShowId  = intval($_GET['solution']);
                    }
                    foreach ( $page_solution as $solution):
                        if($index == 0 &&  $postShowId == 0):
                            $postShowId = $solution->ID;
                        endif;
                        $index = $index + 1;
                        $id = $solution->ID;
                        $featured_img_url = get_the_post_thumbnail_url( $id,'full');
                        $className = "";
                        if($postShowId == $id) {
                            $className = "active";
                            $solutions = get_field("post" , $id);
                            // print_r($solutions);
                        }
                        $href =  "";
                        if($show_detail):
                            $href = "?solution=".$solution->ID."";
                        endif;
                        ?>
                        <div class="solution-card <?php echo  $className ?>">
                        <img src="<?php  echo $featured_img_url; ?>" />
                        <h2 class="text-center"><a href="<?php echo $href ?>"><?php echo get_the_title($solution->ID); ?></a></h2>
                        </div>
                    
                    <?php 
                    endforeach;
                  
            ?>
    </div>

    <div class="border-solution"></div>
    <?php 
                    if($show_detail == 1):
?>
<div class="show-list-problem">
                        <div class="container">

                        <?php
                        $argc = ["post_type" => "solutions" ];
                        $query_solution = new WP_Query($argc);
                        $postShowDetailId = 0;
                        $solutionShow = [];
                        if(isset($_GET['solution_detail'])) {
                            $postShowDetailId  = intval($_GET['solution_detail']);
                        }
                       
                        $index = 0;
                        if(count($solutions)):
                            foreach($solutions as $solution):
                                $soId = $solution->ID;
                         
                                $so_img_url = get_the_post_thumbnail_url( $soId,'full');
                                if($index == 0 && $postShowDetailId == 0):
                                    $postShowDetailId = $soId;
                                endif;
                                $index += 1;
                                $hrefsS = "?solution=".$postShowId."&solution_detail=".$soId."";
                                $className = "show-problem";
                                if($postShowDetailId ==  $soId) {
                                  
                                    $className = "show-problem active";
                                  
                                    $solutionShow = [
                                        "id" => $soId,
                                        "fixed" =>  get_field("fixed" ,  $soId),
                                        "problem" =>  get_field("problem" ,  $soId),
                                    ];
                                    // print_r($solutions);
                                }
                        ?>  


                               <div class="<?php echo $className ?>">
                                    <img src="<?php echo $so_img_url ?>" alt="">
                                    <h3><a href="<?php echo $hrefsS ?>"><?php echo get_the_title($soId) ?></a></h3>
                               </div>

                <?php
                   endforeach;
                ?>
                        </div>

                </div>
                <?php
                endif; endif;  wp_reset_query();


?>

<?php if(count($solutionShow) > 0) : ?>

<div id='info-solution'>
        <div class="container">
               <div class="content">
                <h2><?php echo $solutionShow['problem']['title'] ;  ?></h2>
                <h3 class="sub_title"><?php echo $solutionShow['problem']['sub_title'] ?></h3>
                <?php echo $solutionShow['problem']['cause'] ;  ?>
                <?php echo $solutionShow['problem']['result'] ;  ?>
               </div>
               <div class="before-after">
                   <img src="<?php echo $solutionShow["problem"]["before_image"]["url"]  ?>" alt="">
                   <img src="<?php echo $solutionShow["problem"]["after_image"]["url"] ?>" alt="">
               </div>
               <h2 class="ee">วิธีการแก้ไข</h2>
               <div class="fixed">
                   <div class="step1">
                       <!-- <img src="" alt=""> -->
                       <div class="image">       <img src="<?php echo $solutionShow["fixed"]["step1"]["image"]["url"] ?>" alt=""> </div>

                       <h1><?php echo $solutionShow['fixed']['step1']['title'] ;  ?></h1>
                       <?php echo $solutionShow['fixed']['step1']['detail'] ;  ?>
                       <!-- <p></p> -->
                   </div>
                   <div class="step2">
                   <div class="image"> <img src="<?php echo $solutionShow["fixed"]["step2"]["image"]["url"] ?>" alt=""> </div>

                        <h1><?php echo $solutionShow['fixed']['step2']['title'] ;  ?></h1>
                       <?php echo $solutionShow['fixed']['step2']['detail'] ;  ?>
                   </div>
                   <div class="step3">
                   <div class="image">  <img src="<?php echo $solutionShow["fixed"]["step3"]["image"]["url"] ?>" alt="">  </div>

                        <h1><?php echo $solutionShow['fixed']['step3']['title'] ;  ?></h1>
                        <?php echo $solutionShow['fixed']['step3']['detail'] ;  ?>
                   </div>
               </div>
        <!-- <p> </p> -->
        </div>
        <div class="mt-10rem"></div>
        <?php 
            get_template_part("other/products");
        
        ?>
    </div>
   
 
     

<div>
<?php endif; ?>
</div>

