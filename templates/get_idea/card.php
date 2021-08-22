<?php 


$terms = [];

if(get_the_terms(get_the_ID() , "get_id_user_type") != NULL):
    $terms = get_the_terms(get_the_ID() , "get_id_user_type");
endif;

?>

<div class="card-get-idea">
        <div class="card-get-idea-header">
                <a href="<?php echo $args["link"] ?>">
                <img src="<?php echo $args["featured_img_url"];  ?>" alt=" <?php echo  $args["title"] ?>">
                </a>
                <?php if(isset($args['user_id'])) :  
                        do_action("make_favorites_blogs" , [
                            "user_id" =>  $args['user_id'],
                            "id" =>  $args["id"],
                            "favorite" =>  $args["favorite"],
                            "index" =>  $args["index"],
                            "type_blog" =>  $args["type_blog"],
                            "nameClass" => $args["nameClass"].$args["index"]
                        ]);  
                    endif; ?>
                <div class="tag-user-type">
                    <div class="tags">
                       <?php if(count( $terms )): ?>
                    <?php 
                    
                    foreach($terms as $term):
                        $name = $term->name;
                        ?>
                            <div class="tag-user-card">
                                <h5 class="ui header"><?php echo $name  ?></h5>

                            </div>

                        <?php
                    endforeach;
                    
                    ?>
                <?php endif; ?>
                   </div>
               
                    <?php if(get_field("download")): $download = get_field("download"); ?>
                   <div class="download">
                       <a href="<?php echo $download['url']; ?>">
                       <h5 class="ui header">
                                <i class="bi bi-arrow-bar-down"></i>        
                            </h5>
                         </a>
                   </div>
                   <?php endif; ?>
                </div>
            </div>
            <div class="card-get-idea-content">
               
                    <a style="display: block;" href="<?php echo $args["link"] ?>">
                        <h4 class="ui header">
                            <?php echo  $args["title"] ?>
                        </h4>
                        <p><?php echo $args["short_text"] ?></p>

                        <?php if(get_field( "author" , $args["id"] )): ?>
                        <h4 class="ui header">
                        ผู้เขียน : <?php echo get_field("author" , $args["id"] ) ?>
                        </h4>
                        <?php endif; ?>
                    </a>
            </div>
       </div>