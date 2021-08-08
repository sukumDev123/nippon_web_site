
<?php 

$cate = null;
if(isset($_GET['cate'])):
$cate = $_GET['cate'];

endif;
$faqs_cate = get_terms('FAQsCate', array('hide_empty' => false, 'parent' => 0));
 
?>

<div class="container">


<div class="container mt-5">
    <div class="ui stackable grid list-faq">
        <div class="four wide column">
            <ul class="faq-navbar">
                <?php 
                foreach($faqs_cate as  $faq_cate):
                    $checkActiveLeft = "";
                    if($cate ==  $faq_cate->term_id):
                        $checkActiveLeft = "active";
                    endif;
                ?>
                <li>
                    <a 
                        class="account-a <?php  echo $checkActiveLeft ?>"
                        href="<?php echo  get_permalink(get_the_ID())."?cate=". $faq_cate->term_id ?>"><?php echo $faq_cate->name ?></a>
                </li>
                <?php
                endforeach;
                
                
                ?>
               
              
            </ul>
        </div>
 
        <div class="ten wide column">
            <?php 
                if($cate):
                    $sub_cate = get_terms('FAQsCate', array('hide_empty' => false, 'parent' => $cate));
                        if(count($sub_cate)):
                        ?>
                        
                        <div class="sub-type-headers">
                            <?php foreach($sub_cate as $sub): 
                                $checkActive = "";    
                                if(isset($_GET["sub_cate"])):
                                    if($_GET["sub_cate"] == $sub->term_id):
                                        $checkActive = "active";
                                    endif;
                                endif;
                            ?>
                                <h4 class="sub-type-header <?php echo $checkActive ?> ">
                                <a 
                                    class="account-a  <?php echo $checkActive ?>"
                                    href="<?php echo  get_permalink(get_the_ID())."?cate=".$cate."&sub_cate=". $sub->term_id ?>"><?php echo $sub->name ?></a>
                            
                            </h4>
                            <?php endforeach; ?>
 
                        </div>

                    <?php
                endif;
            endif;
            
            
            ?>
           
            <h3 class="ui header">คำถามที่พบบ่อย</h3>
                <?php 
                    $tax_query= [
                        [
                            'taxonomy' => 'FAQsCate',
                            'field' => 'term_id',
                            'terms' =>  [$cate],
                            'include_children' => true,
                            'operator' => 'IN' 
                        ]
                    ];
                    if(isset($_GET["sub_cate"])):
                        $tax_query = [
                            'relation' => 'AND',
                            [
                                'taxonomy' => 'FAQsCate',
                                'field' => 'term_id',
                                'terms' =>  [$cate],
                                'include_children' => true,
                                'operator' => 'IN' 
                            ],
                            [
                                'taxonomy' => 'FAQsCate',
                                'field' => 'term_id',
                                'terms' =>  [$_GET["sub_cate"]],
                                'include_children' => true,
                                'operator' => 'IN' 
                            ]
                            ];
                    endif;
                    $argc = [
                        "post_type" => "FAQs",
                        'posts_per_page' => 9,
                        "tax_query" =>  $tax_query,
                    ];

                    $query = new WP_Query($argc);
                    if($query->have_posts()):
                        while($query->have_posts()):
                            $query->the_post();

                ?>
                        <div class="card-faq">
                            <div class="card-faq-header">
                                <h3><?php echo get_the_title() ?></h3>
                                <?php get_template_part("components/icon" , null , ["icon" => "arrow-top"]) ?>
                            </div>
                            <div class="content">
                                <?php the_content() ?>
                            </div>
                        </div>
                <?php 
                    endwhile;
                endif;
                ?>
             
        </div>
        </div>
    </div>




<?php get_template_part("templates/faq/faq_form") ?>
</div>

