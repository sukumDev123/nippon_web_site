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
$lang=get_bloginfo("language");  

$words = [
    "th" => [
        "search" => "ค้นหาผลิตภัณฑ์"

    ] ,
    "en" => [
        "search" => "Search"
    ]
][$lang];



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
    if(isset($_GET['slug']) || isset($_GET['scroll'])  || isset($_GET['search'])):
        echo '<script> setTimeout(() => {
            document.querySelector("#nav-products").scrollIntoView({behavior: "smooth" , block: "start"})
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
        
        $query_product_banner = new WP_Query([
            "post_type" => "product_banner",
            "meta_query" => [
               [
                "key" => "category",
                "value"  => $termData->name  ,
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

 <?php get_template_part("woocom/nav_products" , null , [
     "word_selected" => $word_selected,
     "terms" => $terms,
     "termId" => $termId 
 ]) ?>


<div class="container"  id="product-title" >
    <div class="page-detail">
        <?php $query =  new WP_Query($argc) ?>
        <?php if($query->have_posts()): while($query->have_posts()): $query->the_post(); ?>
            <h1><?php echo get_the_title() ?></h1>
            <p><?php echo get_field("short_text") ?></p>
            <form   method="get" class="search-filter">
            <?php 
            $slug = "";
            if(isset($_GET["slug"]) ) :  
                $slug = $_GET["slug"];  
        
            endif;
            
            ?>
            <input type="hidden" value="<?php echo  $slug ?>" name="<?php  if( $slug) : echo  "slug"; else : echo "" ; endif; ?>" />
            <i class="fas fa-search"></i>
                <input type="text" name="search" value="<?php if(isset($_GET["search"])): echo $_GET["search"]; endif; ?>" placeholder="<?php echo $words["search"] ?>" />
            </form>
        <?php endwhile;endif; wp_reset_query(); ?>
        </div>
</div>
 
<div  class="container" id="product-container" >
    <div class="product-cate-div">
        
    <?php
      
        if(!empty($termShow)) {
            foreach($termShow as $t) {
                $termShowData = get_terms('product_cat', array('hide_empty' => false, 'parent' => $t->term_id));
                if($t->description != "0"):
                    echo '<div class="product-cate-card"><h2>'.$t->name.'</h2>';
                    $_slugs = "";
                    $cateThisCounted = ""; //เช็คว่า ตัวเลือกชนิดนี้ถูกเลือก filter แล้ว
                    foreach ($termShowData as  $category) {
                        if(isset($_GET['slug'])) {
                            $get_S = $_GET["slug"];
                            $_slugs = explode(",",$_GET['slug']);
                            $slug = "'" .  $get_S."'";
                            foreach( $_slugs as $_slug) {
                                if(trim($_slug) == trim($category->name)) {
                                    $cateThisCounted = $_slug;
                                }
                            }
                        } else { 
                            $slug = "''"; 
                        }
                    }
                    foreach ($termShowData as  $category) {
                        $checked = "";
                        if($_slugs):
                            if(count($_slugs) > 0) :
                      
                                foreach( $_slugs as $_slug):
                                 
                                    if(  urlencode($_slug) == urlencode($category->name)):
                                        $checked= "active";
                                    endif;
                                
                                endforeach;
                            endif;
                        endif;
                        $thisCate = "'".$category->name."'";
                        if($category->description != "0"):
                        echo <<<html
                            <h5>
                                <a>$category->name </a>
                                <div class="box-check" onclick="getChecked($slug ,  $thisCate , '$cateThisCounted')" >
                                    <div class="$checked"></div>
                                </div>
                            </h5>

                            html;
                        endif;
                    }
                    echo '</div>';
                endif;

            }
        }
    ?>
  </div>

    <div class="product-cate-div-mobile">
        <button class="filter-button">ตัวคัดกรอง</button>
    </div>


    <ul class="products">

    <?php
        $tax_query = [];
        $search = "";
        
        if(isset($_GET['slug'])):
            $_slugs = explode(",",$_GET['slug']);
            // array_push($_slugs , $termId);
             
            if(count($_slugs) > 0):
                $tax_query = [
                    'relation' => 'AND',
                    [
                        'taxonomy' => 'product_cat',
                        'field' => 'term_id',
                        'terms' =>  array($termId),
                        'include_children' => true,
                        'operator' => 'IN'
                    ]
                ];
                
                for($i = 0 ; $i < count($_slugs);$i++) {
                    $_s = $_slugs[$i];
                    if($_s) {
                        array_push($tax_query , [
                            'taxonomy' => 'product_cat',
                            'field' => 'name',
                            'terms' =>  $_s,
                            'include_children' => true,
                            'operator' => 'IN'
                        ]);
                    }
                    
                }

            endif;
        
        else :
            $tax_query = [
                [
                    'taxonomy' => 'product_cat',
                    'field' => 'term_id',
                    'terms' =>  [$termId],
                    'include_children' => true,
                    'operator' => 'IN' 
                ]
            ];
        endif;
       
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 9,
            "tax_query" =>  $tax_query,
            'meta_key'	=> 'priority',
            'orderby'   => 'meta_value_num',
            'order'		=> 'ASC'
           
        );
        if(isset($_GET['search']))  :
            $args["s"] =  $_GET["search"];
            $search = $_GET['search'];
        endif;
        $args['paged'] = 1;
        if(isset($_GET["page"])) {
            $args['paged']= $_GET["page"];
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
 
            'format' => '?page=%#%',
            'current' => max( 1,  $args['paged']  ),
            'total' => $loop->max_num_pages,
           'prev_next'    => true,
            'prev_text'    => sprintf( '<i></i> %1$s', __( '<', 'text-domain' ) ),
            'next_text'    => sprintf( '%1$s <i></i>', __( '>', 'text-domain' ) ),
        ) );

        wp_reset_postdata();  

    ?>
</div>
<div class="mt-5rem"></div>

<?php  get_template_part("other/solution-home-page"); ?>
<div class="mt-5rem" style="height: 30px"></div>
 

<?php 
 
 get_template_part("pages/page-services");

?>

<div class="mt-5rem"></div>

<script>
    function getChecked(slug , _slug_ , oldSlug ) {
        let _slug = "";
        let elseCase = true
        let checkWordEq = false

        if(slug.match(_slug_)) {
            _slug = slug.split(",").filter(s => s.trim() != _slug_.trim()).join(",")
          
            if(_slug == "") {
                window.location.href = '<?php echo get_term_link($termId) ; ?>';
            }
            elseCase = false
            checkWordEq = true
        } 


        if(oldSlug && !checkWordEq) {
                slug = slug.split(",").filter(s => s.trim() != oldSlug.trim()).join(",")
                elseCase = true

            }
        
        
       
        console.log({slug , oldSlug  , _slug_ , ll:slug.match(_slug_)})
        
        if(elseCase) {
             
            _slug = slug ? slug + "," + _slug_ : _slug_;
        }
    
      console.log({la: _slug})
      <?php  if($search) { ?>
                <?php echo  "if(_slug) window.location.assign('?search=".$search."&slug=' + _slug)"; ?> 
            <?php } else{  ?>
                <?php echo  "if(_slug) window.location.assign('?slug=' + _slug)";     ?>    
        <?php } ?>
        
     
    }
    function clicked_cate_filter() {
        const _f = document.querySelectorAll("#mobile_categories");
        let _slug_href = "";
        if(_f) {
            Array.from(_f).forEach((ele , index) => {
                if(ele.children[2]) {
                
                    const _slug = ele.children[2].value
                    if(ele.children[1].checked) {
 
                    // _slug_href += _slug + ",";
                    _slug_href +=  _slug + " ";
                    }
                }
            })
        }
        if(_slug_href) {
            _slug_href = _slug_href.split(' ').join(",");
 
            <?php  if($search) { ?>
                <?php echo  "if(_slug_href) window.location.assign('?search=".$search."&slug=' + _slug_href)"; ?> 
            <?php } else{  ?>
                <?php echo  "if(_slug_href) window.location.assign('?slug=' + _slug_href)";     ?>    
        <?php } ?>
        }
    }
</script>