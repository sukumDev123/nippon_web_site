<div class="compare-product-table-images">
            <div class="image hh">
                <h3><?php echo $args["title"] ?></h3>
               
            </div>
            <?php if($args["product1"]): ?>
            <div class="image two">
                   <h3>
                        <?php if($args['product1'] == 1): ?>
                            <img 
                                   style="width:24px"
                                   class="icon_checked"

                                   src="<?php echo  get_bloginfo("template_directory");  ?>/assets/images/icon_checked.svg" 
                                   alt="icon_checked">
                            <?php else: ?>
                            -
                                   <?php endif; ?>
                   </h3>
            </div>
         <?php endif; ?>
         <?php if($args["product2"]): ?>
                <div class="image two">
               <h3>
               <?php if($args['product2'] == 1): ?>
                            <img 
                                   style="width:24px"
                                   class="icon_checked"

                                   src="<?php echo  get_bloginfo("template_directory");  ?>/assets/images/icon_checked.svg" 
                                   alt="icon_checked">
                            <?php else: ?>
                            -
                                   <?php endif; ?>
               </h3>
                </div>
         <?php endif; ?>
         <?php if($args["product3"]): ?>
          
                <div class="image two">
                <h3>
                <?php if($args['product3'] == 1): ?>
                            <img 
                                   style="width:24px"
                                   class="icon_checked"

                                   src="<?php echo  get_bloginfo("template_directory");  ?>/assets/images/icon_checked.svg" 
                                   alt="icon_checked">
                            <?php else: ?>
                            -
                                   <?php endif; ?>
                </h3>
                </div>
                <?php endif; ?>
 
    </div>