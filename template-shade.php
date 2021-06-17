

<?php 
 
 /** Template Name: Shade */
//  $shade_class = "shade";
// if(isset($_GET["shade"])): 
//     return json_encode($response);



// endif;
 
 ?>
 <?php 
    get_template_part("headers/header-shade");
    get_template_part("other/loading");
   
 ?>
 <script>
     let shade = {};
     let firstPostId = 0;
 </script>
 <?php 
 
 
$argc = [
    "post_type" => "shade" ,  
    "orderby" => "order",
    'order' => 'ASC' 
];

$query = new WP_Query($argc);
$firstPostId = "";
echo "<div class='container' id='shade-div'>";
the_content();
$terms = get_terms('shade_cate', array('hide_empty' => false));
$shadeId = "";
if(isset($_GET["shade_id"])):
$shadeId = $_GET["shade_id"];
echo "<script>
 setTimeout(() => {

    showListOfFamilyColorThisShade(".$shadeId.");

 } , 1000)
</script>";

endif;

if($terms):
?>
 
<div class="filter-collection">
    <select id="shade-filter" >
<?php 
    foreach($terms as $term):
    
?>
        <option value="<?php echo $term->term_id ?>"><?php echo $term->name ?></option>
<?php 
    endforeach;
?>
    </select>
</div>

<?php 
endif;
?>
    <div class=" shade-swiper-family">
        <!-- <div class="swiper-wrapper"> -->
            <!-- <div class="shade-boxs"> -->
<?php
$i = 0;
if($query->have_posts()):
    while($query->have_posts()):
        $query->the_post();
        $family_colors = get_field("family_color");
        $thisId = get_the_ID();
        echo "<div  class='shade-box' >";
        echo "<h2>". get_the_title(get_the_ID())."</h2>";
        if($i == 0): $firstPostId = $thisId;endif;
        $i += 1;
        if(!$firstPostId == "") {
            echo "<script> firstPostId = ".$firstPostId." </script>";
        }
        echo '<div onclick="showListOfFamilyColorThisShade('.$thisId.')" class="shade-color-div">';
            echo '<div style="background:'. get_field("shade1") .'; width: 64px;height:64px"></div>';
            echo '<div style="background:'. get_field("shade2") .'; width: 64px;height:64px"></div>';
            echo '<div style="background:'. get_field("shade3") .'; width: 64px;height:64px"></div>';
           if(get_field("shade4")): echo '<div style="background:'. get_field("shade4") .'; width: 64px;height:64px"></div>'; endif;
        echo '</div>';
        // print_r();/get_field("family_color")
    
        echo "</div>";
    
    endwhile;
 endif;
?>
 
    </div>
</div>
<!--  -->
<div  id="family-color-list" class="container">
    <div class="swiper-container family-image" id="family-image">
        <div class="swiper-wrapper">
            <img class="swiper-slide" src="<?php bloginfo("template_directory");  ?>/assets/images/room1.png" alt="">
            <img class="swiper-slide" src="<?php bloginfo("template_directory");  ?>/assets/images/room2.png" alt="">
        </div>
        <div class="swiper-image-next swiper-button-prev"></div>
        <div class="swiper-image-prev swiper-button-next"></div>
    </div> 

    <div id="family-list"></div>

</div>
<!--  -->
<?php 
 echo "</div>";
?>
 
<div class="mt-10rem"></div>
<?php   get_template_part("other/idea-suggestion"); ?>

<!-- product suggestion -->
<div class="mt-10rem"></div>


<?php 
 get_template_part("pages/page-services");

 ?>
<div class="mt-10rem"></div>

 <?php
 echo "<script>
 setTimeout(() => {

    showListOfFamilyColorThisShade(".$firstPostId.");

 } , 1000); </script>";
?>


 
<?php get_footer() ?>