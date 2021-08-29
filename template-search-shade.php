

<?php 
 
 /** Template Name: Search Shade */
 get_header();
 get_template_part("other/page-bk-shade");

get_template_part("other/loading");
$lang=get_bloginfo("language");  
$text_static = [
    "en" => [
        "title" => "Results Search",
        "title2" => "สีที่ใกล้เคียง",
        "title3" => "สีที่เป็นไปได้อื่นๆ",
        "search" => "Search"


    ],
    "th" => [
        "title" => "ผลการค้นหา",
        "title2" => "สีที่ใกล้เคียง",
        "title3" => "สีที่เป็นไปได้อื่นๆ",
        "search" => "ค้นหาเฉดสี"
        

    ]
][$lang];

 ?>
 <script>
let family_colors = [];


 <?php 
//  get_template_part("headers/header-single");

 $argc = ["post_type" => "family_color" , "posts_per_page"  => -1];
 $query = new WP_Query($argc);
 $familyColors  = [];
$i = 0;
$num = $query->post_count; 
 if($query->have_posts()):
    while($query->have_posts()):
        $query->the_post();
        $id = get_the_ID();
        $name = get_field("name");
        $color = get_field("color");
      
        array_push($familyColors , [
            "name" => get_the_title(),
            "color" => $color
        ]);

        $i += 1;
    endwhile;

 endif;
 
 wp_reset_query();
 
 
 ?>

 family_colors = <?php echo json_encode($familyColors) ?>;
<?php 



?>
 
 </script>
 

<div id="search-shade"  >
<?php the_content() ?>
 <?php echo  get_field("short_text" , get_the_ID()) ?> 
 <div>
  
 
 

    <div id="selected_shade_color" class="select-custom">


        <div class="select-input">
            <input type="text" id="search_type"  placeholder="" value="RGB" />
            <i id="search-select" class="fas fa-chevron-down"></i>
        </div>
        <ul class="search_list_color">
            <li onclick="onChangeColorFilter('rgb-div'  , 'RGB')">RGB</li>
            <li onclick="onChangeColorFilter('hex-div' , 'HEX')">HEX</li>
            <li onclick="onChangeColorFilter('cmyk-div' , 'CMYK')">CMYK</li>
        </ul>
    </div>
    <div id="rgb-div" class="active">
        <div class="search-rgb">
            <label >R(Red)</label>
            <input type="text" name="r" id="r" />
        </div>
        <div class="search-rgb">
            <label >G(Green)</label>
            <input type="text" name="g" id="g" />
        </div>
        <div class="search-rgb">
            <label >B(Blue)</label>
            <input type="text" name="b" id="b" />

        </div>
    </div>
    <div id="hex-div">
        <div class="search-rgb">
                <label >hex</label>
                <input type="text" name="hex" id="hex" />
            </div>
        </div>
    <div id="cmyk-div">
        <div class="search-rgb">
            <label >C</label>
            <input type="text" name="c" id="c" />
        </div>
        <div class="search-rgb">
            <label >M</label>
            <input type="text" name="m" id="m" />
        </div>
        <div class="search-rgb">
            <label >Y</label>
            <input type="text" name="y" id="y" />

        </div>
        <div class="search-rgb">
            <label >K</label>
            <input type="text" name="k" id="k" />

        </div>
    </div>
    <!-- <button type="submit" > Search </button>
 -->
    
 <a class="a-primary-button"  onclick="onSearchColor()"  >
                        <button class="primary-button">
                        <?php echo $text_static["search"] ?>
                        <img  class="arrow-left-white" src="<?php echo get_bloginfo("template_directory") ?>/assets/images/arrow-left.svg" alt="">

                        </button>
                    </a>
 <!-- </form> -->
 </div>
</div>


<div id="shade-center" >
    <h1 class="text-center">
        <?php echo $text_static['title'] ?>
    </h1>
    <div class="container slide-2">
        <div class="suggestion1">
            <h3>         <?php echo $text_static['title2'] ?></h3>
            <div class="card-color-family">
                <div id="bk-family-color"></div>
                <h2 id="title-family-color"></h2>
            </div>
        </div>
        <div class="suggestion2">
 
            <h3>         <?php echo $text_static['title3'] ?></h3>
            <div class="shade4side"></div>
        </div>
    </div>
    <div class="mt-10rem"></div>
        <?php 
        if(get_field("products")):
            get_template_part("other/products");
        endif;
        ?>

</div>


<div class="mt-10rem"></div>
<?php   get_template_part("other/idea-suggestion"); ?>

<div class="mt-10rem"></div>


<?php 
 

 get_template_part("pages/page-services");
?>

<div class="mt-10rem"></div>

 
 
<?php get_footer() ?>