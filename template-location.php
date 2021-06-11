<?php 
 /** Template Name: Location Template */
get_header();


$lang=get_bloginfo("language");  
$terms = get_terms('product_cat', array('hide_empty' => false, 'parent' => 0));

$text_static = [
    "en" => [
        "country" => "Country",
        "province" => "Province",
       "district" => "District",
       "title" => "result",
       "search" => "Search",
       "see_more" => "See More",
       "cat_product" => "Categories"
    ],
    "th" => [
        "country" => "ประเทศ",
        "province" => "จังหวัด",
       "district" => "เขต/อำเภอ",
       "title" => "ผลการค้นหา",
       "search" => "ค้นหา",
       "see_more" => "See More",
       "cat_product" => "ประเภทสินค้า"


       

    ]
][$lang];



?>

<?php 
 
 get_template_part("pages/page-bk");

 $limit_location = 12;
 if(isset($_GET['limit'])):
    $limit_location = intval($_GET['limit']);
endif;
 $argc = [
     "post_type" => "location",
     "posts_per_page" => $limit_location 
 ];
 if(isset($_GET['search']) ) :
    $argc['meta_query'] = array(
        array(
            'key' => 'word_map',
            'value' => $_GET['search'],
            'compare' => 'REGEXP'
        )
        );
   
endif;

if(isset($_GET["cat_product"])):
    $cat_product = $_GET["cat_product"];
    $argc['meta_query'] = array(
        array(
            'key' => 'portfolio',
            'value' => $_GET['cat_product'],
            'compare' => 'LIKE'
        )
        );
   
endif;


$query = new WP_Query($argc);
?>

<section id="location_page_div">

    <div class="header_location">
        <select  id="cat_product" >
           <option value=""><?php echo $text_static['cat_product'] ?></option>
           <option value="th"><?php echo "ประเภทสินค้า" ?></option>
           <?php if(count($terms) > 0): ?>
            <?php foreach($terms as  $term): $className = ""; if($termId == $term->term_id): $className="cate-active"; endif;  ?>
                
                    <option value="<?php  echo $term->name ?>"><?php echo $term->name ?></option>
                
            <?php endforeach; ?>
        <?php endif; ?>
       </select>
       <select  id="country" >
           <option value=""><?php echo $text_static['country'] ?></option>
           <option value="th"><?php echo "ประเทศไทย" ?></option>
       </select>
       <select  id="province" >
           <option value=""><?php echo $text_static['province'] ?></option>
       </select>
       <select  id="district" >
           <option value=""><?php echo $text_static['district'] ?></option>
           <option value="เมือง"><?php echo "เมือง" ?></option>
       </select>



       <button id="location_search" class="mt-5"  > <?php  echo $text_static['search'] ?>  </button>


    </div>
    <div class="header_list">
        <h2><?php echo $text_static["title"] ?></h2>
        <div class="locations-card">
            <?php if($query->have_posts()):  ?>
            <?php while($query->have_posts()):  $query->the_post(); ?>
                <div class="location-card">
                    <h4><?php echo get_the_title(get_the_ID()) ?></h4>
                    <p class='d-flex'> 
                        
                    <i class="fas fa-map-marker-alt"></i>
                    <span style="padding-left: 1em">
                    <?php echo get_field("address" , get_the_ID()) ?>
                    </span>    
                </p>
                </div>
            <?php endwhile;  ?>
            <?php endif;  ?>
        </div>
        <h5 class="text-center mt-5 see_more">
            <a href=<?php 
            $limit_location += 9;
            if(isset($_GET['search'])):
                // echo "?country=".$_GET['country']."&province=".$_GET['province']."&district=".$_GET['district']."&search=".$_GET['search']. "&limit=". $limit_location;
            else:
                // echo "?limit=". $limit_location;

            endif;  

            ?> ><?php echo $text_static["see_more"] ?></a>
        </h5>
    </div>

</section>


<?php get_footer(); ?>