<?php 

 /** Template Name: Compare Product */
get_header();
$terms = get_terms('product_cat', array('hide_empty' => false, 'parent' => 0));
$sub_terms = [];
get_template_part("other/loading");
function defaultProduct() {
    return [
        "id" => "",
        "title" => "",
        "image" => "",
        "grade" => "",
        "feature" => ""
    ];
}

$product1 =defaultProduct();
$product2 =defaultProduct();
$product3 =defaultProduct();
$selected1_id = "";
$product1_id = "";
$product2_id = "";
$product3_id = "";
$select_cate = "";
$product_form_cate = "";
$selected1_cate_id = "";
$selected2_cate_id = "";
$selected3_cate_id = "";
$selected2_id = "";
$product_query = [];
if(isset($_GET['product_1'])):
    $product1_id = $_GET['product_1'];
    // array_push($product_query , $product1_id);
    $query = new WP_Query([
        "post_type" => 'product',
        "p" => $product1_id ,
    ]);
  
    if($query->have_posts()):
        while($query->have_posts()):
            $query->the_post();
            $product_categories =   get_the_terms(get_the_ID() , "product_cat");
            $grade = "";
            $grade_parent = "";
            $type_film_parent = "";
            $type_film = "";
            foreach($product_categories as $product_cat):
                if($product_cat->parent == 0):
                    $selected1_id = $product_cat->term_id;
                endif;
                if($product_cat->name == "เกรด"):
                    $grade_parent = $product_cat->term_id;
                    $select_cate = $product_cat->term_id;

                endif;
                if($product_cat->name == "ชนิดฟิล์มสี"):
                    $type_film_parent = $product_cat->term_id;
                endif;
            endforeach;
            foreach($product_categories as $pc):
                if($pc->parent ==  $grade_parent):
                    $grade  = $pc->name;
                    $selected1_cate_id = $pc->term_id;
                endif;
            endforeach;
            $product1 = [
                "id" => get_the_ID(),
                "title" => get_the_title(),
                "image" => get_the_post_thumbnail_url(get_the_ID() , "full"),
                "grade" =>  $grade,
                "type_film" => $type_film,
                "feature" => get_the_content()
            ];
 

        endwhile  ;
    endif;
 
    wp_reset_query();
endif;

 
if(isset($_GET['product_2'])):
    $product2_id = $_GET['product_2'];
    
    $query = new WP_Query([
        "post_type" => 'product',
        "p" => $product2_id ,
    ]);
    if($query->have_posts()):
        while($query->have_posts()):
            $query->the_post();
            $product_categories =   get_the_terms(get_the_ID(), "product_cat");
            $grade = "";
            $grade_parent = "";
            $type_film_parent = "";
            $type_film = "";
            foreach($product_categories as $product_cat):
                if($product_cat->name == "เกรด"):
                    $grade_parent = $product_cat->term_id;
                endif;
                if($product_cat->name == "ชนิดฟิล์มสี"):
                    $type_film_parent = $product_cat->term_id;
                endif;
            endforeach;
            foreach($product_categories as $pc):
                if($pc->parent ==  $grade_parent):
                    $grade  = $pc->name;
                  
                    $selected2_cate_id = $pc->term_id;

                endif;
            endforeach;
            $product2 = [
                "id" => get_the_ID(),
                "title" => get_the_title(),
                "image" => get_the_post_thumbnail_url(get_the_ID() , "full"),
                "grade" =>  $grade,
                "type_film" => $type_film,
                "feature" => get_the_content()

            ];
 

        endwhile  ;
    endif;
    wp_reset_query();

endif;
if(isset($_GET['product_3'])):
    $product3_id = $_GET['product_3'];
    
    $query = new WP_Query([
        "post_type" => 'product',
        "p" => $product3_id ,
    ]);
    if($query->have_posts()):
        while($query->have_posts()):
            $query->the_post();
            $product_categories =   get_the_terms(get_the_ID() , "product_cat");
            $grade = "";
            $grade_parent = "";
            $type_film_parent = "";
            $type_film = "";
            foreach($product_categories as $product_cat):
                if($product_cat->name == "เกรด"):
                    $grade_parent = $product_cat->term_id;
                endif;
                if($product_cat->name == "ชนิดฟิล์มสี"):
                    $type_film_parent = $product_cat->term_id;
                endif;
            endforeach;
            foreach($product_categories as $pc):
                if($pc->parent ==  $grade_parent):
                    $grade  = $pc->name;
                    $selected3_cate_id = $pc->term_id;

                endif;
            endforeach;
            $product3 = [
                "id" => get_the_ID(),
                "title" => get_the_title(),
                "image" => get_the_post_thumbnail_url(get_the_ID() , "full"),
                "grade" =>  $grade,
                "type_film" => $type_film,
                "feature" => get_the_content()

            ];
 

        endwhile  ;
    endif;
    wp_reset_query();


endif;
if( $select_cate ):
    $sub_terms = get_terms('product_cat', array('hide_empty' => false, 'parent' => $select_cate ));
endif;
 
$query1 =  "";
$query2 = "";
$query3 = "";
if($selected1_cate_id):
    $query1 = new WP_Query([
        "post_type" => "product",
        "tax_query" => [
            [
                'taxonomy' => 'product_cat',
                'field' => 'term_id',
                'terms' =>    [$selected1_cate_id],
                'include_children' => true,
                'operator' => 'IN'
             ]
        ]
    ]);
endif;
if($selected2_cate_id):
    $query2 = new WP_Query([
        "post_type" => "product",
        "tax_query" => [
            [
                'taxonomy' => 'product_cat',
                'field' => 'term_id',
                'terms' =>    [$selected2_cate_id],
                'include_children' => true,
                'operator' => 'IN'
             ]
        ]
    ]);
endif;
if($selected3_cate_id):
    $query3 = new WP_Query([
        "post_type" => "product",
        "tax_query" => [
            [
                'taxonomy' => 'product_cat',
                'field' => 'term_id',
                'terms' =>    [$selected3_cate_id],
                'include_children' => true,
                'operator' => 'IN'
             ]
        ]
    ]);
endif;

?>


<!-- compare-product-body -->
<?php // if($_GET[]) ?>






<div class="container template-compare"  >
    <div class="compare-product-header">
        <h1 class="text-center ui header primary-text">
            <?php echo get_the_title() ?>
            <div class="sub header"><?php echo get_field("short_text") ?></div>
        </h1>
        <div   class="header-product-categories mt-5">
            <select 
            
            onchange="mainCateChanged()" 
            id="mainCate"  
            class="select-product-custom form-select" 
            
            >
                <option value="">Open this select menu</option>
                <?php foreach($terms as $term): ?>
                    <option <?php if($term->term_id == $selected1_id): echo  "selected"; endif; ?> value="<?php echo $term->term_id ?>"><?php echo $term->name ?></option>
                <?php endforeach; ?>
            </select>
       
            <div <?php if(!$select_cate): echo "style='display:none'"; endif; ?> id="compare_cate_2" class="row mt-3">
                <div class="col-12 col-md-4">
                    <select onchange="onProductCate1Changed()"   id="cate1" class="select-product-custom form-select" aria-label="Default select example">
                        <option value=""  >Select</option>
                        <?php
                        if(count($sub_terms)):
                            foreach(  $sub_terms as   $sub_term):
                                ?>
                            <option <?php if($sub_term->term_id ==  $selected1_cate_id): echo "selected"; endif; ?> value="<?php echo $sub_term->term_id ?>"><?php echo $sub_term->name ?></option>
                                <?php 
                            endforeach;
                          
                        endif;
                        ?>
                    </select>
                </div>
                <div class="col-12 col-md-4">
                    <select  onchange="onProductCate2Changed()"  <?php if(!$product1_id): echo "disabled"; endif; ?>  id="cate2" class="select-product-custom form-select" aria-label="Default select example">
                        <option  value="" >Select</option>
                        <?php
                        if(count($sub_terms)):
                            foreach(  $sub_terms as   $sub_term):
                                ?>
                            <option <?php if($sub_term->term_id ==  $selected2_cate_id): echo "selected"; endif; ?> value="<?php echo $sub_term->term_id ?>"><?php echo $sub_term->name ?></option>
                                <?php 
                            endforeach;
                          
                        endif;
                        ?>
                    </select>
                </div>
                <div class="col-12 col-md-4">
                    <select  onchange="onProductCate3Changed()"  <?php if(!$product1_id): echo "disabled"; endif; ?> id="cate3" class="select-product-custom form-select" aria-label="Default select example">
                        <option   value="" >Select</option>
                        <?php
                        if(count($sub_terms)):
                            foreach(  $sub_terms as   $sub_term):
                                ?>
                            <option <?php if($sub_term->term_id ==  $selected3_cate_id): echo "selected"; endif; ?> value="<?php echo $sub_term->term_id ?>"><?php echo $sub_term->name ?></option>
                                <?php 
                            endforeach;
                          
                        endif;
                        ?>
                    </select>
                </div>
            </div>
      
            <!-- <form action=""> -->
               <div id="show_product_filter_from_cate">
                <div class="row mt-3">
                        <div class="col-12 col-md-4">
                        <select   id="product_1" class="select-product-custom form-select" aria-label="Default select example">
                            <option  value="" selected>Select</option>
                            <?php
                                if($query1):
                                    if($query1->have_posts()):
                                        while($query1->have_posts()):
                                            $query1->the_post();
                                            ?>
                                            <option <?php if(get_the_ID() ==  $product1_id): echo "selected"; endif; ?> value="<?php echo get_the_ID() ?>"><?php echo get_the_title() ?></option>
                                            <?php 
                                        endwhile;
                                    endif;
                                endif;
                                wp_reset_query();
                            ?>
                        </select>
                        </div>
                        <div class="col-12 col-md-4">
                            <select  id="product_2" class="select-product-custom form-select" aria-label="Default select example">
                                <option value="" selected>Select</option>
                                <?php
                                if($query2):
                                    if($query2->have_posts()):
                                        while($query2->have_posts()):
                                            $query2->the_post();
                                            ?>
                                            <option <?php if(get_the_ID() ==  $product2_id): echo "selected"; endif; ?> value="<?php echo get_the_ID() ?>"><?php echo get_the_title() ?></option>
                                            <?php 
                                        endwhile;
                                    endif;
                                endif;
                                wp_reset_query();
                            
                            ?>
                            </select>
                        </div>
                        <div class="col-12 col-md-4">
                            <select  id="product_3" class="select-product-custom form-select" aria-label="Default select example">
                                <option value=""  selected>Select</option>
                                <?php 
                                if($query3):
                                    if($query3->have_posts()):
                                        while($query3->have_posts()):
                                            $query3->the_post();
                                            ?>
                                            <option <?php if(get_the_ID() ==  $product3_id): echo "selected"; endif; ?> value="<?php echo get_the_ID() ?>"><?php echo get_the_title() ?></option>
                                            <?php 
                                        endwhile;
                                    endif;
                                endif;
                                wp_reset_query();
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="mt-5 text-center">
                        <?php  get_template_part("components/button-primary" , null, [
                            "title" =>  get_the_title(),
                            "href" => "",
                            "id" => "button_search",
                            "onClick" => 'compareProduct(event , "'.get_permalink().'")'
                        ]) ?>
                    </div>
               </div>
            <!-- </form> -->
        </div>
    </div>
  

    <?php if(isset($_GET['product_1'])): ?>
   <div id="compare-product-body">
   <h1 class="ui header text-center primary-text mt-4 mb-4">ผลการเปรียบเทียบผลิตภัณฑ์</h1>

    <div class="compare-product-content">       
            <?php 
            
                    get_template_part('components/compare-product' , null , [
                        "title"  => "",
                        "product1" => $product1["title"],
                        "product2" => $product2["title"],
                        "product3" => $product3["title"],
                    ]);
            ?>
    
            <div class="compare-product-table-images">
                <div class="image hh">
                    <h3></h3>
                </div>    
                <div class="image two">
                            <img  
                            
                            src="<?php echo  $product1["image"] ?>" 
                            alt="<?php echo $product1["title"] ?>">
                    </div>
                    <?php if($product2["image"]): ?>
                        <div class="image two">
                                <img  
                                src="<?php  echo  $product2["image"] ?>" 
                                alt="<?php echo $product2["title"] ?>">
                        </div>
                    <?php endif; ?>
                    <?php if($product3["image"]): ?>
                        <div class="image two">
                                <img  
                                src="<?php  echo  $product3["image"] ?>" 
                                alt="<?php echo $product3["title"] ?>">
                        </div>
                    <?php endif; ?>
                    
            </div>
            
        
            <?php 
            
                    get_template_part('components/compare-product' , null , [
                        "title"  => "เกรด",
                        "product1" => $product1["grade"],
                        "product2" => $product2["grade"],
                        "product3" => $product3["grade"],
                    ]);
            ?>
        
            <?php 
            
                    get_template_part('components/compare-product' , null , [
                        "title"  => "ชนิดฟิล์มสี",
                        "product1" => $product1["grade"],
                        "product2" => $product2["grade"],
                        "product3" => $product3["grade"],
                    ]);
            ?>
            <?php 
            
                    get_template_part('components/compare-product' , null , [
                        "title"  => "พื้นที่การทา",
                        "product1" => $product1["grade"],
                        "product2" => $product2["grade"],
                        "product3" => $product3["grade"],
                    ]);
            ?>
            <?php 
            
                    get_template_part('components/compare-product' , null , [
                        "title"  => "ประเภทผลิตภัณฑ์",
                        "product1" => $product1["grade"],
                        "product2" => $product2["grade"],
                        "product3" => $product3["grade"],
                    ]);
            ?>
            <?php 
            
                    get_template_part('components/compare-product' , null , [
                        "title"  => "พื้นที่ใช้งาน",
                        "product1" => $product1["grade"],
                        "product2" => $product2["grade"],
                        "product3" => $product3["grade"],
                    ]);
            ?>
        
            <?php 
            
                    get_template_part('components/compare-product' , null , [
                        "title"  => "พื้นผิว",
                        "product1" => $product1["grade"],
                        "product2" => $product2["grade"],
                        "product3" => $product3["grade"],
                    ]);
            ?>
        
            <?php 
            
                    get_template_part('components/compare-product' , null , [
                        "title"  => "กลุ่มงาน",
                        "product1" => $product1["grade"],
                        "product2" => $product2["grade"],
                        "product3" => $product3["grade"],
                    ]);
            ?>
            <?php 
            
                    get_template_part('components/compare-product' , null , [
                        "title"  => "ฟังก์ชั่น",
                        "product1" => $product1["grade"],
                        "product2" => $product2["grade"],
                        "product3" => $product3["grade"],
                    ]);
            ?>
        
            <?php 
            
                    get_template_part('components/compare-product' , null , [
                        "title"  => "GREEN PRODUCT",
                        "product1" => $product1["grade"],
                        "product2" => $product2["grade"],
                        "product3" => $product3["grade"],
                    ]);
            ?>
            <?php 
            
                    get_template_part('components/compare-product' , null , [
                        "title"  => "สินค้านวัตกรรม",
                        "product1" => $product1["grade"],
                        "product2" => $product2["grade"],
                        "product3" => $product3["grade"],
                    ]);
            ?>
            <?php 
            
                    get_template_part('components/compare-product' , null , [
                        "title"  => "รูปลักษณ์พิเศษ",
                        "product1" => $product1["grade"],
                        "product2" => $product2["grade"],
                        "product3" => $product3["grade"],
                    ]);
            ?>
            <?php 
            
                    get_template_part('components/compare-product' , null , [
                        "title"  => "ขนาดบรรจุ",
                        "product1" => $product1["grade"],
                        "product2" => $product2["grade"],
                        "product3" => $product3["grade"],
                    ]);
            ?>
        
            <?php 
            
                    get_template_part('components/compare-product' , null , [
                        "title"  => "มาตรฐานมอก.",
                        "product1" => $product1["grade"],
                        "product2" => $product2["grade"],
                        "product3" => $product3["grade"],
                    ]);
            ?>
            <?php 
            
                    get_template_part('components/compare-product' , null , [
                        "title"  => "ความคงทน",
                        "product1" => $product1["grade"],
                        "product2" => $product2["grade"],
                        "product3" => $product3["grade"],
                    ]);
            ?>
            <?php 
                    get_template_part('components/compare-product-feature' , null , [
                        "title"  => "คุณสมบัติ",
                        "product1" => $product1["feature"],
                        "product2" => $product2["feature"],
                        "product3" => $product3["feature"],
                    ]);
            ?>
            <?php 
            
                    get_template_part('components/compare-product' , null , [
                        "title"  => "ตัวทำละลาย",
                        "product1" => $product1["grade"],
                        "product2" => $product2["grade"],
                        "product3" => $product3["grade"],
                    ]);
            ?>
        
            <?php 
            
                    get_template_part('components/compare-product-button' , null , [
                        "title"  => "",
                        "product1" => "รายละเอียด",
                        "product2" => "รายละเอียด",
                        "product3" => "รายละเอียด",
                        "product_id_1" => $product1["id"] ,
                        "product_id_2" =>  $product2["id"],
                        "product_id_3" =>  $product3["id"] ,
                    ]);
            ?>
        
        
            
    
        </div>
   </div>
   <?php endif; ?>
</div>

 
<div class="mt-5rem"></div>

<?php 

get_template_part("pages/page-services");

?>

<div class="mt-5rem"></div>

<?php get_footer() ?>