<div class="compare-product-table-images">
            <div class="image hh">
                <h3></h3>
               
            </div>
            <div class="image two">
                <a href="<?php echo get_permalink($args['product_id_1']) ?>" class="btn btn-block  btn-detail-product-compare" ><?php echo $args["product1"] ?></a>
            </div>
            <?php if($args["product_id_2"]): ?>
                <div class="image two">
                    <a href="<?php echo get_permalink($args['product_id_1']) ?>" class="btn btn-block  btn-detail-product-compare"  ><?php echo $args["product2"] ?></a>
                </div>
            <?php endif; ?>
            <?php if($args["product_id_3"]): ?>
                <div class="image two">
                    <a href="<?php echo get_permalink($args['product_id_1']) ?>" class="btn btn-block btn-detail-product-compare "  ><?php echo $args["product3"] ?></a>
                </div>
            <?php endif; ?>

    </div>