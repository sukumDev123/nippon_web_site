

<?php 
 
 /** Template Name: Search Shade */
// get_header();
get_template_part("headers/header-shade");

get_template_part("other/loading");


 ?>
 <script>
let family_colors = [];


 <?php 
//  get_template_part("headers/header-single");

 $argc = ["post_type" => "family_color"];
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
        $familyColors;
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

 <div>
 
    <div class="select-custom">
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
    <button type="submit" onclick="onSearchColor()"  > Search </button>
 <!-- </form> -->
 </div>
</div>


<div id="shade-center" >
    <h1 class="text-center">ผลการค้นหา</h1>
    <div class="container slide-2">
        <div class="suggestion1">
            <h3>สีใกล้เคียง</h3>
            <div class="card-color-family">
                <div id="bk-family-color"></div>
                <h2 id="title-family-color"></h2>\
            </div>
        </div>
        <div class="suggestion2">
            <h3>สีที่เป็นไปได้อื่นๆ</h3>
            <div class="shade4side"></div>
        </div>
    </div>
    <div class="mt-10rem"></div>
        <?php 
            get_template_part("other/products");
        ?>
</div>




<?php 
 get_template_part("pages/inspire");

 get_template_part("pages/page-services");
?>


 
 
<?php get_footer() ?>