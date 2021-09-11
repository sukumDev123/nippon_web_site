 
 <?php 
get_template_part("other/loading");
get_header();


$slug = get_post_field( 'post_name');
$page_name =  get_field("page_name" , get_the_ID());
$post_type = get_post_field( 'post_type');
//  echo $post_type;

?>
<!-- <div id="banner-page"> -->

<?php 

if( $post->post_name != "my-account"): 
get_template_part("other/page-bk");
 
 
?>


      <?php 
            if($page_name == "faq"):  
                  get_template_part("templates/faq/".$page_name);
            endif; 
   
     
            if($page_name):  
                  get_template_part("templates/career/".$page_name);
            endif; 
         
           
            if($page_name == "page"):
                  
                  ?>
                  <div id="contact-us" class="container"> 
                  <?php 
                  the_content();
                  
                  ?>
                  </div>

                 
                  <?php 
            endif;
          if(!$page_name):
                  
            ?>
            <div id="contact-us" class="container"> 
            <?php 
            the_content();
            
            ?>
            </div>

           
            <?php 
      endif;
?>

<!-- </div> -->

<?php 
else:

 
 get_template_part("templates/my-account/home");

endif;

get_footer();

?>
