<?php 


 
$lang=get_bloginfo("language");  

$g_permalink  = "";
$text_static = [
    "en" => [
        "url" => "/shade-en/collection-color-th/",
        "title" => "ค้นหาแรงบันดาลใจ 
        ด้วยไอเดียการตกแต่งบ้าน<br /> จากนิปปอนเพนต์",
        "detail" => "“บ้าน” คือสถานที่ที่เราอยู่แล้วสบายใจ และบ่งบอกความเป็นตัวเรามากที่สุด  <br />
       มาดูไอเดียและค้นหาแนวการแต่งบ้านตามสไตล์ของตัวเองกัน",
    ],
    "th" => [
        "url" => "/shade-th/collection-color-th/",
        "title" => "ค้นหาแรงบันดาลใจ <br />
        ด้วยไอเดียการตกแต่งบ้าน<br /> จากนิปปอนเพนต์",
        "detail" => "“บ้าน” คือสถานที่ที่เราอยู่แล้วสบายใจ และบ่งบอกความเป็นตัวเรามากที่สุด  <br />
       มาดูไอเดียและค้นหาแนวการแต่งบ้านตามสไตล์ของตัวเองกัน",
       "button_title" => "ไอเดียการตกแต่งเพิ่มเติม"

    ]
][$lang];
 
?>


 
<section id="home_suggestion_shades_right">
<div class="content">
<?php

$wp_query = new WP_Query([
    "lang" => $lang,
    "post_type" => "post",
    'tax_query' => array(
        array(
            'taxonomy' => 'category',
            'field'    => 'slug',
            'terms'    => 'get-idea-title',
        ),
    ),
    'posts_per_page' => 1,
    "post_status" => "published"
]);
if($wp_query->have_posts()):
    while($wp_query->have_posts()):
        $wp_query->the_post();
?>
    <h1><?php echo get_the_title() ?></h1>
   <p> <?php echo get_field("short_text") ?></p>
    <div class="mt-5"></div>
    <a  class="a-primary-button " href="<?php echo get_field("link_to_post") ?>"  >
        <button class="primary-button">
            <span><?php  echo  get_field('button_title') ?></span>
         <img  class="arrow-left-white" src="<?php echo get_bloginfo("template_directory") ?>/assets/images/arrow-left.svg" alt="">
        </button>
    </a>
<?php 
    endwhile;
endif;
wp_reset_query();
?>
    </div>
    <div class="image-contain">
        <?php 
        
        $argc = [
            "lang" => $lang,
            "post_type" => "post",
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field'    => 'slug',
                    'terms'    => 'get-idea-card',
                ),
            ),
            'posts_per_page' => -1,
            "post_status" => "published"    
        ];
        $query = new WP_Query($argc);
        
        ?>
       <div class="swiper-container inspire-div">
           <div class="swiper-wrapper">
           <?php if($query->have_posts()): ?>
            <?php while($query->have_posts()): $query->the_post(); $g_permalink  = get_permalink(get_the_ID()); 
                $featured_img_url = get_the_post_thumbnail_url( get_the_ID(),'full');

            ?>
              <div class="swiper-slide ">
                  <div class="shade-swiper">
               
                    <div class="image-div">
                        <img src="<?php echo  $featured_img_url ?>" alt="<?php echo get_the_title() ?>">
                    </div>
                   <div class="div-bk">
                   <a   class="inspire-data" href="<?php echo get_field("link_to_post") ?>"  >
                            <h3><?php echo get_the_title() ?></h3>
                            <p><?php echo get_field("short_text") ?></p>
                            <div   style="margin-top:40px"> </div>
                            <span ><?php echo get_field("button_title") ?></span>
        

                        </a>
                   </div>
                  </div>
                    
              </div>
            <?php endwhile; ?>
            
            <?php endif;wp_reset_query(); ?>
        </div>
        <div class="swiper-pagination get-idea-pagination"></div>
    </div>
    </div>
    <a id="show_mobile"  class="a-primary-button " href="<?php echo $g_permalink ?>"   >
            <button class="primary-button">
                <?php  echo  $text_static['button_title'] ?>
                <!-- <i class="fas fa-long-arrow-alt-right"></i> -->
             <img  class="arrow-left-white" src="<?php echo get_bloginfo("template_directory") ?>/assets/images/arrow-left.svg" alt="">

            </button>
        </a>
</section>

 