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
<div class="ui">
  <?php // var_dump($wishlists); ?>
 
  <?php   
  
  // echo do_shortcode('[yith_wcwl_wishlist]'); 
  $wishlist = YITH_WCWL_Wishlist_Factory::get_current_wishlist([
    'per_page' => 5,
    'current_page' => 0,
   ] );

  $wishlist_items = $wishlist->get_items( 0, 5 );
  ?>
  <div class="ui grid">
  <div class="doubling stackable three column row">
    <?php 
  foreach ( $wishlist_items as $item ) :
    $product      = $item->get_product();
    if ( $product && $product->exists() ) :
       
      ?>


    <div class="column ">
      <div class=" ui segment height-card-eq">
        <div style="text-align:center">
          <div class="ui small image ">
            <?php echo $product->get_image()  ?>
          </div>
        </div>
      
        <h5 class="ui head">

          <?php echo $product->get_name()  ?>



								<a href="<?php echo esc_url( add_query_arg( 'remove_from_wishlist',$item->get_product_id() ) ); ?>" class="remove_from_wishlist" title="<?php echo esc_html( apply_filters( 'yith_wcwl_remove_product_wishlist_message_title', __( 'Remove this product', 'yith-woocommerce-wishlist' ) ) ); ?>">Delete</a>

        </h5>
      </div>
      
    </div>
 



    <?php 
      endif;
      
    endforeach;
    
    ?>
  </div>
  </div>

</div>