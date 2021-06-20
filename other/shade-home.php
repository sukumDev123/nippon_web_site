<?php 


$shade_explain  = get_field("shade_explain");
$shades  = get_field("shades");
// $_url = 
$lang=get_bloginfo("language");  
$text_static = [
    "en" => [
        "url" => "/shade-en/collection-color-th/",
        "title" => "ค้นหาสีสันในแบบที่คุณต้องการ",
        "detail" => "“เพราะทุกเฉดสีมีความหมายในตัวเอง” <br />
        เราจึงรวบรวมทุกสีสันมาไว้ให้คุณเลือกในที่เดียว ไม่ว่าจะเป็นสีโทนร้อนหรือสีโทนเย็น คุณก็สามารถค้นหาโทนสีได้ง่ายๆ เพียงแค่คลิกลิงก์ที่อยู่ด้านล่าง"
    ],
    "th" => [
        "url" => "/shade-th/collection-color-th/",
        "title" => "ค้นหาสีสันในแบบที่คุณต้องการ",
        "detail" => "“เพราะทุกเฉดสีมีความหมายในตัวเอง” <br />
        เราจึงรวบรวมทุกสีสันมาไว้ให้คุณเลือกในที่เดียว ไม่ว่าจะเป็นสีโทนร้อนหรือสีโทนเย็น คุณก็สามารถค้นหาโทนสีได้ง่ายๆ เพียงแค่คลิกลิงก์ที่อยู่ด้านล่าง",
        "text_left" =>"ค้นหาเฉดสีที่ต้องการ",
        "text_right" => "ค้นหาสีที่เป็นตัวคุณ",
        "page_left"  => "/shade-th/shade-color-th",
        "page_right"  => "collection-color-th"

    ]
][$lang];
 if(isset($shade_explain) && isset($shades)):
?>


 
<section id="home_suggestion_shades">
    <div class="image-contain">

       <div class="swiper-container shade-suggestion">
           <div class="swiper-wrapper">
           <?php if(!empty($shades)): ?>
            <?php foreach($shades as $shade): $g_permalink  = get_permalink($shade->ID); ?>
              <div class="swiper-slide ">
                  <div class="shade-swiper">
                    <!-- <div>
                    </div>   -->
                    <div class="image-div">
                        <img src="<?php echo get_field("image-shade", $shade->ID)['url'] ?>" alt="">
                        <div class="swiper-pagination shade-pagination"></div>
                    </div>

                    <a  class="shades-color" href="<?php  echo $text_static['url'] . "?shade_id=".$shade->ID ?>">
                        <div class="shades-color-box" style="background-color:<?php echo $shade->shade1  ?>;" ></div>
                        <div class="shades-color-box" style="background-color:<?php echo $shade->shade2  ?>;" ></div>
                        <div class="shades-color-box" style="background-color:<?php echo $shade->shade3  ?>;" ></div>
                      <?php if($shade->shade4): ?>  <div class="shades-color-box" style="background-color:<?php echo $shade->shade4  ?>;" ></div> <?php endif; ?>
                    </a>
                  </div>
                    
              </div>
            <?php endforeach; ?>
        <?php endif; ?>
           </div>
       </div>
    </div>
    <div class="content">
        <h1><?php echo $text_static['title'] ?></h1>
        <p><?php echo $text_static['detail'] ?></p>
        <div class="left-right">
                <h3>
                    
                    <a href="<?php echo $text_static['page_left'] ?>"><?php echo $text_static['text_left'] ?></a>
                </h3>
                <h3>
                    <a href="<?php echo $text_static['page_right'] ?>"><?php echo $text_static['text_right'] ?></a>
                </h3>
        </div>
    </div>
</section>

<?php endif; ?>