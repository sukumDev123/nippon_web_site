 
  
<?php 

$lang=get_bloginfo("language");  
$text_static_product = [
    "en" => [
        "title" => "ผลิตภัณฑ์นวัตกรรม",
        "detail" => "ตอบโจทย์ทุกคุณภาพการแต่งบ้านกับผลิตภัณฑ์นวัตกรรมสีที่คัดสรรมา
        เพื่อคุณโดยเฉพาะ เปลี่ยนบ้านให้สวยสดใหม่เพื่อสะท้อนตัวตนแบบที่คุณต้องการ",
         
        "button_title" => "ค้นหาผลิตภัณฑ์เพิ่มเติม" 
    ],
    "th" => [
        "title" => "ผลิตภัณฑ์นวัตกรรม",
        "detail" => "ตอบโจทย์ทุกคุณภาพการแต่งบ้านกับผลิตภัณฑ์นวัตกรรมสีที่คัดสรรมา
        เพื่อคุณโดยเฉพาะ เปลี่ยนบ้านให้สวยสดใหม่เพื่อสะท้อนตัวตนแบบที่คุณต้องการ",
         
       "button_title" => "ค้นหาผลิตภัณฑ์เพิ่มเติม" 
    ]
][$lang];
          
 
$explain = get_field("explain");
 
?>
   
<div  id="products-3">
    <div>
        <div class="grid">

            <div class="product-content">
                <h1><?php echo $text_static_product['title'] ?></h1>
     
                    <p><?php echo $text_static_product['detail'] ?></p>
                    <a id="project_2_show_desktop" class="a-primary-button" href="<?php if($explain['button_link']): echo get_term_link($explain['button_link'][0])  ; endif;  ?>">
                        <button class="primary-button">
                            <?php  echo $text_static_product['button_title'] ?>
                            <img  class="arrow-left-white" src="<?php echo get_bloginfo("template_directory") ?>/assets/images/arrow-left.svg" alt="">

                        </button>
                    </a>
            </div>
          

            <div class="product-image-content">
                <img src="<?php  echo get_template_directory_uri()?>/assets/images/product-image.jpg " alt="">
 
                <div class="slide-wrapper-product">
                <div class="swiper-container products-card-owner-develop-swiper">
                    <div class="swiper-wrapper">
                    <?php 
                            $products = get_field("products");
                            if(isset($products)):
                                foreach($products as $product):
                                    
                                    $featured_img_url = get_the_post_thumbnail_url( $product->ID,'full');
                                    $title = get_the_title($product->ID);
                                    ?>
                                    <div class="swiper-slide">
                                        <div class="product-card-2"> 
                                            <a href="<?php echo get_permalink($product->ID) ?>">    
                                            <div>
                                                    <img src="<?php echo $featured_img_url ?>" alt="image">
                                                    <h2>
                                                        <?php echo $title ?>
                                                    </h2>
                                                    <p><?php echo get_the_excerpt($product->ID) ?></p>
                                                </div>
                                            </a>
                                            <div class="swiper-button-prev pd-prev"></div>
                                            <div class="swiper-button-next pd-next"></div>
                                        </div>
                                    </div>
                                    <?php 

                                endforeach;
                            endif;
                        ?>
                    </div>

                </div>
                </div>
            </div>  

                    <a id="project_2_show_mobile" class="a-primary-button" href="<?php if($explain['button_link']): echo get_term_link($explain['button_link'][0])  ; endif;  ?>">
                        <button class="primary-button">
                            <?php  echo $text_static_product['button_title'] ?>
                            <img  class="arrow-left-white" src="<?php echo get_bloginfo("template_directory") ?>/assets/images/arrow-left.svg" alt="">

                        </button>
                    </a>
        </div>

    </div>
</div>
 