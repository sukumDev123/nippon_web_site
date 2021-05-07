
<?php
    get_template_part("headers/header-single");

        $terms = get_terms('product_cat', array('hide_empty' => false, 'parent' => 0));
        $termsShow = [];
        $termSubCate = [];
        $termSubCate2 = [];
        $termId = 0;
        $allTerms = [];
        


        global $wp_query;
        $terms_post = get_the_terms( $post->cat_ID , 'product_cat' );
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
            if( $termSubCate[$term_cat->parent]):
                $termSubCate2[$term_cat->parent] .= $term_cat->name. " ";
            endif;
        endforeach;
 
    ?>


 
<div   id="nav-products">
    <ul>
        <?php if(count($terms) > 0): ?>
            <?php foreach($terms as  $term):  $className = ""; ?>
            <?php if($term->term_id ==  $termId): $className = "cate-active";  endif; ?>
 
                <li class="<?php echo $className ?>"> 
                    <a href="/product/?cate=<?php echo $term->term_id ?>"><?php echo $term->name ?></a>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
       
    </ul>
</div>

<div class='container' id="single-product">
    <div class="left-side">
         <?php 
            $featured_img_url = get_the_post_thumbnail_url( get_the_ID(),'full'); 
         ?>
         <img src="<?php echo $featured_img_url ?>" />
    </div>
    <div class="right-side">
        <h1> <?php the_title() ?> </h1>
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
        </div>
        <div class="logo-images">

            <?php 
                    // $photos = acf_photo_gallery("" , get_the_ID());
                    // $product_gallery = get_field('logos', get_the_ID());
                    $logos = acf_photo_gallery("logos" , get_the_ID());
                
                    foreach($logos as $logo):
                        ?>
                            <img class="logo-image" src="<?php echo $logo['full_image_url'] ?>" alt="">
                        <?php 
                    endforeach;
                    // print_r( $photos);
                    ?>
        
        </div>
        <div class="video-image">
            <img src="<?php echo get_field("custom")['video_image']['url'] ?>" alt="">
        </div>
 
        <div class="file-left-right">
            <div class="left">
                <h5><?php echo get_field("custom")['catalog']['title'] ?></h5>
                <img src="<?php echo get_field("custom")['catalog']['image']['url'] ?>" alt="">
                
            </div>
            <div class="right">
                <h5><?php echo get_field("custom")['files']['title'] ?></h5>
                <div>
                    <img src="<?php echo get_field("custom")['files']['file1']['image']['url']   ?>" alt="">
                    <!-- <img src="<?php echo get_field("custom")['files']['file1']['title']   ?>" alt=""> -->
                    <h5>
                        <?php echo get_field("custom")['files']['file1']['title']   ?>
                    </h5>
                </div>
                <div>
                    <img src="<?php echo get_field("custom")['files']['file2']['image']['url']   ?>" alt="">
                   <h5>
                    <?php echo get_field("custom")['files']['file2']['title']   ?>
                   </h5>
                </div>
            </div>
        </div>

    </div>
</div>
      <div style="background:white;position:relative;z-index:5;">
<div class="mt-10rem" style="border-top: 1px solid rgba(0,0,0,0.1);padding-top:30px"></div>

      <?php 
            get_template_part("other/products");
        
        ?>
        <div class="mt-10em"></div>
            <?php

            get_template_part("pages/page-services");


            ?>
    </div>


<?php  get_footer() ?>