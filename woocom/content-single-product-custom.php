

<?php
  
    get_header();
    get_template_part("other/loading");
    $lang=get_bloginfo("language");  
    $text_static = [
        "en" => [
            "compare" => "เปรียบเทียบสินค้า",
            "catalog" => "File Dowload",
            "file_manager" => "File Manager",
            "property" => "Property",
            "paint_brush" => "Paint Brush",
            "title_product" => "ผลิตภัณฑ์ที่เกี่ยวข้อง"

        ],
        "th" => [
            "compare" => "เปรียบเทียบสินค้า",
            "catalog" => "Catalog Dowload",
            "file_manager" => "File Manager",
            "property" => "คุณสมบัติ",
            "paint_brush" => "พื้นที่การทา",
            "title_product" => "ผลิตภัณฑ์ที่เกี่ยวข้อง"

        ]
    ][$lang];
 $grade = "";

?>
 

<?php
$word_selected = "";

		global $post;
		$terms = get_terms('product_cat', ['hide_empty' => false, 'parent' => 0]);
        $termsShow = [];
        $termSubCate = [];
        $termSubCate2 = [];
        $termId = 0;
        $allTerms = [];
        $terms_post = get_the_terms( $post->cat_ID , 'product_cat' );
        $gradeParent = "";
        $termID = [];
        // var_dump($terms_post);
        if($terms_post):
            foreach ($terms_post as $term_cat):
                $term_cat_id = $term_cat->term_id;
           
                if($term_cat->name == "เกรด"):
                    $gradeParent = $term_cat->term_id;
                endif;
                if($term_cat->parent == 0) :
                    if( $termId == 0 ):
                        $termId = $term_cat->term_id;
                        break;
                    endif;
                endif;
            endforeach;
            for($i = 0 ; $i < count($terms_post);$i++):
                $term_cat = $terms_post[$i];
                if($term_cat->name == "เกรด"):
                    $gradeParent = $term_cat->term_id;
                    break;
                endif;
            endfor;
            for($i = 0 ; $i < count($terms_post);$i++):
                $term_cat = $terms_post[$i];
                if($term_cat->parent ==  $gradeParent):
                    $grade = $term_cat->name;
                    break;
                endif;
            endfor;
 
            foreach ($terms_post as $term_cat):
                if($term_cat->parent ==  $gradeParent):
                    $grade = $term_cat->name;
                endif;
                if($term_cat->parent == $termId) :
                    $termSubCate[$term_cat->term_id] =  ["name" => $term_cat->name , "ID" => $term_cat->term_id , "PARENT" => $term_cat->parent];
                endif;
            endforeach;
            foreach ($terms_post as $term_cat):
                if(count( $termSubCate) > 0):
                    if( !empty($termSubCate[$term_cat->parent])):
                        if(!isset($termSubCate2[$term_cat->parent])):
                            $termSubCate2[$term_cat->parent] = $term_cat->name. " ";
                        else:
                            $termSubCate2[$term_cat->parent] .= $term_cat->name. " ";
                        endif;
                    endif;
                endif;
            endforeach;
        endif;

        $getFavs = getFavoritesData("product" , get_the_ID());
        $data_favorites =  $getFavs["datas"];
    ?>


 <div class="nav-single-products"></div>

 <?php get_template_part("woocom/nav_products" , null , [
     "word_selected" => $word_selected,
     "terms" => $terms,
     "termId" => $termId 
 ]) ?>


<div class='container' id="single-product">
<div  class="arrow-back">
                <a href="<?php echo get_term_link( $termId ) ?>">
                    <img src="<?php echo  get_bloginfo("template_directory");  ?>/assets/images/arrow-g.svg" alt="arrow-g.svg" />
 
                </a>


        </div>
   <div class="content">
   <div class="left-side">
        
        <?php 
           $featured_img_url = get_the_post_thumbnail_url( get_the_ID(),'full'); 
           $userId = FALSE;
           if(get_current_user_id()):
               $userId = get_current_user_id();
           endif;
           $prod_id = get_the_ID();
        //    $data_favorites
           $heart_outline_class_name = "heart outline icon show";
           $heart_class_name= "heart icon hide_show";

           if(isset($data_favorites[$prod_id])):
            $heart_outline_class_name = "heart outline icon hide_show";
            $heart_class_name= "heart icon show";

           endif;
        ?>
       <div>
           <img  src="<?php echo $featured_img_url ?>" />
            <div class="icon-compare-product-and-favorites">
            <?php   
                // $gradeParent = ""; 
                // foreach( $termSubCate as  $termShow): 
                //     if($termShow['name'] == "เกรด"):
                //         $gradeParent =  $termShow['PARENT'];
                //     endif;
                // endforeach;
                // foreach( $termSubCate as  $termShow): 
                //     if($gradeParent == $termShow['ID']):
                //         $grade =  $termShow['name'];
                //     endif;
                // endforeach;
                ?>
                <a href="<?php echo  get_site_url() ?>/compare-product/?product_1=<?php echo get_the_ID() ?>&mainCate=<?php echo  $termId ?><?php if($grade): echo  "&cate1=".$grade ; endif; ?>">
                    <button  class="btn btn-block primary compare-product" style="color:white"  >เปรียบเทียบสินค้า</button>
                </a>
                <?php if( $userId !=  FALSE): ?>
                    
                    <i onclick="productFavorites(<?php echo $userId ?> ,  <?php  echo $prod_id ?> , 'product')" class="<?php echo $heart_outline_class_name  ?>"></i>
                    <i onclick="productFavorites(<?php echo $userId ?> ,  <?php  echo $prod_id ?> , 'product')" style="color:#D7373F" class="<?php echo $heart_class_name  ?>"></i>
                <?php endif; ?>
                
            </div>
 
        </div>
   </div>
   <div class="right-side">
       <h1> <?php the_title() ?> </h1>
       <div class="border-title"></div>

       <?php echo get_field("detail") ?>
       
       <h1><?php  echo   $text_static['property']?></h1>
       <div class="border-title"></div>
       <div class="mt-2rem"></div>
       <?php the_content() ?>  

       <div class="categories">
               <?php foreach( $termSubCate as  $termShow): 
                    if($termShow['name'] == "เกรด"):
                        $grade =  $termShow['ID'];
                    endif;
                    
                ?>
               <div class='category'>
                   <h5 class='title'><?php  echo $termShow['name']; ?></h5>
                   <h5 class="value"><?php  echo  $termSubCate2[$termShow['ID']] ?></h5>
               </div>
               <?php endforeach; ?>

                   <?php if(get_field("paint_brush")): ?>
               <div class='category'>
                   <h5 class='title'><?php  echo $text_static["paint_brush"] ?></h5>
                   <h5 class="value"><?php  echo get_field("paint_brush")?></h5>
               </div>
               <?php endif; ?>
       </div>
       
       <?php $logos = acf_photo_gallery("logos" , get_the_ID()); if(count($logos) > 0): ?>
            <div class="logo-images">  
           <?php foreach($logos as $logo):?>
               <img class="logo-image" src="<?php echo $logo['full_image_url'] ?>" alt="">
           <?php 
           endforeach;?>
       </div>
       <?php endif; ?>
      
       <?php if(!empty(get_field("custom"))): ?>
           <?php if(get_field("custom")['video_image'] ): ?>
           <div class="video-image">
               <img src="<?php echo get_field("custom")['video_image']['url'] ?>" alt="">
           </div>
               <?php endif; ?>
            <div class="file-left-right">
               <?php if(get_field("custom")['catalog']['file_link']): ?>
               <div class="left">
                    <?php 
                        $imageUrl = get_bloginfo("template_directory") ."/assets/images/product-cat.jpg";
                        $linkCatalog =  get_field("custom")['catalog']['file_link']["url"];
                        if(!empty(get_field("custom")['catalog']['image']['url'])) : 
                            $imageUrl= get_field("custom")['catalog']['image']['url'] ; 
                        endif; 
                    ?>
                        <h5><?php echo $text_static['catalog']   ?></h5>
                        <a 
                            target="_blank" 
                            href="<?php echo $linkCatalog ?>"
                        >
                            <img 
                                src="<?php echo $imageUrl ?>" 
                                alt="Catalog Image" />
                        </a>
               </div>
               <?php endif; ?>

               <div class="right">
                   <?php if(!empty(get_field("custom")['files']["file1"]["file_link"])  || !empty(get_field("custom")['files']["file2"]["file_link"])): ?>
                   <h5><?php echo $text_static['file_manager'] ?></h5>
                    <?php if(!empty(get_field("custom")['files']["file1"]["file_link"])): ?>
                       <a 
                       href="<?php echo get_field("custom")['files']["file1"]["file_link"]['url'] ?>"
                       target="_blank"
                       class="button-download-file-management first">
                            <button class="file2  d-flex align-items-center justify-content-center mt-4">
                                <img  
                                src="<?php bloginfo("template_directory");  ?>/assets/images/logo.png"  
                                class="image-logo me-5" />
                                <h5>
                                <?php
                                        if(get_field("custom")['files']["file1"]["title"]): echo get_field("custom")['files']["file1"]["title"]; else: echo "<strong>TECHNICAL</strong><br />DATA SHEET" ; endif; ?>
                                </h5>
                            </button>
                       </a>
                    <?php endif; ?>
                    <?php if(!empty(get_field("custom")['files']["file2"]["file_link"])): ?>
                       <a 
                       href="<?php echo get_field("custom")['files']["file2"]["file_link"]['url'] ?>"
                       target="_blank"
                       class="button-download-file-management">
                        <button class="file2  d-flex align-items-center justify-content-center mt-4">
                            <img  
                            src="<?php bloginfo("template_directory");  ?>/assets/images/logo.png"  
                            class="image-logo me-5" />
                            <h5>
                            <?php if(get_field("custom")['files']["file2"]["title"]): echo get_field("custom")['files']["file2"]["title"]; else: echo "<strong>SAFTY</strong><br />DATA SHEET" ; endif; ?>
                            </h5>
                        </button>
                       </a>
                    <?php endif; ?>
                      
        
               </div>
               <?php  endif; ?>
               </div>
           </div>
       <?php  endif; ?>

   </div>
   </div>
</div>
<div  style="background:white;position:relative;z-index:5;">

        <div class="container"><div style="border-top: 1px solid rgba(0,0,0,0.1);padding-top:5em"></div></div>
	 
 
       
<div  class="product-padding">
<?php get_template_part("other/products" , null , [
    "title_product" => $text_static["title_product"]
]);?>
</div>
        
    
        <div class="mt-5rem"></div>
        <?php get_template_part("pages/page-services"); ?>
        <div style="padding-bottom: 5em" ></div>

</div>



<script>
      function onLikeClicked(id) {
        fetch("<?php  echo get_permalink(); ?>" + "?id=" + id + "&type=" + "liked").catch(error => console.log({error}));
        document.querySelector("#heart"+ id).className = "fas fa-heart";
    }
</script>