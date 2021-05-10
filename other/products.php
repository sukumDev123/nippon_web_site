<?php 

$products = get_field("products");


?>
<div  id="products-1">
       <div class="container">
            <div class="title">
                    <h1><?php echo get_field("explain")['title']; ?></h1>
                    <a><?php echo get_field("explain")['button_title']; ?></a>
            </div>
            <div class="products-card">
            <?php 

                if($products):
                    foreach($products as $product):
                        
                        $featured_img_url = get_the_post_thumbnail_url( $product->ID,'full');
                        $title = get_the_title($product->ID);
                        ?>
                        <div class="product-card">
                            <img src="<?php echo $featured_img_url ?>" alt="image">
                            <h4>
                                <a href="<?php echo get_permalink($product->ID) ?>">
                                    <!-- <span class="d-inline-block text-truncate" style="max-width: 240px;"> -->
                                        <?php echo $title ?>
                                    <!-- </span>  -->
                                </a>
                            </h4>
                            <p><?php echo get_the_excerpt($product->ID) ?></p>



                    </div>
                        <?php 

                    endforeach;
                endif;

                // wp_reset_query();
            ?>
        </div>  
        </div>
</div>