<div class="compare-product-table-images">
    <div class="image hh">
        <h3><?php echo $args["title"]  ?></h3>
            
    </div>
    <div class="image two" style="text-align:left">
    <h3  class="compare-title-text-show-mobile   text-ellipsis"><?php echo $args["title"]  ?></h3>
        <h3  ><?php echo $args["product1"] ?></h3>
    </div>
    <?php if($args["product2"]): ?>
        <div class="image two" style="text-align:left">
        <h3  class="compare-title-text-show-mobile none   text-ellipsis"><?php echo $args["title"]  ?></h3>

            <h3   ><?php echo $args["product2"] ?></h3>
        </div>
    <?php endif; ?>
    <?php if($args["product3"]): ?>
        <div class="image two" style="text-align:left">
        <h3  class="compare-title-text-show-mobile   text-ellipsis"><?php echo $args["title"]  ?></h3>

            <h3   ><?php echo $args["product3"] ?></h3>
        </div>
    <?php endif; ?>

</div>