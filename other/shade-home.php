<?php 


$shade_explain  = get_field("shade_explain");
$shades  = get_field("shades");
 
?>


 
<section id="home_suggestion_shades">
    <div class="image-contain">

       <div class="swiper-container shade-suggestion">
           <div class="swiper-wrapper">
           <?php if(count($shades) > 0): ?>
            <?php foreach($shades as $shade): $g_permalink  = get_permalink($shade->ID); ?>
              <div class="swiper-slide ">
                  <div class="shade-swiper">
                    <!-- <div>
                    </div>   -->
                    <div class="image-div">
                        <img src="<?php echo get_field("image-shade", $shade->ID)['url'] ?>" alt="">
                        <div class="swiper-pagination shade-pagination"></div>
                    </div>

                    <a href="<?php echo  $g_permalink  ?>" target="_blank" class="shades-color">
                        <div style="background-color:<?php echo $shade->shade1  ?>;width:88px;height:88px;" ></div>
                        <div style="background-color:<?php echo $shade->shade2  ?>;width:88px;height:88px;" ></div>
                        <div style="background-color:<?php echo $shade->shade3  ?>;width:88px;height:88px;" ></div>
                        <div style="background-color:<?php echo $shade->shade4  ?>;width:88px;height:88px;" ></div>
                    </a>
                  </div>
                    
              </div>
            <?php endforeach; ?>
        <?php endif; ?>
           </div>
       </div>
    </div>
    <div class="content">
        <h1><?php echo $shade_explain['title'] ?></h1>
        <?php echo $shade_explain['detail'] ?>
        <div class="left-right">
                <h3><?php echo $shade_explain['text_left'] ?></h3>
                <h3><?php echo $shade_explain['text_right'] ?></h3>
        </div>
    </div>
</section>