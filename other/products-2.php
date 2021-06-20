 
  
<?php 
 $lang=get_bloginfo("language");  
 $text_static_product = [
     "en" => [
         "title" => "ผลิตภัณฑ์สีคุณภาพ <br />
         คัดสรรมาเพื่อคุณ",
         "detail" => "ตอบโจทย์ทุกการแต่งบ้านกับผลิตภัณฑ์สีคุณภาพที่คัดสรรมาเพื่อคุณโดยเฉพาะ เปลี่ยนบ้านให้สวยสดใหม่เพื่อสะท้อนตัวตนแบบที่คุณต้องการ",
          
         "button_title" => "ค้นหาผลิตภัณฑ์เพิ่มเติม" 
     ],
     "th" => [
         "title" => "ผลิตภัณฑ์สีคุณภาพ <br />
         คัดสรรมาเพื่อคุณ",
         "detail" => "ตอบโจทย์ทุกการแต่งบ้านกับผลิตภัณฑ์สีคุณภาพที่คัดสรรมาเพื่อคุณโดยเฉพาะ  เปลี่ยนบ้านให้สวยสดใหม่เพื่อสะท้อนตัวตนแบบที่คุณต้องการ",
          
        "button_title" => "ค้นหาผลิตภัณฑ์เพิ่มเติม" 
     ]
 ][$lang];
           
 $products = get_field("products");
 
 $explain = get_field("explain");
 
?>
   <?php if( isset($products) && $products):  ?>
<div  id="products-2">
    <div>
        <div class="grid">

            <div class="product-content">
                <h1><?php echo  $text_static_product['title'] ?></h1>
     
                   <p> <?php echo  $text_static_product['detail'] ?></p>
               
               
                    <a id="project_2_show_desktop" class="a-primary-button" href="<?php if($explain['button_link']): echo get_term_link($explain['button_link'][0])  ; endif;  ?>">
                        <button class="primary-button">
                            <?php  echo  $text_static_product['button_title'] ?>
                            <img  class="arrow-left-white" src="<?php echo get_bloginfo("template_directory") ?>/assets/images/arrow-left.svg" alt="">

                        </button>
                    </a>
            </div>
          

            <div class="products-card-swiper">
                <!-- <div class="swiper-wrapper"> -->
                <?php 
                            if(isset($products)):
                                foreach($products as $product):
                                    
                                    $featured_img_url = get_the_post_thumbnail_url( $product->ID,'full');
                                    $title = get_the_title($product->ID);
                                    ?>
                                    <!-- <div class="swiper-slide"> -->
                                        <div class="product-card"> 
                                                        <a href="<?php echo get_permalink($product->ID) ?>">    
                                            <div>
                                                    <img src="<?php echo $featured_img_url ?>" alt="image">
                                                    <h1>
                                                        <?php echo $title ?>
                                                    </h1>
                                                    <p><?php echo get_the_excerpt($product->ID) ?></p>

                                            </div>
                                            <h5 class="arrow">
                                                    <img  
                                        class="arrow-left-white" 
                                        src="<?php echo get_bloginfo("template_directory") ?>/assets/images/arrow-blue.svg" alt="">

                                <!-- <i class="fas fa-long-arrow-alt-right"></i> -->
                                                    </h5>       
                                                        </a>
                                        </div>
                                    <!-- </div> -->
                                    <?php 

                                endforeach;
                            endif;
                        ?>
                <!-- </div>   -->
            </div>  

            <a id="project_2_show_mobile" class="a-primary-button" href="<?php if($explain['button_link']): echo get_term_link($explain['button_link'][0])  ; endif;  ?>">
                        <button class="primary-button">
                            <?php  echo  $text_static_product['button_title'] ?>
                            <!-- <i class="fas fa-long-arrow-alt-right"></i> -->
                            <img  class="arrow-left-white"  class="arrow-left-white" src="<?php echo get_bloginfo("template_directory") ?>/assets/images/arrow-left.svg" alt="">

                        </button>
            </a>
        </div>

    </div>
</div>
<?php endif; ?>