<?php 
 /** Template Name: Csr Page */
 get_header();
 get_template_part("other/loading");


 $topTitle1 = get_field("learning")['title'];
 $title1 = get_field("learning")['sub_title'];
 $detail1 = get_field("learning")['detail'];
$link1 = get_field("learning")['btn_title'];
$link1_link = get_field("learning")['btn_link'];
// $images_1 = get_field("learning")['images'];
$images_1  = acf_photo_gallery("learning_images" , get_the_ID());
$image_1 = get_field("learning")['image']['url'];

 $topTitle2 = get_field("help_society")['title'];
 $title2 = get_field("help_society")['sub_title'];
 $detail2 = get_field("help_society")['detail'];
$link2 = get_field("help_society")['btn_title'];
$link2_link = get_field("help_society")['btn_link'];
$images_2 = acf_photo_gallery("help_society_images" , get_the_ID());
$image_2 = get_field("help_society")['image'];
 
$imageBanner = get_field("banner_image")['url'];

 $titleBanner = get_the_title();
 $titleSubTitle = get_field("short_text");
 
 $cardTitle1 = get_field("banner_card1")["title"];
 $cardDetail1 =get_field("banner_card1")['detail'] ;
 
 $cardDetail2 = get_field("banner_card2")['detail'] ;
 $cardTitle2 = get_field("banner_card2")["title"];
 


?>
<?php 

get_template_part("templates/csr/modal-swiper" , null , [
   "swiper-class" => "swiper-modal-1",
   "big-class-div" => "big-class-div-1",
   "images" => $images_1 
]);
 

get_template_part("templates/csr/modal-swiper" , null , [
   "swiper-class" => "swiper-modal-2",
   "big-class-div" => "big-class-div-2",
   "images" => $images_2 
]);
 


?>
<div class="template-csr">


    <div class="banner">
    <?php 
        get_template_part(
            "templates/csr/banner-page-csr", 
            null, 
            [
                "title" =>  $titleBanner,
                "sub_title" =>  $titleSubTitle,
               
                "image" =>  $imageBanner,
                "card-image" =>  $cardImage1,
                "card-title" =>  $cardTitle1,
                "card-detail" =>  $cardDetail1,
                "card-image2" =>  $cardImage2,
                "card-title2" =>  $cardTitle2,
                "card-detail2" =>  $cardDetail2,
            ]
        )
        ?>
    </div>
    <div class="container content">
        <?php 
 
        get_template_part(
            "templates/csr/card-page-csr", 
            null, 
            [
                "top-title" => $topTitle1,
                "title" => $title1,
                "detail" => $detail1,
                "btn-link-csr" => $link1_link,
                "btn-title-csr" => $link1,
                "image" => $image_1,
                "swiper-container" => "card-images-list-1",
                "swiper-pagination" => "csr-pagination-1",
                "images" => $images_1,
                "modal" => ".big-class-div-1"

            ]
        )
        ?>
        <div class="margin-page-csr"></div>
        <?php 
 
        get_template_part(
            "templates/csr/card-page-csr-2", 
            null, 
            [
                "top-title" => $topTitle2,
                "title" => $title2,
                "detail" => $detail2,
 
                "btn-link-csr" => $link2_link,
                "btn-title-csr" => $link1,
                "image" => $image_2,
                "swiper-container" => "card-images-list-2",
                "swiper-pagination" => "csr-pagination-2",
                "images" => $images_2,
                "modal" => ".big-class-div-2"

            ]
        )
        ?>
    </div>
</div>


<?php get_footer();?>