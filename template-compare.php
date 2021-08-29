<?php 

 /** Template Name: Compare Product */
get_header();
$terms = get_terms('product_cat', array('hide_empty' => false, 'parent' => 0));
$sub_terms = [];
get_template_part("other/loading");
function defaultProduct() {
    return [
   
        "id" => "" ,
        "title" => "" ,
        "image" => "" ,
        "grade" => "",
        "type_film" => "" ,
        "feature" => "" ,
        "paint_brush" => "",
        "standard" => "" ,
        "persistence" => "",
        "solvent" => "" ,
        "application_area" => "" ,
        "use_area" => "" ,
        "texture" => "" ,
        "word_group" => "" ,
        "function_group" => "" ,
        "is_green_product" => "" ,
        "innovative_product" => "" ,
        "special_look" => "" ,
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
$select_product_id = "";
$product_form_cate = "";
$selected1_cate_id = "";
$selected2_cate_id = "";
$selected3_cate_id = "";
$selected2_id = "";
$product_query = [];
$typeIs1= "";
$typeIs2= "";
$typeIs3= "";
if(isset($_GET['product_1'])):
    $product1_id = $_GET['product_1'];
    $product1_db = returnProduct($product1_id);
    $selected1_id =  $product1_db["select_id"];
    $product1 =  $product1_db["products"];
    $selected1_cate_id =  $product1_db["selected1_cate_id"];
    $select_cate = $product1_db['select_cate'];
    echo '<script> setTimeout(() => {
        document.querySelector("#button_search").scrollIntoView({behavior: "smooth" , block: "start"})
    } , 1000)</script>';
endif;

 
if(isset($_GET['product_2'])):
    $product2_id = $_GET['product_2'];
  
    $product2_db = returnProduct($product2_id);
    $selected2_id =  $product2_db["select_id"];
    $product2 =  $product2_db["products"];
    $selected2_cate_id =  $product2_db["selected1_cate_id"];

    echo '<script> setTimeout(() => {
        document.querySelector("#button_search").scrollIntoView({behavior: "smooth" , block: "start"})
    } , 1000)</script>';
endif;
 
if(isset($_GET['product_3'])):
    $product3_id = $_GET['product_3'];
    $product3_db = returnProduct($product3_id);
    $selected3_id =  $product3_db["select_id"];
    $product3 =  $product3_db["products"];
    $selected3_cate_id =  $product3_db["selected1_cate_id"];

    echo '<script> setTimeout(() => {
        document.querySelector("#button_search").scrollIntoView({behavior: "smooth" , block: "start"})
    } , 1000)</script>';
endif;
$mainCate = "";
if(isset($_GET['mainCate'])):
    $mainCate = $_GET['mainCate'];
endif;
$cate1 = "";
if(isset($_GET['cate1'])):
    $cate1 = $_GET['cate1'];
endif;
$cate2 = "";
if(isset($_GET['cate2'])):
    $cate2 = $_GET['cate2'];
endif;
$cate3 = "";
if(isset($_GET['cate3'])):
    $cate3 = $_GET['cate3'];
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
        "posts_per_page" => -1,
        'meta_key'	=> 'priority',
        'orderby'   => 'meta_value_num',
        'order'		=> 'ASC',
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

else:
    $query1 = new WP_Query([
        "post_type" => "product",
        "posts_per_page" => -1,
        'meta_key'	=> 'priority',
        'orderby'   => 'meta_value_num',
        'order'		=> 'ASC',
        "tax_query" => [
            [
                'taxonomy' => 'product_cat',
                'field' => 'term_id',
                'terms' =>    [$mainCate],
                'include_children' => true,
                'operator' => 'IN'
             ]
        ]
    ]);
endif;
 
if($selected2_cate_id):
    $query2 = new WP_Query([
        "post_type" => "product",
        "posts_per_page" => -1,
        'meta_key'	=> 'priority',
        'orderby'   => 'meta_value_num',
        'order'		=> 'ASC',
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
    // var_dump($query2->have_posts());
else:
    $query2 = new WP_Query([
        "post_type" => "product",
        "posts_per_page" => -1,
        'meta_key'	=> 'priority',
        'orderby'   => 'meta_value_num',
        'order'		=> 'ASC',
        "tax_query" => [
            [
                'taxonomy' => 'product_cat',
                'field' => 'term_id',
                'terms' =>    [$mainCate],
                'include_children' => true,
                'operator' => 'IN'
             ]
        ]
    ]);
endif;

if($selected3_cate_id):
    $query3 = new WP_Query([
        "post_type" => "product",
        "posts_per_page" => -1,
        'meta_key'	=> 'priority',
        'orderby'   => 'meta_value_num',
        'order'		=> 'ASC',
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
else:
    $query3 = new WP_Query([
        "post_type" => "product",
        "posts_per_page" => -1,
        'meta_key'	=> 'priority',
        'orderby'   => 'meta_value_num',
        'order'		=> 'ASC',
        "tax_query" => [
            [
                'taxonomy' => 'product_cat',
                'field' => 'term_id',
                'terms' =>    [$mainCate],
                'include_children' => true,
                'operator' => 'IN'
             ]
        ]
    ]);
endif;
 
 ?>
<?php // if($_GET[]) ?>






<div class="container template-compare"  >
    <div class="compare-product-header">
        <h1 class="text-center ui header primary-text title-header">
            <?php echo get_the_title() ?>
            <div class="sub header"><?php echo get_field("short_text") ?></div>
        </h1>
        <div   class="header-product-categories">
            <select 
            
            onchange="mainCateChanged()" 
            id="mainCate"  
            class="select-product-custom form-select" 
            
            >
                <option value="">เลือกประเภทผลิตภัณฑ์</option>
                <?php foreach($terms as $term): ?>
                    <option <?php if($term->term_id == $mainCate): 
                        if(isset($_GET['product_1'])):
 
                            $typeIs1 = $term->name;
                        
                        endif;
                        // $cate2 = "";
                        if(isset($_GET['product_2'])):
                            $typeIs2 =  $term->name;
                            
                        endif;
                        // $cate3 = "";
                        if(isset($_GET['product_3'])):
                            $typeIs3 =  $term->name;
                        
                        endif;


                        ; echo  "selected"; endif; ?> value="<?php echo $term->term_id ?>"><?php echo $term->name ?></option>
                <?php endforeach; ?>
            </select>
       
         
            <!-- <form action=""> -->
               <div id="show_product_filter_from_cate">
               <div <?php if(!$select_cate): echo "style='display:none'"; endif; ?> id="compare_cate_2" class="row mt-3">
                <div class="col-12 col-md-4">
                    <select onchange="onProductCate1Changed()"   id="cate1" class="select-product-custom form-select" aria-label="Default select example">
                        <option value=""  >เลือกเกรด</option>
                        <?php
                        if(count($sub_terms)):
                            foreach(  $sub_terms as   $sub_term):
                                ?>
                            <option <?php if($sub_term->name ==  $cate1): echo "selected"; endif; ?> value="<?php echo $sub_term->name ?>"><?php echo $sub_term->name ?></option>
                                <?php 
                            endforeach;
                          
                        endif;
                        ?>
                    </select>
                </div>
                <div class="col-12 col-md-4">
                    <select value="<?php echo $cate2; ?>"  onchange="onProductCate2Changed()"  <?php if(!$product1_id): echo "disabled"; endif; ?>  id="cate2" class="select-product-custom form-select" aria-label="Default select example">
                        <option  value="" >เลือกเกรด</option>
                        <?php
                        if(count($sub_terms)):
                            foreach(  $sub_terms as   $sub_term):
                                ?>
                            <option <?php if($sub_term->name ==  $cate2): echo "selected"; endif; ?> value="<?php echo $sub_term->name ?>"><?php echo $sub_term->name ?></option>
                                <?php 
                            endforeach;
                          
                        endif;
                        ?>
                    </select>
                </div>
                <div class="col-12 col-md-4">
                    <select  onchange="onProductCate3Changed()"  <?php if(!$product1_id): echo "disabled"; endif; ?> id="cate3" class="select-product-custom form-select" aria-label="Default select example">
                        <option   value="" >เลือกเกรด</option>
                        <?php
                        if(count($sub_terms)):
                            foreach(  $sub_terms as   $sub_term):
                                ?>
                            <option <?php if($sub_term->name ==  $cate3): echo "selected"; endif; ?> value="<?php echo $sub_term->name ?>"><?php echo $sub_term->name ?></option>
                                <?php 
                            endforeach;
                          
                        endif;
                        ?>
                    </select>
                </div>
            </div>
      
                <div class="row mt-3">
                        <div class="col-12 col-md-4">
                        <select onchange="onProduct1Selected()"  id="product_1" class="select-product-custom form-select" aria-label="Default select example">
                            <option  value="" selected>เลือกผลิตภัณฑ์</option>
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
                                    wp_reset_query();
                                endif;
                            ?>
                        </select>
                        </div>
                        <div class="col-12 col-md-4">
                            <select <?php if(!$product1_id): echo "disabled"; endif; ?>  id="product_2" class="select-product-custom form-select" aria-label="Default select example">
                                <option value=""  selected>เลือกผลิตภัณฑ์</option>
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
                                    wp_reset_query();
                                endif;
                            
                            ?>
                            </select>
                        </div>
                        <div class="col-12 col-md-4">
                            <select   <?php if(!$product1_id): echo "disabled"; endif; ?>  id="product_3" class="select-product-custom form-select" aria-label="Default select example">
                                <option value=""   selected>เลือกผลิตภัณฑ์</option>
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
                                    wp_reset_query();
                                endif;
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="button-cal-calculate text-center">
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
   <h1 class="ui header text-center primary-text ">ผลการเปรียบเทียบผลิตภัณฑ์</h1>

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
                    <?php if( isset($_GET['product_2'])): ?>
                        <div class="image two">
                                <img  
                                src="<?php  echo  $product2["image"] ?>" 
                                alt="<?php echo $product2["title"] ?>">
                        </div>
                    <?php endif; ?>
                    <?php if(  isset($_GET['product_3'])): ?>
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
                        "product1" => $product1["type_film"],
                        "product2" => $product2["type_film"],
                        "product3" => $product3["type_film"],
                    ]);
            ?>
            <?php 
            
                    get_template_part('components/compare-product' , null , [
                        "title"  => "พื้นที่การทา",
                        "product1" => $product1["application_area"],
                        "product2" => $product2["application_area"],
                        "product3" => $product3["application_area"],
                    ]);
            ?>
            <?php 
            
                    get_template_part('components/compare-product' , null , [
                        "title"  => "ประเภทผลิตภัณฑ์",
                        "product1" => $typeIs1,
                        "product2" => $typeIs2,
                        "product3" => $typeIs3,
                    ]);
            ?>
            <?php 
            
                    get_template_part('components/compare-product' , null , [
                        "title"  => "พื้นที่ใช้งาน",
                        "product1" => $product1["use_area"],
                        "product2" => $product2["use_area"],
                        "product3" => $product3["use_area"],
                    ]);
            ?>
        
            <?php 
            
                    get_template_part('components/compare-product' , null , [
                        "title"  => "พื้นผิว",
                        "product1" => $product1["texture"],
                        "product2" => $product2["texture"],
                        "product3" => $product3["texture"],
                    ]);
            ?>
        
            <?php 
            
                    get_template_part('components/compare-product' , null , [
                        "title"  => "กลุ่มงาน",
                        "product1" => $product1["word_group"],
                        "product2" => $product2["word_group"],
                        "product3" => $product3["word_group"],
                    ]);
            ?>
            <?php 
            
                    get_template_part('components/compare-product' , null , [
                        "title"  => "ฟังก์ชั่น",
                        "product1" => $product1["function_group"],
                        "product2" => $product2["function_group"],
                        "product3" => $product3["function_group"],
                    ]);
            ?>
        
            <?php 
                    // $dataGreen = [ ];
                    $dataGreen = [
                        "title"  => "GREEN PRODUCT",
                        "product1" => "",
                        "product2" => "",
                        "product3" => "",
                    ];
                    if(isset($_GET['product_1'])):
                        if($product1["is_green_product"]) {
                            $dataGreen["product1"] =$product1["is_green_product"];
                        } else{ 
                            $dataGreen["product1"] = "-";
                        }
                    endif;
                    if(isset($_GET['product_2'])):
                        if($product2["is_green_product"]) {
                            $dataGreen["product2"] = $product2["is_green_product"];
                        } else{ 
                            $dataGreen["product2"] = "-";

                        }
                    endif;
                    if(isset($_GET['product_3'])):
                        if($product3["is_green_product"]) {
                            $dataGreen["product3"] = $product3["is_green_product"];
                        } else{ 
                            $dataGreen["product3"] = "-";

                        }
                    endif;
            
                    get_template_part('components/compare-product-checked' , null ,  $dataGreen );
            ?>
            <?php 
             $dataInnovative = [
                "title"  => "สินค้านวัตกรรม",
                "product1" => "",
                "product2" => "",
                "product3" => "",
            ];
            if(isset($_GET['product_1'])):
                if($product1["innovative_product"]) {
                    $dataInnovative["product1"] =$product1["innovative_product"];
                } else{ 
                    $dataInnovative["product1"] = "-";
                }
            endif;
            if(isset($_GET['product_2'])):
                if($product2["innovative_product"]) {
                    $dataInnovative["product2"] = $product2["innovative_product"];
                } else{ 
                    $dataInnovative["product2"] = "-";

                }
            endif;
            if(isset($_GET['product_3'])):
                if($product3["innovative_product"]) {
                    $dataInnovative["product3"] = $product3["innovative_product"];
                } else{ 
                    $dataInnovative["product3"] = "-";

                }
            endif;
  
                    get_template_part('components/compare-product-checked' , null , $dataInnovative);
            ?>
            <?php 
            
                    get_template_part('components/compare-product' , null , [
                        "title"  => "รูปลักษณ์พิเศษ",
                        "product1" => $product1["special_look"],
                        "product2" => $product2["special_look"],
                        "product3" => $product3["special_look"],
                    ]);
            ?>
            <?php 
            
                    get_template_part('components/compare-product' , null , [
                        "title"  => "ขนาดบรรจุ",
                        "product1" => $product1["paint_brush"],
                        "product2" => $product2["paint_brush"],
                        "product3" => $product3["paint_brush"],
                    ]);
            ?>
        
            <?php 
            
                    get_template_part('components/compare-product' , null , [
                        "title"  => "มาตรฐานมอก.",
                        "product1" => $product1["standard"],
                        "product2" => $product2["standard"],
                        "product3" => $product3["standard"],
                    ]);
            ?>
            <?php 
            
                    get_template_part('components/compare-product' , null , [
                        "title"  => "ความคงทน",
                        "product1" => $product1["persistence"],
                        "product2" => $product2["persistence"],
                        "product3" => $product3["persistence"],
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
                        "product1" => $product1["solvent"],
                        "product2" => $product2["solvent"],
                        "product3" => $product3["solvent"],
                    ]);
            ?>
        
            <?php 
            
                    get_template_part('components/compare-product-button' , null , [
                        "title"  => "",
                        "product1" => "รายละเอียดเพิ่มเติม",
                        "product2" => "รายละเอียดเพิ่มเติม",
                        "product3" => "รายละเอียดเพิ่มเติม",
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