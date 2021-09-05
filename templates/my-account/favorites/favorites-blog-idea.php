<div class="nav-list-blog-window ui fluid three item  secondary pointing menu">
  <a   href="<?php echo  get_site_url() ."/favorites-products" ?>" class="item">
    ผลิตภัณฑ์
  </a>
  <a   href="<?php echo  get_site_url() ."/favorites-solution-color" ?>" class="item ">
    บทความการแก้ไขปัญหาสี
  </a>
  <a  href="<?php echo  get_site_url() ."/favorites-blog-idea" ?>" class="item active">
    บทความไอเดียการตกแต่ง
  </a>
   
</div>




<div class="nav-list-blog-mobile">
  <select class="form-select" id="select-myaccount" onchange="onMyAccountChangedSelect('#select-myaccount')">
    <option  value="<?php echo  get_site_url() ."/favorites-products" ?>">ผลิตภัณฑ์</option>
    <option value="<?php echo  get_site_url() ."/favorites-solution-color" ?>">บทความการแก้ไขปัญหาสี</option>
    <option selected value="<?php echo  get_site_url() ."/favorites-blog-idea" ?>">บทความไอเดียการตกแต่ง</option>
  </select>
</div>



<div class="mt-3rem"></div>



<div class="row">





<?php 
 
$limit = 9;
if(isset($_GET['limit'])):
  $limit = $_GET['limit'];
endif;

$getFavs = getFavoritesData("get_idea" , FALSE , $limit);
$products_favorites = $getFavs["datas"];
$count = $getFavs["count"];
$index = 0;
  foreach ( $products_favorites as $products_favorite ) :
    $prodId = $products_favorite["post_id"];
    $featured_img_url = get_the_post_thumbnail_url( $prodId,'full');
    $link = get_permalink($prodId);
    $name_product = get_the_title($prodId);
    
    if ( $name_product) :
      
     
      ?>
  
    <div class="col-12 col-md-6 column-card-get-idea column-card-get-idea-<?php echo $index ?>">
      <?php 
           get_template_part("templates/get_idea/card-remove" , null , [
            "featured_img_url" =>  $featured_img_url,
            "title" => $name_product , 
            "short_text" => get_field("short_text" , $prodId),
            "checked" => FALSE,
            "link" => get_permalink($prodId),
            "user_id" => get_current_user_id(),
            "id" => $prodId ,
            "favorite" =>     FALSE,
            "index" => $index ,
            "type_blog" => "get_idea" ,
            "nameClass" => "column-card-get-idea-".$index,
                
        ]); 
      
        $index++;
      ?>
      
    </div>
    <?php 
      endif;
      
    endforeach;
    
    ?>




</div>


<?php if($count >= $limit): $limit = $limit +  3;  ?>
        <h3 class="ui header center aligned">
            <a href="<?php echo  get_permalink()."?limit=". $limit ?>">
                <div class="sub header"> See More</div>
            </a>
        </h3>
        <?php endif; ?>
        <?php do_action("empty_page" , ["count" => $count ]) ?>
