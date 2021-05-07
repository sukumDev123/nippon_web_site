<?php 
 
 /** Template Name: Contact us */

 ?>
 <?php 

 get_header();

 
 $slug = get_post_field( 'post_name');
 $post_type = get_post_field( 'post_type');
//  echo $post_type;
 
 ?>
<!-- <div id="banner-page"> -->

<?php 
 get_template_part("other/page-bk");

?>


<div id="contact-us" class="container"> 
        <div class="phone-cs-social-address">
            <div class="phone">             
                <div class="phone">
                <h1> <i class="fas fa-phone-alt"></i> PHONE </h1>
                <a>TEL 0 246 25299  </a>
                <a>FAX 0 2463 2863 </a>
        
            </div>
            </div>
            <div class="cs">
            <h1>Customer Service</h1>
                <h5><a href="tel:024631899">02 463 1899</a></h5>
            </div>
            <div class="social">
                <h1>ติดตามเราได้ที่นี่</h1>
            </div>
            <div class="address">
             
         
                 <h1> <i class="fas fa-map-marker-alt"></i> ADDRESS </h1>
                <p>
                    บริษัท นิปปอนเพนต์ เดคโคเรทีฟ โคทติ้ง </br>
                    (ประเทศไทย) จำกัด</br>
                    101 ม. 3 ซ.สุขสวัสดิ์ 76 ถนนสุขสวัสดิ์</br> 
                    บางจาก พระประแดง สมุทรปราการ 10130
                </p>

          
         
        </div> 
</div>
</div>

   
<!-- <h1>Tet </h1> -->

<?php 



get_footer();

?>
