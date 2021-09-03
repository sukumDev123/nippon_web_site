<?php 


 /** Template Name:  Colour Visualizer */

get_header();
get_template_part("other/loading");
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');   
$app_apple_qr  = get_field("app_apple_qr");
$app_apple_image  = get_field("app_apple_image");
$app_android_qr = get_field("app_android_qr");
$app_android_image  = get_field("app_android_image");
$app_huawei_qr  = get_field("app_huawei_qr");
$app_huawei_image  = get_field("app_huawei_image");
$app_1 = get_field("app_1");
$app_2 = get_field("app_2");
$app_3 = get_field("app_3");
$app_4 = get_field("app_4");
$app_5 = get_field("app_5");
// $collections = acf_photo_gallery("collection_photo" , get_the_ID());
// $program_images = acf_photo_gallery("program_image" , get_the_ID());
// $downloa2d_file  = get_field("download_file");

?>

<div id="colours-vis" class="container">
   <div class="row">
   <div class="col-12 col-md-6">
        <div class="image-app">
            <img src="<?php echo $featured_img_url ?>" alt="">
        </div>
     </div>
     <div  class="col-12 col-md-6">
         <div class="content">
            <h1 class="ui header primary-text"><?php echo get_the_title() ?></h1>
            <h4 class="ui header sub-title"><?php echo get_field("sub_title") ?></h4>
            <h4 class="ui header"><?php echo get_field("text1") ?></h4>

            <div class="content-how-to">
                <h4 class="ui header primary-text">การใช้งาน</h4>
                <h4 class="ui header"><?php echo get_field("text2") ?></h4>
            </div>
            <div class="loop-qr-code">
 
            <?php if($app_apple_qr): ?>
                <div class="card-qr-code">
                    <img src="<?php echo $app_apple_qr["url"] ?>" alt="">
                    <img  class="mt-3" src="<?php echo $app_apple_image["url"] ?>" alt="">
                </div>
            <?php endif; ?>
            <?php if($app_android_qr): ?>
                <div class="card-qr-code">
                    <img src="<?php echo $app_android_qr['url'] ?>" alt="">
                    <img  class="mt-3" src="<?php echo $app_android_image['url'] ?>" alt="">
                </div>
            <?php endif; ?>
            <?php if($app_huawei_qr): ?>
                <div class="card-qr-code">
                    <img src="<?php echo $app_huawei_qr['url'] ?>" alt="">
                    <img class="mt-3" src="<?php echo $app_huawei_image['url'] ?>" alt="">
                </div>
            <?php endif; ?>

            </div>
         </div>
        




     </div>
   </div>
</div>
<div class="content-app-body">
    <div class="container">
       <div class="header-title">
        <h3 class="ui header text-center primary-text">ฟีเจอร์ที่น่าสนใจ</h3>
            <h3 class="ui header text-center sub_title">(ประเทศไทยใช้ได้เฉพาะบางฟีเจอร์เท่านั้น)</h3>
       </div>
        <div class="app-show-list">
            <?php if($app_1): ?>
                <div class="app-card">
                <div class="icon-app">
                    <?php get_template_part("components/icon" , null , ["icon"=> $app_1["icon"]])?>

                </div>
                <h4 class="ui header text-center primary-text"><?php echo $app_1['title'] ?></h4>
                    <h4 class="ui header text-center sub_title"><?php echo $app_1['sub_title'] ?></h4>
                    <img src="<?php echo $app_1["image"]['url'] ?>" alt="">
                </div>
            <?php endif; ?>
            <?php if($app_2): ?>
                <div class="app-card">
                <div class="icon-app">
                    <?php get_template_part("components/icon" , null , ["icon"=> $app_2["icon"]])?>

                </div>
                    
                    <h4 class="ui header text-center primary-text"><?php echo $app_2['title'] ?></h4>
                    <h4 class="ui header text-center sub_title"><?php echo $app_2['sub_title'] ?></h4>
                    <img src="<?php echo $app_2["image"]['url'] ?>" alt="">
                </div>
            <?php endif; ?>
            <?php if($app_3): ?>
                <div class="app-card">
                <div class="icon-app">
                    <?php get_template_part("components/icon" , null , ["icon"=> $app_3["icon"]])?>

                </div>

                    <h4 class="ui header text-center primary-text"><?php echo $app_3['title'] ?></h4>
                    <h4 class="ui header text-center sub_title"><?php echo $app_3['sub_title'] ?></h4>
                    <img src="<?php echo $app_3["image"]['url'] ?>" alt="">
                </div>
            <?php endif; ?>
            <?php if($app_4): ?>
                <div class="app-card">
                <div class="icon-app">
                    <?php get_template_part("components/icon" , null , ["icon"=> $app_4["icon"]])?>

                </div>
                    <h4 class="ui header text-center primary-text"><?php echo $app_4['title'] ?></h4>
                    <h4 class="ui header text-center sub_title"><?php echo $app_4['sub_title'] ?></h4>
                    <img src="<?php echo $app_4["image"]['url'] ?>" alt="">
                </div>
            <?php endif; ?>
            <?php if($app_5): ?>
                <div class="app-card">
                <div class="icon-app">
                    <?php get_template_part("components/icon" , null , ["icon"=> $app_5["icon"]])?>

                </div>
                    <h4 class="ui header text-center primary-text"><?php echo $app_5['title'] ?></h4>
                    <h4 class="ui header text-center sub_title"><?php echo $app_5['sub_title'] ?></h4>
                    <img src="<?php echo $app_5["image"]['url'] ?>" alt="">
                </div>
            <?php endif; ?>
             
             
        </div>
    </div>
</div>
<?php get_footer() ?>