<?php 

$products = get_field("products");
$lang=get_bloginfo("language");  

 $text_static = [
     "en" => [
         "product_title" => "Product Relation",
         "product_link" => "Search",
         "product_link_url" =>  get_site_url()  . "/products/"

     ],
     "th" => [
         "product_title" => "ผลิตภัณฑ์แนะนำ",
         "product_link" => "ค้นหาผลิตภัณฑ์เพิ่มเติม",
          "product_link_url" => get_site_url()  . "/products/"

     ]
 ][$lang];

?>
<div  id="products-1">
       <div class="container">
            <div class="title">
                    <h1><?php echo  $text_static['product_title'] ?></h1>
                    <a href="<?php echo  $text_static['product_link_url'] ?>  ">
                    <?php echo $text_static['product_link'] ?>
                        <i class="fas fa-long-arrow-alt-right ml-5"></i>
                    </a>
                   
            </div>
            <div class="products-card">
 
            
            <?php 

                if($products):
                    foreach($products as $product):
                        
                        $featured_img_url = get_the_post_thumbnail_url( $product->ID,'full');
                        $title = get_the_title($product->ID);
                        ?>
                        <div class="product-card">
                            <a href="<?php echo get_permalink($product->ID) ?>">
                            <img src="<?php echo $featured_img_url ?>" alt="image">
                            <h4>
                                    <!-- <span class="d-inline-block text-truncate" style="max-width: 240px;"> -->
                                        <?php echo $title ?>
                                    <!-- </span>  -->
                                </h4>
                                <p><?php echo get_the_excerpt($product->ID) ?></p>
                                
                            </a>


                    </div>
                        <?php 

                    endforeach;
                endif;

                // wp_reset_query();
            ?>
           
        </div>  
        </div>
</div>