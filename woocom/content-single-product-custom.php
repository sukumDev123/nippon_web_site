

<?php
    get_template_part("headers/header-product");
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
?>
 
<!-- Paint brush -->

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
       
        if($terms_post):
            foreach ($terms_post as $term_cat):
                $term_cat_id = $term_cat->term_id;
                if($term_cat->parent == 0) :
                    if( $termId == 0 ):
                        $termId = $term_cat->term_id;
                        break;
                    endif;
                endif;
            endforeach;
            
            foreach ($terms_post as $term_cat):
                if($term_cat->parent == $termId) :
                    $termSubCate[$term_cat->term_id] =  ["name" => $term_cat->name , "ID" => $term_cat->term_id];
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
    ?>


 
<div   id="nav-products">
    <ul class="desktop">
        <?php if(count($terms) > 0): ?>
            <?php foreach($terms as  $term): if($term->name != "all"):  $className = ""; ?>
            <?php  if($term->term_id ==  $termId): $className = "cate-active" ;$word_selected =  $term->name;  endif; ?>
                <li class="<?php echo $className ?>"> 
                    <a href="<?php echo get_term_link($term->term_id) ?>"><?php echo $term->name ?></a>
                </li>
            <?php endif; endforeach; ?>
        <?php endif; ?>
       
    </ul>
    <button 
            id="productCate" 
            type="button" 
            class="btn  dropdown-toggle" 
            data-bs-toggle="dropdown" 
            aria-expanded="false"
        >
        <?php echo $word_selected ?>
        </button>
        <ul class="dropdown-menu" aria-labelledby="productCate">
        <?php foreach($terms as  $term): if($term->name != "all"):  $className = ""; if($termId == $term->term_id): $className="cate-active"; endif;  ?>
                <li > 
                    <a 
                        class="dropdown-item"  
                        href="<?php echo get_term_link($term->term_id)  ?>"><?php echo $term->name ?></a>
                </li>
            <?php endif; endforeach; ?>
            
        </ul>

</div>

<div class='container' id="single-product">
<div  class="arrow-back">
                <a href="<?php echo get_term_link( $termId ) ?>">
                    <img src="<?php echo  get_bloginfo("template_directory");  ?>/assets/images/arrow-g.svg" alt="arrow-g.svg" />

                <!-- <i class="fas fa-arrow-left"></i> -->
                </a>


        </div>
   <div class="content">
   <div class="left-side">
        
        <?php 
           $featured_img_url = get_the_post_thumbnail_url( get_the_ID(),'full'); 
        ?>
       <div>
           <img  src="<?php echo $featured_img_url ?>" />
           <?php  echo do_shortcode('[yith_wcwl_add_to_wishlist]');  ?>
           <div class="yith-wcwl-add-button">
	        <a href="<?php echo esc_url( add_query_arg( 'add_to_wishlist', get_the_ID(), get_permalink() ) ); ?>" rel="nofollow" data-product-id="<?php echo esc_attr( $product_id ); ?>" data-product-type="<?php echo esc_attr( $product_type ); ?>" data-original-product-id="<?php echo esc_attr( $parent_product_id ); ?>" class="<?php echo esc_attr( $link_classes ); ?>" data-title="<?php echo esc_attr( apply_filters( 'yith_wcwl_add_to_wishlist_title', $label ) ); ?>">
		     <i class="heart outline icon"></i>
		  
             <?php  var_dump(YITH_WCWL_Session()->has_session()) // echo YITH_WCWL()->is_product_in_wishlist( get_the_ID() )  ?>
	</a>


    <div class="yith-wcwl-add-to-wishlist add-to-wishlist-<?php echo esc_attr( $product_id ); ?> <?php echo esc_attr( $container_classes ); ?> wishlist-fragment on-first-load" data-fragment-ref="<?php echo esc_attr( $product_id ); ?>" data-fragment-options="<?php echo esc_attr( json_encode( $fragment_options ) ); ?>">
	 
</div>

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
               <?php foreach( $termSubCate as  $termShow): ?>
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
       <div class="logo-images">

           <?php $logos = acf_photo_gallery("logos" , get_the_ID());
           
           foreach($logos as $logo):?>
               <img class="logo-image" src="<?php echo $logo['full_image_url'] ?>" alt="">
           <?php 
           endforeach;?>
       
       </div>
      
       <?php if(!empty(get_field("custom"))): ?>
           <?php if(get_field("custom")['video_image'] ): ?>
           <div class="video-image">
               <!-- <a href="<?php echo get_field("custom")[''] ?>"></a> -->
               <img src="<?php echo get_field("custom")['video_image']['url'] ?>" alt="">
           </div>
               <?php endif; ?>
           <div class="file-left-right">
               <?php if(get_field("custom")['catalog']['image']): ?>
               <div class="left">
                   <h5><?php echo $text_static['catalog'] ?></h5>
                   <a target="_blank" href="<?php if(get_field("custom")['catalog']['file_link']) : echo get_field("custom")['catalog']['file_link']["url"]; endif; ?>">
                   <img src="<?php echo get_field("custom")['catalog']['image']['url'] ?>" alt="">
                   </a>
               </div>
               <?php endif; ?>

               <div class="right">
                   <h5><?php echo $text_static['file_manager'] ?></h5>
                    
                   <?php if(!empty(get_field("custom")['files'])): ?>
                       <button 
                       class="file1 d-flex align-items-center justify-content-center mt-4">
                       <img  
                           src="<?php bloginfo("template_directory");  ?>/assets/images/logo.png"  
                           class="image-logo me-5" />

                           <a  
                               target="_blank" style="text-decoration: none;color:#1E4F92;font-size:1.5em;font-weight:600;text-align:left" 
                               href="<?php  echo  get_field("custom")['files']["file1"]["file_link"]["url"]; ?>">
                               <?php if(get_field("custom")['files']["file1"]["title"]): echo get_field("custom")['files']["file1"]["title"]; else: echo "<strong>TECHNICAL</strong><br />DATA SHEET" ; endif; ?></a>
                       </button>
                       <button class="file2  d-flex align-items-center justify-content-center mt-4">
                       <img  src="<?php bloginfo("template_directory");  ?>/assets/images/logo.png"  class="image-logo me-5" />

                       <a   target="_blank" style="text-decoration: none;color:#1E4F92;font-size:1.5em;font-weight:600;text-align:left" href="<?php echo get_field("custom")['files']["file2"]["file_link"]["url"] ?>"><?php if(get_field("custom")['files']["file2"]["title"]): echo get_field("custom")['files']["file2"]["title"]; else: echo "<strong>SAFTY</strong><br />DATA SHEET" ; endif; ?></a>

                       </button>
                   <?php  endif;?>
               </div>
               </div>
           </div>
       <?php  endif; ?>

   </div>
   </div>
</div>
<div  style="background:white;position:relative;z-index:5;">

        <div class="container"><div style="border-top: 1px solid rgba(0,0,0,0.1);padding-top:5em"></div></div>
	 
		<!-- <div class="mt-5" style="height:20px;" ></div> -->
       
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