

<?php 
 
 /** Template Name: Shade */

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
 
 
$argc = ["post_type" => "shade"];
$query = new WP_Query($argc);
$firstPostId;
echo "<div class='container' id='shade-div'>";
the_content();
if($query->have_posts()):
?>
 
<div class="filter-collection">
    <select id="shade-filter" >
<?php 
    while($query->have_posts()):
    $query->the_post();
?>
        <option value="<?php echo get_the_ID() ?>"><?php echo get_the_title() ?></option>
<?php 
    endwhile;
?>
    </select>
</div>

<?php 
endif;
?>
    <div class="swiper-container shade-swiper">
        <div class="swiper-wrapper">
            <!-- <div class="shade-boxs"> -->
<?php
if($query->have_posts()):
    while($query->have_posts()):
        $query->the_post();
        $family_colors = get_field("family_color");
        $thisId = get_the_ID();
        echo "<div  class='shade-box swiper-slide' >";
        echo "<h2>". get_the_title(get_the_ID())."</h2>";
        if(!$firstPostId) {
            $firstPostId = $thisId;
            echo "<script> firstPostId = ".$firstPostId." </script>";
        }
        echo '<div onclick="showListOfFamilyColorThisShade('.$thisId.')" class="shade-color-div">';
            echo '<div style="background:'. get_field("shade1") .'; width: 64px;height:64px"></div>';
            echo '<div style="background:'. get_field("shade2") .'; width: 64px;height:64px"></div>';
            echo '<div style="background:'. get_field("shade3") .'; width: 64px;height:64px"></div>';
            echo '<div style="background:'. get_field("shade4") .'; width: 64px;height:64px"></div>';
        echo '</div>';
        // print_r();/get_field("family_color")
        if( $family_colors):
            foreach($family_colors as $family_color):
                $familyId = $family_color->ID;
                $name =  get_field("name" ,  $familyId );
                $color =  get_field("color" , $familyId );
                $family_json = json_encode(["name" =>  $name , "color" => $color  , "ID" =>  $familyId] );
                
                echo '<script>  if(!shade['.$thisId.']) shade['.$thisId.'] = [];   </script>';
                echo '<script>   shade['.$thisId.'].push('.$family_json.')  </script>';
            endforeach;
        endif;
        echo "</div>";
    
    endwhile;
 endif;
?>

<!-- <div class="swiper-container"> -->
        <!-- <div class="swiper-wrapper"> -->
        <!-- </div>   -->
        </div>
     
    </div>
</div>
<!--  -->
<div  id="family-color-list" class="container">
    <div id="family-list"></div>
    <div id="family-image"></div>
</div>
<!--  -->
<?php 
 echo "</div>";
?>
 
<?php 
 get_template_part("pages/inspire");
?>

<!-- product suggestion -->

<?php 
 get_template_part("pages/page-services");
?>


 
<?php get_footer() ?>