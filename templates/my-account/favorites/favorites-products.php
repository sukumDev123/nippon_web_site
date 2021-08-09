<?php 
get_template_part("other/loading");
?>


<div class="ui fluid three item  secondary pointing menu">
  <a href="<?php echo  get_site_url() ."/favorites-products" ?>" class="active item">
    ผลิตภัณฑ์
  </a>
  <a href="<?php echo  get_site_url() ."/favorites-solution-color" ?>" class="item">
    บทความการแก้ไขปัญหาสี
  </a>
  <a href="<?php echo  get_site_url() ."/favorites-blog-idea" ?>" class="item">
    บทความไอเดียการตกแต่ง
  </a>
   
</div>
<!-- <div class="ui"> -->
  <?php // var_dump($wishlists); ?>
 
  <?php   
  
  // echo do_shortcode('[yith_wcwl_wishlist]'); 
  

 
  ?>
<div class="mt-3rem"></div>
<div class="ui stackable three column grid">





<?php 
$limit = 9;
if(isset($_GET['limit'])):
  $limit = $_GET['limit'];
endif;
$getFav = getFavoritesData("product" , FALSE , $limit);
$products_favorites = $getFav["datas"];
$count = $getFav["count"];
$index = 0;
  foreach ( $products_favorites as $products_favorite ) :
    $prodId = $products_favorite["post_id"];
    $featured_img_url = get_the_post_thumbnail_url( $prodId,'full');
    $link = get_permalink($prodId);
    $name_product = get_the_title($prodId);
    
    if ( $name_product) :
      
     
      ?>
  
    <div class="column column-product-card">
      <div class=" ui segment height-card-eq">
        <div class="cancel-icon"> 
            <a onclick="removeFavoritesList(<?php echo get_current_user_id() ?> , <?php echo $prodId ?> , 'product'  , <?php echo $index++; ?> , 'column-product-card' )" class="remove_from_wishlist"  >
              <?php  get_template_part("components/icon" ,null, ["icon" => "icon-cancel"]); ?>
            </a>
        </div>
        <div style="text-align:center">
          <div class="ui small image ">
            <img src="<?php echo $featured_img_url  ?>" alt="<?php  echo $name_product ?> ">
          </div>
        </div>
      
        <h3 class="ui head">
          <a class='ui head black'  href="<?php echo $link ?> "> <?php  echo $name_product ?>  </a>
         
          
        </h3>
        <p><?php echo get_the_excerpt($prodId) ?> </p>
      </div>
      
    </div>
    <?php 
      endif;
      
    endforeach;
    
    ?>




</div>




 
<?php if($count >= $limit): $limit = $limit +  3;  ?>
        <h3 class="ui header center aligned">
            <a href="<?php echo  get_permalink()."?limit=". $limit ?>">
                <div class="sub header"> See More</div>
            </a>
        </h3>
        <?php endif; ?>

