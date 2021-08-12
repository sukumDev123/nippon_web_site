 
                <button <?php if($args["onClick"]): echo "onclick='".$args["onClick"]."'"; endif; ?> id="<?php echo $args["id"] ?>" type="submit" class="button-submit primary-button">
                    <span><?php echo $args["title"] ?></span>
                    <!-- <i class="fas fa-long-arrow-alt-right"></i>
                -->
                <img  class="arrow-left-white" src="<?php echo get_bloginfo("template_directory") ?>/assets/images/arrow-left.svg" alt="">
                </button>
        