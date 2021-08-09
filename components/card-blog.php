<div class="column">
    
<div class="card-blog ">
    <div class="card-blog-header">
        <?php if(isset($args['new'])) :  
            if($args["new"] == TRUE):
            ?>
                <h5 class="card-blog-new">ล่าสุด</h5>
            <?php 
            endif;
        
        endif; ?>

        <?php if(isset($args['user_id'])) :  
            if($args["user_id"] != FALSE):
                $userId = $args["user_id"];
                $postId = $args["id"];
                $favorite = $args["favorite"];
                $checkF = $favorite;
                $index = $args["index"];
                $type_blog = $args["type_blog"];
            ?>
                <div onclick="saveFavorites(<?php echo $userId ?>  , <?php echo $postId ?> , '<?php echo $type_blog ?>' , <?php echo $index ?>  )" class="card-blog-save-favorites">
                    <img 
                    class="favorites-button <?php if($checkF === TRUE): echo "hide"; else : echo "show";  endif; ?>"
                        src="<?php echo get_bloginfo("template_directory") ?>/assets/images/save-favorties-blog.svg" 
                        alt="" />
                    <img 
                    class="favorites-button-active <?php if($checkF === TRUE): echo "show"; else : echo "hide";  endif; ?>"
                        src="<?php echo get_bloginfo("template_directory") ?>/assets/images/saved_favorites.svg" 
                        alt="" />
                </div>
            <?php 
            endif;
        
        endif; ?>

<a href="<?php echo get_permalink($args["id"]) ?>" style="display:block">
        <img 
            src="<?php echo $args["image"] ?>" 
            alt="<?php echo $args["title"] ?>" />

    </a>
    </div>
    <a href="<?php echo get_permalink($args["id"]) ?>" style="display:block">
    <div class="card-blog-content">
        <h5 class="ui header pointer">
        <?php echo $args["title"] ?>
        </h5>
        <p>
        <?php echo $args["detail"] ?>
        </p>
    </div>
    </a>
</div>
 

</div>
