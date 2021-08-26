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
             do_action("make_favorites_blogs" , [
                "user_id" =>  $args['user_id'],
                "id" =>  $args["id"],
                "favorite" =>  $args["favorite"],
                "index" =>  $args["index"],
                "type_blog" =>  $args["type_blog"],
                "nameClass" => "card-blog-fav-" .  $args["index"]
            ]);  
        endif; ?>

<a href="<?php echo get_permalink($args["id"]) ?>" style="display:block">
        <img 
        class="card-blog-image-bk"
            src="<?php echo $args["image"] ?>" 
            alt="<?php echo $args["title"] ?>" />

    </a>
    </div>
    <a href="<?php echo get_permalink($args["id"]) ?>" style="display:block">
    <div class="card-blog-content">
        <h5 class="ui header pointer">
        <?php echo $args["title"] ?>
        </h5>
        <?php echo $args["detail"] ?>
    </div>
    </a>
</div>
 

</div>
