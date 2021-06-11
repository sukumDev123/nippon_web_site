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
                <div class="mt-4"></div>

                <a>TEL 0 246 25299  </a><br />
                <a>FAX 0 2463 2863 </a>
        
            </div>
            </div>
            <div class="cs">
            <h1>CARELINE</h1>
            <div class="mt-3"></div>

                <h5 style="font-weight:bold"><a href="tel:024631899">02 463 1899</a></h5>
            </div>
            <div class="social">
                <h1>ติดตามเราได้ที่นี่</h1>
                <div class="mt-4"></div>


                <div class="social-div">
                <i class="fab fa-facebook"></i>
                <i class="fab fa-twitter-square"></i>
                <i class="fab fa-instagram-square"></i>
                <i class="fab fa-youtube"></i>
                <i class="fab fa-line"></i>
                <i class="fab fa-linkedin"></i>
                </div>
            </div>
            <div class="address mt-3">
             
         
                 <h1> <i class="fas fa-map-marker-alt"></i> ADDRESS </h1>
                <div class="mt-5"></div>

                <p>
                    บริษัท นิปปอนเพนต์ เดคโคเรทีฟ โคทติ้ง </br>
                    (ประเทศไทย) จำกัด</br>
                    101 ม. 3 ซ.สุขสวัสดิ์ 76 ถนนสุขสวัสดิ์</br> 
                    บางจาก พระประแดง สมุทรปราการ 10130
                </p>

          
         
                <p class='mt-4'>
                Nippon Paint Decorative Coatings (Thailand) Co.,Ltd. <br />
101 Moo 3, Soi Suksawad 76, Suksawad Road, Bangchak, Prapradaeng, Samutprakarn 10130. 
                </p>

          
         
        </div>   
 


    </div>
    <iframe 
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d685.4784097354371!2d100.53461357870135!3d13.618086865288864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e2a15dce2506cb%3A0x12004e870f6fee2d!2z4Lia4Lij4Li04Lip4Lix4LiXIOC4meC4tOC4m-C4m-C4reC4meC5gOC4nuC4meC4leC5jCAo4Lib4Lij4Liw4LmA4LiX4Lio4LmE4LiX4LiiKSDguIjguY3guLLguIHguLHguJQ!5e0!3m2!1sth!2sth!4v1524027813084" 
    width="500" 
    height="500" 
    frameborder="0"></iframe>
</div>

   
<!-- <h1>Tet </h1> -->

<?php 



get_footer();

?>
