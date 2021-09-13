<a class="out-company-card-tag-a" href="<?php echo $args["link"] ?>">
<div class="out-company-card">
        <div class="image-card">
        <?php if(check_new_vs_update($args['id'])) :  
            if(check_new_vs_update($args['id']) == 1):
            ?>
                          <h5 class="new-post">ล่าสุด</h5>
            <?php 
            endif;
        
        endif; ?>

            <img 
                src="<?php echo $args["image"] ?>" 
                alt="<?php echo $args["title"] ?>">
        </div>
        <div class="content-blog">
            <?php
                $term_list = get_the_terms($args["id"], 'media_cat'); 
                if(count($term_list)):
                    ?>
                <div class="sub-title"><?php echo $term_list[0]->name ?></div>
                    <?php 
                endif;
?> 
            <h4 class="title"><?php echo $args['title'] ?></h4>
            <p class="detail"><?php echo $args["detail"] ?></p>
        </div>
    </div>
</a>