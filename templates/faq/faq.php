
<?php 
$useragent=$_SERVER['HTTP_USER_AGENT'];
$isMobile = false;

if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
    $isMobile = true;
}

$cate = null;
$faqs_cate = get_terms('FAQsCate', array('hide_empty' => false, 'parent' => 0));
$lang=get_bloginfo("language");  

if(isset($_GET['cate'])):
$cate = $_GET['cate'];
else :
    $cate  = $faqs_cate[0]->term_id;
endif;
$sub_cate = [];
$cat_data = [];
$limit_page =  6;
if(isset($_GET["paged_show"])):
    $limit_page = intval($_GET['paged_show']);
endif;
$text_words = [
    "th" => [
        "see_more" => "ดูเพิ่มเติม" ,
        "title" => "คำถามที่พบบ่อย"
    ],
    "en" => [
        "see_more" => "See More",
        "title" => "คำถามที่พบบ่อย"

    ],
][$lang];
$thisLink = get_permalink();
?>




<ul class="navbar-mobile faq">
            
                <?php 
                $index = 0;
                foreach($faqs_cate as  $faq_cate):
                    $checkActive = "";
                    if($cate ==  $faq_cate->term_id):
                        $checkActive = "active";
                    endif;
                    $left = "";
                    if($index == 0) {
                        $left = "left";
                    }
                ?>
               <li>
                <a class="list-menus <?php echo $left  ?>  <?php echo  $checkActive  ?>" href="<?php echo  get_permalink(get_the_ID())."?cate=". $faq_cate->term_id ?>"><?php echo $faq_cate->name ?></a>
                </li>
                <?php
                endforeach;
?>



            </ul>






<div class="container fav_big_container">


<div class="mt-5 fav_big">
    <div class="ui stackable grid list-faq">
        <div class="four wide column navbar-window">
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
                        
                        <div class="sub-type-headers row ">
                            <?php foreach($sub_cate as $sub): 
                                $checkActive = "";    
                                if(isset($_GET["sub_cate"])):
                                    if($_GET["sub_cate"] == $sub->term_id):
                                        $checkActive = "active";
                                    endif;
                                endif;
                                $cat_data[$sub->term_id] = [];
                            ?>
                               <div class="col-12 col-md-4 mb-3">
                                <a  href="<?php echo  get_permalink(get_the_ID())."?cate=".$cate."&sub_cate=". $sub->term_id ?>" class="sub-type-header <?php echo $checkActive ?> ">
                                    <h4 class="account-a  <?php echo $checkActive ?>" ><?php echo $sub->name ?></h4>
                                </a>
                               </div>
                            <?php endforeach; ?>
 
                        </div>

                    <?php
                endif;
            endif;
            
            
            ?>
           
            <h3 class="ui header title-faq"><?php echo $text_words['title'] ?></h3>
            <?php 
                $index = 0;
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
                    'posts_per_page' => $limit_page,
                    "tax_query" =>  $tax_query,
                    'orderby' => 'date',
                    'order'		=> 'ASC',

                ];

                $query = new WP_Query($argc);
                $count = $query->found_posts;

            ?>
            <?php $classAccording = ""; ?>
            <?php if(count($sub_cate) > 0): ?>
            <?php $classAccording = "accord-window"; ?>
  
            <?php endif; ?>
            <div class="accordion <?php echo $classAccording ?>" id="accordionExample">
                <?php   
                    if($query->have_posts()):
                        while($query->have_posts()):
                            $query->the_post();
                            $terms =  get_the_terms( get_the_ID(), "FAQsCate" );
                            foreach( $terms as $term) {
                                if(!isset($cat_data[$term->term_id])) {
                                    $cat_data[$term->term_id] = [];
                                }
                                array_push($cat_data[$term->term_id] , [
                                    "title" => get_the_title(),
                                    "content" => get_the_content(),
                                ]);
                            }
                ?>
                        <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo_<?php echo  $index;?>">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo_<?php echo  $index;?>" aria-expanded="false" aria-controls="collapseTwo_<?php echo  $index;?>">
                                <?php echo get_the_title() ?>
                                </button>
                                </h2>
                            <div id="collapseTwo_<?php echo  $index;?>" class="accordion-collapse collapse" aria-labelledby="headingTwo_<?php echo  $index++; ?>" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                <?php the_content() ?>
                                </div>
                            </div>
                        </div>
                <?php 
                    endwhile;
                endif;wp_reset_query() ;
                ?>
                <?php do_action("empty_page" , ["count" => $count ]) ?>
            </div>
            
         
           

            <?php if( $isMobile): ?>
            <?php  if(count($sub_cate) > 0): ?>
                <div class="fav-mobile-sub">
                    <?php  foreach($sub_cate as $sub): ?>
                        <h3 class="ui header primary-text"><?php echo $sub->name ?></h3>
                        <div class="accordion " id="accordionExample">
                            <?php 
                                    $limit_page2[$sub->term_id] = 3;  
                                    if(isset($_GET["sub_".$sub->term_id])):
                                        $limit_page2[$sub->term_id]   = $_GET["sub_".$sub->term_id];
                                    endif;
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
                                            'terms' =>  [$sub->term_id],
                                            'include_children' => true,
                                            'operator' => 'IN' 
                                        ]
                                    ];
                                    $argc2 = [
                                        "post_type" => "FAQs",
                                        'posts_per_page' => $limit_page2[$sub->term_id],
                                        "tax_query" =>  $tax_query,
                                        'orderby' => 'date',
                                        'order'		=> 'ASC',
                    
                                    ];
                    
                                    $query2 = new WP_Query($argc2);
                                    $count2 = $query2->found_posts;
                                    $index2 = 0;                          
                                    if($count2 > 0): ?>
                                        <?php while($query2->have_posts()): $query2->the_post(); $index2 = 0;?>
                                            <?php $lastElement = "" ;if( $index2 == $count2 - 1): $lastElement = "sub_".$sub->term_id; endif; ?>
                                            <div class="accordion-item <?php echo $lastElement ?>">
                                                    <h2 class="accordion-header" id="headingTwo_<?php echo  $index2;?>">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo_<?php echo  $index2;?>" aria-expanded="false" aria-controls="collapseTwo_<?php echo  $index2;?>">
                                                    <?php echo get_the_title() ?>
                                                    </button>
                                                    </h2>
                                                <div id="collapseTwo_<?php echo  $index2;?>" class="accordion-collapse collapse" aria-labelledby="headingTwo_<?php echo  $index2++; ?>" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                    <?php echo get_the_title() ?>

                                                    </div>
                                                </div>
                                            </div>  
                                        <?php endwhile; ?>

                                        <?php
                                        if($count2 >  $limit_page2[$sub->term_id]):   ?>
                                        <?php
                                         $newLinkLimit =  $limit_page2[$sub->term_id] + 6;
                             
                                        $linkUrl2  = $thisLink."?sub_".$sub->term_id."=". $newLinkLimit ;
                                        if(isset($_GET["cate"])):
                                            $linkUrl2 .= "&cate=".$_GET["cate"];
                                        endif; 
                                        foreach($_GET as $key => $queryUrl):
                                            if($key != "cate"):
                                                if($key != "sub_".$sub->term_id ):
                                                    $linkUrl2 .= "&".$key."=".$queryUrl;
                                                endif;
                                            endif;
                                        endforeach;
                                            
                                        ?>
                                        <div class="see_more mobile-mode">
                                        <a  href="<?php   echo  $linkUrl2 ?>"><?php echo $text_words['see_more'] ?></a>

                                        </div>
                                    <?php endif; ?>

                                    <?php endif;  wp_reset_query()?>
                                 
                            <?php do_action("empty_page" , ["count" => $count2 ]) ?>
                        </div>
            
         
           

















                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <?php endif; ?>








            <?php if($count >  $limit_page):   ?>
                <?php
                $limit_page = $limit_page +  6;
                $linkUrl  = get_permalink(get_the_ID())."?paged_show=".$limit_page;
                if(isset($_GET['cate']) && isset($_GET['sub_cate']) ) {
                    $linkUrl .= "&cate=".$_GET['cate']."&sub_cate=".$_GET['sub_cate'];
                } else {
                    if(isset($_GET['cate'])):
                        $linkUrl .= "&cate=".$_GET['cate'];
                    endif; 
                    if(isset($_GET['sub_cate'])):
                        $linkUrl .= "&sub_cate=".$_GET['sub_cate'];
                    endif;
                }
                
                ?>
            <div class="see_more window-mode">
                <a  href="<?php   echo  $linkUrl ?>"><?php echo $text_words['see_more'] ?></a>
            </div>
            <?php endif; ?>
            











        </div>
        </div>
    </div>




<?php get_template_part("templates/faq/faq_form") ?>
</div>


 

