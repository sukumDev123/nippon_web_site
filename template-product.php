
<?php get_header() ?>



<?php 

 /** Template Name: Product */
 global $product;

 
?>

<?php
        // $terms = get_terms('product_cat', array('hide_empty' => false, 'parent' => 0));
        // $termShow = [];
        // $termId = 0;
        // if(isset($_GET['cate'])) {
        //     $termShow = get_terms('product_cat', array('hide_empty' => false, 'parent' => intval($_GET['cate'])));
        //     $termId = intval($_GET['cate']);
       
        // } else {
        //     $termShow = get_terms('product_cat', array('hide_empty' => false, 'parent' => $terms[0]->term_id));
        //     $termId = $terms[0]->term_id;
        // }
        $terms = get_terms('product_cat', array('hide_empty' => false, 'parent' => 0));
        $termShow = [];
        $termId  = get_queried_object_id();
        $termShow = get_terms('product_cat', array('hide_empty' => false, 'parent' =>$termId));
    ?>


<?php get_template_part("pages/page-bk");  ?>
<div   id="nav-products">
    <ul>
        <?php if(count($terms) > 0): ?>
            <?php foreach($terms as  $term): $className = ""; if($termId == $term->term_id): $className="cate-active"; endif;  ?>
                <li class="<?php  echo $className ?>"> 
                    <a href="<?php  echo get_term_link($term->term_id) ?>"><?php echo $term->name ?></a>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
       
    </ul>
</div>

<div id="product-container" >
    <div>
        
    <?php
      echo  $terms[0]->ID; 
    if(!empty($termShow)) {
        foreach($termShow as $t) {
            $termShowData = get_terms('product_cat', array('hide_empty' => false, 'parent' => $t->term_id));
            
            echo '<div class="product-cate-card">
                <h2>'.$t->name.'</h2>
                ';
                print_r($category->slug);
                foreach ($termShowData as  $category) {
                    if(isset($_GET['slug'])) {
                        $_slugs = explode(",",$_GET['slug']);
                        $slug = "'" . $_GET["slug"]."'";
 
                    } else {
                        $slug = "''";
                    }
                 
                    $checked = "";
                    if(count($_slugs) > 0) :
                        foreach( $_slugs as $_slug):
                            if( $_slug == $category->slug):
                                $checked= "checked";
                            endif;
                           
                        endforeach;
                    endif;
                   
                    $thisCate = "'".$category->slug."'";
                    echo '
               
                    <h5>

                        <a  >'. $category->name .' </a>
                        <input '.$checked.' type="checkbox" onchange="getChecked('.$slug.' , '. $thisCate.')" />
                        </h5>

                        ';
                }
                echo '</div>';

        }
    }
    
    
    ?>
  </div>
    <ul class="products">

    <?php
    $tax_query = [];
    if(isset($_GET['slug'])) {
        $_slugs = explode(",",$_GET['slug']);
        if(count($_slugs) > 0) {
            $tax_query = [
                [
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' =>  $_slugs,
                    'include_children' => true,
                    'operator' => 'IN' 
                ]
            ];
        } 
    }
    else {
        $tax_query = [
            
            [
                'taxonomy' => 'product_cat',
                'field' => 'term_id',
                'terms' =>  [$termId],
                'include_children' => true,
                'operator' => 'IN' 
            ]
            ];
    }
    // print_r($_slugs);
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 9,
            "tax_query" =>  $tax_query
            );
        $loop = new WP_Query( $args );
        if ( $loop->have_posts() ) {
            while ( $loop->have_posts() ) : $loop->the_post();
                 
                    $featured_img_url = get_the_post_thumbnail_url( get_the_ID(),'full');
                ?>
                        <div class="product-card">
                            <a  href="<?php echo get_permalink(get_the_ID()) ?>">

                                <img src="<?php echo $featured_img_url ?>" alt="image"  />
                                <h2><?php echo get_the_title() ?></h2>
                                <p><?php echo get_the_excerpt() ?></p>
                                <h5 class="arrow">
                                <i class="fas fa-long-arrow-alt-right"></i>
                                </h5>
                            </a>
                        </div>

                <?php 
            endwhile;
        } else {
            echo __( 'No products found' );
        }
        wp_reset_postdata();
    ?>
    </ul><!--/.products-->

</div>

<?php 
 get_template_part("pages/page-services");

?>


<script>
    function getChecked(slug , _slug_ ) {
        let _slug = "";
  
        if(slug.match(_slug_)) {
            _slug = slug.split(",").filter(s => s != _slug_).join(",")
        } else {
            _slug = slug ? slug + "," + _slug_ : _slug_
           
        
        }
        if(_slug) window.location.assign("?cate=" + <?php echo $termId ?> + "&slug=" + _slug)
        else {
            window.location.assign("?cate=" + <?php echo $termId ?>)
        }
    }
</script>

<?php get_footer() ?>
