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
    if(isset($_GET['slug']) || isset($_GET['scroll'])  || isset($_GET['search'])):
        echo '<script> setTimeout(() => {
            document.querySelector(".search-filter").scrollIntoView({behavior: "smooth" , block: "start"})
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

<div class="page-bk-product">

    <!-- <div class="page-bk-image"> -->
    <img alt="logo" src="<?php echo $featured_img_url  ?>"  class="image-logo" />
    <div class="image-logo-bk"> </div>
    <!-- </div> -->
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
            <input type="text" name="search" value="<?php if(isset($_GET["search"])): echo $_GET["search"]; endif; ?>" placeholder="Search..." />
        </form>
    <?php endwhile;endif; wp_reset_query(); ?>
    </div>
</div>

<div  id="nav-products">
    <ul class="desktop">
        <?php if(count($terms) > 0): ?>
            <?php foreach($terms as  $term): $className = ""; if($term->name != "all"): if($termId == $term->term_id): $className="cate-active";$word_selected=$term->name; endif;  ?>
                <li class="<?php  echo $className ?>"> 
                    <a href="<?php echo get_term_link($term->term_id)  ?>/?scroll=true"><?php echo $term->name ?></a>
                </li>
            <?php endif; endforeach; ?>
        <?php endif; ?>
    </ul>
    
        <button 
            id="productCate" 
            type="button" 
            class="btn  dropdown-toggle" 
            data-bs-toggle="dropdown" 
            aria-expanded="false"
        >
        <?php echo $word_selected ?>
        </button>
        <ul class="dropdown-menu" aria-labelledby="productCate">
        <li>
            <a class="dropdown-item"  >
                        เลือกประเภทสินค้า
                    </a>    
            </li>
        <?php foreach($terms as  $term): if($term->name != "all"): $className = "";  if($termId == $term->term_id): $className="cate-active"; endif;  ?>
                <li > 
                    <a 
                        class="dropdown-item"  
                        href="<?php echo get_term_link($term->term_id)  ?>/?scroll=true"><?php echo $term->name ?></a>
                </li>
            <?php endif; endforeach; ?>
            
        </ul>

 
</div>


 
<div id="product-container" >
    <div class="product-cate-div">
        
    <?php
      
        if(!empty($termShow)) {
            foreach($termShow as $t) {
                $termShowData = get_terms('product_cat', array('hide_empty' => false, 'parent' => $t->term_id));
                if($t->description != "0"):
                
                    echo '<div class="product-cate-card"><h2>'.$t->name.'</h2>';
                    $_slugs = "";
                    foreach ($termShowData as  $category) {
                        if(isset($_GET['slug'])) {
                            $get_S = $_GET["slug"];
                            $_slugs = explode(",",$_GET['slug']);
                            $slug = "'" .  $get_S."'";
                     
                         
                        } else { 
                            $slug = "''"; 
                        }
                    
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
                        echo '
                            <h5>
                                <a>'. $category->name .' </a>
                                <div class="box-check" onclick="getChecked('.$slug.' , '. $thisCate.')" >
                                    <div class=" '.$checked.'"></div>
                                </div>
                            </h5>

                            ';
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
        
      
        
        $loop = new WP_Query( $args );
        if ( $loop->have_posts() ) {
            while ( $loop->have_posts() ) : $loop->the_post();
                 
                    $featured_img_url = get_the_post_thumbnail_url( get_the_ID(),'full');
               
                $link = get_permalink(get_the_ID());
                $aTag = '<a  href="'.$link.'">';
                if(get_field("external_link")) {
                    $link =  get_field("external_link");
                $aTag = '<a target="_blank"  href="'.$link.'">';

                }
               ?>
                        <div class="product-card">
                                <?php echo  $aTag; ?>

                                <img src="<?php echo $featured_img_url ?>" alt="image"  />
                                <h2><?php echo get_the_title() ?></h2>
                                <p><?php echo get_the_excerpt() ?></p>
                                <h5 class="arrow">
                                    <img  
                                        class="arrow-left-white" 
                                        src="<?php echo get_bloginfo("template_directory") ?>/assets/images/arrow-blue.svg" alt="">

                                <!-- <i class="fas fa-long-arrow-alt-right"></i> -->
                                </h5>
                            </a>
                        </div>

                <?php 
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
    function getChecked(slug , _slug_ ) {
        let _slug = "";
        
            if(slug.match(_slug_)) {
            _slug = slug.split(",").filter(s => s != _slug_).join(",")
            // console.log({_slug})
            if(_slug == "") {
                window.location.href = '<?php echo get_term_link($termId) ; ?>';
            }
        } else {
            _slug = slug ? slug + "," + _slug_ : _slug_;
        }
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