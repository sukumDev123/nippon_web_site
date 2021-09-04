<?php 

$seeMore = "";
$page = 9;
if(isset($_GET['paged_show'])):
    $page = intval($_GET['paged_show']);

endif;

 
$lang=get_bloginfo("language");  
$words = [
      "th" => [
            "title" => "ตำแหน่งที่เปิดรับ",
            "search" => "ค้นหาตำแหน่งที่เปิดรับ",
            "btn_search" => "ค้นหา",
            "btn_card_text" => "ดูรายละเอียดเพิ่มเติม",
            "see_more" => "ดูเพิ่มเติม"

      ],
      "en" => [
            "title" => "",
            "search" => "",
            "btn_search" => "ค้นหาตำแหน่งที่เปิดรับ",
            "btn_card_text" => "ดูรายละเอียดเพิ่มเติม",
            "see_more" => "ดูเพิ่มเติม"



      ]
][$lang];
$argc = [
    "post_type" => 'careers_list',
    'post_status' => 'publish',
    "posts_per_page" => $page
];
$search = "";
if(isset($_GET["search"])):
    $argc['s'] = $_GET['search'];
    $search = $_GET["search"];
    $seeMore = "&search=" .$search;

endif;
 
$query = new WP_Query($argc);
$count = $query->found_posts;
?>


<div class="container container-career">
 
        <div class="container-career-header">
            <h1 class="ui header primary-text  center aligned mb-3"><?php echo $words['title'] ?></h1>
            <form action="<?php echo  get_site_url()."/career/" ?>" method="GET" class="ui stackable grid aligned center">
                <div class="twelve wide column">
                    <div class="ui  search">
                        <div class="ui fluid left icon input">
                            <input name="search" class="prompt" value="<?php echo $search ?>" type="text" placeholder="<?php echo $words['search'] ?>">
                            <i class="search icon"></i>
                        </div>
                       
                    </div>
                </div>

              
                <div class="four wide column">
                    <button type="submit" class="search-button-career"><?php echo $words['btn_search'] ?></button>
                </div>
            </form>
        </div>
         
    <div class="container-careers">
            <h3 class="ui header right aligned">
                <div class="sub header"><?php echo $count ?> <?php echo $words['title'] ?></div>
            </h3>

        <?php 

        if($query->have_posts()): 
            while($query->have_posts()) : 
                $query->the_post(); 
                
                ?>
                    <div class="ui grid stackable segment aligned center career-card">      
                        <div class="ten wide column">
                        
                            <h2 class="primary-text ui header">
                                <a class="primary-text" href="<?php echo get_permalink(get_the_ID()); ?>">
                                <?php echo get_the_title() ?>
                                </a>    
                           </h2>
                           <div class="type-of-career-list">
                                <h4>
                                <?php get_template_part("components/icon" , null ,  ['icon' => "location-career"]) ?>  <?php echo get_field("location_career") ?>
                                </h4>
                                <h4>
                                <?php get_template_part("components/icon" , null ,  ['icon' => "icon2"]) ?> <?php echo get_field("type_career") ?>
                                </h4>
                                <h4>
                                <?php get_template_part("components/icon" , null ,  ['icon' => "icon-money-card"]) ?>  <?php echo get_field("role_career") ?>

                                </h4>
                            </div>
                        </div>
                        <div class="six wide column center aligned">
                        <button class="btn-primary btn btn-block">
                        <a href="<?php echo get_permalink(get_the_ID()); ?>">
                        <?php echo $words["btn_card_text"] ?>
                    </a>   
                        </button>
                        </div>
                    </div>

                <?php
            endwhile;
        else:
            echo "Null";
        endif;


        ?>

        <?php if($count > $page): $page = $page +  3;  ?>
        <h3 class="ui header right aligned">
            <a href="<?php echo  get_site_url()."/career". $seeMore .= "?paged_show=".$page ?>">
                <div class="sub header"><?php echo $words["see_more"] ?></div>
            </a>
        </h3>
        <?php endif; ?>
    </div>
    <div class="margin-page"></div>
    
</div>
 