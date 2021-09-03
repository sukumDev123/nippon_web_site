<?php 
$argc = [
    "post_type" => "page",
    "p" => 126
];
$query =  new WP_Query($argc) ?>
<?php if($query->have_posts()): while($query->have_posts()): $query->the_post(); ?>
<?php $featured_img_url = get_the_post_thumbnail_url( get_the_ID(),'full'); ?>
<?php  get_header(); ?>

<?php endwhile;endif; wp_reset_query(); ?>
<?php 
$word_selected = "เลือกประเภทสินค้า";



 global $product;
  get_template_part("other/loading");

 
?>
<script>
    let product_cate_select = "";
</script>

<?php
    $terms = get_terms('product_cat', array('hide_empty' => false, 'parent' => 0));
    $termShow = [];
    $termId  = get_queried_object_id();
    $termShow = get_terms('product_cat', array('hide_empty' => false, 'parent' =>$termId));
    if(isset($_GET['search'])):
        echo '<script> setTimeout(() => {
            document.querySelector("#product-title").scrollIntoView({behavior: "smooth" , block: "start"})
        } , 100)</script>';
    endif;
    
?>

<div id="filter_product_mobiles">

    <!-- <div class="filter_product_close"></div> -->
    <i id="filter_product_close" class="fas fa-times"></i>
    <div class="filter-content">
        <h3>ตัวคัดกรอง</h3>
        <div class="filter-product-cate-div">

        <?php
      
      if(!empty($termShow)) {
          foreach($termShow as $t) {
              $termShowData = get_terms('product_cat', array('hide_empty' => false, 'parent' => $t->term_id));
              if($t->description != "0"):
              
                  echo '<div class="product-cate-card"> <div class="d-flex align-items-center justify-content-between product-cate-card-clicked"><h2>'.$t->name.'</h2><i class="fas fa-chevron-down"></i> </div> ';
                echo '<div class="cate-div">';
                  $_slugs = "";
                  foreach ($termShowData as  $category) {
                      if(isset($_GET['slug'])) {
                          $_slugs = explode(",",$_GET['slug']);
                          $slug = "'" . $_GET["slug"]."'";
                        
                      } else { 
                          $slug = "''"; 
                      }
                     
                      $checked = "";
                      if($_slugs):
                          if(count($_slugs) > 0) :
                              foreach( $_slugs as $_slug):
                                  if( $_slug == $category->name):
                                      $checked= "checked";
                                  endif;
                              
                              endforeach;
                          endif;
                      endif;
                  
                      $thisCate = "'".$category->name."'";
                      if($category->description != "0"): 
                      echo '
                      <h5 id="mobile_categories" class="d-flex align-items-center justify-content-between">
                          <a>'. $category->name .' </a>
                          <input '.$checked.' type="checkbox" type="radio"   />
                          <input type="hidden" value="'.$category->name.'" />
                          </h5>

                          ';
                      endif;
                  }
                  echo '</div>';
                  echo '</div>';

                endif;

          }
      }
  ?>
        </div>

  <!-- <button class="primary-button"> ตกลง <i class="fas fa-long-arrow-alt-right"></i> </button>
 -->
 <div class="mt-3"></div>
 <a  id="project_suggestion_button_desktop" class="a-primary-button"  onclick="clicked_cate_filter()">
                <button class="primary-button">
                    ตกลง
                    <img  class="arrow-left-white" src="<?php echo get_bloginfo("template_directory") ?>/assets/images/arrow-left.svg" alt="">

                </button>
            </a>
       
    </div>

</div>

<?php
        $termData = get_term_by("term_id" , $termId , "product_cat");
        
        $cateName = "";
        if($termData):
            $cateName = $termData->name ;
        endif;
        $query_product_banner = new WP_Query([
            "post_type" => "product_banner",
            "meta_query" => [
               [
                "key" => "show_all_product_page",
                "value"  => true  ,
                "compare" => "LIKE"
               ]
            ],
            "posts_per_page" => 1
        ]);
        $product_banners  = [];
        if($query_product_banner->have_posts()):
            while($query_product_banner->have_posts()):
                $query_product_banner->the_post();
                $product_banners = acf_photo_gallery("product_banners" , get_the_ID());
            endwhile;
        endif;
        wp_reset_query();
        ?>

<div class="page-bk-product">


    <!-- <div class="page-bk-image"> -->
    <div class="swiper-container products-list-swiper">
        <div class="swiper-wrapper">

      

        <?php
        
        if(count( $product_banners) > 0):
            foreach( $product_banners as  $product_banner):
                $image_product_banner = $product_banner['full_image_url'];
                ?>
                <div class="swiper-slide">
                    <div class="image-logo-bk"> </div>
                    <img alt="logo" src="<?php echo $image_product_banner ?>"  class="image-logo" />
                </div>
                <?php 
            endforeach;

        else:
            ?>

                <div class="swiper-slide">
                    <div class="image-logo-bk"> </div>
                    <img alt="logo" src="<?php echo $featured_img_url ?>"  class="image-logo" />
                </div>

            <?php 
        endif;
        ?>


         
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <!-- </div> -->
   
</div>
 


<div class="container"  id="product-title" >
    <div class="page-detail">
        <?php $query =  new WP_Query($argc) ?>
        <?php if($query->have_posts()): while($query->have_posts()): $query->the_post(); ?>
            <h1><?php echo get_the_title() ?></h1>
            <p><?php echo get_field("short_text") ?></p>
            <form   onsubmit="onProductTemplateSearch(event , '<?php echo get_permalink() ?>', '#search')" class="search-filter">
            <?php 
            $slug = "";
            if(isset($_GET["slug"]) ) :  
                $slug = $_GET["slug"];  
        
            endif;
            
            ?>
            <input type="hidden" value="<?php echo  $slug ?>" name="<?php  if( $slug) : echo  "slug"; else : echo "" ; endif; ?>" />
            <i class="fas fa-search"></i>
                <input type="text" id="search" name="search" value="<?php if(isset($_GET["search"])): echo $_GET["search"]; endif; ?>" placeholder="Search..." />
            </form>
        <?php endwhile;endif; wp_reset_query(); ?>
        </div>
</div>
 
<?php if(!isset($_GET['search'])): ?>
<div  class="container" id="all-product-content" >



<div class="row">
<?php if(count($terms) > 0): ?>
            <?php foreach($terms as  $term): 
                $className = ""; 
                if($term->name != "all"): if($termId == $term->term_id): $className="cate-active";$word_selected=$term->name; endif;  
                $thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
$image = wp_get_attachment_url( $thumbnail_id );
                
                ?>
                <div class="col-12 col-md-4 product-cat-card">
                   <a href="<?php echo get_term_link($term->term_id)  ?>/?scroll=true">
                    <img class="product-cat-image" src="<?php echo $image ?>" alt="<?php echo $term->name ?>">
                        <h1 class="ui header "><?php echo $term->name ?></h1>
                        <p ><?php echo $term->description ?></p>
                   </a>
                </div>
            <?php endif; endforeach; ?>
            <div class="col-12 col-md-4 product-cat-card"></div>
        <?php endif; ?>
</div>
 

</div>
<?php else: ?>





    <div  class="container" id="product-container" >
     

 
    <ul class="products clear-padding">

    <?php
        $tax_query = [];
        $search = "";
        
      
       
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 12,
            'meta_key'	=> 'priority',
            'orderby'   => 'meta_value_num',
            'order'		=> 'ASC'
           
        );
        if(isset($_GET['search']))  :
            $args["s"] =  $_GET["search"];
            $search = $_GET['search'];
        endif;
        $args['paged'] = 1;
        if(isset($_GET["p-page"])) {
            $args['paged']= $_GET["p-page"];
        }
        
      
        $data_favorites = getFavoritesData("product");
        $index = 0;
        $loop = new WP_Query( $args );
        if ( $loop->have_posts() ) {
            while ( $loop->have_posts() ) : $loop->the_post();
                $featured_img_url = get_the_post_thumbnail_url( get_the_ID(),'full');
                $link = get_permalink(get_the_ID());
                $target = "_self";
                if(get_field("external_link")) {
                    $link =  get_field("external_link");
                    $target = "_blank";
                }
                get_template_part("components/products-component" , null , [
                    "target" =>  $target,
                    "title" => get_the_title() ,
                    "featured_img_url" => $featured_img_url,
                    "detail" => get_the_excerpt(),
                    "href" => $link,
                    "user" => get_current_user_id(),
                    "data_favorites" => $data_favorites['datas'],
                    "prod_id" => get_the_ID(),
                    "index" => ++$index 
                ]);
            endwhile;
        } else {
            echo __( 'No products found' );
        }
    ?>
    </ul><!--/.products-->
    
</div>
 
<div class="pagination">
    <?php 
        echo paginate_links( array(
 
            'format' => '/?p-page=%#%',
            'current' => max( 1,  $args['paged']  ),
            'total' => $loop->max_num_pages,
           'prev_next'    => true,
            'prev_text'    => sprintf( '<i></i> %1$s', __( '<', 'text-domain' ) ),
            'next_text'    => sprintf( '%1$s <i></i>', __( '>', 'text-domain' ) ),
        ) );

        wp_reset_postdata();  

    ?>
</div>




<?php endif; ?>
 
<div class="mt-5rem"></div>
 

<?php 
 
 get_template_part("pages/page-services");

?>

<div class="mt-5rem"></div>

 <?php get_footer() ?>