<?php 


 /** Template Name:  Colours Lib */

get_header();
get_template_part("other/loading");
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');    
$collections = acf_photo_gallery("collection_photo" , get_the_ID());
$program_images = acf_photo_gallery("program_image" , get_the_ID());
$download_file  = get_field("download_file");

?>

<div id="colours-lib" class="container">
    <div class="row template-single">
    <div class="col-12 col-md-6 image-banner">
            <img src="<?php echo $featured_img_url  ?>" alt="<?php echo get_the_title() ?>">
        </div>
    <div class="col-12 col-md-6">
        <div class="content">
         <div class="content-header">
            <h1 class="ui header text-center primary-text"><?php echo get_the_title() ?></h1>
            <h3 class="ui header text-center sub-title">เครื่องมือสำหรับนักออกแบบ</h3>
            <h3 class="ui header text-center colours-content">Colours Library  เฉดสีใหม่ล่าสุด จากนิปปอเพนต์ มีให้เลือกถึง <br /> 2338 เฉดสี อยู่ในรูปแบบดิจิตอล พร้อมใช้ในโปรแกรมออกแบบ 3 มิติ</h3>
        
            <?php if(count($program_images) > 0): ?>
              <div class="program-container">
                <h3 class="ui header text-center">รองรับโปรแกรม</h3>
                    <div class="row program-center">
                    <?php foreach($program_images as $program_image): 
                        $image= $program_image['full_image_url']; 
                    ?>
                    <div class="col-12 col-md-4">
                        <img src="<?php echo $image ?>" alt="">
                    </div>
                    <?php endforeach; ?>
                    </div>
                    
              </div>
            <?php endif; ?>
        
            <?php if($download_file): ?>
            <div class="download-content">
                <div class="button-download">
                    <h3 class="ui header text-center">(การบริการนี้ไม่เสียค่าใช้จ่ายใดๆ)</h3>
                    <?php if(is_user_logged_in()): ?>
                        <a target="_blank" href="<?php echo $download_file['url'] ?>">
                            <button class="download-button">ดาวน์โหลด</button>

                        </a>
                    <?php else: ?>
                    <!-- <button class="download-button">ดาวน์โหลด</button> -->
                    <a  href="<?php echo get_site_url() ?>/wp-login.php">
                            <button class="download-button">ดาวน์โหลด</button>

                        </a>
                    <?php endif; ?>

                </div>
            </div>
            <?php endif; ?>


         </div>


            <div class="content-tutorial">
                <h3 class="ui header text-center primary-text"><?php echo get_field("tutorial_title") ?></h3>
                <h3 class="ui header text-center sub-title"><?php echo get_field("tutorial_sub_title") ?></h3>
                <iframe  src="<?php echo get_field("tutorial_video") ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="content-tutorial">
                <h3 class="ui header text-center primary-text"><?php echo get_field("collection_title") ?></h3>
                <h3 class="ui header text-center  sub-title"><?php echo get_field("collection_sub_title") ?></h3>
                <div class="swiper-container colours-library-swiper">
                    <div class="swiper-wrapper">
                    <?php foreach($collections as $program_image): 
                        $image= $program_image['full_image_url']; 
                    ?>
                        <div class="swiper-slide">
                            <img src="<?php echo $image ?>" alt="">
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-pagination"></div>
                </div>
            </div>




        </div>
      
    </div>
    </div>
  
</div>

<?php get_footer() ?>