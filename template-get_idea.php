<?php 

 /** Template Name: Get Idea */
get_header();
get_template_part("other/loading-new");
$page_name  = get_field("page_name");
$type_page = get_field("type_of_page");

$terms = get_terms("get_idea_cate" , ["hide_empty" => false ] );
$termUserType = get_terms("get_id_user_type" , ["hide_empty" => false ] );
$lang=get_bloginfo("language");  


$orderPage = 0;
if(get_field("order_page")):
$orderPage = get_field("order_page");

endif;

$words = [
    "en" => [
        "all" => "get-idea",
        "house-inspiration" => "house-inspiration",
        "designer-talk" => "designer-talk",
        "trend-beyond-colours" => "trend-beyond-colours",
        "greensoul-magazine" => "greensoul-magazine",
        "all_text" => "All"
    ],
    "th" => [
        "all" => "get-idea",
        "house-inspiration" => "house-inspiration",
        "designer-talk" => "designer-talk",
        "trend-beyond-colours" => "trend-beyond-colours",
        "greensoul-magazine" => "greensoul-magazine",
        "all_text" => "ทั้งหมด"
    ],
][$lang];

$args = array(
    'post_type'  => 'page', 
    'meta_query' => array( 
            array(
                'key'   => '_wp_page_template', 
                'value' => 'template-get_idea.php'
            )
        ),
    'meta_key'	=> 'order_page',
    'orderby'   => 'meta_value_num',
    'order'		=> 'ASC'
);

?>

<?php if(isset($_GET["scroll"]) || isset($_GET["user_type"])  || isset($_GET["order_by"])):
 echo '<script> setTimeout(() => {
    document.querySelector(".header_get_idea_menus").scrollIntoView({behavior: "smooth" , block: "start"})
} , 1000)</script>';

    endif;?>
<div class="get_idea_template">
    <input type="hidden" id="order-page-slider" value="<?php echo $orderPage  ?>">
    <div class="header_get_idea_images">
        <div  class="swiper-container header_get_idea_images_swiper">
            
            <div class="swiper-wrapper">
             
            <?php $query = new WP_Query($args);
            $indexBanner = 1;
            while($query->have_posts()):
                $query->the_post();
                $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');    
                ?>
                <div class="swiper-slide">
                    <a href="<?php echo get_permalink()  ?>"></a>

                        <?php
                        
                        get_template_part("templates/get_idea/images/". get_field("type_of_page") , null , [
                            "title" => get_the_title(),
                            "short_text" => get_field("short_text"),
                            "image" =>  $featured_img_url ,
                            "link" => get_permalink() ,
                            "index" => $indexBanner,
                            "link_view_more" => get_site_url()."/".$words[get_field("type_of_page")].'/?slide='.$indexBanner++."&scroll=true"
                        ]);
                        
                        ?>
                </div>
                <?php 
                endwhile; wp_reset_query();?>
               
            </div>
            <div class="swiper-pagination swiper-pagination-get-idea"></div>
        </div>
    </div>
    <div class="header_get_idea_menus">
        <h2 class="text-center white">
        บทความไอเดียการตกแต่ง <?php        
        ?>
        </h2>
        <h4 class="ui header white sub_title">ทุกแรงบันดาลใจในการแต่งบ้าน นิปปอนต์เพนต์รวบรวมมาไว้ให้คุณที่นี่</h4>

        <div class="menus-tax-ideas container">
            <a href="<?php echo  get_site_url() ?>/get-idea/?scroll=true">
                <h5  class="ui header <?php if($type_page == "all"): echo "active" ;endif;  ?>"><?php echo $words['all_text'] ?></h5>
            </a>
            <?php $index = 1; foreach($terms as $term):
                ?>
                  <a  href="<?php echo  get_site_url() ?>/<?php echo $words[$term->slug] ?>/?slide=<?php echo $index++; ?>&scroll=true">
                        <h5 class="ui header <?php if($type_page == $term->slug): echo "active" ;endif;  ?>"><?php echo $term->name ?></h5>
                    </a>
                <?php 
                endforeach; ?>
            <!-- <div class="menu-tax-idea"></div> -->
        </div>
    </div>
    <div class="header_get_idea_content">
        <?php get_template_part("templates/get_idea/".$page_name , null , [
            "terms" => $terms,
            "words" => $words,
            "termUserType" => $termUserType

        ]) ?>
    </div>
</div>


<?php get_footer(); ?>