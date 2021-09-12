<?php 
 
 /** Template Name: Our Company */
 $lang=get_bloginfo("language");
 
$page_name = "about";
 if(get_field("page_name")):
$page_name  =  get_field("page_name");
 endif;


 $card1Active = "";
 $card2Active = "";
 $card3Active = "";
 $card4Active = "";
if($page_name == "about")   $card1Active = " active";
if($page_name == "story")   $card2Active = " active";
if($page_name == "culture")   $card3Active = " active";
if($page_name == "media")   $card4Active = " active";
 $textS = [
     "th" => [
         "title1"  => "เกี่ยวกับเรา",
         "title2"  => "เรื่องราวของเรา",
         "title3"  => "วัฒนธรรมองค์กร",
         "title4"  => "สื่อและมีเดีย",
         "link1"  => get_permalink() . "/about-us?scroll=true",
         "link2"  => get_permalink() . "/our-stories?scroll=true",
         "link3"  => get_permalink() . "/culture?scroll=true",
         "link4"  => get_permalink() . "/media?scroll=true",
        
        //  "link4"  => "",
     ],
     "en" => [
        "title1"  => "",
        "title2"  => "",
        "title3"  => "",
        "title4"  => "",
        "link1"  => "",
        "link2"  => "",
        "link3"  => "",
        "link4"  => "",
     ],
 ][$lang];
 ?>
 

<?php get_template_part("other/loading") ; get_header(); ?>

<?php


if(isset($_GET['scroll']) || isset($_GET['media_cat']) || isset($_GET['year_cat'])   || isset($_GET['paged_show'])   || isset($_GET['search'])  ):
    echo '<script> setTimeout(() => {
        document.querySelector(".menus-solution").scrollIntoView({behavior: "smooth" , block: "start"})
    } , 1000)</script>';
endif;


?>



<div class="template-out-company-banner">
    

<div class="banners-content">
 <img class="banner-image-bk" src="<?php echo get_the_post_thumbnail_url(get_the_ID() , "full") ?>"></img>
 <div class="banner-back-bk"></div>
 <div class="container">
        <h1 class='banner-title window'><?php echo get_the_title() ?></h1>
        <div class="ui small breadcrumb">
                        <a href="<?php echo get_site_url() ?>" class="section">หน้าแรก</a>
                        <i class="right chevron icon divider"></i>
                        <div class="active section">ข้อมูลบริษัท</div>
                </div>
        <h1 class='banner-title mobile'><?php echo get_the_title() ?></h1>

    </div>
</div>


<div class="menus-solution">
    <div class="container">
        <a 
            class="<?php echo  $card1Active ?>" 
            href="<?php echo $textS["link1"] ?>"> <?php  echo $textS['title1'] ?></a>
        <a class="<?php echo  $card2Active ?>"  href="<?php echo $textS["link2"] ?>"><?php echo $textS["title2"] ?></a>
        <a  
            class="<?php echo  $card3Active ?>" 
            href="<?php echo $textS["link3"] ?>"><?php echo $textS["title3"] ?></a>
        <a 
            class="right <?php echo $card4Active ?>" 
            href="<?php echo $textS["link4"] ?>"><?php echo $textS["title4"] ?></a>
        
       
    </div>

    </div>
 
    <?php get_template_part("templates/our-company/".$page_name) ?>
</div>

 
<?php get_footer(); ?>
