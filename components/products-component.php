
<?php 

$userId = $args["user"];
$data_favorites = $args["data_favorites"];
 
$prod_id =  $args["prod_id"];
//    $data_favorites
$heart_outline_class_name = "heart outline icon show";
$heart_class_name= "heart icon hide_show";

if(isset($data_favorites[$prod_id])):
 $heart_outline_class_name = "heart outline icon hide_show";
 $heart_class_name= "heart icon show";

endif;
?>

<div class="product-component">    


                <?php if( $userId !=  FALSE): ?>
                    
                    <i id="product-favorites-tag-<?php echo $args['index'] ?>" onclick="productFavoritesList(<?php echo $userId ?> ,  <?php  echo $prod_id ?> , 'product' , <?php echo $args['index'] ?> )" class="<?php echo $heart_outline_class_name  ?>"></i>
                    <i  id="product-saved-favorites-tag-<?php echo $args['index'] ?>"  onclick="productFavoritesList(<?php echo $userId ?> ,  <?php  echo $prod_id ?> , 'product'  , <?php echo $args['index'] ?>)" style="color:#D7373F" class="<?php echo $heart_class_name  ?>"></i>
                <?php endif; ?>


        <a target="<?php echo $args["target"] ?>" href="<?php echo $args["href"] ?>"> 
            <img src="<?php echo $args["featured_img_url"] ?>" alt="image"  />
            <h2><?php echo $args["title"] ?></h2>
            <p><?php echo $args["detail"] ?></p>
            <h5 class="arrow">
                <img  
                    class="arrow-left-white" 
                    src="<?php echo get_bloginfo("template_directory") ?>/assets/images/arrow-blue.svg" 
                    alt="">
            </h5>
        </a>
</div>