<?php 

$wishlists = YITH_WCWL_Wishlist_Factory::get_wishlists();
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
  $wishlist = YITH_WCWL_Wishlist_Factory::get_current_wishlist([
    'per_page' => 5,
    'current_page' => 0,
   ] );

	if ( $wishlist && $wishlist->has_items() ) :
  $wishlist_items = $wishlist->get_items( 0, 5 );
  ?>

<div class="ui stackable three column grid">





<?php 
  foreach ( $wishlist_items as $item ) :
    $product = $item->get_product();
    if ( $product && $product->exists() ) :
      $link = get_permalink($product->get_id());
     
      ?>
  <!-- <div class="three wide column"></div> -->

    <div class="column">
      <div class=" ui segment height-card-eq">
        <div class="cancel-icon"> 
            <a    
              href="<?php echo esc_url( add_query_arg( 'remove_from_wishlist',$item->get_product_id() ) ); ?>" 
              class="remove_from_wishlist" 
              title="<?php echo esc_html( apply_filters( 'yith_wcwl_remove_product_wishlist_message_title', __( 'Remove this product', 'yith-woocommerce-wishlist' ) ) ); ?>">
     <?php 
     
     get_template_part("components/icon" ,null, ["icon" => "icon-cancel"]);

    //  icon-cancel
     
     ?>
          </a>
        </div>
        <div style="text-align:center">
          <div class="ui small image ">
            <?php echo $product->get_image()  ?>
          </div>
        </div>
      
        <h3 class="ui head">
          <a class='ui head black'  href="<?php echo $link ?>"> <?php echo $product->get_name()  ?></a>
         
          
        </h3>
        <p><?php echo $product->get_short_description()  ?></p>
      </div>
      
    </div>
 



    <?php 
      endif;
      
    endforeach;
    
    ?>




</div>




 
<?php endif; ?>


