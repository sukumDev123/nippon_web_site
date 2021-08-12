<div class="compare-product-table-images">
    <div class="image hh">
        <h3  class="  text-ellipsis"><?php echo $args["title"]  ?></h3>
            
    </div>
    <div class="image two">
        <h3   data-bs-toggle="tooltip" data-bs-placement="left" title="<?php echo $args["product1"] ?>"  ><?php echo $args["product1"] ?></h3>
    </div>
    <?php if($args["product2"]): ?>
        <div class="image two">
            <h3  data-bs-toggle="tooltip" data-bs-placement="left" title="<?php echo $args["product2"] ?>"    ><?php echo $args["product2"] ?></h3>
        </div>
    <?php endif; ?>
    <?php if($args["product3"]): ?>
        <div class="image two">
            <h3  data-bs-toggle="tooltip" data-bs-placement="left" title="<?php echo $args["product3"] ?>"    ><?php echo $args["product3"] ?></h3>
        </div>
    <?php endif; ?>

</div>