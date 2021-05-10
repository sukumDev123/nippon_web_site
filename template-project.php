<?php   /** Template Name: News */ ?>
<?php get_header(); ?>
<?php 
$first_page = 0;
$size_data = 0;
$limit_page = 9;
if(isset($_GET["page"])) {
    $limit_page = $_GET["page"];
}
// echo $limit_page;
 ?>
<div class="page-bk">

    <!-- <div class="page-bk-image"> -->
    <img alt="logo" src="<?php bloginfo("template_directory");  ?>/assets/images/bk-page.jpg"  class="image-logo" />
    <div class="image-logo-bk"> </div>
    <!-- </div> -->
    <div class="page-detail">
            <h1><?php the_title();  ?></h1>
    </div>
</div>
<div class="page-filter">
<?php 
    $args = array(
    'type' => "project",
    'orderby' => 'name',
    'order' => 'ASC',
    
    );

    $primary_categories = get_categories($args);
 
   

?>
    <div>
        <!-- <div> -->
            <form action="<?php get_permalink() ?>" method="GET">
                <h5>Filter</h5>
            <select name="type" placeholder="test">
            <option value="">โครงการ</option>

            <?php 
                foreach ($primary_categories as $primary_category) :
                    $post_cats = get_the_category();
                    if($primary_category->parent !== 0):         
            ?>
                    <option value="<?php  echo $primary_category->name  ?>"><?php echo  $primary_category->name ?></option>
            <?php 
                    endif;
                endforeach;
            ?>
            </select>

           
            <select name="filter_product">
                <option  value="">สินค้า</option>
                <?php 
                
                    $argc = ["post_type" => "product"];
                    $query = new WP_Query($argc);

                    if($query->have_posts()):
                        while($query->have_posts()):
                            $query->the_post();
                        
                ?>
                     <option value="<?php echo get_the_ID(); ?>"><?php echo get_the_title() ?></option>   
                <?php
                    endwhile;
                    endif;
                    wp_reset_query();
                ?>
            </select>
            <button type="submit" class="btn-search">Search</button>
        </form>
    
        <!-- </div> -->
    </div>
</div>


<div id="news" class="container">

 
 
    <div class="news-div">
    <?php 
        $filter_product  = '';
        $meta_query = [];
        if(isset($_GET["filter_product"])) :
            if($_GET['filter_product']) :
                $filter_product = $_GET['filter_product'];
                $product_relation = [
                    "key" => "products",
                    "value"  => '"'.apply_filters( 'wpml_object_id', $filter_product  , 'ID' ) .'"',
                    'compare' => "LIKE"
                ];
                array_push($meta_query ,  $product_relation);
            endif;   
        endif;
     
        if(isset($_GET['type'])) :
            if($_GET['type']):
                $tax_query = [
                    [
                        'taxonomy' => 'category',
                        'field' => 'id',
                        'terms' =>  [$_GET["type"]],
                        'include_children' => true,
                        'operator' => 'IN' 
                    ]
                ];
                array_push($meta_query ,     $tax_query);
            endif;
        endif;

        $argc = [
            "post_type"  => "project" , 
            'posts_per_page' => $limit_page  , 
            
        ];    
        if(count($meta_query) ) :
            $argc["meta_query"] = $meta_query;
        endif;
 
        $query = new WP_Query($argc);
  
       
    ?>
    <?php 
    if($query->have_posts()): while($query->have_posts()) : $query->the_post(); 
        $size_data += 1;
        $modal_header    = get_field('text_example');
        $photos = acf_photo_gallery("photos" , get_the_ID());
    
        $_image = false;
        // echo $photos[0]["thumbnail_image_url"]; 
        foreach($photos as $image):
            $full_image_url= $image['full_image_url']; 
            $thumbnail_image_url=  acf_photo_gallery_resize_image($full_image_url, 403, 271);
            $_image =  $thumbnail_image_url;
            break;
        endforeach;
        ?>
            <div>
            <?php 
            if($_image):
                ?>
                <img src="<?php echo $_image; ?>" alt ="image" />
                <?php 
            endif;
            
            ?>
            <div class="content">
                <h1>
                    <a href="<?php  echo get_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h1>
                 
                <p><?php echo  $modal_header;  ?></p> 
              <div class="d-flex justify-content-between">
                <h5>
                    <i class="fas fa-eye"></i>
                </h5>
                <h5>
                    <i class="fas fa-eye"></i>
                </h5>
                </div>
                <!-- <h5> <i class="far fa-calendar-alt"></i> <?php " ".the_date("d/M/Y"); ?></h5> -->
            
            
            </div>
            </div>
        
            <?php endwhile; else: endif;  wp_reset_query();
        ?>    
    </div>
    <?php 
    if($size_data > 9) {
        ?>

        <h5 class="see-more">
            <a href="<?php echo esc_url( add_query_arg( 'page', $limit_page + 1, get_permalink() ) ); ?>" >See more</a>
        </h5>
        <?php 
    }
    ?>
    
</div>


<!-- <div id="file-download" class="container">

<h1>File Downloads</h1>

<div>
   <button>
    <a class="color-catalog">
        Colour catalog
        </a>
   </button>
   <button>
    <a class="special">
        Special effect paint
        Exterior/Interior Paint
        </a>
   </button>
   <button>
    <a class="project">
        Project Reference
        E magazine
        </a>
   </button>
</div>
</div> -->

<?php get_footer(); ?>
