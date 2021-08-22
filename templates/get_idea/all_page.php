<?php 

$terms = $args["terms"];

$words = $args['words'];

$termUserType = $args["termUserType"];




?>


<div class="container main-page-get-idea">
 
<?php do_action("select_get_idea" , [
  "termUserType" => $termUserType
]) ?>


    <?php 
    $index = 0;
    foreach($terms as $term):
        $index += 1;
        ?>
         <div class="idea-big-div mt-5">
            <div class="header-cate">
                        <h2 class="ui header"><?php echo $term->name ?></h2>
                        <a  href="<?php echo  get_site_url() ?>/<?php echo $words[$term->slug] ?>/?slide=<?php echo $index ?>&scroll=true">ดูเพิ่มเติม</a>
                </div>
            <div class="swiper-div">
            
                <div class="swiper-container get_idea_swiper_<?php echo $index; ?>">
                    <div class="swiper-wrapper">
                        <?php do_action("get_idea_card" , ["term" => $term->term_id , "index" => $index ]) ?>
                    </div>
                    
                </div>
                <div class="swiper-button-next swiper-button-next-<?php echo $index; ?>"></div>
                    <div class="swiper-button-prev swiper-button-prev-<?php echo $index; ?>"></div>
            </div>
         </div>
        <?php 
    endforeach;
    

    ?>
</div>