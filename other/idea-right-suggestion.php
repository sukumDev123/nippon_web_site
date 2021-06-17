<?php 


 
$lang=get_bloginfo("language");  
$argc = ["post_type" => "page" , "p" => 8082, "posts_per_page" => 1];
$query = new WP_Query($argc);
$g_permalink  = "";
$text_static = [
    "en" => [
        "url" => "/shade-en/collection-color-th/",
        "title" => "ค้นหาแรงบันดาลใจ 
        ด้วยไอเดียการตกแต่งบ้าน<br /> จากนิปปอนเพนต์",
        "detail" => "“บ้าน” คือสถานที่ที่เราอยู่แล้วสบายใจ และบ่งบอกความเป็นตัวเรามากที่ <br />
       สุด มาดูไอเดียและค้นหาแนวการแต่งบ้านตามสไตล์ของตัวเองกัน",
    ],
    "th" => [
        "url" => "/shade-th/collection-color-th/",
        "title" => "ค้นหาแรงบันดาลใจ <br />
        ด้วยไอเดียการตกแต่งบ้าน<br /> จากนิปปอนเพนต์",
        "detail" => "“บ้าน” คือสถานที่ที่เราอยู่แล้วสบายใจ และบ่งบอกความเป็นตัวเรามากที่ <br />
       สุด มาดูไอเดียและค้นหาแนวการแต่งบ้านตามสไตล์ของตัวเองกัน",
       "button_title" => "ไอเดียการตกแต่งเพิ่มเติม"

    ]
][$lang];
 
?>


 
<section id="home_suggestion_shades_right">
<div class="content">
        <h1><?php echo $text_static['title'] ?></h1>
        <?php echo $text_static['detail'] ?>
        <div class="mt-5"></div>
        <a  class="a-primary-button " href="<?php echo $g_permalink ?>" target="_blank" >
            <button class="primary-button">
                <?php  echo  $text_static['button_title'] ?>
                <i class="fas fa-long-arrow-alt-right"></i>
            </button>
        </a>
    </div>
    <div class="image-contain">

       <div class="swiper-container inspire-div">
           <div class="swiper-wrapper">
           <?php if($query->have_posts()): ?>
            <?php while($query->have_posts()): $query->the_post(); $g_permalink  = get_permalink(get_the_ID()); 
                    // $featured_img_url = get_the_post_thumbnail_url( get_the_ID(),'full');
                    $image =  get_bloginfo("template_directory"). "/assets/images/idea.jpg";
            ?>
              <div class="swiper-slide ">
                  <div class="shade-swiper">
               
                    <div class="image-div">
                        <img src="<?php echo  $image ?>" alt="">
                        <div class="swiper-pagination shade-pagination"></div>
                    </div>
                   <div class="div-bk">
                    <a target="_blank" class="inspire-data" href="<?php echo $g_permalink ?>"  >
                            <h3>House Inspiration</h3>
                            <p>ดูไอเดียการตกแต่งบ้านได้ตามสไตล์คุณ</p>
                            <div   style="margin-top:40px"> </div>
                            <span >ดูเพิ่มเติม</span>
        

                        </a>
                   </div>
                  </div>
                    
              </div>
            <?php endwhile; ?>
        <?php endif;wp_reset_query(); ?>
           </div>
       </div>
    </div>
   
</section>

 