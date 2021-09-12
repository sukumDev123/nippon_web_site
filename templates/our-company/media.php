<?php 
$categories = get_terms("media_cat" , array("hide_empty" => false));
$limit_page = 9;
$search = "";
$media_cat_selected = "";
$year_cat = "";
if(isset($_GET['search'])):
    $search = $_GET["search"];
endif;
if(isset($_GET['media_cat'])):
    $media_cat_selected = $_GET["media_cat"];
endif;
if(isset($_GET['year_cat'])):
    $year_cat = $_GET["year_cat"];
    
endif;
if(isset($_GET['paged_show'])):
    $limit_page = $_GET["paged_show"];
    
endif;
?>
<div class="template-media-container">
    <div class="container">
        <div class="filter-container">
            <form onsubmit="" class="filter-search">
                <i class="bi bi-search"></i>
                <input type="text" name="search" value="<?php echo  $search ?>" placeholder="ค้นหา" id="searchMedia" />
            </form>
            <select 
            id="media_cat"  
            class="select-product-custom form-select" 
            onchange="mediaSelected()"
            >
                <option value=""><?php echo "ประเภทเนื้อหา" ?></option>
                <?php foreach($categories  as $term): ?>
                    <option <?php if($term->term_id == $media_cat_selected): echo  "selected"; endif; ?> value="<?php echo $term->term_id ?>"><?php echo $term->name ?></option>
                <?php endforeach; ?>
            </select>
                    
            <select 
            id="year_cat"  
            onchange="onYearChange()"
            class="select-product-custom form-select" 
            >
                <option value=""><?php echo "ปี" ?></option>
            </select>
        </div>

        <?php
        
        $media_cat  = '';
        $meta_query = [];
        $argc = [
            "post_type"  => "media_news" , 
            'posts_per_page' => $limit_page  , 
            'orderby' => 'publish_date',
            'order'   => 'DESC',
            'date_query' => [
                [
                    'year'  => intval(date("Y")),
                ],
            ],
        ];   
        if($search):
            $argc["s"] = $search;
        endif;
        if($media_cat_selected):
            $argc["tax_query"]  =  [
                [
                    'taxonomy' => 'media_cat',
                    'field' => 'term_id',
                    'terms' =>  [intval( $media_cat_selected)],
                    'include_children'  => true,
                    'operator' => 'IN' 
                ]
            ];  
        endif;
        if($year_cat):
            $argc["date_query"]  =  [
                [
                    'year'  => intval($year_cat),
                ],
            ];
        endif;
        if(count($meta_query) ) :
            $argc["meta_query"] = $meta_query;
        endif;
        $query = new WP_Query($argc);
        $count = $query->found_posts;   
        if($query->have_posts()):
            ?>
            <div class="row">
            <?php
        while($query->have_posts()):
            $query->the_post();
           ?>
                <div class="col-12 col-md-4">
                    <?php 
                    
                    get_template_part("templates/our-company/components/card-blog" , null , [
                        "id" => get_the_ID(),
                        "link" => get_permalink(),
                        "title" => get_the_title(),
                        "detail" => get_field("short_text"),
                        "image" => get_the_post_thumbnail_url(get_the_ID()  , array(200 , 200)),
                    ]);
                    
                    ?>
                </div>
           <?php 
;        ?>
        <?php endwhile; ?>
        </div>
        <?php endif;wp_reset_query(); ?>    
        
        
        <?php if($count >  $limit_page):   ?>
            <?php 
                $limit_page = $limit_page +  6;
                $paged_uri = get_permalink(get_the_ID())."?paged_show=".$limit_page;
                if($media_cat_selected) $paged_uri .= "&media_cat=".$media_cat_selected;
                if($year_cat) $paged_uri .= "&year_cat=".$year_cat;  
            ?>
        <div class="see_more">
            <a  href="<?php echo  $paged_uri?>">ดูเพิ่มเติม</a>
        </div>
        <?php endif; ?>

        <?php do_action("empty_page" , ["count" => $count ]) ?>
        
    </div>
</div>


<?php 


if($year_cat):
    echo <<<script
        <script>
         setTimeout(() => { initYear($year_cat); } , 1000)
        </script>

    script;
endif;


?>