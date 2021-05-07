 
  
<?php 

           
$products = get_field("products");
$explain = get_field("explain");
 
?>
   
<div  id="products-2">
    <div>
        <div class="grid">

            <div class="product-content">
                <h1><?php echo $explain['title'] ?></h1>
     
                    <?php echo $explain['detail'] ?>
               
             
                <a class="a-primary-button" href="">
                        <button class="primary-button">
                            <?php  echo $explain['button_title'] ?>
                            <i class="fas fa-long-arrow-alt-right"></i>
                        </button>
                    </a>
            </div>
            <div class="product__">

                    <div class="swiper-container products-card-swiper">
                        <div class="swiper-wrapper">
                            
                        <?php 
                                // $argc = ["post_type" => "product" , "posts_per_page" => 4];
                                // $query = new WP_Query($argc);
                                $products = get_field("products");
                                if($products):
                                    foreach($products as $product):
                                        
                                        $featured_img_url = get_the_post_thumbnail_url( $product->ID,'full');
                                        $title = get_the_title($product->ID);
                                        ?>
                                        <div class="swiper-slide">
                                            <div class="product-card"> 
                                                <div>
                                                        <img src="<?php echo $featured_img_url ?>" alt="image">
                                                        <h1>
                                                            <?php echo $title ?>
                                                        </h1>
                                                        <p><?php echo get_the_excerpt($product->ID) ?></p>


                                                </div>
                                            </div>
                                        
                                            <!-- <div class="tooltip">
                                                <h4>
                                                <?php echo $title ?>
                                                </h4>
                                                <span class="tooltiptext"><?php echo $title ?></span>
                                            </div> -->
                                        </div>
                                        <?php 

                                    endforeach;
                                endif;

                                // wp_reset_query();
                            ?>


                        


                            
                            
                        </div>  
                    </div>  
            </div>  


        </div>

    </div>
</div>
 