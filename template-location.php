<?php 
 /** Template Name: Location Template */
get_header();


$lang=get_bloginfo("language");  
// $terms = get_terms('product_cat', array('hide_empty' => false, 'parent' => 0));

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
       "search" => "ค้นหาร้านค้า",
       "see_more" => "See More",
       "cat_product" => "ประเภทสินค้า"


       

    ]
][$lang];


$text_static_cate = [
    "th" => [
        "สีทาอาคาร",
        "สีน้ำมัน",
        "สีสเปรย์",
        "TOOLS",
        "สีสร้างลาย"
    ],
    "en" => [
        "สีทาอาคาร",
        "สีน้ำมัน",
        "สีสเปรย์",
        "TOOLS",
        "สีสร้างลาย"
    ]
][$lang];
?>
<?php 
if(isset($_GET['search']) || isset($_GET['country'])) {
    ?>

    <script>

    setTimeout(() => {
        document.querySelector("#location_page_div").scrollIntoView({behavior: "smooth" , block: "center"});
        
    }, 1000);
</script>


    <?php 
}

?>
<?php 
 
 get_template_part("pages/page-bk-2");

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
$cat_product = "";
if(isset($_GET["cat_product"])):
    $cat_product = $_GET["cat_product"];
     
    $argc['meta_query'] = array(
        array(
            'key' => 'portfolio',
            'value' =>   $cat_product,
            'compare' => 'REGEXP'
        )
        );
   
endif;

if(isset($_GET["cat_product"]) && isset($_GET['search'])) {
    $argc['meta_query'] = array(
        array(
            'key' => 'word_map',
            'value' => $_GET['search'],
            'compare' => 'REGEXP'
        ),
        array(
            'key' => 'portfolio',
            'value' =>   $cat_product,
            'compare' => 'REGEXP'
        )
        );
}

$country = "";
$p_class = "display_none";
$d_class = "display_none";
$loadScript = "";
$district = "";

if(isset($_GET['country']) ): 
    $country =$_GET['country'];
    $loadP = "";
    if($country == "th")  {   $p_class = ""; };
    $loadScript .= "document.querySelector('#country').value = '".$country."';".$loadP.";";
endif;  
if(isset($_GET['province']) ): 
    $p_class   = "";
    $province =$_GET['province'];
    // echo "<script>
    $loadScript .=  "loadD('".$province."');";
    // </>";
    $p_class  = "";
    $d_class  = "";

endif;  
if(isset($_GET['district']) ): 
    $district =$_GET['district'];
    
    $loadScript .=  "document.querySelector('#district').value = '".$district."';";

    $d_class  = "";
endif;  

 echo "<script>
 setTimeout(() => {
     loadP();
    } , 100);
 setTimeout(() => {
     document.querySelector('#cat_product').value = '".$cat_product."';
     ".$loadScript."
    } , 1100);
 </script>";
$query = new WP_Query($argc);
$count = $query->found_posts;
?>

<section id="location_page_div">

    <div class="header_location">
      
    
       <select  id="country"  >
           <option value=""><?php echo $text_static['country'] ?></option>
           <option value="th"><?php echo "ประเทศไทย" ?></option>
           <option value="ประเทศลาว"><?php echo "ประเทศลาว" ?></option>
       </select>
       <select class="<?php echo $p_class ?>"     id="province" >
           <option value=""><?php echo $text_static['province'] ?></option>
       </select>
       <select class="<?php echo $d_class ?>"  id="district" >
           <option value=""><?php echo $text_static['district'] ?></option>
           <option value="เมือง"><?php echo "เมือง" ?></option>
       </select>
       <select  id="cat_product" value="<?php echo $cat_product ?>" >
           <option value=""><?php echo $text_static['cat_product'] ?></option>
 
           <?php if(count($text_static_cate) > 0): ?>
            <?php foreach($text_static_cate as  $term): $className = "";  ?>
                
                    <option value="<?php  echo $term ?>"><?php echo $term ?></option>
                
            <?php endforeach; ?>
        <?php endif; ?>
       </select>


       <button id="location_search" class="mt-5 d-flex align-items-center justify-content-center"  >
       <?php  echo $text_static['search'] ?> 
          <img class="arrow-left-white" src="<?php echo get_bloginfo("template_directory") ?>/assets/images/arrow-left.svg" alt="">

        </button>


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
 
        <?php if($count > $limit_location ): ?>
        <h5 class="text-center mt-5 see_more">
            <a href=<?php 
            $limit_location += 9;
            $link = "";
			if(isset($_GET["cat_product"])) {
                $link = "?cat_product=".$_GET["cat_product"]."";
                if(isset($_GET['country'])) {
                    $link .= "&country=".$_GET['country']."";
                }
                if(isset($_GET['province'])) {
                    $link .= "&province=".$_GET['province']."";
                }
                if(isset($_GET['district'])) {
                    $link .= "&district=".$_GET['district']."";
                }
                if(isset($_GET['search'])) {
                    $link .= "&search=".$_GET['search']."";
                }
              
            } else {
                if(isset($_GET['country'])) {
                    $link .= "?country=".$_GET['country']."";
                }
                if(isset($_GET['province'])) {
                    $link .= "&province=".$_GET['province']."";
                }
                if(isset($_GET['district'])) {
                    $link .= "&district=".$_GET['district']."";
                }
                if(isset($_GET['search'])) {
                    $link .= "&search=".$_GET['search']."";
                }
            }
            if( $link == "") {

                echo "?limit=". $limit_location ;
            } else {
                echo $link."&limit=". $limit_location ;

            }


        
            ?> ><?php echo $text_static["see_more"] ?></a>
        </h5>
        <?php endif;  ?>

    </div>

</section>


<?php get_footer(); ?>